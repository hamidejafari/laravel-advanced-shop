<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Logs;
use App\Models\Product;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class PropertiesController extends Controller
{



    public function get($id)
    {
        $questions = Properties::where('product_id',$id)->paginate(100);
        $questionsort = Properties::where('product_id',$id)->orderby('sort','ASC')->get();
        $product = Product::where('id',$id)->first();
        return View('admin.properties.index')
            ->with('questions', $questions)
            ->with('questionsort', $questionsort)
            ->with('product', $product)
            ->with('id',$id);
    }

    public function getAdd($id)
    {
        $questions = Properties::where('product_id',$id)->get();
        return View('admin.properties.add')
            ->with('id',$id)
            ->with('questions', $questions);


    }

    public function postAdd(Request $request)
    {
        $input = $request->all();
        $arr = [];
        foreach ($input['description'] as $key=>$item){

            if ($item != null ){

            $arr[] = [

                'description'=>$item,
                'status'=>@$input['status'][$key] ? 1 : 0,
                'product_id'=>@$input['product_id']
            ];
            }
        }

        $question = Properties::insert($arr);
        $serialized_question = serialize($arr);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$serialized_question);
        return Redirect::action('Admin\PropertiesController@get',$input['product_id'])->with('success', 'کدهای مورد نظر با موفقیت ویرایش شدند.');
    }

    public function getEdit($id)
    {

        $data = Properties::find($id);
        return View('admin.properties.edit')
            ->with('id',$id)
            ->with('data', $data);
    }

    public function postEdit($id, Request $request)
    {
        $input = $request->all();
        $input['status'] = $request->has('status');
        $properties = Properties::find($id);
        $properties->update($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$properties->id);
        return \redirect('/admin/properties/'.$properties->product_id)->with('success','آیتم موردنظر با موفقیت ثبت شد.');
    }
    public function getDelete($id)
    {

        $content = Properties::find($id);
        $array = array($content);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        Properties::destroy($id);
        return Redirect::back()
            ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');

    }
    public function postDelete(Request $request)
    {
        $orders = Properties::find($request['deleteId']);
        foreach($orders as $order)
        {
            $array = array($order);
            $serialized_array = serialize($array);

            $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$order->id);
            $order->delete();
        }

            return Redirect::back()
                ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');


    }
    public function postSort(Request $request)
    {

        if ($request->get('update') == "update") {
            $count = 1;
            if ($request->get('update') == 'update') {
                foreach ($request->get('arrayorder') as $idval) {

                    $category = Properties::find($idval);
                    $category->sort = $count;
                    $category->save();
                    $count++;
                }
                echo 'با موفقیت ذخیره شد.';
            }
        }
    }
}
