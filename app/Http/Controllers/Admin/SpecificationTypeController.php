<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Logs;
use App\Models\Category;
use App\Models\ProductSpecificationType;
use App\Models\ProductSpecificationTypeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecificationTypeController extends Controller
{
    public function getIndex(Request $request){
        $query = ProductSpecificationType::query();
        if ($request->has('search')) {
            if ($request->has('title')) {
                $query->where('title', 'LIKE', '%' . $request->get('title') . '%');
            }
        }
        $specification = $query->latest()->paginate(10);
        $count = $specification->count();

        return view('admin.specification.list')
            ->with('specification',$specification)
            ->with('count',$count);
    }
    public function getAdd(){
        return view('admin.specification.create');
    }
    public function postAdd(Request $request){
        $input = $request->all();
        $specification = ProductSpecificationType::create($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$specification->id);
        return redirect()->route('admin.specification-type.list');
    }
    public function getEdit($id){
        $specification = ProductSpecificationType::find($id);
        return view('admin.specification.update')
            ->with('data' , $specification);
    }
    public function postEdit(Request $request){
        $input = $request->all();
        $specification= ProductSpecificationType::find($input['id']);
        $specification->update($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$specification->id);
        return redirect()->route('admin.specification-type.list');
    }
    public function postDelete($id){
        $specification  = ProductSpecificationType::find($id);
        $array = array($specification);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$specification->id);
        $specification->delete();
        return redirect()->route('admin.specification-type.list');
    }
    public function getListCategory($id){
        $specification = ProductSpecificationType::find($id);
        $category = $specification->categories();
        return view('admin.specification.list-category')
            ->with('category',$category);
    }
    public function getAddCategory(){
        return view('admin.specification.create-category');
    }
    public function postAddCategory(Request $request){
        $input = $request->all();
        $product_specification_type_category = ProductSpecificationTypeCategory::create($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$product_specification_type_category->id);
        return redirect()->route('admin.specification-type.list');
    }

}
