<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductSpecificationTypeRequest;
use App\Library\Logs;
use App\Models\Category;
use App\Models\ProductSpecificationType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductSpecificationTypeController extends Controller
{
    public function getList($parent_id = null, Request $request)
    {
        if ($parent_id != null) {
            $first = ProductSpecificationType::whereId($parent_id)->first();
            $parent_id = $first->id;
        }
        $query= ProductSpecificationType::whereParentId($parent_id);
        if($request->get('title')){
            $query->where('title','LIKE','%'.$request->get('title').'%');
        }
        $data = $query->paginate(100);


        $parent = ProductSpecificationType::where('id', $parent_id)->first();

        $category = Category::whereNotNull('parent_id')->orderby('parent_id')->get();

        return View('admin.product-specification-type.index')
            ->with('category', $category)
            ->with('data', $data)
            ->with('parent', $parent)
            ->with('parent_id', $parent_id);
    }

    public function getAdd($parent_id = null)
    {
        return View('admin.product-specification-type.add')
            ->with('parent_id', $parent_id);
    }

    public function postAdd(Request $request, $parent_id = null)
    {
        $input = $request->all();
            $arr = [];
            foreach ($input['title'] as $key=>$item){
                if ($item !== null){
                $arr[] = [

                    'title'=>$item,
                    'parent_id'=>@$parent_id,
                ];
            }
            }

          $p =  ProductSpecificationType::insert($arr);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),'ProductSpecificationType');

        return Redirect::action('Admin\ProductSpecificationTypeController@getList', @$parent_id)
            ->with('success', 'آیتم جدید اضافه شد.');
    }
    public function postAddMain(Request $request, $parent_id = null)
    {

        $input = $request->all();
        $p =  ProductSpecificationType::create([
            'title'=>$input['title_main'],
             'status'=>@$input['status']
        ]);
        $arr = [];
        foreach ($input['title'] as $key=>$item){
            if ($item !== null){
            $arr[] = [

                'title'=>$item,
                'parent_id'=>@$p->id,

            ];
        }
        }

        $d =  ProductSpecificationType::insert($arr);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),'ProductSpecificationType');

        return Redirect::action('Admin\ProductSpecificationTypeController@getList', @$parent_id)
            ->with('success', 'آیتم جدید اضافه شد.');
    }

    public function getEdit($id)
    {

        $data = ProductSpecificationType::find($id);
        return View('admin.product-specification-type.edit')
            ->with('data', $data);
    }

    public function postEdit($id, Request $request)
    {

        $input = $request->all();
        $input['status'] = $request->has('status');
        $page_category = ProductSpecificationType::find($id);
        $page_category->update($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$page_category->id);
        return Redirect::action('Admin\ProductSpecificationTypeController@getList', @$input['parent_id'])
            ->with('success', 'آیتم مورد نظر با موفقیت ویرابش شد.');
    }
    public function getDelete($id)
    {
        if($id == 1){
            return Redirect::back()
                ->with('error', 'مشخصه رنگ قابل حذف نیست.');
        }
        else{
        $content = ProductSpecificationType::find($id);
            $array = array($content);
            $serialized_array = serialize($array);

            $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
            ProductSpecificationType::destroy($id);
        return Redirect::back()
            ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
    }
    }
    public function postDelete(Request $request)
    {
        if (ProductSpecificationType::destroy($request->get('deleteId'))) {
            return Redirect::back()
                ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
        }
    }

    public function postCatAdd(Request $request)
    {
        $input = $request->all();
        $pst = ProductSpecificationType::whereId($request->get('pst_id'))->first();
        $input['status'] = $request->has('status');
        $pst->categories()->attach($request->get('category_id'));
        $array = array($pst);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$pst->id);
        return Redirect::back()
            ->with('success', 'آیتم مورد نظر با موفقیت انجام شدند.');
    }

    public function getCatDelete($pst_id, $cat_id)
    {
        $pst = ProductSpecificationType::find($pst_id);
        $array = array($pst);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$pst->id);
        $pst->categories()->detach($cat_id);
        return Redirect::back()
            ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
    }




}
