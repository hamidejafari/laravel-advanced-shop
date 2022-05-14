<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\StoreUserRequest;
use App\Library\Logs;
use App\Models\Area;
use App\Models\City;
use App\Models\Content;
use App\Models\OrderStatus;
use App\Models\status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class StatusController extends Controller
{

    public function get()
    {
        $status = OrderStatus::orderBy('id','DESC')->whereStatus('1')->paginate(50);
        return View('admin.status.index')
            ->with('data', $status);
    }

    public function getAdd()
    {

        return View('admin.status.add');


    }

    public function postAdd(Request $request)
    {
        $input = $request->all();
        $arr = [];
        foreach ($input['title'] as $key=>$item){
            $arr[] = [

                'title'=>$item,
                'status'=>1,


            ];
        }
        $status = OrderStatus::insert($arr);
        $serialized_status = serialize($arr);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$serialized_status);
        return Redirect::back()
            ->with('success', 'کدهای مورد نظر با موفقیت اضافه شدند.');
    }

    public function getEdit($id)
    {

        $data = OrderStatus::find($id);
        return View('admin.status.edit')
            ->with('data', $data);
    }

    public function postEdit($id, Request $request)
    {
        $input = $request->all();
        $status = OrderStatus::find($id);
        $status->update($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$status->id);
        return Redirect::back()->
        with('success', 'آیتم مورد نظر با موفقیت ویرایش شد.');
    }
    public function getDelete($id)
    {

        $content = OrderStatus::find($id);
        $array = array($content);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        OrderStatus::destroy($id);
        return Redirect::back()
            ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');

    }
    public function postDelete(Request $request)
    {
        if (OrderStatus::destroy($request->get('deleteId'))) {
            return Redirect::back()
                ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
        }

    }

}
