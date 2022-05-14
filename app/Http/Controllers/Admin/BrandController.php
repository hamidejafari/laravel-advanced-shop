<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\StoreUserRequest;
use App\Library\Logs;
use app\Library\UploadImg;
use App\Models\Brand;
use App\Models\Content;

use App\Models\Redirects;
use App\Models\Tag;
use App\Models\Taggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{

    public function getBrand(Request $request)
    {
        $query= Brand::orderBy('id','DESC');
        if($request->get('title')){
            $query->where('title','LIKE','%'.$request->get('title').'%')->orWhere('persian_title','LIKE','%'.$request->get('title').'%');
        }
        $brands = $query->paginate(100);


        return View('admin.brands.index')

            ->with('brands', $brands);
    }

    public function getAddBrand()
    {
        $tag = Tag::get();
        return View('admin.brands.add')
            ->with('tag', $tag);


    }

    public function postAddBrand(Request $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = "assets/uploads/content/brand/";
            $uploader = new UploadImg();
            $fileName = $uploader->uploadPic($request->file('image'), $path);
            if($fileName){
                $input['image'] = $fileName;
            }else{
                return Redirect::back()->with('error' , 'عکس ارسالی صحیح نیست.');
            }
        }

//        $input['url']=str_replace(' ', '-',$input['url']);
        $input['status'] = $request->has('status');
        $input['footer'] = $request->has('footer');



        $brand = Brand::create($input);
        $brand->update([
            'url' => 'brand/'.$brand->id,
        ]);
        if ($request->has('tags')) {
            $tags_input = explode(',', $input['tags']);
            $tags = [];
            foreach ($tags_input as $item) {
                $tag = Tag::where('title', $item)->first();
                if ($tag == null) {
                    $tag = Tag::create([
                        'title' => $item
                    ]);
                }
                $tags[] = [
                    'taggable_id' => $brand->id,
                    'tag_id' => $tag->id,
                    'taggable_type' => 'App\Models\Brand'
                ];
            }
            Taggable::insert($tags);
        }
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$brand->id);

        return Redirect::action('Admin\BrandController@getBrand')->with('success', 'کد مورد نظر با موفقیت اضافه شد');
    }

    public function getEditBrand($id)
    {
        $data = Brand::find($id);
        $tag_pro = Taggable::where('taggable_id', $id)->where('taggable_type','App\Models\Brand')->pluck('tag_id')->toArray();
        $tag = Tag::whereIn('id',$tag_pro)->get();
        return View('admin.brands.edit')
            ->with('tag', $tag)
            ->with('data', $data);
    }

    public function postEditBrand($id, Request $request)
    {
        $input = $request->all();
        $input['status'] = $request->has('status');
        $input['footer'] = $request->has('footer');
//        $input['url']=str_replace(' ', '-',$input['url']);
        $content = Brand::find($id);
//        if($request->get('image_get')){
//            $path = "assets/uploads/content/brand/";
//            File::delete($path . '/big/' . $content->image);
//            File::delete($path . '/medium/' . $content->image);
//            File::delete($path . '/small/' . $content->image);
//
//            $fileName = md5(microtime()).".jpg";
//            file_put_contents("assets/uploads/content/brand/medium/".$fileName, file_get_contents($input['image_get']));
//            file_put_contents("assets/uploads/content/brand/small/".$fileName, file_get_contents($input['image_get']));
//            file_put_contents("assets/uploads/content/brand/big/".$fileName, file_get_contents($input['image_get']));
//
//            $input['image'] = $fileName;
//
//        }
//        else{
//            $input['image'] = $content->image;
//        }
        if ($request->hasFile('image')) {
            $path = "assets/uploads/content/brand/";
            File::delete($path . '/big/' . $content->image);
            File::delete($path . '/medium/' . $content->image);
            File::delete($path . '/small/' . $content->image);
            $uploader = new UploadImg();
            $fileName = $uploader->uploadPic($request->file('image'), $path);
            if($fileName){
                $input['image'] = $fileName;
            }else{
                return Redirect::back()->with('error' , 'عکس ارسالی صحیح نیست.');
            }
        }
        else {
            $input['image'] = $content->image;
        }
        $content->update($input);
        if ($request->has('tags')) {
            $tags_input = explode(',', $input['tags']);
            Taggable::where('taggable_id', $content->id)->delete();
            $tags = [];
            foreach ($tags_input as $item) {
                $tag = Tag::where('title', $item)->first();
                if ($tag == null) {
                    $tag = Tag::create([
                        'title' => $item
                    ]);
                }
                $tags[] = [
                    'taggable_id' => $content->id,
                    'tag_id' => $tag->id,
                    'taggable_type' => 'App\Models\Brand'
                ];
            }
            Taggable::insert($tags);
        }
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        return Redirect::action('Admin\BrandController@getBrand')->with('success' , 'آیتم مورد نظر با موفقیت ویرایش شد');
    }
    public function getDeleteBrand($id)
    {

        $content = Brand::find($id);
        $redirect = Redirects::create([
            "old_address" => @'/brand/'.$content->id,
            "new_address" => 'brand',

        ]);
        File::delete('assets/uploads/content/brand/small/' . $content->image);
        File::delete('assets/uploads/content/brand/big/' . $content->image);
        File::delete('assets/uploads/content/brand/medium/' . $content->image);
        $array = array($content);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        Brand::destroy($id);
        return Redirect::action('Admin\BrandController@getBrand')->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');

    }
    public function postDeleteBrand(Request $request)
    {
        $images = Brand::whereIn('id', $request->get('deleteId'))->pluck('image');
        foreach ($images as $item) {
            File::delete('assets/uploads/content/brand/small/' . $item);
            File::delete('assets/uploads/content/brand/big/' . $item);
            File::delete('assets/uploads/content/brand/medium/' . $item);
        }
        if (Brand::destroy($request->get('deleteId'))) {
            return Redirect::back()
                ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
        }

    }
    public function postSort(Request $request)
    {
        if ($request->get('update') == "update") {
            $count = 1;
            if ($request->get('update') == 'update') {
                foreach ($request->get('arrayorder') as $idval) {

                    $category = Brand::find($idval);
                    $category->listorder = $count;
                    $category->save();
                    $count++;
                }
                echo 'با موفقیت ذخیره شد.';
            }
        }
    }
     public function getDeleteImage($id)
    {

        $content = Brand::find($id);
        File::delete('assets/uploads/content/brand/small/' . $content->image);
        File::delete('assets/uploads/content/brand/big/' . $content->image);
        File::delete('assets/uploads/content/brand/medium/' . $content->image);
        $content->update([
            'image' => null,
        ]);
        $array = array($content);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        return \redirect()->back()->with('success', 'عکس با موفقیت حذف شد');

    }

}
