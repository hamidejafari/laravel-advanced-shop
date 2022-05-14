<?php

namespace App\Library;
use App\Models\Category;
use App\Models\PriceSpecification;
use App\Models\Product;
use App\Models\Shop;
use App\Models\ShopProduct;
use App\Models\Ticket;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Kavenegar\KavenegarApi;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use App\Models\Setting;

class Help
{
    public static function persian2LatinDigit($string)
    {
        $persian_digits = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabic_digits = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $english_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        $string = str_replace($persian_digits, $english_digits, $string);
        $string = str_replace($arabic_digits, $english_digits, $string);

        return $string;
    }
    public static function sendSmsToAdmin($message2){
        $setting = Setting::first();
        try{


    	    $api = new KavenegarApi("4334364A4B7778466C59797747552B31686265706F476E7031776D427730345266326E4C4A3570445531413D");
            $sender = "10009900009909";
            $message = $message2;
            $receptor = [$setting->sms_phone];
            $result = $api->Send($sender,$receptor,$message);


        }
        catch(ApiException $e){
            \Log::info($e->errorMessage());
        }
        catch(HttpException $e){
            \Log::info($e->errorMessage());
        }

        return true;
    }
    public static function countShops($category_id){

        $childs = Category::where('parent_id',$category_id)->pluck('id');
        $count_shops = ShopProduct::whereHas('product', function (Builder $query)use($childs) {
            $query->whereIn('category_id',$childs);
        })->whereHas('shop')->get()->groupBy('shop_id')->count();
        return $count_shops;
    }
    public static function categoriesOfShop($shop_id){
        $products_ids = Product::whereHas('productShops', function (Builder $query)use($shop_id) {
            $query->where('shop_id',$shop_id);
        })->pluck('category_id');
        $cats = Category::whereIn('id',$products_ids)->get();
        return $cats;
    }
    public static function countOrders(){
        $tickets = null;
        $user = User::find(Auth::id());
        if($user->website_seller == 1){
            $tickets = Ticket::where('seller_id',$user->id)->where('reply_id',null)->where('status',0)->where('type',1)->get();
        }else{
            $tickets = Ticket::where('user_id',$user->id)->where('reply_id',null)->where('status',0)->where('type',1)->get();
        }
        return count($tickets);
    }
    public static function userCounts(){
        $user = User::find(Auth::id());

        if($user->website_seller == 1){
            $tickets = Ticket::where('seller_id',$user->id)->where('reply_id',null)->where('status',0)->get();
        }else{
            $tickets = Ticket::where('user_id',$user->id)->where('reply_id',null)->where('status',0)->get();
        }



        $productCounts = ShopProduct::whereIn('shop_id',$user->shops->pluck('id'))->count();
        return [
            'lastShop'=>@$user->shops[0] ? @$user->shops[0]->title : 'فروشگاهی ثبت نشده',
            'ticketCounts'=>count($tickets),
            'productCounts'=>$productCounts
        ];
    }

    public static function checkPriceProduct($sub_category_id,$factory_id){
        $product_ids = Product::where('sub_category_id',$sub_category_id)->pluck('id');
        $prices = PriceSpecification::whereIn('product_id',$product_ids)->where('factory_id',$factory_id)->count();
        if($prices > 0 ){
            return true;
        }else{
            return false;
        }
    }
    public static function checkPriceCategory($category_id){
        $main_cat = Category::find($category_id);
        $product_ids = Product::whereIn('category_id',$main_cat->childs->pluck('id'))->pluck('id');
        $prices = PriceSpecification::whereIn('product_id',$product_ids)->count();
        if($prices > 0 ){
            return true;
        }else{
            return false;
        }
    }
    public static function checkPriceCategorySub($category){
        $product_ids = Product::where('category_id',$category)->pluck('id');
        $prices = PriceSpecification::whereIn('product_id',$product_ids)->count();
        if($prices > 0 ){
            return true;
        }else{
            return false;
        }
    }
    
    public static function checkPriceCategorySub2($category){
        $product_ids = Product::where('sub_category_id',$category)->pluck('id');
        $prices = PriceSpecification::whereIn('product_id',$product_ids)->count();
        if($prices > 0 ){
            return true;
        }else{
            return false;
        }
    }
}
