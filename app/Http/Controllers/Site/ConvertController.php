<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Content;
use App\Models\Convert\Post;
use App\Models\Convert\PostMeta;
use App\Models\Convert\TermMeta;
use App\Models\Convert\TermRelation;
use App\Models\Convert\Terms;
use App\Models\Convert\TermType;
use App\Models\InventoryReceipt;
use App\Models\Order;
use App\Models\Price;
use App\Models\Product;
use App\Models\Image;
use App\Models\ProductCategory;
use App\Models\ProductSpecification;
use App\Models\ProductSpecificationType;
use App\Models\Properties;
use Illuminate\Support\Facades\DB;

use App\Library\WebClientCustom;
use DOMDocument;
use Exception;
use function Ramsey\Uuid\v1;
use DomXPath;

class ConvertController extends Controller
{

    public function convertCategoriesDes(){
        $categories = Category::all();
        foreach($categories as $row){
            $des = TermType::where('term_id',$row->old_id)->first();
            $x = Category::find($row->id);
            $x->update([
                'description'=>$des->description
            ]);
        }
    }

    public function fixInventory(){
        $out_inventory_fix = InventoryReceipt::where('inventory_type_id',2)->whereNotNull('product_specification_value_id')->get();
        foreach($out_inventory_fix as $row){
            $product_value_spf = ProductSpecificationType::find($row->product_specification_value_id);
            $product_spf = ProductSpecification::where('product_specification_value_id',$product_value_spf->id)->withTrashed()->first();
            $product_value_spf_new = ProductSpecificationType::orderBy('id','DESC')->where('title',$product_value_spf->title)->first();
            if($product_value_spf_new){
                $c = InventoryReceipt::find($row->id);
                $c->update([
                    'product_specification_value_id'=>$product_value_spf_new->id
                ]);
            }
        }
    }
    public function fixSpfs(){
        $products = Product::where('convert_spf',0)->take(515)->get();
        foreach($products as $row){
            $my_spf = ProductSpecification::where('product_id',$row->id)->whereHas('prices')->delete();


            //Price Specifications
            $spfs = TermType::where('taxonomy', 'LIKE', '%pa_%')->whereHas('productsRel',function($query1) use($row){
                $query1->where('object_id',$row->old_id);
            })->get();
            foreach($spfs as $item2){
                $product_specification = null;
                $meta = $item2->metas->toArray();
                $meta_color = $item2->metasColor->toArray();

                $main_term = Terms::where('term_id',$item2->term_id)->first();
                $pro_spf = Post::where('post_type','product_variation')->where('post_parent',$row->old_id)->where('post_excerpt', 'LIKE', '%'.$main_term->name.'%')->first();

                if($pro_spf){
                    if($item2->taxonomy == "pa_ml"){
                        $specification_value = ProductSpecificationType::where('parent_id',2)->where('title',@$meta[2]['meta_value'])->first();
                        if(!$specification_value){
                            $specification_value = ProductSpecificationType::create([
                                'old_id1'=>$item2->term_id,
                                'old_id2'=>@$pro_spf->id,
                                'parent_id'=>2,
                                'title'=>@$meta[2]['meta_value']
                            ]);
                        }

                        if(count($meta_color) > 0){
                            $product_specification = ProductSpecification::create([
                                'product_id'=>$row->id,
                                'product_specification_type_id'=>2,
                                'product_specification_value_id'=>$specification_value->id,
                                'color'=>@$meta_color[0]['meta_value']
                            ]);
                        }else{
                            $product_specification = ProductSpecification::create([
                                'product_id'=>$row->id,
                                'product_specification_type_id'=>2,
                                'product_specification_value_id'=>$specification_value->id,
                                'image'=>self::replaceName(@$meta[1]['meta_value'])
                            ]);
                        }


                    }else{
                        $specification_value = ProductSpecificationType::where('parent_id',2)->where('title',@$meta[2]['meta_value'])->first();
                        if(!$specification_value){
                            $specification_value = ProductSpecificationType::create([
                                'parent_id'=>1,
                                'title'=>@$meta[2]['meta_value']
                            ]);
                        }
                        if(count($meta_color) > 0){
                            $product_specification = ProductSpecification::create([
                                'product_id'=>$row->id,
                                'product_specification_type_id'=>1,
                                'product_specification_value_id'=>$specification_value->id,
                                'color'=>@$meta_color[0]['meta_value']
                            ]);
                        }else{
                            $product_specification = ProductSpecification::create([
                                'product_id'=>$row->id,
                                'product_specification_type_id'=>1,
                                'product_specification_value_id'=>$specification_value->id,
                                'image'=>self::replaceName(@$meta[1]['meta_value'])
                            ]);
                        }
                    }


                    $inventory_count_spf = PostMeta::where('post_id',@$pro_spf->id)->where('meta_key','_stock')->first();

                    if(intval(@$inventory_count_spf->meta_value) > 0){
                        $stock =  InventoryReceipt::create([
                            'count' =>intval($inventory_count_spf->meta_value),
                            'product_id' => $row->id,
                            'product_specification_value_id' => $specification_value->id,
                            'inventory_type_id' => 1,
                            'inventory_id' => 1,
                        ]);
                    }

                    $price_old = PostMeta::where('post_id',$pro_spf->id)->where('meta_key','_price')->first();
                    $price_old_old = PostMeta::where('post_id',$pro_spf->id)->where('meta_key','_regular_price')->first();
                    if(intval(@$price_old->meta_value) > 0){
                        $x = Price::create([
                            'priceable_type'=>'App\Models\ProductSpecification',
                            'priceable_id'=>$product_specification->id,
                            'old_price'=>intval(@$price_old_old->meta_value),
                            'price'=>intval(@$price_old->meta_value)
                        ]);
                    }


                    $old_images = Post::where('post_type','attachment')->where('post_parent',@$pro_spf->id)->get();

                    $images_arr2 = [];
                    $postmeta_spf = PostMeta::where('post_id',@$pro_spf->id)->where('meta_key','_thumbnail_id')->first();

                    $image_thumb = Post::where('ID',@$postmeta_spf->meta_value)->first();

                    if($image_thumb){
                        $images_arr2[] = [
                            'product_id'=>@$row->id,
                            'product_specification_id'=>@$product_specification->id,
                            'old_id'=>@$image_thumb->id,
                            'file'=>@$image_thumb->guid
                        ];
                    }


//                    foreach ($old_images as $row5){
//                        $images_arr2[] = [
//                            'product_id'=>@$row->id,
//                            'product_specification_id'=>@$product_specification->id,
//                            'old_id'=>@$row5->id,
//                            'file'=>@$row5->guid
//                        ];
//                    }

                    Image::insert($images_arr2);
                }

            }

            $xme = Product::find($row->id);
            $xme->update(['convert_spf'=>1]);
        }
        self::convertImagesSp();
    }

