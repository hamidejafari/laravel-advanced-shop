<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Like;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSpecification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VueController extends Controller
{
    public static function productArr($pro){
        $colors = [];
        foreach ($pro->colors as $key2=>$row2){
            $colors[]=[
                'color'=> 'background-color: '.@$row2->pivot->color,
                'key'=>$key2,
            ];
        }
        return [
            'title'=>$pro->title,
            'id'=>$pro->id,
            'url'=> route('site.product.detail',['id'=>$pro->id]),
            'colors'=> $colors,
            'image' => @$pro->pro_image,
            'price'=>   @$pro->price_first['price'],
            'old_price'=>   @$pro->price_first['old'],
            'price2'=>   intval(@$pro->price_second['price']),
            'calcute'=>   $pro->calcute_list,
            'colorcount'=>   @$pro->colors->count(),
            'type'=>   @$pro->specification_title ? $pro->specification_title : @$pro->category[0]->specification_title,
            'like' => false,
            'likes' => $pro->likes ? count($pro->likes) : 0,
            'finalOrders' => $pro->orders ? count($pro->orders) : 0,
            'stock'=>$pro->stocks
        ];
    }
    public function customProduct($products,$price = null,$stock = null){
        $list = [];
        $colors = [];
        foreach($products as $key=>$row){
            if($stock ){
                if($row->stock_count > 0){
                    if($price){
                        if(intval(@$row->price_second['price']) >= $price[0] && intval(@$row->price_second['price']) <= $price[1]){
                            $list[] = self::productArr($row);
                        }
                    }else{
                        $list[] = self::productArr($row);
                    }
                }

            }else{
                if($price){
                    if(intval(@$row->price_second['price']) >= $price[0] && intval(@$row->price_second['price']) <= $price[1]){
                        $list[] = self::productArr($row);
                    }
                }else{
                    $list[] = self::productArr($row);
                }
            }

        }
        return $list;
    }
    public function productList(Request $request){
        $req = $request->all();
        $cat_pro = ProductCategory::where('category_id',$req['category_id'])->pluck('product_id')->toArray();
        $products = Product::whereIn('id',$cat_pro)->where('not_found','0')->where('stocks','<>','0')->where('price','<>','0')->orderby('stocks','DESC')->paginate(15);
        $products_count = Product::whereIn('id',$cat_pro)->where('not_found','0')->where('stocks','<>','0')->where('price','<>','0')->count();

        return response()->json(['products' => self::customProduct($products),'countProduct'=>$products_count], 200);
    }
    public function productList2(Request $request){
        $req = $request->all();
        $cat_pro = ProductCategory::where('category_id',$req['category_id'])->pluck('product_id')->toArray();
        $products = Product::whereIn('id',$cat_pro)->where('not_found','0')->where('stocks','0')->orderby('stocks','DESC')->paginate(15);


        return response()->json(['products' => self::customProduct($products)], 200);
    }
    public function filterProduct(Request $request){
        $req = $request->all();

        $product_specification = ProductSpecification::whereIn('product_specification_value_id',$req['specification'])->pluck('product_id');


        $query = Product::query()->where('not_found','0');

        $query->whereHas('categories',function ($query2) use($req) {
            $query2->where('id', $req['category_id']);
        });
        if(count($req['specification']) > 0)
            $query->whereIn('id', $product_specification);
        if(count($req['brand']) > 0)
            $query->whereIn('brand_id', $req['brand']);

        if ($request->get('discount'))
            $query->whereHas('prices', function ($query3) use($req) {
                $query3->whereNotNull('old_price');
            })->orWhereHas('sp', function ($query3) use($req) {
                $query3->whereHas('prices', function ($query4) use($req) {
                    $query4->whereNotNull('old_price');
                });
            });
        if ($request->get('available'))
            $query->where('available', 1);

        if ($request->get('timer'))
            $query->where('timer', 1)->where("date",">=",Carbon::now()->timezone('Asia/Tehran')->format("Y-m-d H:i"));





        $products = $query->latest()->get();


//        $product_array = collect(self::customProduct($products));
        $price = explode('-',str_replace(' ','',$request->priceRange));
//        if($price){
//            $product_array = $product_array->whereBetween('price2',[intval($price[0]),intval($price[1])]);
//        }


//        if ($request->get('sortBy') == "expensive")
//            $product_array = $product_array->sortByDesc('price2');
//        if ($request->get('sortBy') == "cheapest")
//            $product_array = $product_array->sortBy('price2');

//        dd(json_encode($product_array->toArray()));

        return response()->json(['products' => self::customProduct($products,$price,$request->get('available'))], 200);

//        dd($product_array);
//        return response()->json(['products' => $product_array->toArray()], 200);

    }
    public function Brands(Request $request){
        $req = $request->all();
        $query = Product::whereHas('categories',function ($query2) use($req) {
            $query2->where('not_found','0')->where('id', $req['category_id']);
        })->pluck('brand_id');
        $brands=Brand::whereIn('id',$query)->get();


        return json_encode(['success' => true, 'brands' => $brands]);
    }
    public function Cats(Request $request){
        $req = $request->all();
        $query = Product::whereHas('brands',function ($query2) use($req) {
            $query2->where('not_found','0')->where('brand_id', $req['brand_id']);
        })->pluck('id');

        $cat_id = ProductCategory::whereIn('product_id',$query)->pluck('category_id');
        $categories = Category::whereIn('id',$cat_id)->get();
        return json_encode(['success' => true, 'categories' => $categories]);
    }
    public function brandList(Request $request){
        $req = $request->all();
        $products = Product::where('brand_id',$req['brand_id'])->where('not_found','0')->orderby('stocks','DESC')->get();

        return response()->json(['products' => self::customProduct($products)], 200);
    }
    public function filterBrand(Request $request){
        $req = $request->all();
        $query = Product::query()->where('not_found','0');
        $query->where('brand_id',$req['brand_id']);
        if(count($req['category']) > 0)
            $query->whereHas('categories',function ($query2) use($req) {
                $query2->whereIn('id', $req['category']);
            });
        $products = $query->latest()->get();


        if ($request->get('discount'))
            $query->whereHas('prices', function ($query3) use($req) {
                $query3->whereNotNull('old_price');
            })->orWhereHas('sp', function ($query3) use($req) {
                $query3->whereHas('prices', function ($query4) use($req) {
                    $query4->whereNotNull('old_price');
                });
            });
        if ($request->get('available'))
            $query->where('available', 1);

        if ($request->get('timer'))
            $query->where('timer', 1)->where("date",">=",Carbon::now()->timezone('Asia/Tehran')->format("Y-m-d H:i"));

        $products = $query->latest()->get();

        $product_array = collect(self::customProduct($products));
        $price = explode('-',str_replace(' ','',$request->priceRange));

        return response()->json(['products' => self::customProduct($products,$price,$request->get('available'))], 200);



    }
    public function productDis(Request $request){
        $req = $request->all();

        $products = Product::orderby('stocks','DESC')->where('stocks','<>','0')->whereNotNull('price')->whereNotNull('old_price')->where('not_found','0')->active()->paginate(2);
        $products_count = $products->count();

        return response()->json(['products' => self::customProduct($products),'countProduct'=>$products_count], 200);
    }


}
