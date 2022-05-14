<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use App\Models\Cat;
use App\Models\CatBrand;
use App\Models\CatCity;
use App\Models\Category;
use App\Models\City;
use App\Models\Content;

use App\Models\Error;
use App\Models\Help;
use App\Models\Product;
use App\Models\ShopCatBrand;
use App\Models\Tag;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function sitemap()
    {
        $category = Category::orderBy('id','DESC')->get();
        $tags = Tag::orderBy('id','DESC')->where('index','1')->get();
        $brands = Brand::orderBy('id','DESC')->get();
        $articles = Content::orderBy('id','DESC')->Article()->get();
        $article_cat = Content::orderby('id', 'DESC')->ArticleCat()->get();
        $products = Product::orderby('id','DESC')->where('not_found','0')->get();
        $sliders = Content::orderby('sort','ASC')->wherein('content_type',[2,3,6,7,8,9,10,11])->get();
        return response()->view('sitemap', [

            'category'=> $category,
            'tags'=> $tags,
            'brands'=> $brands,
            'products'=> $products,
            'articles'=> $articles,
            'article_cat'=> $article_cat,
            'sliders'=> $sliders,


        ])->header('Content-Type','text/xml');    }
}
