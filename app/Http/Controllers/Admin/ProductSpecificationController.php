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

class ProductSpecificationController extends Controller
{
    public function getIndex($product_id)
    {
        $product = Product::find($product_id);

        if (!$product) abort(404);
        $data = ProductSpecification::whereProductId($product_id)
            ->with('productSpecificationType', 'productSpecificationValue')
            ->orderby('id','DESC')->whereDoesntHave('prices')->get();
        $category_ids = ProductCategory::where('product_id',$product->id)->pluck('category_id');

        $field_ids = ProductSpecificationTypeCategory::whereIn('category_id', $category_ids)->pluck('pst_id');
        $fields = [];
        $types  =ProductSpecificationType::whereNull('parent_id')->get();
        return View('admin.products.product-specification.list')
            ->with('fields', $fields)
            ->with('product', $product)
            ->with('data', $data)
            ->with('types', $types)
            ->with('cat', $product->category_id)
            ->with('product_id', $product_id);

    }





    public function postAdd($product_id, Request $request)
    {
        $input = $request->all();
        $product = Product::find($product_id);
        if($input['main_id'] !== null){
            $main = ProductSpecificationType::create([
                'parent_id'=>$input['main_id'],
                'title'=>$input['title_main']
            ]);
            $sp_main = ProductSpecification::create([
                'product_specification_value_id' => $main->id,
                'product_specification_type_id' => $input['main_id'],
                'product_id' => $product_id,

            ]);
        }


//
//        $spe = ProductSpecification::insert($inputInsert);
        @$input['image2']=null;
        @$input['image1']=null;
        @$input['image_get']=null;

//        $array = array($input);

//        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),null,Auth::id(),@$sp->id-@$sp_main->id);

        return Redirect::action('Admin\ProductSpecificationController@getIndex', $product_id)
            ->with('success', 'آیتم جدید اضافه شد.');
    }
    public function postEditPrice($id, Request $request)
    {

        $input = $request->all();
        $sp = ProductSpecification::where('id',$id)->first();
        $price =  Price::create([
            'old_price' => Helper::persian2LatinDigit($input['old_price']),
            'price' => Helper::persian2LatinDigit($input['price']),
            'priceable_id' => $sp->id,
            'priceable_type' => 'App\Models\ProductSpecification',


        ]);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$price->id);
        return Redirect::back()->
        with('success', 'آیتم مورد نظر با موفقیت ویرایش شد.');
    }




    function postDelete(ProductSpecificationRequest $request)
    {
        $check = ProductSpecification::whereIn('id', $request->get('deleteId'))->first();
        $product = Product::find($check->product_id);
        if (!$product) abort(404);
        if (ProductSpecification::destroy($request->get('deleteId'))) {
            return Redirect::back()
                ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
        }
    }
//========================== PRODUCT IMAGE =================================================

    public function getImage($id)
    {
        $image = ProductSpecification::find($id);
        $data = Image::where('product_specification_id',$image->id)->paginate(100);
        return view('admin.sp_image.index')
            ->with('data',$data)
            ->with('image', $image);
    }

    public function getAddImage($sp_id)
    {
        $image = ProductSpecification::find($sp_id);
        $data = Image::where('product_specification_id',$image->id)->paginate(100);
        return view('admin.sp_image.add')
            ->with('data',$data)
            ->with('image', $image)
            ->with('sp_id', $sp_id);
    }

    public function postAddImage(Request $request)
    {
        $input = $request->all();
        set_time_limit(2000);
        $input['thumbnail'] = $request->has('thumbnail');
        if ($request->hasFile('file')) {
            $path = "assets/uploads/content/sp/";
            $uploader = new UploadImg();
            $fileName = $uploader->uploadPic($request->file('file'), $path);
            if($fileName){
                $input['file'] = $fileName;
            }else{
                return Redirect::back()->with('error' , 'عکس ارسالی صحیح نیست.');
            }
        }
        $image = Image::create($input);
        if ($image->thumbnail == 1){
            $imgs = Image::where('product_specification_id',$image->product_specification_id)->where('id','<>',$image->id)->get();
            foreach ($imgs as $img){
                $img->update([
                    'thumbnail'=>0
                ]);
            }
        }
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$image->id);
        return \redirect('/admin/sp/image/'.$input['product_specification_id'])->with('success','آیتم موردنظر با موفقیت ثبت شد.');
    }

    public function getEditImage($sp_id)
    {
        $data = Image::find($sp_id);

        return view('admin.sp_image.edit')
            ->with('data' , $data)
            ->with('sp_id', $sp_id);
    }

    public function postEditImage($id , Request $request)
    {
        $input = $request->all();
        $image = Image::find($id);
        set_time_limit(2000);
        if ($request->hasFile('file')) {
            $path = "assets/uploads/content/sp/";
            File::delete($path . '/big/' . $image->file);
            File::delete($path . '/medium/' . $image->file);
            File::delete($path . '/small/' . $image->file);
            $uploader = new UploadImg();
            $fileName = $uploader->uploadPic($request->file('file'), $path);
            if($fileName){
                $input['file'] = $fileName;
            }else{
                return Redirect::back()->with('error' , 'عکس ارسالی صحیح نیست.');
            }
        }
        else {
            $input['file'] = $image->file;
        }
        $input['product_specification_id'] = $image->product_specification_id;
        $image->update($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$image->id);
        return \redirect('/admin/sp/image/'.$image->product_specification_id)->with('success','آیتم موردنظر با موفقیت ویرایش شد.');
    }

    public function postDeleteImage(Request $request)
    {
        $images = Image::whereIn('id', $request->get('deleteId'))->pluck('file');
        foreach ($images as $item) {
            File::delete('assets/uploads/content/sp/small/' . $item);
            File::delete('assets/uploads/content/sp/big/' . $item);
            File::delete('assets/uploads/content/sp/medium/' . $item);
        }
        if (Image::destroy($request->get('deleteId'))) {
            return \redirect()->back()->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
        }
    }



}
