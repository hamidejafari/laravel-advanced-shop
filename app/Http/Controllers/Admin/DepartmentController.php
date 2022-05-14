<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\StoreUserRequest;
use App\Library\Logs;
use App\Models\Area;
use App\Models\City;
use App\Models\Content;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class DepartmentController extends Controller
{

    public function get()
    {
        $status = Department::orderBy('id','DESC')->get();
        return View('admin.department.index')
            ->with('data', $status);
    }

    public function getAdd()
    {

        return View('admin.department.add');


    }

    public function postAdd(Request $request)
    {
        $input = $request->all();
        $arr = [];
        foreach ($input['name'] as $key=>$item){
            $arr[] = [

                'name'=>$item,



            ];
        }
        $dep = Department::insert($arr);
        $serialized_dep = serialize($arr);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$serialized_dep);
        return Redirect::back()
            ->with('success', 'کدهای مورد نظر با موفقیت اضافه شدند.');
    }

    public function getEdit($id)
    {

        $data = Department::find($id);
        return View('admin.department.edit')
            ->with('data', $data);
    }

    public function postEdit($id, Request $request)
    {
        $input = $request->all();
        $status = Department::find($id);
        $status->update($input);

        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$status->id);
        return Redirect::back()->
        with('success', 'آیتم مورد نظر با موفقیت ویرایش شد.');
    }
    public function getDelete($id)
    {

        $content = Department::find($id);
        $array = array($content);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        Department::destroy($id);
        return Redirect::back()
            ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');

    }
    public function postDelete(Request $request)
    {
        if (Department::destroy($request->get('deleteId'))) {
            return Redirect::back()
                ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
        }

    }

}