    public function convertProductBarcode(){
        $products = Product::whereHas('colors')->where('convert_barcode',0)->get();
        foreach($products as $row){
            foreach($row->colors as $item){
                $item_value = ProductSpecificationType::find($item->product_specification_value_id);
                $spf_old = Post::where('post_parent',$row->old_id)->where('post_title','LIKE','%'.@$item_value->title.'%')->first();
                $item_value->update([
                    'old_id'=>@$spf_old->id
                ]);
            }
        }
    }

    public function convertCategories(){

        $main_categories = Terms::whereHas('types')->get();
        foreach($main_categories as $row){

            $category = Category::create([
                'old_id'=>$row->term_id,
                'title'=>$row->name,
                'title_seo'=>$row->name,
                'url'=>$row->slug,
                'cover'=>self::findPic($row->term_id),
            ]);
            $child_ids = TermType::where('parent',$row->term_id)->where('taxonomy','product_cat')->pluck('term_id');
            $childs = Terms::whereIn('term_id',$child_ids)->get();

            foreach($childs as $row2){
                $category2 = Category::create([
                    'old_id'=>$row2->term_id,
                    'title'=>$row2->name,
                    'title_seo'=>$row2->name,
                    'url'=>$row2->slug,
                    'cover'=>self::findPic($row2->term_id),
                    'parent_id'=>$category->id
                ]);

                $child_ids2 = TermType::where('parent',$row2->term_id)->where('taxonomy','product_cat')->pluck('term_id');
                $childs2 = Terms::whereIn('term_id',$child_ids2)->get();
                foreach($childs2 as $row3){
                    $category3 = Category::create([
                        'old_id'=>$row3->term_id,
                        'title'=>$row3->name,
                        'title_seo'=>$row3->name,
                        'url'=>$row3->slug,
                        'cover'=>self::findPic($row3->term_id),
                        'parent_id'=>$category2->id
                    ]);
                }
            }
        }
    }
    public static function findPic($catId){
        $image_id = TermMeta::where('meta_key','thumbnail_id')->where('term_id',$catId)->first();
        $image = DB::table('wp_posts')->where('id',$image_id)->first();
        return @$image->guid;
    }
    public function convertBrands(){
        $brands = Terms::whereHas('typesBrand')->get();
        $brands_arr = [];
        foreach($brands as $row){
            $brands_arr[] = [
                'old_id'=>$row->term_id,
                'title'=>$row->name,
                'title_seo'=>$row->name,
                'url'=>$row->slug,
                'image'=>self::findPic($row->term_id),
                'status'=>1
            ];
        }
        Brand::insert($brands_arr);
    }
    public static function findCats($productId){
        $cat_old_ids = TermRelation::whereHas('termCat')->where('object_id',$productId)->pluck('term_taxonomy_id');
        $cat_new_ids = Category::whereIn('old_id',$cat_old_ids)->pluck('id');
        return $cat_new_ids;
    }
    public static function findBrand($productId){
        $brand_old = TermRelation::whereHas('termBrand')->where('object_id',$productId)->first();
        $brand = Brand::where('old_id',@$brand_old->term_taxonomy_id)->first();
        return @$brand->id;
    }

