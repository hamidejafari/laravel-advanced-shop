<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\StoreUserRequest;
use App\Library\Logs;
use App\Models\Area;
use App\Models\CatBrand;
use App\Models\City;
use App\Models\Content;
use App\Models\Product;
use App\Models\Question;
use App\Models\Sloagen;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class SloagenController extends Controller
{



    public function get($id)
    {
        $sloagens = Sloagen::where('product_id',$id)->paginate(100);
        $product = Product::where('id',$id)->first();
        return View('admin.sloagen.index')
            ->with('sloagens', $sloagens)
            ->with('product', $product)
            ->with('id',$id);
    }

    public function getAdd($id)
    {
        $sloagens = Sloagen::where('product_id',$id)->get();
        return View('admin.sloagen.add')
            ->with('id',$id)
            ->with('sloagens', $sloagens);


    }

    public function postAdd(Request $request)
    {
        $input = $request->all();
        $arr = [];
        foreach ($input['title'] as $key=>$item){

            if ($item != null && $input['image'][intval($key)] !== null ){
                if(@$input['image'][intval($key)]){
                    $pathMain = "assets/uploads/content/sloagen/";

                    $extensionf = $input['image'][intval($key)]->getClientOriginalName();
                    $fileName =mt_rand(100, 999)."$extensionf";
                    @$input['image'][intval($key)]->move($pathMain, $fileName);

                    @$input['image'][intval($key)] = $fileName;

                }
                $sloagen = Sloagen::create([
                    'title' => $item,
                    'product_id' => $input['product_id'],
                    'image' => @$input['image'][intval($key)],


                ]);
            }
        }


        $array = array($input);

        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$sloagen->id);
        return Redirect::action('Admin\SloagenController@get',$input['product_id'])->with('success', 'کدهای مورد نظر با موفقیت اضافه شدند.');

    }

    public function getEdit($id)
    {

        $data = Sloagen::find($id);
        return View('admin.sloagen.edit')
            ->with('id',$id)
            ->with('data', $data);
    }

    public function postEdit($id, Request $request)
    {
        $input = $request->all();
        $sloagen = Sloagen::find($id);
        if ($request->hasFile('image')) {
            File::delete('assets/uploads/content/sloagen/' . $sloagen->image);
            $pathMain = "assets/uploads/content/sloagen";
            $extension = $request->file('image')->getClientOriginalName();
            if (true) {
                $fileName =mt_rand(100, 999)."$extension";
                $request->file('image')->move($pathMain, $fileName);
                $input['image'] = $fileName;
            } else {
                return Redirect::back()->with('error', 'فایل ارسالی صحیح نیست.');
            }
        } else {
            $input['image'] = $sloagen->image;
        }
        $sloagen->update($input);
        $array = array($input);
        $serialized_array = serialize($array);


        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$sloagen->id);
        return \redirect('/admin/sloagen/'.$sloagen->product_id)->with('success','آیتم موردنظر با موفقیت ویرایش شد.');
    }
    public function getDelete($id)
    {

        $content = Sloagen::find($id);
        $array = array($content);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        Sloagen::destroy($id);
        return Redirect::back()
            ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');

    }
    public function postDelete(Request $request)
    {
        $orders = Sloagen::find($request['deleteId']);
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
}
