<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Library\Logs;
use app\Library\UploadImg;
use App\Models\Content;

use Classes\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class ContentController extends Controller
{



    public function getAdmin()
    {

        return View('admin.index');
    }
    public function getCropper(){
        return View('admin.cropper');

    }

    public function getUploader()
    {
        $uploader = Content::Upl()->get();
        return View('admin.uploader.index')
            ->with('uploader', $uploader);
    }

    public function getAddUploader()
    {
        return View('admin.uploader.add');

    }

    public function postAddUploader(Request $request)
    {
        set_time_limit(10000);
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = "assets/uploads/content/upl/";
            $uploader = new UploadImg();
            $fileName = $uploader->uploadPic($request->file('image'), $path);
            if($fileName){
                $input['image'] = $fileName;
            }else{
                return Redirect::back()->with('error' , 'عکس ارسالی صحیح نیست.');
            }
        }
        $input['content_type'] = '4';
        $uploader = Content::create($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$uploader->id);
        return Redirect::action('Admin\ContentController@getUploader');
    }

    public function getEditUploader($id)
    {
        $data = Content::Upl()->find($id);
        return View('admin.uploader.edit')
            ->with('data', $data);
    }

    public function postEditUploader($id, Request $request)
    {
        set_time_limit(10000);
        $input = $request->all();
        $content = Content::find($id);
        if ($request->hasFile('image')) {
            $path = "assets/uploads/content/upl/";
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
        $category = Content::Upl()->find($id);
        $category->update($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$category->id);
        return Redirect::action('Admin\ContentController@getUploader');
    }
    public function getDeleteUploader($id)
    {

        $content = Content::find($id);
        File::delete('assets/uploads/content/upl/small/' . $content->image);
        File::delete('assets/uploads/content/upl/big/' . $content->image);
        File::delete('assets/uploads/content/upl/medium/' . $content->image);
        $array = array($content);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        Content::destroy($id);
        return Redirect::action('Admin\ContentController@getUploader');

    }
//    public function postAddUploader(StoreUserRequest $request)
//    {
//        $input = $request->all();
//        $input['url']=str_replace(' ', '-',$input['url']);
//        if ($request->hasFile('image')) {
//            $pathMain = "assets/uploads/content/upl";
//            $extensionf = $request->file('image')->getClientOriginalName();
//            $fileN = mt_rand(100, 999)."$extensionf";
//            $fileName = Helper::persian2LatinDigit($fileN);
//            $request->file('image')->move($pathMain, $fileName);
//            $input['image'] = $fileName;
//        }
//        $input['type'] = 'upl';
//        $uploader = Content::create($input);
//        return Redirect::action('Admin\ContentController@getUploader');
//    }
//
//    public function getEditUploader($id)
//    {
//        $data = Content::orderBy('id','DESC')->Upl()->find($id);
//        return View('admin.uploader.edit')
//            ->with('data', $data);
//    }
//
//    public function postEditUploader($id, Request $request)
//    {
//        $input = $request->all();
//        $input['url']=str_replace(' ', '-',$input['url']);
//        $content = Content::find($id);
//        if ($request->hasFile('image')) {
//            File::delete('assets/uploads/content/upl/' . $content->image);
//            $pathMain = "assets/uploads/content/upl";
//            $extensionf = $request->file('image')->getClientOriginalName();
//            if (true) {
//                $fileN = mt_rand(100, 999)."$extensionf";
//                $fileName = Helper::persian2LatinDigit($fileN);
//                $request->file('image')->move($pathMain, $fileName);
//                $input['image'] = $fileName;
//            } else {
//                return Redirect::back()->with('eror', 'فایل ارسالی صحیح نیست.');
//            }
//        } else {
//            $input['image'] = $content->image;
//        }
//        $category = Content::orderBy('id','DESC')->Upl()->find($id);
//        $category->update($input);
//        return Redirect::action('Admin\ContentController@getUploader');
//    }
//    public function getDeleteUploader($id)
//    {
//
//        $content = Content::find($id);
//        File::delete('assets/uploads/content/upl/' . $content->image);
//        Content::destroy($id);
//        return Redirect::action('Admin\ContentController@getUploader');
//
//    }

}
