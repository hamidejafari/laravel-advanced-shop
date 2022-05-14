<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Logs;
use App\Models\Tag;
use Classes\UploadImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class TagController extends Controller
{
    public function get(){
        $data = Tag::paginate(100);
        return view('admin.tag.index')
            ->with('data',$data);
    }
    public function getEdit($id){
        $data = Tag::find($id);
        return view('admin.tag.edit')
            ->with('data',$data);
    }
    public function postEdit(Request $request , $id){
        $input = $request->all();
        $tag = Tag::find($id);
        $input['index'] = $request->has('index');
        $tag->update($input);
        $array = array($input);
        $serialized_array = serialize($array);
        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$tag->id);

            return Redirect::action('Admin\TagController@get')->with('success' , 'آیتم مورد نظر با موفقیت ویرایش شد');
        }

    public function postDelete(Request $request)
    {
        if (Tag::destroy($request->get('deleteId'))) {
            return Redirect::back()
                ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
        }

    }



}
