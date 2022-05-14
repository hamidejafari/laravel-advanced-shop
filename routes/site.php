<?php

use App\Library\Helper;
use App\Models\Category;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Kavenegar\KavenegarApi;
use Larabookir\Gateway\Gateway;
Route::get('/fixprice', 'Admin\ProductController@fixPrice');
Route::get('/fixvid', 'Site\HomeController@fixVid');
Route::get('test-bankme',  function (){
    $data = array(
        'MerchantID' => '3a80061c-06f2-47de-9c8a-1c03c8500b5e',
        'order_id' => 4354546,
        'name' => 'موسسه همگامان',
        'amount' => 20000,
        'callback' => url('finish'),
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'X-API-KEY: 3a80061c-06f2-47de-9c8a-1c03c8500b5e',
        'X-SANDBOX: 0'
    ));

    $result = curl_exec($ch);
    $err = curl_error($ch);
    $result = json_decode($result, true);

    curl_close($ch);
    if ($err) {
       dd($err);
    } else {

       dd($result);
    }

});

Route::get('/test-bank', function(){


    try {
        $gateway = Gateway::pasargad();
        $gateway->setCallback(action('Site\HomeController@getIndex'));
        $gateway->price('10000')->ready(234544, 4345535);
        $refId = $gateway->refId();
        $transID = $gateway->transactionId();


        return $gateway->redirect();
    } catch (Exception $e) {
        dd($e);

    }




});
Route::get('/get-next-test', function(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://nextpay.org/nx/gateway/token',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'api_key=9a5b953b-b230-4010-adf9-1ef0c8d15050&amount=1000&order_id=85NX85s427&customer_phone=09121234567&custom_json_fields={ "productName":"Shoes752" , "id":52 }&callback_uri=http://kaajshop:8888/finish-next-test',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $x = json_decode($response);
    $x2 = (array)$x;
    dd('https://nextpay.org/nx/gateway/payment/'.$x2['trans_id']);

});
Route::get('/schedule', function(Request  $request){

    $orders = Order::where('order_status_id',2)->where('updated_at', '>', Carbon::now()->subDays(3))->get();

    foreach ($orders as $order){

        $order->update([
            'order_status_id'=>10
        ]);

    }
});
Route::get('/sms-success', function(Request  $request){

    $orders = Order::orderby('id','desc')->where('user_id','<>','1')->where('order_status_id','3')->where('sms_convert','0')->where('updated_at', '>', Carbon::now()->subDays(3))->take(100)->get();

    foreach ($orders as $order){
        $mobile = Helper::persian2LatinDigit($order->user->mobile);
        $x = @$order->user->name;
        try{
            $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
            $receptor = @$mobile;
            $token = $x;
            $token2 = @$order->id;
            $token3 = "";
            $template = "buy";
            $type = "sms";//sms | call
            $result = $api->VerifyLookup($receptor,$token,$token2,$token3,$template,$type);
        }
        catch(ApiException $e){
            \Log::info($e->errorMessage());
        }
        catch(HttpException $e){
            \Log::info($e->errorMessage());
        }
        $order->update(['sms_convert'=>1]);
    }




});


Route::namespace('Site')->middleware('main')->group(function () {
    //First Pages
    Route::get('/', 'HomeController@getIndex')->name('site.home');
    Route::post('/post-number', 'HomeController@postNumber')->name('site.number');
    Route::post('/post-bell', 'HomeController@postBell')->name('site.bell');

    //Static
    Route::get('/about-us', 'HomeController@getAbout')->name('site.about');
    Route::get('/privacy-policy', 'HomeController@getRules')->name('site.rules');
    Route::get('/rules-and-order', 'HomeController@getOrderRules')->name('site.orderrules');
    Route::get('/pay', 'HomeController@getPay')->name('site.pay');
    Route::get('/faq', 'HomeController@getFaq')->name('site.faq');
    Route::get('/contact-us', 'HomeController@getContact')->name('site.contact');
    Route::post('/post-contact', 'HomeController@postContact')->name('site.contact-post');
    Route::get('/bestselling', 'HomeController@getMost')->name('site.most');
    Route::get('/discount', 'HomeController@getDis')->name('site.dis');
    Route::get('/popular', 'HomeController@getPopular')->name('site.popular');
    Route::get('/latest', 'HomeController@getNew')->name('site.latest');
    Route::get('/incredible-offers', 'HomeController@getTimer')->name('site.timer');

    //Product List
    Route::post('/vue/product-list', 'VueController@productList')->name('vue.product-list');
    Route::post('/vue/product-list2', 'VueController@productList2')->name('vue.product-list2');
    Route::post('/vue/product-dis', 'VueController@productDis')->name('vue.product-dis');
    Route::post('/vue/filter-product', 'VueController@filterProduct')->name('vue.filter-product');
    Route::post('/vue/setbrands', 'VueController@Brands')->name('site.getbrands');
    Route::get('/cat/{id}', 'HomeController@list')->name('site.product.list');
    Route::get('/pro/{id}', 'HomeController@detail')->name('site.product.detail');

    Route::get('/banner/{id?}', 'HomeController@banner')->name('site.banner.detail');
    Route::get('/search', 'HomeController@getSearch');
    Route::get('/tag/{tag}', 'HomeController@contentListByTag');

    //Brand
    Route::post('/vue/brand-list', 'VueController@brandList')->name('vue.brand-list');
    Route::post('/vue/filter-brand', 'VueController@filterBrand')->name('vue.filter-brand');
    Route::post('/vue/setcats', 'VueController@Cats')->name('site.getcats');
    Route::get('/brand', 'HomeController@brandList')->name('site.brand.list');
    Route::get('/brand/{id?}', 'HomeController@brandDetail')->name('site.brand.detail');


    //Comments
    Route::post('comment', 'HomeController@postComment');
    Route::post('reply', 'HomeController@postReply');
    Route::post('faq', 'HomeController@postFaq');

    //Blog
    Route::get('/blogs', 'HomeController@blogCat')->name('site.blog.cat');

            Route::get('/blogs/{id?}', 'HomeController@blogList')->name('site.blog.list');

    Route::get('/blog-detail/{id?}', 'HomeController@blogDetail')->name('site.blog.detail');

    //==Track==
    Route::get('/tracking', 'HomeController@tracking')->name('site.tracking');
    Route::get('/post-track', 'HomeController@track')->name('site.track');

    //Shop Cart & Bank
    Route::middleware('PanelPermission')->group(function (){
    });
    Route::post('/post-checkout', 'ShopController@postCheckout')->name('site.cart.post-checkout');

    Route::post('/cart/content', 'ShopController@cartContent')->name('site.cart.content');
    Route::post('/post-address', 'ShopController@postAddAddress')->name('site.cart.address');
    Route::get('/default-address/{id?}', 'ShopController@defaultAddress')->name('site.cart.default');
    Route::post('/cart/add', 'ShopController@addToCart')->name('site.cart.add');
    Route::post('/discount/add', 'ShopController@addDiscount')->name('site.discount.add');
    Route::post('/cart/remove', 'ShopController@removeFromCart')->name('site.cart.remove');
    Route::get('/checkout', 'ShopController@checkout')->name('site.cart.checkout');
    Route::get('/finish', 'ShopController@finish')->name('site.cart.finish');
});
