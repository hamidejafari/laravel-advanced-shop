<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Library\Logs;
use app\Library\UploadImg;
use App\Models\Content;

use App\Models\Social;
use Classes\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class SocialController extends Controller
{


    public function get()
    {
        $uploader = Social::get();
        return View('admin.social.index')
            ->with('uploader', $uploader);
    }

    public function getAdd()
    {
        return View('admin.social.add');

    }

    public function postAdd(Request $request)
    {
        set_time_limit(10000);
        $input = $request->all();
        $uploader = Social::create($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$uploader->id);
        return Redirect::action('Admin\SocialController@get');
    }

    public function getEdit($id)
    {
        $data = Social::find($id);
        return View('admin.social.edit')
            ->with('data', $data);
    }

    public function postEdit($id, Request $request)
    {
        set_time_limit(10000);
        $input = $request->all();
        $content = Social::find($id);
        $content->update($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        return Redirect::action('Admin\SocialController@get');
    }
    public function getDelete($id)
    {

        $content = Social::find($id);
        $array = array($content);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        Social::destroy($id);
        return Redirect::action('Admin\SocialController@get');

    }


}