    public function fixProductSecondImages(){
        $products = Product::all();
        foreach($products as $row){
            if($row->colors){
                foreach($row->colors as $row2){
                    foreach($row2->sp_images as $x){
                        $image = Post::where('id',$x->old_id)->first();
                        $other_images = Post::where('post_type','attachment')->where('post_parent','<>',10)->where('post_title','LIKE','%'.$image->post_title.'%')->where('id','<>',$image->id)->get();
                        foreach($other_images as $x2){
                            $image_notfiex = Image::where('old_file',str_replace('kaajcosmetic.ir','kaajshop.com',$x2->guid))->first();
                            $image_notfiex->update([
                                'product_specification_id'=>$row2->id
                            ]);
                        }
                    }
                }
            }
            dd('s');
        }
    }
    public function convertProducts(){
        set_time_limit(30000000000);

        $products = Post::where('converted',0)->where('post_type','product')->where('post_parent',0)->orderBy('id','ASC')->take(400)->get();
        $products_arr = [];
        foreach($products as $row){


            //Find Fields
            $property = PostMeta::where('post_id',$row->id)->where('meta_key','custom_attributes')->first();
            $properties = preg_split('/\r\n|\r|\n/', @$property->meta_value);
            $title_en = PostMeta::where('post_id',$row->id)->where('meta_key','_subtitle')->first();
            $title_seo = PostMeta::where('post_id',$row->id)->where('meta_key','_yoast_wpseo_title')->first();
            $warning = PostMeta::where('post_id',$row->id)->where('meta_key','post_excerpt')->first();
            $price = PostMeta::where('post_id',$row->id)->where('meta_key','_price')->first();
            $price_old = PostMeta::where('post_id',$row->id)->where('meta_key','_regular_price')->first();
            $old_cover_image = PostMeta::where('post_id',$row->id)->where('meta_key','_thumbnail_id')->first();
            $old_image = Post::where('ID',@$old_cover_image->meta_value)->first();
            $inventory_count = PostMeta::where('post_id',$row->id)->where('meta_key','_stock')->first();

            //CreateProduct
            $product = Product::create([
                'old_id'=>$row->id,
                'title'=>@$row->post_title,
                'lead'=>@$row->post_excerpt,
                'title_seo'=>@$title_seo->meta_value,
                'title_en'=>@$title_en->meta_value,
                'description'=>@$row->post_content,
                'status'=>1,
                'url'=>@$row->post_name,
                'brand_id'=>self::findBrand($row->id),
                'warning'=>@$warning->meta_value
            ]);


            //inventory


            if(intval(@$inventory_count->meta_value) > 0){
                $stock =  InventoryReceipt::create([
                    'count' =>intval($inventory_count->meta_value),
                    'product_id' => $product->id,
                    'product_specification_value_id' => null,
                    'inventory_type_id' => 1,
                    'inventory_id' => 1,
                ]);
            }



            //Price
            $old_price = null;
            if(@$price_old->meta_value !== 0 && @$price->meta_value < @$price_old->meta_value){
                $old_price = intval(@$price_old->meta_value);
            }
            Price::create([
                'priceable_type'=>'App\Models\Product',
                'priceable_id'=>$product->id,
                'old_price'=>$old_price,
                'price'=>intval(@$price->meta_value)
            ]);

            //Image
            $images_arr = [];
            $images_arr[] = [
                'product_id'=>$product->id,
                'thumbnail'=>1,
                'file'=>self::replaceName(@$old_image->guid),
                'old_file'=>@$old_image->guid,
                'old_id'=>@$old_image->id
            ];
            $product_images = Post::where('post_type','attachment')->where('post_parent',@$row->ID)->get();
            foreach($product_images as $row7){
                $images_arr[] = [
                    'product_id'=>$product->id,
                    'thumbnail'=>0,
                    'file'=>self::replaceName($row7->guid),
                    'old_file'=>$row7->guid,
                    'old_id'=>@$row7->id
                ];
            }
            Image::insert($images_arr);
            //Price Specifications
            $spfs = TermType::where('taxonomy', 'LIKE', '%pa_%')->whereHas('productsRel',function($query1) use($row){
                $query1->where('object_id',$row->id);
            })->get();
            foreach($spfs as $item2){
                $product_specification = null;
                $meta = $item2->metas->toArray();
                $meta_color = $item2->metasColor->toArray();

                $main_term = Terms::where('term_id',$item2->term_id)->first();
                $pro_spf = Post::where('post_type','product_variation')->where('post_parent',$row->id)->where('post_excerpt', 'LIKE', '%'.$main_term->name.'%')->first();

                if($pro_spf){
                    if($item2->taxonomy == "pa_ml"){
                        $specification_value = ProductSpecificationType::where('parent_id',2)->where('title',@$meta[2]['meta_value'])->first();
                        if(!$specification_value){
                            $specification_value = ProductSpecificationType::create([
                                'old_id1'=>$item2->term_id,
                                'old_id2'=>@$pro_spf->id,
                                'parent_id'=>2,
                                'title'=>@$meta[2]['meta_value']
                            ]);
                        }

                        if(count($meta_color) > 0){
                            $product_specification = ProductSpecification::create([
                                'product_id'=>$product->id,
                                'product_specification_type_id'=>2,
                                'product_specification_value_id'=>$specification_value->id,
                                'color'=>@$meta_color[0]['meta_value']
                            ]);
                        }else{
                            $product_specification = ProductSpecification::create([
                                'product_id'=>$product->id,
                                'product_specification_type_id'=>2,
                                'product_specification_value_id'=>$specification_value->id,
                                'image'=>self::replaceName(@$meta[1]['meta_value'])
                            ]);
                        }


                    }else{
                        $specification_value = ProductSpecificationType::where('parent_id',2)->where('title',@$meta[2]['meta_value'])->first();
                        if(!$specification_value){
                            $specification_value = ProductSpecificationType::create([
                                'parent_id'=>1,
                                'title'=>@$meta[2]['meta_value']
                            ]);
                        }
                        if(count($meta_color) > 0){
                            $product_specification = ProductSpecification::create([
                                'product_id'=>$product->id,
                                'product_specification_type_id'=>1,
                                'product_specification_value_id'=>$specification_value->id,
                                'color'=>@$meta_color[0]['meta_value']
                            ]);
                        }else{
                            $product_specification = ProductSpecification::create([
                                'product_id'=>$product->id,
                                'product_specification_type_id'=>1,
                                'product_specification_value_id'=>$specification_value->id,
                                'image'=>self::replaceName(@$meta[1]['meta_value'])
                            ]);
                        }
                    }


                    $inventory_count_spf = PostMeta::where('post_id',@$pro_spf->id)->where('meta_key','_stock')->first();

                    if(intval(@$inventory_count_spf->meta_value) > 0){
                        $stock =  InventoryReceipt::create([
                            'count' =>intval($inventory_count_spf->meta_value),
                            'product_id' => $product->id,
                            'product_specification_value_id' => $specification_value->id,
                            'inventory_type_id' => 1,
                            'inventory_id' => 1,
                        ]);
                    }

                    $price_old = PostMeta::where('post_id',$pro_spf->id)->where('meta_key','_price')->first();
                    $price_old_old = PostMeta::where('post_id',$pro_spf->id)->where('meta_key','_regular_price')->first();
                    if(intval(@$price_old->meta_value) > 0){
                        $x = Price::create([
                            'priceable_type'=>'App\Models\ProductSpecification',
                            'priceable_id'=>$product_specification->id,
                            'old_price'=>intval(@$price_old_old->meta_value),
                            'price'=>intval(@$price_old->meta_value)
                        ]);
                    }


                    $old_images = Post::where('post_type','attachment')->where('post_parent',@$pro_spf->id)->get();

                    $images_arr2 = [];
                    $postmeta_spf = PostMeta::where('post_id',@$pro_spf->id)->where('meta_key','_thumbnail_id')->first();

                    $image_thumb = Post::where('ID',@$postmeta_spf->meta_value)->first();

                    if($image_thumb){
                        $images_arr2[] = [
                            'product_id'=>@$product->id,
                            'product_specification_id'=>@$product_specification->id,
                            'old_id'=>@$image_thumb->id,
                            'file'=>@$image_thumb->guid
                        ];
                    }


                    foreach ($old_images as $row5){
                        $images_arr2[] = [
                            'product_id'=>@$product->id,
                            'product_specification_id'=>@$product_specification->id,
                            'old_id'=>@$row5->id,
                            'file'=>@$row5->guid
                        ];
                    }

                    Image::insert($images_arr2);
                }

            }
            //Specifications
            $specifications = PostMeta::where('post_id',$row->id)->where('meta_key','_dwps_specification_table')->first();
            $specifications_arr = [];
            if(@$specifications->meta_value){
                foreach(unserialize(@$specifications->meta_value) as $row3){
                    foreach($row3['attributes'] as $item){
                        $specification_type = ProductSpecificationType::whereNull('parent_id')->where('title',$item['attr_name'])->first();
                        if(!$specification_type){
                            $specification_type = ProductSpecificationType::create([
                                'title'=>$item['attr_name']
                            ]);
                        }
                        $specification_value = ProductSpecificationType::where('parent_id',$specification_type->id)->where('title',$item['value'])->first();
                        if(!$specification_value){
                            $specification_value = ProductSpecificationType::create([
                                'parent_id'=>$specification_type->id,
                                'title'=>$item['value']
                            ]);
                        }

                        $specifications_arr[] = [
                            'product_id'=>@$product->id,
                            'product_specification_type_id'=>@$specification_type->id,
                            'product_specification_value_id'=>@$specification_value->id
                        ];
                    }
                }
                ProductSpecification::insert($specifications_arr);
            }

            //Properties
            $pros = [];
            foreach($properties as $row3){
                $pros[] = [
                    'product_id'=>$product->id,
                    'description'=>$row3,
                    'status'=>1
                ];
            }
            Properties::insert($pros);
            //ProductCategory
            $ids = [];
            foreach(self::findCats($row->id) as $row2){
                $ids[] = [
                    'product_id'=>$product->id,
                    'category_id'=>$row2,
                ];
            }
            ProductCategory::insert($ids);

            $change = Post::where('id',$row->id)->first();
            $change->converted = 1;
            $change->save();
        }

        dd('finished');
    }
    public function replaceImageNames(){
        set_time_limit(300);

        $images_name = Image::where('file', 'LIKE', '%kaajcosmetic.ir%')->orderBy('id','ASC')->get();
        foreach($images_name as $row){
            $x = Image::find($row->id);
            $x->update([
                'file'=>str_replace('kaajcosmetic.ir','kaajshop.com',$x->file)
            ]);
        }
    }
    public static function convertImagesSp(){
        $images = ProductSpecification::whereNotNull('image')->whereNull('old_image')->orderBy('id','ASC')->get();
        foreach($images as $row){
            $x = ProductSpecification::find($row->id);
            $x->update([
                'image'=>str_replace('http://kaajshop.com/wp-content/uploads/','',str_replace('https://kaajshop.com/wp-content/uploads/','',str_replace('http://kaajcosmetic.ir/wp-content/uploads/','',$row->image))),
                'old_image'=>$row->image,
                'convert'=>1
            ]);
        }
        dd('end');
    }
    public static function replaceName($old_file){
        return str_replace('https://kaajshop.com/wp-content/uploads/','',str_replace('http://kaajcosmetic.ir/wp-content/uploads/','',str_replace('http://kaajshop.com/wp-content/uploads/','',str_replace('https://kaajshop.com/wp-content/uploads/','',str_replace('http://kaajcosmetic.ir/wp-content/uploads/','',$old_file)))));
    }
    public function convertImages(){
        $images = Image::where('convert',0)->whereNotNull('file')->orderBy('id','ASC')->take(1000)->get();
        foreach($images as $row){
            $x = Image::find($row->id);

            $x->update([
                'file'=>str_replace('https://kaajshop.com/wp-content/uploads/','',str_replace('http://kaajshop.com/wp-content/uploads/','',str_replace('https://kaajshop.com/wp-content/uploads/','',str_replace('http://kaajcosmetic.ir/wp-content/uploads/','',$row->file)))),
                'old_file'=>$row->file,
                'convert'=>1
            ]);
        }
        dd('end');
    }


