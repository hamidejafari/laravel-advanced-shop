<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;

use App\Library\Help;
use App\Library\Helper;
use App\Library\Logs;
use app\Library\MakeTree;
use App\Library\Relate;
use app\Library\UploadImg;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Price;
use App\Models\PriceDiscount;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Image;
use App\Models\ProductSpecification;
use App\Models\ProductSpecificationType;
use App\Models\Redirects;
use App\Models\RelateData;
use App\Models\Tag;
use App\Models\Taggable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class PriceController extends Controller
{

    public function get()
    {

        $prices = PriceDiscount::orderby('id','DESC')->paginate(100);


        return View('admin.price_discount.list')

            ->with('prices', $prices);


    }

    public function getAdd()
    {

        $category = Category::all()->toArray();
//        if (!empty($category)) {
//            MakeTree::getData($category);
//            $parent_id = array(null => 'بدون والد') + MakeTree::GenerateSelect();
//        } else {
//            $parent_id = array(null => 'بدون والد');
//        }

        if (!empty($category)) {
            MakeTree::getData($category);
            $category = MakeTree::GenerateArray(array('get'));
        }
        $brands = Brand::all();
        return View('admin.price_discount.form')

            ->with('brands', $brands)
            ->with('category', $category)
            ->with('parent_id', $category);


    }

    public function postAdd(Request $request)
    {

        $input = $request->all();

        $request['category_id'] == null;
        $request['brand_id'] == null;
        if ($input['percent'] != null) {
            if ($request['category_id'] != null) {
           $product_ids = ProductCategory::whereIn('category_id',$input['category_id'])->pluck('product_id');
//           $products = Product::where('id',1419)->get();
           $products = Product::whereIn('id',$product_ids)->get();

           foreach ($products as $product){
               $prcies_specification = ProductSpecification::whereHas('prices')->orderBy('id','DESC')->where('product_id',$product->id)->get();
               if($prcies_specification){
                   foreach($prcies_specification as $row){
                       $price2 = Price::where('priceable_id',$row->id)->where('priceable_type','App\Models\ProductSpecification')->orderby('id' ,'DESC')->first();

                       if(($price2['old_price'] !== 0 && $price2['old_price'] !== "0" && $price2['old_price'] !== null && strlen($price2['old_price']) > 0) || ($price2['price'] !== 0 && $price2['price'] !== "" &&  $price2['price'] !== null && strlen($price2['price']) > 0)){
                           $main_price2 = ($price2['old_price'] !== 0 && $price2['old_price'] !== "0" && $price2['old_price'] !== null && strlen($price2['old_price']) > 0) ? $price2['old_price'] : $price2['price'];
                           $percent = (intval(Helper::persian2LatinDigit($input['percent']))*intval(str_replace(',','',Helper::persian2LatinDigit($main_price2))))/100;
                           $now = intval(str_replace(',','',Helper::persian2LatinDigit($main_price2)))-$percent;
                           if(@$input['black_friday'] == 1){
                               $dis = Price::create([
                                   'price' =>intval(str_replace(',','',Helper::persian2LatinDigit($main_price2))),
                                   'priceable_id' => $row->id,
                                   'priceable_type' => 'App\Models\ProductSpecification',
                                   'black_friday'=>0,
                               ]);

                           }
                           $dis = Price::create([
                               'old_price' =>intval(str_replace(',','',Helper::persian2LatinDigit($main_price2))),
                               'price' => intval(str_replace(',','',Helper::persian2LatinDigit($now))),
                               'priceable_id' => $row->id,
                               'priceable_type' => 'App\Models\ProductSpecification',
                               'black_friday'=>1,
                           ]);
                       }
                   }
               }

               $price = Price::where('priceable_id',$product->id)->where('priceable_type','App\Models\Product')->orderby('id' ,'DESC')->first();
               if(($price['old_price'] !== 0  && $price['old_price'] !== "0" && $price['old_price'] !== null) || ($price['price'] !== 0 && $price['price'] !== "0" && $price['price'] !== null)) {
                   $main_price = ($price['old_price'] !== 0 && $price['old_price'] !== "0" && $price['old_price'] !== null) ? $price['old_price'] : $price['price'];
                   $percent = (intval(Helper::persian2LatinDigit($input['percent'])) * intval(str_replace(',', '', Helper::persian2LatinDigit($main_price)))) / 100;
                   $now = intval(str_replace(',', '', Helper::persian2LatinDigit($main_price))) - $percent;
                   if (@$input['black_friday'] == 1) {
                       $dis = Price::create([
                           'price' => intval(str_replace(',', '', Helper::persian2LatinDigit($main_price))),

                           'priceable_id' => $product->id,
                           'priceable_type' => 'App\Models\Product',
                           'black_friday'=>0,
                       ]);
                   }
                   $dis = Price::create([
                       'old_price' => intval(str_replace(',', '', Helper::persian2LatinDigit($main_price))),
                       'price' => intval(str_replace(',', '', Helper::persian2LatinDigit($now))),
                       'priceable_id' => $product->id,
                       'priceable_type' => 'App\Models\Product',
                       'black_friday'=>1,
                   ]);
               }

               Helper::changePriceTable(@$product->id);

           }
           foreach ($input['category_id'] as $item2){

                $cat_price[] = [
                    'category_id' => $item2,
                    'percent' => $input['percent'],
                ];



           }


                PriceDiscount::insert($cat_price);

        }

            if ($request['brand_id'] != null) {
                $products = Product::whereIn('brand_id',$input['brand_id'])->get();
//           $products = Product::where('id',1167)->get();
                foreach ($products as $product){


                    $price = Price::where('priceable_id',$product->id)->where('priceable_type','App\Models\Product')->orderby('id' ,'DESC')->first();

                    if(($price['old_price'] !== 0  && $price['old_price'] !== "0" && $price['old_price'] !== null) || ($price['price'] !== 0 && $price['price'] !== "0" && $price['price'] !== null)){
                        $main_price = ($price['old_price'] !== 0 && $price['old_price'] !== "0" && $price['old_price'] !== null) ? $price['old_price'] : $price['price'];
                        $percent = (intval(Helper::persian2LatinDigit($input['percent']))*intval(str_replace(',','',Helper::persian2LatinDigit($main_price))))/100;
                        $now = intval(str_replace(',','',Helper::persian2LatinDigit($main_price)))-$percent;
                        if (@$input['black_friday'] == 1) {
                            $dis = Price::create([
                                'price' =>intval(str_replace(',','',Helper::persian2LatinDigit($main_price))),
                                'priceable_id' => $product->id,
                                'priceable_type' => 'App\Models\Product',
                                'black_friday'=>0,
                            ]);
                        }
                        $dis = Price::create([
                            'old_price' =>intval(str_replace(',','',Helper::persian2LatinDigit($main_price))),
                            'price' => intval(str_replace(',','',Helper::persian2LatinDigit($now))),
                            'priceable_id' => $product->id,
                            'priceable_type' => 'App\Models\Product',
                            'black_friday'=>1,
                        ]);
                    }


                    $prcies_specification = ProductSpecification::whereHas('prices')->orderBy('id','DESC')->where('product_id',$product->id)->get();
                    if($prcies_specification){
                        foreach($prcies_specification as $row){
                            $price2 = Price::where('priceable_id',$row->id)->where('priceable_type','App\Models\ProductSpecification')->orderby('id' ,'DESC')->first();

                            if(($price2['old_price'] !== 0 && $price2['old_price'] !== "0" && $price2['old_price'] !== null && strlen($price2['old_price']) > 0) || ($price2['price'] !== 0 && $price2['price'] !== "" &&  $price2['price'] !== null && strlen($price2['price']) > 0)){
                                $main_price2 = ($price2['old_price'] !== 0 && $price2['old_price'] !== "0" && $price2['old_price'] !== null && strlen($price2['old_price']) > 0) ? $price2['old_price'] : $price2['price'];
                                $percent = (intval(Helper::persian2LatinDigit($input['percent']))*intval(str_replace(',','',Helper::persian2LatinDigit($main_price2))))/100;
                                $now = intval(str_replace(',','',Helper::persian2LatinDigit($main_price2)))-$percent;
                                if (@$input['black_friday'] == 1) {
                                    $dis = Price::create([
                                        'price' =>intval(str_replace(',','',Helper::persian2LatinDigit($main_price2))),
                                        'priceable_id' => $row->id,
                                        'priceable_type' => 'App\Models\ProductSpecification',
                                        'black_friday'=>0,
                                    ]);
                                }

                                $dis = Price::create([
                                    'old_price' =>intval(str_replace(',','',Helper::persian2LatinDigit($main_price2))),
                                    'price' => intval(str_replace(',','',Helper::persian2LatinDigit($now))),
                                    'priceable_id' => $row->id,
                                    'priceable_type' => 'App\Models\ProductSpecification',
                                    'black_friday'=>1,
                                ]);
                            }
                        }
                    }


                    Helper::changePriceTable(@$product->id);

                }
                            foreach ($input['brand_id'] as $item){

                    $brand_price[] = [
                        'brand_id' => $item,
                        'percent' => $input['percent'],
                    ];



            }


        PriceDiscount::insert($brand_price);


            }
        }


        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),1);

        return Redirect::action('Admin\PriceController@get')->with('success','قیمت ها با موفقیت تغییر کرد.');
    }

    public function getDeactive($id)
    {

        $data = PriceDiscount::find($id);
        if ($data->category_id != null){

                $product_ids = ProductCategory::where('category_id',$data->category_id)->pluck('product_id');
//           $products = Product::where('id',1419)->get();
                $products = Product::whereIn('id',$product_ids)->get();

                foreach ($products as $product){
                    $prcies_specification = ProductSpecification::whereHas('prices')->orderBy('id','DESC')->where('product_id',$product->id)->get();
                    if($prcies_specification){
                        foreach($prcies_specification as $row){
                            $price2 = Price::where('priceable_id',$row->id)->where('priceable_type','App\Models\ProductSpecification')->orderby('id' ,'DESC')->first();
                            if(($price2['old_price'] !== 0 && $price2['old_price'] !== "0" && $price2['old_price'] !== null) || ($price2['price'] !== 0 && $price2['price'] !== "" &&  $price2['price'] !== null)){
                                $main_price2 = ($price2['old_price'] !== 0 && $price2['old_price'] !== "0" && $price2['old_price'] !== null) ? $price2['old_price'] : $price2['price'];
                                $dis = Price::create([
                                    'old_price' =>null,
                                    'price' => $price2['old_price'],
                                    'priceable_id' => $row->id,
                                    'priceable_type' => 'App\Models\ProductSpecification',
                                ]);
                            }
                        }
                    }

                    $price = Price::where('priceable_id',$product->id)->where('priceable_type','App\Models\Product')->orderby('id' ,'DESC')->first();
                    if(($price['old_price'] !== 0  && $price['old_price'] !== "0" && $price['old_price'] !== null) || ($price['price'] !== 0 && $price['price'] !== "0" && $price['price'] !== null)){
                        $main_price = ($price['old_price'] !== 0 && $price['old_price'] !== "0" && $price['old_price'] !== null) ? $price['old_price'] : $price['price'];

                        $dis = Price::create([
                            'old_price' =>null,
                            'price' => $price['old_price'],
                            'priceable_id' => $product->id,
                            'priceable_type' => 'App\Models\Product'
                        ]);
                    }


                    Helper::changePriceTable(@$product->id);

                }



        }
        if ($data->brand_id != null){

                $products = Product::where('brand_id',$data->brand_id)->get();
//           $products = Product::where('id',1419)->get();

                foreach ($products as $product){
                    $prcies_specification = ProductSpecification::whereHas('prices')->orderBy('id','DESC')->where('product_id',$product->id)->get();
                    if($prcies_specification){
                        foreach($prcies_specification as $row){
                            $price2 = Price::where('priceable_id',$row->id)->where('priceable_type','App\Models\ProductSpecification')->orderby('id' ,'DESC')->first();
                            if(($price2['old_price'] !== 0 && $price2['old_price'] !== "0" && $price2['old_price'] !== null) || ($price2['price'] !== 0 && $price2['price'] !== "" &&  $price2['price'] !== null)){
                                $main_price2 = ($price2['old_price'] !== 0 && $price2['old_price'] !== "0" && $price2['old_price'] !== null) ? $price2['old_price'] : $price2['price'];
                                $dis = Price::create([
                                    'old_price' =>null,
                                    'price' => $price2['old_price'],
                                    'priceable_id' => $row->id,
                                    'priceable_type' => 'App\Models\ProductSpecification',
                                ]);
                            }
                        }
                    }

                    $price = Price::where('priceable_id',$product->id)->where('priceable_type','App\Models\Product')->orderby('id' ,'DESC')->first();
                    if(($price['old_price'] !== 0  && $price['old_price'] !== "0" && $price['old_price'] !== null) || ($price['price'] !== 0 && $price['price'] !== "0" && $price['price'] !== null)){
                        $main_price = ($price['old_price'] !== 0 && $price['old_price'] !== "0" && $price['old_price'] !== null) ? $price['old_price'] : $price['price'];
                        $dis = Price::create([
                            'old_price' =>null,
                            'price' => $price['old_price'],
                            'priceable_id' => $product->id,
                            'priceable_type' => 'App\Models\Product'
                        ]);
                    }


                    Helper::changePriceTable(@$product->id);

                }




        }
        $array = array($data);
        $serialized_array = serialize($array);
        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),1);
        $delete = PriceDiscount::destroy($id);
        return Redirect::back()->with('success' , 'تخفیف ها با موفقیت غیر فعال شدند');

    }
    public function postDeletePrice(Request $request)
    {
$input = $request->all();
        if ($request->get('deleteId')) {
        foreach ($input['deleteId'] as $del){
            $data = PriceDiscount::find($del);
            if ($data->category_id != null){

                $product_ids = ProductCategory::where('category_id',$data->category_id)->pluck('product_id');
//           $products = Product::where('id',1419)->get();
                $products = Product::whereIn('id',$product_ids)->get();

                foreach ($products as $product){
                    $prcies_specification = ProductSpecification::whereHas('prices')->orderBy('id','DESC')->where('product_id',$product->id)->get();
                    if($prcies_specification){
                        foreach($prcies_specification as $row){
                            $price2 = Price::where('priceable_id',$row->id)->where('priceable_type','App\Models\ProductSpecification')->orderby('id' ,'DESC')->first();
                            if(($price2['old_price'] !== 0 && $price2['old_price'] !== "0" && $price2['old_price'] !== null) || ($price2['price'] !== 0 && $price2['price'] !== "" &&  $price2['price'] !== null)){
                                $main_price2 = ($price2['old_price'] !== 0 && $price2['old_price'] !== "0" && $price2['old_price'] !== null) ? $price2['old_price'] : $price2['price'];
                                $dis = Price::create([
                                    'old_price' =>null,
                                    'price' => $price2['old_price'],
                                    'priceable_id' => $row->id,
                                    'priceable_type' => 'App\Models\ProductSpecification',
                                ]);
                            }
                        }
                    }

                    $price = Price::where('priceable_id',$product->id)->where('priceable_type','App\Models\Product')->orderby('id' ,'DESC')->first();
                    if(($price['old_price'] !== 0  && $price['old_price'] !== "0" && $price['old_price'] !== null) || ($price['price'] !== 0 && $price['price'] !== "0" && $price['price'] !== null)){
                        $main_price = ($price['old_price'] !== 0 && $price['old_price'] !== "0" && $price['old_price'] !== null) ? $price['old_price'] : $price['price'];

                        $dis = Price::create([
                            'old_price' =>null,
                            'price' => $price['old_price'],
                            'priceable_id' => $product->id,
                            'priceable_type' => 'App\Models\Product'
                        ]);
                    }


                    Helper::changePriceTable(@$product->id);

                }



            }
            if ($data->brand_id != null){

                $products = Product::where('brand_id',$data->brand_id)->get();
//           $products = Product::where('id',1419)->get();

                foreach ($products as $product){
                    $prcies_specification = ProductSpecification::whereHas('prices')->orderBy('id','DESC')->where('product_id',$product->id)->get();
                    if($prcies_specification){
                        foreach($prcies_specification as $row){
                            $price2 = Price::where('priceable_id',$row->id)->where('priceable_type','App\Models\ProductSpecification')->orderby('id' ,'DESC')->first();
                            if(($price2['old_price'] !== 0 && $price2['old_price'] !== "0" && $price2['old_price'] !== null) || ($price2['price'] !== 0 && $price2['price'] !== "" &&  $price2['price'] !== null)){
                                $main_price2 = ($price2['old_price'] !== 0 && $price2['old_price'] !== "0" && $price2['old_price'] !== null) ? $price2['old_price'] : $price2['price'];
                                $dis = Price::create([
                                    'old_price' =>null,
                                    'price' => $price2['old_price'],
                                    'priceable_id' => $row->id,
                                    'priceable_type' => 'App\Models\ProductSpecification',
                                ]);
                            }
                        }
                    }

                    $price = Price::where('priceable_id',$product->id)->where('priceable_type','App\Models\Product')->orderby('id' ,'DESC')->first();
                    if(($price['old_price'] !== 0  && $price['old_price'] !== "0" && $price['old_price'] !== null) || ($price['price'] !== 0 && $price['price'] !== "0" && $price['price'] !== null)){
                        $main_price = ($price['old_price'] !== 0 && $price['old_price'] !== "0" && $price['old_price'] !== null) ? $price['old_price'] : $price['price'];
                        $dis = Price::create([
                            'old_price' =>null,
                            'price' => $price['old_price'],
                            'priceable_id' => $product->id,
                            'priceable_type' => 'App\Models\Product'
                        ]);
                    }


                    Helper::changePriceTable(@$product->id);

                }




            }
            $array = array($data);
            $serialized_array = serialize($array);
            $log = Logs::log(url()->current(),$serialized_array,Auth::id(),1);
            $delete = PriceDiscount::destroy($del);
        }
            return Redirect::back()->with('success' , 'تخفیف ها با موفقیت غیر فعال شدند');

        }

    }
    public function postPrice(Request $request){
        $input = $request->all();

            foreach($input['product_id'] as $key=>$item){

                if(@$input['price'][$key] !== null){
                    if(@$input['black_friday'][$key] == 1){
                        Price::create([
                            'priceable_id' => $item,
                            'priceable_type' => $input['priceable_type'],
                            'black_friday'=>0,
                            'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price'][$key]))),
                            // 'old_price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price']))),
                        ]);
                    }

                    Price::create([
                        'priceable_id' => $item,
                        'priceable_type' => $input['priceable_type'],
                        'black_friday'=>@$input['black_friday'][$key] ? 1 : 0,
                        'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['price'][$key]))),
                        'old_price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price'][$key]))),
                    ]);

                }else{
                    Price::create([
                        'priceable_id' => $item,
                        'priceable_type' => $input['priceable_type'],
                        'black_friday'=>0,
                        'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price'][$key]))),
                        'old_price'=>null,
                    ]);
                }

                Helper::changePriceTable(@$item);

            }
            return \redirect()->back()->with('success', 'کدهای مورد نظر با موفقیت ویرایش شدند.');

    }



}
