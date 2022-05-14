<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Library\Logs;
use app\Library\MakeTree;
use App\Models\Category;
use App\Models\Content;
use App\Models\Product;
use App\Models\Redirects;
use Classes\UploadImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{


    public function getCategory()
    {
        $category = Category::orderby('id','DESC')->get()->toArray();

        if (!empty($category)) {
            MakeTree::getData($category);
            $category = MakeTree::GenerateArray(array('paginate' => 100));
        }

        return View('admin.category.index')
            ->with('category', $category);
    }

    public function getAddCategory()
    {
        $categories = Category::all()->toArray();
//        if (!empty($category)) {
//            MakeTree::getData($category);
//            $parent_id = array(null => 'بدون والد') + MakeTree::GenerateSelect();
//        } else {
//            $parent_id = array(null => 'بدون والد');
//        }

        if (!empty($categories)) {
            MakeTree::getData($categories);
            $categories = MakeTree::GenerateArray(array('get'));
        }

        return View('admin.category.add')
            ->with('categories', $categories)
            ->with('parent_id', $categories);

    }


    public function postAddCategory(Request $request)
    {
        $input = $request->all();
//        $input['url']=str_replace(' ', '-',$input['url']);
        $input['status'] = $request->has('status');
        if ($request->hasFile('cover')) {
            $pathMain = "assets/uploads/content/cat";
            $extensionf = $request->file('cover')->getClientOriginalName();
            $fileName = mt_rand(100, 999)."$extensionf";
            $request->file('cover')->move($pathMain, $fileName);
            $input['cover'] = $fileName;
        }




        $category = Category::create($input);
        $category->update([
            'url' => 'cat/'.$category->id,
        ]);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$category->id);
        return Redirect::action('Admin\CategoryController@getCategory')->with('success', 'کد مورد نظر با موفقیت اضافه شد');
    }

    public function getEditCategory($id)
    {

        $data = Category::find($id);
        $categories = Category::orderby('id','DESC')->where('id','<>',$data->id)->get()->toArray();
//        if (!empty($category)) {
//            MakeTree::getData($category);
//            $parent_id = array(null => 'بدون والد') + MakeTree::GenerateSelect();
//        } else {
//            $parent_id = array(null => 'بدون والد');
//        }

        if (!empty($categories)) {
            MakeTree::getData($categories);
            $categories = MakeTree::GenerateArray(array('get'));
        }
        return View('admin.category.edit')
            ->with('data', $data)
            ->with('parent_id', $categories)
            ->with('categories', $categories);
    }

    public function postEditCategory($id, Request $request)
    {
        $input = $request->all();

//        $input['url']=str_replace(' ', '-',$input['url']);
        $input['status'] = $request->has('status');
        $content = Category::find($id);
        if ($request->hasFile('cover')) {
            File::delete('assets/uploads/content/cat/' . $content->cover);
            $pathMain = "assets/uploads/content/cat";
            $extensionf = $request->file('cover')->getClientOriginalName();
            if (true) {
                $fileName = mt_rand(100, 999)."$extensionf";
                $request->file('cover')->move($pathMain, $fileName);
                $input['cover'] = $fileName;
            } else {
                return Redirect::back()->with('error', 'فایل ارسالی صحیح نیست.');
            }
        } else {
            $input['cover'] = $content->cover;
        }
        if ($request->has('parent_id')) {
            $input['parent_id'] = $request->get('parent_id');
        } else {
            $input['parent_id'] = null;
        }

        $content->update($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        return Redirect::action('Admin\CategoryController@getCategory');
    }
    public function getDeleteCategory($id)
    {

        $content = Category::find($id);
        if ($content->parent_id != null){
        $redirect = Redirects::create([
            "old_address" => @'/cat/'.$content->id,
            "new_address" => @'/cat/'.$content->parent->id,

        ]);
    }
        else{
            $redirect = Redirects::create([
                "old_address" => @'/cat/'.$content->id,
                "new_address" => '',

            ]);
        }
        $array = array($content);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        Category::destroy($id);
        return Redirect::action('Admin\CategoryController@getCategory')->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');

    }

    public function postDeleteCategory(Request $request)
    {
        $images = Category::whereIn('id', $request->get('deleteId'));


        if (Category::destroy($request->get('deleteId'))) {
            return Redirect::back()
                ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
        }
    }

    public function getSearch(Request $request)
    {

        $query = Category::query();
        if($request->get('title')){
            $query->where('title','LIKE','%'.$request->get('title').'%');
        }

        $category = $query->orderBy('id','DESC')->paginate(100);

        return View('admin.category.search')
            ->with('category', $category);
    }




}