    public static function convertSeo(){
        set_time_limit(30000000000);

        $products = Product::where('seo_convert',0)->take(50)->orderBy('id','ASC')->get();
        foreach($products as $row){
            $wc = new WebClientCustom();
            $page = $wc->Navigate('https://kaajshop.com/product/'.$row->url);
            \Log::info('https://kaajshop.com/product/'.$row->url);
            if ($page === FALSE) {
                \Log::info('Failed to load');
                $x = Product::find($row->id);
                $x->update([
                    'seo_convert'=>1,
                    'not_found'=>1
                ]);
            }else{
                $dom = new DOMDocument('1.0');
                $html_code = $page;
                $searchPage = mb_convert_encoding($html_code, 'HTML-ENTITIES', "UTF-8");
                @$dom->loadHtml($searchPage);
                $description_seo = null;
                $title_seo = @$dom->getElementsByTagName('title')[0]->nodeValue;
                foreach(@$dom->getElementsByTagName('meta') as $item){
                    if(@$item->attributes[0]->nodeValue == "description"){
                        $description_seo = @$item->attributes[1]->nodeValue;
                    }
                }
                $x = Product::find($row->id);
                $x->update([
                    'title_seo'=>$title_seo,
                    'description_seo'=>$description_seo,
                    'seo_convert'=>1,
                ]);
            }
        }
    }


