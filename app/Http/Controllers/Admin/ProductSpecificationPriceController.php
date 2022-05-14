<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductSpecificationRequest;
use App\Library\Helper;
use App\Library\Logs;
use app\Library\UploadImg;
use App\Models\InventoryReceipt;
use App\Models\Price;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSpecification;
use App\Models\Image;
use App\Models\ProductSpecificationType;
use App\Http\Controllers\Controller;
use App\Models\ProductSpecificationTypeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ProductSpecificationPriceController extends Controller
{
    public function getIndex($product_id)
    {
        $product = Product::find($product_id);

        if (!$product) abort(404);
        $data = ProductSpecification::whereProductId($product_id)
            ->with('productSpecificationType', 'productSpecificationValue')
            ->orderby('id','DESC')->get();
        $category_ids = ProductCategory::where('product_id',$product->id)->pluck('category_id');

        $field_ids = ProductSpecificationTypeCategory::whereIn('category_id', $category_ids)->pluck('pst_id');
        $fields = ProductSpecificationType::whereIn('id',$field_ids)->get();
        $types  =ProductSpecificationType::whereNull('parent_id')->get();

        $product_specification_price = ProductSpecification::where('product_id',$product->id)->whereHas('pricesAdmin')->orderby('sort','ASC')->get();
        return View('admin.products.product-specification-price.list')
            ->with('product_specification_price', $product_specification_price)
            ->with('fields', $fields)
            ->with('product', $product)
            ->with('data', $data)
            ->with('types', $types)
            ->with('cat', $product->category_id)
            ->with('product_id', $product_id);
    }
    public function postAdd(Request $request,$product_id){
        $input = $request->all();
        foreach($input['spf_id'] as $key=>$item){
            //Edit
            if(str_contains($item,'-old')){

                $product_specification = ProductSpecification::find($key);
                $product_specification->update([
                    'color'=>$input['color'][$key] !== "#000000" ? $input['color'][$key] : null,
                    'barcode'=>$input['barcode'][$key]
                ]);

                $images_count = Image::where('product_id',$product_specification->product_id)->where('product_specification_id',$product_specification->id)->count();
                $image_thumb = Image::where('product_id',$product_specification->product_id)->where('product_specification_id',$product_specification->id)->first();
                if($images_count == 1){
                    $image_thumb->update([
                        'thumbnail'=>1
                    ]);
                }

                $product_specification_value = ProductSpecificationType::find($product_specification->product_specification_value_id);
                $product_specification_value->update([
                    'title'=>$input['title'][$key]
                ]);
                if(@$input['price'][$key] !== null){
                    if(@$input['black_friday'][$key] == 1){
                        Price::create([
                            'priceable_type'=>'App\Models\ProductSpecification',
                            'priceable_id'=>$product_specification->id,
                            'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price'][$key]))),
                            'old_price'=>null,
                            'black_friday'=>0,
                        ]);
                    }

                    Price::create([
                        'priceable_type'=>'App\Models\ProductSpecification',
                        'priceable_id'=>$product_specification->id,
                        'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['price'][$key]))),
                        'old_price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price'][$key]))),
                        'black_friday'=>@$input['black_friday'][$key] ? 1 : 0,

                    ]);
                }else{
                    Price::create([
                        'priceable_type'=>'App\Models\ProductSpecification',
                        'priceable_id'=>$product_specification->id,
                        'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price'][$key]))),
                        'old_price'=>null,
                        'black_friday'=>0,

                    ]);
                }

                if(@$input['count'][$key] && $product_specification->stock_count !== Helper::persian2LatinDigit(@$input['count'][$key])){
                    $new_count = intval(Helper::persian2LatinDigit($input['count'][$key]))-intval($product_specification->stock_count);
                    InventoryReceipt::create([
                        'count' => $new_count,
                        'product_id' => $product_specification->product_id,
                        'product_specification_value_id' => $product_specification->product_specification_value_id,
                        'inventory_type_id' => 1,
                        'inventory_id' => 1
                    ]);
                    Helper::changeStockTable(@$product_specification->product_id);
                }


                if (@$input['image'][$key]) {
                    Image::where('product_id',$product_specification->product_id)->where('thumbnail',1)->where('product_specification_id',$product_specification->id)->delete();

                    $pathMain = "assets/uploads/content/pro/big/";
                    $extension = $input['image'][$key]->getClientOriginalExtension();
                    $fileName = md5(microtime()) . ".$extension";
                    $input['image'][$key]->move($pathMain, $fileName);
                    $x = Image::create([
                        'product_id'=>$product_specification->product_id,
                        'product_specification_id'=>$product_specification->id,
                        'file'=>$fileName,
                        'thumbnail'=>1
                    ]);
                }

                if (@$input['images'][$key]) {
                    foreach(@$input['images'][$key] as $item_image){
                        $pathMain = "assets/uploads/content/pro/big/";
                        $extension = $item_image->getClientOriginalExtension();
                        $fileName = md5(microtime()) . ".$extension";
                        $item_image->move($pathMain, $fileName);
                        $x = Image::create([
                            'product_id'=>$product_specification->product_id,
                            'product_specification_id'=>$product_specification->id,
                            'file'=>$fileName
                        ]);
                    }
                }



            }
            //Create
            else{
                $product_specification_value = ProductSpecificationType::create([
                    'title'=>$input['title'][$key],
                    'parent_id'=>1
                ]);
                $product_specification = ProductSpecification::create([
                    'product_id'=>$product_id,
                    'product_specification_type_id'=>$product_specification_value->parent_id,
                    'product_specification_value_id'=>$product_specification_value->id,
                    'color'=>$input['color'][$key] !== "#000000" ? $input['color'][$key] : null,
                    'barcode'=>$input['barcode'][$key]
                ]);

                if(@$input['price'][$key] !== null){
                    if(@$input['black_friday'][$key] == 1){

                        Price::create([
                            'priceable_type'=>'App\Models\ProductSpecification',
                            'priceable_id'=>$product_specification->id,
                            'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price'][$key]))),
                            'old_price'=>null,
                            'black_friday'=>0,
                        ]);

                    }

                    Price::create([
                        'priceable_type'=>'App\Models\ProductSpecification',
                        'priceable_id'=>$product_specification->id,
                        'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['price'][$key]))),
                        'old_price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price'][$key]))),
                        'black_friday'=>@$input['black_friday'][$key] ? 1 : 0,
                    ]);
                }else{
                    Price::create([
                        'priceable_type'=>'App\Models\ProductSpecification',
                        'priceable_id'=>$product_specification->id,
                        'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price'][$key]))),
                        'old_price'=>null,
                        'black_friday'=>0,

                    ]);
                }
                if(Helper::persian2LatinDigit($input['count'][$key]) > 0){
                    InventoryReceipt::create([
                        'count' => Helper::persian2LatinDigit($input['count'][$key]),
                        'product_id' => $product_specification->product_id,
                        'product_specification_value_id' => $product_specification->product_specification_value_id,
                        'inventory_type_id' => 1,
                        'inventory_id' => 1
                    ]);
                    Helper::changeStockTable(@$product_specification->product_id);
                }

                if (@$input['image'][$key]) {
                    Image::where('product_id',$product_specification->product_id)->where('product_specification_id',$product_specification->id)->delete();

                    $pathMain = "assets/uploads/content/pro/big/";
                    $extension = $input['image'][$key]->getClientOriginalExtension();
                    $fileName = md5(microtime()) . ".$extension";
                    $input['image'][$key]->move($pathMain, $fileName);
                    $x = Image::create([
                        'product_id'=>$product_specification->product_id,
                        'product_specification_id'=>$product_specification->id,
                        'file'=>$fileName
                    ]);
                }
                if (@$input['images'][$key+1]) {
                    foreach(@$input['images'][$key+1] as $item_image){

                        $pathMain = "assets/uploads/content/pro/big/";
                        $extension = $item_image->getClientOriginalExtension();
                        $fileName = md5(microtime()) . ".$extension";
                        $item_image->move($pathMain, $fileName);
                        $x = Image::create([
                            'product_id'=>$product_id,
                            'product_specification_id'=>$product_specification->id,
                            'file'=>$fileName
                        ]);
                    }
                }







            }
        }

        Helper::changePriceTable($product_id);

        return redirect()->back()->with('success','با موفقیت ذخیره شد');
    }

    public function delete($spf_id){
        $product_spf = ProductSpecification::find($spf_id);
        $product_spf->delete();
        return redirect()->back()->with('success','با موفقیت حذف شد');
    }

    public function deleteImage($image_id){
        $image = Image::find($image_id);
        $image->delete();
        return redirect()->back()->with('success','با موفقیت حذف شد');

    }
    public function postSort(Request $request)
    {

        if ($request->get('update') == "update") {
            $count = 1;
            if ($request->get('update') == 'update') {
                foreach ($request->get('arrayorder') as $idval) {

                    $category = ProductSpecification::find($idval);
                    $category->sort = $count;
                    $category->save();
                    $count++;
                }
                echo 'با موفقیت ذخیره شد.';
            }
        }
    }

    public function postAddGroup(Request $request,$product_id){
        $input = $request->all();
        $product = Product::find($product_id);
        $data = $product->colors;
        foreach ($data as $row){
            if(@$input['price'] !== null){
                if(@$input['black_friday'] == 1){
                    Price::create([
                        'priceable_id' => $row->id,
                        'priceable_type' => 'App\Models\ProductSpecification',
                        'black_friday'=>0,
                        'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price']))),
                        // 'old_price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price']))),
                    ]);
                }

                Price::create([
                    'priceable_id' => $row->id,
                    'priceable_type' => 'App\Models\ProductSpecification',
                    'black_friday'=>@$input['black_friday'] ? 1 : 0,
                    'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['price']))),
                    'old_price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price']))),
                ]);

            }else{
                Price::create([
                    'priceable_id' => $row->id,
                    'priceable_type' => 'App\Models\ProductSpecification',
                    'black_friday'=>0,
                    'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price']))),
                    'old_price'=>null,
                ]);
            }

        }

        return redirect()->back()->with('success','با موفقیت ذخیره شد');
    }
    public function postAddCommon(Request $request,$product_id){
        $input = $request->all();
        $product = Product::find($product_id);
        $data = $product->colors;
        if(@$input['pic'] !== null) {

            if ($request->hasFile('pic')) {
                $path = "assets/uploads/content/pro/";
                $uploader = new UploadImg();
                $fileName = $uploader->uploadPic($request->file('pic'), $path);
                if ($fileName) {
                    $input['pic'] = $fileName;
                } else {
                    return Redirect::back()->with('error', 'عکس ارسالی صحیح نیست.');
                }
            }
        }
        foreach ($data as $row){

                $image = Image::create([
                    'product_id'=>$product_id,
                    'file'=>$input['pic'],
                    'product_specification_id'=>$row->id,
                    'thumbnail'=>0
                ]);

        }


        return redirect()->back()->with('success','با موفقیت ذخیره شد');
    }

}
