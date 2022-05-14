<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Content;
use App\Models\Product;
use App\Models\Redirects;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$seg = request()->segments();
$redirect = Redirects::where('old_address',str_replace('https://www.kaajshop.com/','',str_replace('http://www.kaajshop.com/','',url()->current())))->first();
if ($redirect != null){
    if ($redirect->type == 1){
        Route::get('/'.urldecode($redirect->old_address), function () use ($redirect){
            return Redirect::to($redirect->new_address, 301);
        });
    }
    if ($redirect->type == 2){
        Route::get('/'.urldecode($redirect->old_address), function () use ($redirect){
            return Redirect::to($redirect->new_address, 302);
        });
    }

}

Route::get('sitemap.xml','SitemapController@sitemap');
include('site.php');
include('test.php');
include('pasargad-test.php');
include('helper.php');
include('site.php');
include('cart.php');
include('convert.php');
include('panel.php');
include('admin.php');
if(count($seg) == 2){

    $main_brand = Brand::whereNotnull('url')->where('url',$seg[1])->first();

    if($main_brand && strlen($main_brand->url) > 2){
        Route::get('/brands/'.@$main_brand->url,function() use($main_brand){

            return redirect('/brand/'.$main_brand->id);
        });

    }

}
if(count($seg) == 2){

    $main_blog = Content::whereNotnull('old_url')->Article()->where('old_url',$seg[1])->first();

    if($main_blog && strlen($main_blog->old_url) > 2){

        Route::get('/blog/'.@$main_blog->old_url,function() use($main_blog){
            return redirect('/blog-detail/'.$main_blog->id);
        });

    }

}

if(count($seg) == 2){

    $main_product = Product::whereNotnull('url')->where('url',urlencode($seg[1]))->first();
    if($main_product && strlen($main_product->url) > 2){
        Route::get('/product/'.urldecode(@$main_product->url),function() use($main_product){

            return redirect('/pro/'.$main_product->id);
        });

    }

}
if(count($seg) == 3){

    $main_cat = Category::whereNull('parent_id')->whereNotnull('url')->where('url',$seg[2])->first();

    if($main_cat && strlen($main_cat->url) > 2){
        Route::get('/pcat/products/'.@$main_cat->url,function() use($main_cat){

            return redirect('/cat/'.$main_cat->id);
        });

    }

}
if(count($seg) == 4){

    $sub_cat = Category::whereNotNull('parent_id')->whereNotnull('url')->where('url',$seg[3])->first();

    if($sub_cat && strlen($sub_cat->url) > 2){
        Route::get('pcat/products/'.$sub_cat->parent->url.'/'.$sub_cat->url,function() use($sub_cat){

            return redirect('/cat/'.$sub_cat->id);
        });

    }

}
if(count($seg) == 5){

    $sub_cat2 = Category::whereNotNull('parent_id')->whereNotnull('url')->where('url',$seg[4])->first();

    if($sub_cat2 && strlen($sub_cat2->url) > 2){
        Route::get('pcat/products/'.@$sub_cat2->parent->parent->url.'/'.@$sub_cat2->parent->url.'/'.@$sub_cat2->url,function() use($sub_cat2){

            return redirect('/cat/'.$sub_cat2->id);
        });

    }

}
Route::get('/test',function(){
    $exitCode1 = Artisan::call('cache:clear');
    $exitCode2 = Artisan::call('config:clear');
    $exitCode3 = Artisan::call('route:clear');
    return '<h1>Cache facade value cleared</h1>';
});

Route::get('/test2',function(){
    $exitCode1 = Artisan::call('key:generate');
    $exitCode2 = Artisan::call('config:cache');
    return '<h1>  value cleared</h1>';
});