    public function convertOrder(){
        $orders = Order::whereNull('old_id')->get();
        foreach($orders as $row){
            $row->update([
                'bank_id'=>1
            ]);
        }
    }
    public function getDes()
    {
        $products = Product::get();
        foreach ($products as $product){
            $product->update([
                'description'=>str_replace('http://kaajshop.com/','https://www.kajshop.com/',str_replace('https://kaajshop.com/','https://www.kajshop.com/',str_replace('https://www.kaajshop.com/','https://www.kajshop.com/',str_replace('http://www.kaajshop.com/','https://www.kajshop.com/',$product->description)))),
            ]);


        }

        $brands = Brand::get();
        foreach ($brands as $brand){
            $brand->update([
                'description'=>str_replace('http://kaajshop.com/','https://www.kajshop.com/',str_replace('https://kaajshop.com/','https://www.kajshop.com/',str_replace('https://www.kaajshop.com/','https://www.kajshop.com/',str_replace('http://www.kaajshop.com/','https://www.kajshop.com/',$brand->description)))),
            ]);


        }

        $contents = Content::get();
        foreach ($contents as $content){
            $content->update([
                'description'=>str_replace('http://kaajshop.com/','https://www.kajshop.com/',str_replace('https://kaajshop.com/','https://www.kajshop.com/',str_replace('https://www.kaajshop.com/','https://www.kajshop.com/',str_replace('http://www.kaajshop.com/','https://www.kajshop.com/',$content->description)))),
            ]);


        }

        $cats = Category::get();
        foreach ($cats as $cat){
            $cat->update([
                'description'=>str_replace('http://kaajshop.com/','https://www.kajshop.com/',str_replace('https://kaajshop.com/','https://www.kajshop.com/',str_replace('https://www.kaajshop.com/','https://www.kajshop.com/',str_replace('http://www.kaajshop.com/','https://www.kajshop.com/',$cat->description)))),
            ]);


        }

    }
    public function convertBlack(){
        $prices = Price::whereNotNull('old_price')->whereNotNull('price')->where('black_friday','0')->where('convertprice','0')->get();

        foreach($prices as $row){
            $row->update([
                'black_friday'=>1,
                'convertprice'=>1,
            ]);
        }
    }
}
