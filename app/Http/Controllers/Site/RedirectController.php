<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Content;
use App\Models\Convert\Post;
use App\Models\Convert\PostMeta;
use App\Models\Convert\TermMeta;
use App\Models\Convert\TermRelation;
use App\Models\Convert\Terms;
use App\Models\Convert\TermType;
use App\Models\InventoryReceipt;
use App\Models\Price;
use App\Models\Product;
use App\Models\Image;
use App\Models\ProductCategory;
use App\Models\ProductSpecification;
use App\Models\ProductSpecificationType;
use App\Models\Properties;
use App\Models\Redirects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RedirectController extends Controller
{

    public function mainCat(Request $request){
        $input=$request->all();
        $main_categories = Category::whereNull('parent_id')->get();
        foreach ($main_categories as $main){
            $input['old_address']='pcat/products/'.$main->url;
            $input['new_address']='cat/'.$main->id;
            $redirect = Redirects::create($input);

        }

    }
    public function subCat(Request $request){
        $input=$request->all();
        $main_categories = Category::whereNotNull('parent_id')->whereHas('childs')->get();
        foreach ($main_categories as $main){
            $input['old_address']='pcat/products/'.$main->parent->url.'/'.$main->url;
            $input['new_address']='cat/'.$main->id;
            $redirect = Redirects::create($input);

        }

    }
    public function subCat2(Request $request){
        $input=$request->all();
        $main_categories = Category::whereNotNull('parent_id')->whereDoesntHave('childs')->get();
        foreach ($main_categories as $main){

            $input['old_address']='pcat/products/'.@$main->parent->parent->url.'/'.@$main->parent->url.'/'.@$main->url;
            $input['new_address']='cat/'.$main->id;
            $redirect = Redirects::create($input);

        }

    }
    public function product(Request $request){
        $input=$request->all();
        $products = Product::get();
        foreach ($products as $pro){

            $input['old_address']='product/'.@$pro->url;
            $input['new_address']='pro/'.$pro->id;
            $redirect = Redirects::create($input);

        }
        }
        public function brand(Request $request){
            $input=$request->all();
            $products = Brand::get();
            foreach ($products as $pro){

                $input['old_address']='brands/'.@$pro->url;
                $input['new_address']='brand/'.$pro->id;
                $redirect = Redirects::create($input);

            }

    }
    public function view(Request $request){
        $input=$request->all();
        $products = Content::orderby('id','desc')->Article()->get();
        $count = $products->count();
        foreach ($products as $post){
            if($post->id % 2 == 0){
       $post->update([
           'view'=> 1400 + $post->view
       ]);
    }else{
                $post->update([
                    'view'=> 1800 + $post->view
                ]);
       }

    }
    }
}
