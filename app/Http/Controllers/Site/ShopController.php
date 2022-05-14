<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\Discount;
use App\Models\InventoryReceipt;
use App\Models\Order;
use App\Models\OrderHistory;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductSpecification;
use App\Models\ProductSpecificationType;
use App\Models\Setting;
use App\Models\State;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Kavenegar\Exceptions\HttpException;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\KavenegarApi;
use SoapClient;
use App\Library\Helper;


class ShopController extends Controller
{

    public function checkout()
    {
        $states = State::get();
        $cities = City::get();
        $user = Auth::user();
        if ($user){
            $addresses = Address::authUser()->orderby('default_address', 'DESC')->orderby('id', 'DESC')->take(2)->get();
            $default_address = Address::authUser()->where('default_address', '1')->orderby('id', 'DESC')->first();
        }
        else{
            $addresses = null;
            $default_address = null;

        }
        $order_items_count = 0;
        $currentOrder =null;


        $currentOrder = Order::authUser()->currentOrder()->first();
        if($currentOrder !== null){
            if($default_address !== null){
                $currentOrder->update([
                    'address_id'=>@$default_address->id,
                    'state_id'=>@$default_address->state_id,
                    'city_id'=>@$default_address->city_id,
                ]);
            }
            $order_items_count = $currentOrder->orderItems;
        }


        return view(
            'site.cart.cart')
            ->with('user', $user)
            ->with('currentOrder', $currentOrder)

            ->with('order_items_count', $order_items_count)
            ->with('states', $states)
            ->with('cities', $cities)
            ->with('default_address', $default_address)
            ->with('addresses', $addresses);
    }

    public function postAddAddress(Request $request)
    {
        $input = $request->all();
        $order = Order::find($request->get('order_id'));
        $addresses = Address::authUser()->where('default_address', '1')->get();
        foreach ($addresses as $row) {
            $row->update([
                'default_address' => 0
            ]);
        }
        $address = Address::create([
            'name' => $input['name'],
            'user_id' => Auth::id(),
            'state_id' => @$input['state_id'],
            'city_id' => @$input['city_id'],
            'location' => @$input['location'],
            'postal_code' => @$input['postal_code'],
            'transferee_name' => @$input['transferee_name'],
            'transferee_family' => @$input['transferee_family'],
            'transferee_mobile' => @$input['transferee_mobile'],
            'default_address' => 1
        ]);
        $order->update([
            'address_id' => $address->id,
            'state_id' => @$input['state_id'],
            'city_id' => @$input['city_id'],
        ]);
        return redirect()->back()->with('success', 'آدرس با موفقیت اضافه شد');

    }
    public function defaultAddress($id)
    {
        $user = Auth::user();
        $order = Order::authUser()->currentOrder()->first();
        $default_addresses = Address::authUser()->where('default_address',1)->get();
        foreach ($default_addresses as $default_address){
            $default_address->update([
                'default_address'=> 0,
            ]);
        }
        $address = Address::find($id);
        $address->update([
            'default_address'=> 1,
        ]);
        $order->update([
            'address_id' => $address->id,
            'state_id' => @$address['state_id'],
            'city_id' => @$address['city_id'],
        ]);

        return redirect()->back()->with('success', 'آدرس پیشفرض با موفقیت ثبت شد');

    }

    public static function setOrderTotalPrice($currentOrder)
    {
        $setting = Setting::first();
        $total_price = 0;
        foreach ($currentOrder->orderItems as $row) {
            if ($row->product_specification_id != null) {
                $total_price += (intval(@$row->quantity) * intval(@$row->productspecification->prices[0]->price));
            } else {
                $total_price += (intval(@$row->quantity) * intval(@$row->product->price_second['price']));
            }
        }
        $total_calculated = $total_price + ($total_price * ($setting->tax / 100)) + intval($currentOrder['post_price']);

        $currentOrder->update([
            'total_prices' => $total_price,
            'total_calculated' => $total_calculated,
            'payment' => $total_calculated
        ]);


    }

    public static function getInventoryCount($product,$product_specification)
    {
        $mines = 0;
        \Log::info($product->id);

        if($product_specification !== null){
            $in = InventoryReceipt::where('product_id', $product->id)->where('product_specification_value_id',$product_specification->id)->In()->sum('count');
            $out = InventoryReceipt::where('product_id', $product->id)->where('product_specification_value_id',$product_specification->id)->Out()->sum('count');
        }else{
            $in = InventoryReceipt::where('product_id', $product->id)->In()->sum('count');
            $out = InventoryReceipt::where('product_id', $product->id)->Out()->sum('count');
        }

        \Log::info(intval($out));



        $mines = intval($in) - intval($out);
        return $mines;
    }

    public static function getCustomOrder($currentOrder)
    {
        $items = [];
        foreach ($currentOrder->orderItems as $item) {
            if ($item->product_specification_id != null) {
                $title = @$item->product->title . '/' . @$item->productSpecificationValue->title;
                $price1 = @$item->productspecification->prices[0]->price;
            } else {
                $title = @$item->product->title;
                $price1 = @$item->product->price_second['price'];
            }
            $items[] = [
                'id' => @$item->id,
                'productTitle' => @$title,
                'productTitleEn' => @$item->product->title_en,
                'productId' => @$item->product_id,
                'productImage' => @$item->product->pro_image,
                'productPrice' => @$item->product->price_first['price'],
                'itemPrice' =>number_format( @$price1),
                'productUrl' => route('site.product.detail', ['id' => $item->product->id]),
                'productQuantity' => $item->quantity,
                'specificationId' => $item->product_specification_id,
                'totalPrice' => number_format((intval($item->quantity) * intval($price1)) + intval($currentOrder['post_price'])),

            ];
        }


        $sumPrice = $currentOrder->total_prices;
        $totalCounts = $currentOrder->orderItems()->sum('quantity');
        return [
            'items' => $items,
            'sumPrice' => number_format($sumPrice),
            'totalCount' => $totalCounts,
            'sumPriceNumber' => $sumPrice,
            'payment' => $currentOrder->total_calculated,
            'order' => $currentOrder,
        ];
    }

    public function cartContent(Request $request)
    {
//        if (!Auth::check()) {
//            return response()->json([
//                'success' => false,
//                'button' => false,
//
//                'message' => ' برای خرید کالا ابتدا وارد پنل کاربری خود شوید'
//            ], 200);
//        }
        $currentOrder = Order::authUser()->currentOrder()->first();
        if ($currentOrder == null) {
            return response()->json([
                'success' => false,
                'button' => false,

                'message' => ' سبد خرید شما خالی است.',
                'cart' => '',
                'cartSumPrice' => 0,
                'cartPayment' => 0,
                'countShopping' => 0,
                'address' => '',
                'order' => ''
            ], 200);
        }
        $address = Address::authUser()->Default()->first();
        $orderItems = self::getCustomOrder($currentOrder);
        return response()->json([
            'success' => true,
            'cart' => $orderItems['items'],
            'cartSumPrice' => $orderItems['sumPrice'],
            'cartPayment' => $currentOrder['total_calculated'],
            'countShopping' => OrderItem::where('order_id', $currentOrder->id)->sum('quantity'),
            'address' => $address,
            'order' => $currentOrder,
            'totalCount'=>$orderItems['totalCount']
        ], 200);
    }

    public function addToCart(Request $request)
    {

//        if (!Auth::check()) {
//            return response()->json([
//                'success' => false,
//                'button' => true,
//
//                'message' => ' برای خرید کالا ابتدا وارد پنل کاربری خود شوید'
//            ], 200);
//        }
//        if (Auth::user()->mobile_confirm == 0) {
//            return response()->json([
//                'success' => false,
//                'button' => true,
//
//                'message' => 'ابتدا اکانت خود را فعال سازی کنید.'
//            ], 200);
//        }
        $currentOrder = Order::authUser()->currentOrder()->first();
        if ($currentOrder == null) {
            if(Auth::check()){
                $currentOrder = Order::create([
                    'user_id' => auth()->user()->id,
                    'order_status_id' => 1
                ]);
            }else{
                $currentOrder = Order::create([
                    'cookie_id' => @$_COOKIE['cookie_id'],
                    'order_status_id' => 1
                ]);
            }

        }
        $product = Product::find($request->productId);
        if ($product->stock_count == 0) {
            return response()->json([
                'success' => false,
                'button' => false,
                'message' => 'محصول مورد نظر نا موجود می باشد.'
            ], 200);
        }

        if (count($product->colors) > 0) {
            if (@$request->specificationId == null)
            {
                return response()->json([
                    'success' => false,
                    'button' => false,

                    'message' => 'انتخاب مشخصه محصول الزامیست.'
                ], 200);
            }
            $sp = ProductSpecification::find($request->specificationId);
            $cartItem = OrderItem::whereOrderId($currentOrder->id)->whereProductId($product->id)->where('product_specification_id', $sp->id)->first();
        } else {
            $cartItem = OrderItem::whereOrderId($currentOrder->id)->whereProductId($product->id)->first();
        }

        $product_specification = ProductSpecificationType::find($request->specificationId);
        $product_specification2 = ProductSpecification::find(intval($request->specificationId));
        $count = self::getInventoryCount($product,@$product_specification2->productSpecificationValue);
        $max = $product->max !== null ? $product->max : 0;
        // $count = self::getInventoryCount($product);
        // $max = $product->max;

        if ($cartItem == null) {

            if (count($product->colors) > 0 && @$request->specificationId == null) {
                return response()->json([
                    'success' => false,
                    'button' => false,
                    'message' => 'انتخاب مشخصه محصول الزامیست.'
                ], 200);
            }
            if ($request->quantity) {
                if ($product->price_first['price'] != null) {
                    if (($count - $request->quantity) >= $max) {



                        if(@$sp !== null){

                            OrderItem::create([
                                'product_id' => $product->id,
                                'order_id' => $currentOrder->id,
                                'product_specification_id' => @$sp->id,
                                'product_specification_value_id' => @$sp->product_specification_value_id,
                                'product_specification_type_id' => @$sp->product_specification_type_id,
                                'quantity' => $request->quantity,
                                'order_item_status_id' => 1,
                                'price' => (int)filter_var(@$sp->prices[0]->price, FILTER_SANITIZE_NUMBER_INT),
                                'old_price' => (int)filter_var(@$sp->prices[0]->old_price, FILTER_SANITIZE_NUMBER_INT),
                            ]);

                        }else{
                            OrderItem::create([
                                'product_id' => $product->id,
                                'order_id' => $currentOrder->id,
                                'product_specification_id' => @$sp->id,
                                'product_specification_value_id' => @$sp->product_specification_value_id,
                                'product_specification_type_id' => @$sp->product_specification_type_id,
                                'quantity' => $request->quantity,
                                'order_item_status_id' => 1,
                                'price' => (int)filter_var(@$product->price, FILTER_SANITIZE_NUMBER_INT),
                                'old_price' => (int)filter_var(@$product->old_price, FILTER_SANITIZE_NUMBER_INT),
                            ]);
                        }

                    } else {
                        return response()->json([
                            'success' => false,
                            'button' => false,
                            'message' => 'موجودی انبار کافی نیست'
                        ], 200);
                    }
                } else {
                    return response()->json([
                        'success' => false,
                        'button' => false,
                        'message' => 'محصول فاقد قیمت میباشد'
                    ], 200);
                }
            }


        } else {
            $newQuantity = $request->relativeMode  ? $cartItem->quantity + $request->quantity : $request->quantity;
            if($max == null){
                $max = 1;
            }
            if (($count - $newQuantity) >= $max) {
                $cartItem->update([
                    'quantity' => $newQuantity
                ]);
            } else {

                return response()->json([
                    'success' => false,
                    'button' => false,
                    'message' => 'موجودی انبار کافی نیست'
                ], 200);
            }
        }
        self::setOrderTotalPrice($currentOrder);
        $orderItems = self::getCustomOrder($currentOrder);

        if ($request->relativeMode == false) {
            return response()->json([
                'success' => true,
                'message' => 'تعداد محصولات اصلاح شد',
                'cart' => $orderItems['items'],
                'cartSumPrice' => $orderItems['sumPrice'],
                'cartPayment' => $currentOrder['total_calculated'],
                'countShopping' => OrderItem::where('order_id', $currentOrder->id)->sum('quantity'),
                'totalCount'=>$orderItems['totalCount']
            ], 200);
        }


        return response()->json([
            'success' => true,
            'message' => 'محصول با موفقیت به سبد خرید اضافه شد.',
            'cart' => $orderItems['items'],
            'cartSumPrice' => $orderItems['sumPrice'],
            'cartPayment' => $currentOrder['total_calculated'],
            'countShopping' => OrderItem::where('order_id', $currentOrder->id)->sum('quantity'),
            'totalCount'=>$orderItems['totalCount']
        ], 200);

    }

    public function removeFromCart(Request $request)
    {
//        if (!Auth::check()) {
//            return response()->json([
//                'success' => false,
//                'button' => false,
//                'message' => ' برای خرید کالا ابتدا وارد پنل کاربری خود شوید'
//            ], 200);
//        }
//        if (Auth::user()->mobile_confirm == null) {
//            return response()->json([
//                'success' => false,
//                'button' => false,
//                'message' => 'ابتدا اکانت خود را فعال سازی کنید.'
//            ], 200);
//        }
        $currentOrder = Order::authUser()->currentOrder()->first();
        OrderItem::whereOrderId(@$currentOrder->id)->whereProductId($request->productId)->delete();
        self::setOrderTotalPrice($currentOrder);
        $orderItems = self::getCustomOrder($currentOrder);
        return response()->json([
            'success' => true,
            'cart' => $orderItems['items'],
            'cartSumPrice' => $orderItems['sumPrice'],
            'cartPayment' => $currentOrder['total_calculated'],
            'countShopping' => OrderItem::where('order_id', $currentOrder->id)->sum('quantity'),
            'totalCount'=>$orderItems['totalCount']
        ], 200);
    }

    public function addDiscount(Request $request)
    {
        $setting = Setting::first();
        $currentOrder = Order::authUser()->currentOrder()->first();
        $discount = Discount::where('code', $request->code)->where('used', '0')->where("from_date", "<=", Carbon::now()->timezone('Asia/Tehran')->format("Y-m-d H:i"))->where("to_date", ">=", Carbon::now()->timezone('Asia/Tehran')->format("Y-m-d H:i"))->first();
        if(!$discount){
            return response()->json([
                'success' => false,
                'button' => false,
                'message' => 'کد تخفیف معتبر نیست'
            ], 200);
        }
        if ($discount->user_id == null || $discount->user_id == auth()->user()->id) {
            if ($discount) {
                self::setOrderTotalPrice($currentOrder);
                $orderItems = self::getCustomOrder($currentOrder);

                $discount_price = null;
                if ($discount->type == 1) {

                    $percent = intval($currentOrder['total_prices']) * intval($discount->amount) / 100;

                    $discount_price = $currentOrder['total_prices'] - $percent;
                } elseif ($discount->type == 2) {
                    $discount_price = intval($currentOrder['total_prices']) - intval($discount->amount);
                }
                $total_calculated = $discount_price + ($discount_price * ($setting->tax / 100)) + intval($currentOrder['post_price']);
                $currentOrder->update([
                    'total_calculated' => $total_calculated,
                    'payment' => $total_calculated,
                ]);


                return response()->json([
                    'success' => true,
                    'cart' => $orderItems['items'],
                    'cartSumPrice' => $discount_price,
                    'cartPayment' => $currentOrder['total_calculated'],
                    'countShopping' => OrderItem::where('order_id', $currentOrder->id)->sum('quantity')
                ], 200);


            } else {
                return response()->json([
                    'success' => false,
                    'button' => false,
                    'message' => 'کد تخفیف معتبر نمی باشد '
                ], 200);
            }
        } else {
            return response()->json([
                'success' => false,
                'button' => false,
                'message' => 'کد تخفیف معتبر نمی باشد '
            ], 200);
        }
    }

    public function postCheckout(Request $request)
    {

        // return redirect()->back()->with('error','کاربر گرامی سایت درحال بروزرسانی میباشد, از شکیبایی شما سپاسگذاریم');
        if (!Auth::check()) {
            \Log::info('geeeey');
            return redirect('/panel/login?order=order');
        }



        $user = Auth::user();

        $default_address = Address::authUser()->where('default_address', '1')->orderby('id', 'DESC')->first();

        $setting = Setting::first();
        $currentOrder = Order::authUser()->currentOrder()->first();

        if(!@$currentOrder->orderItems){
            return redirect()->back()->with('error', 'کاربر گرامی مجدد تلاش کنید.');

        }

        foreach($currentOrder->orderItems as $item){
            if(self::getInventoryCount($item->product,@$item->productSpecificationValue) < $item->quantity){
                return redirect()->back()->with('error', 'موجودی انبار محصول ' . @$item->product->title . ' به پایان رسیده است');
            }
        }

        if (@$currentOrder->state_id == null) {
            return redirect()->back()->with('error', 'لطفا آدرس خود را انتخاب کنید');
        }
        if (@$request->get('post_type') == null) {
            return redirect()->back()->with('error', 'روش ارسال را انتخاب کنید');
        }

        $post_price = 0;
        if($request->get('post_type') == 1){
            $post_price = 20000;
        }
        if($request->get('post_type') == 2){
            $post_price = 0;
        }
        if($request->get('post_type') == 3){
            $post_price = 25000;

        }

        if($request->get('post_type') == 4){
            if($default_address->city_id == 246 && @$currentOrder->total_prices > 1000000){
                $post_price = 0;
            }else{
                $post_price = 10000;
            }

        }



        $currentOrder->update([
            'post_price' => @$post_price,
            'post_type' => $request->get('post_type'),
            'address_id' => @$default_address->id,
            'state_id' => @$default_address->state_id,
            'city_id' => @$default_address->city_id,
        ]);


        $discount = Discount::where('code', $request->code)->where('used', '0')->where("from_date", "<=", Carbon::now()->timezone('Asia/Tehran')->format("Y-m-d H:i"))->where("to_date", ">=", Carbon::now()->timezone('Asia/Tehran')->format("Y-m-d H:i"))->first();

        self::setOrderTotalPrice($currentOrder);
        $orderItems = self::getCustomOrder($currentOrder);

        if ($request->code != null && $discount != null) {
            $discount_price = null;
            if ($discount->type == 1) {

                $percent = intval($currentOrder['total_prices']) * intval($discount->amount) / 100;

                $discount_price = $currentOrder['total_prices'] - $percent;
            } elseif ($discount->type == 2) {
                $discount_price = intval($currentOrder['total_prices']) - intval($discount->amount);
            }
            $total_calculated = $discount_price + ($discount_price * ($setting->tax / 100)) + intval($currentOrder['post_price']);
            $currentOrder->update([
                'order_status_id' => 2,
                // 'address_id' => $request->address_id,
                'discount' => $discount->amount,
                'total_calculated' => $total_calculated,
                'payment' => $total_calculated,
            ]);
            $history = OrderHistory::create([
                'order_id'=>$currentOrder->id,
                'order_status_id'=> $currentOrder['order_status_id']
            ]);
        } else {
            $currentOrder->update([
                'order_status_id' => 2,
                // 'address_id' => $request->address_id
            ]);
            $history = OrderHistory::create([
                'order_id'=>$currentOrder->id,
                'order_status_id'=> $currentOrder['order_status_id']
            ]);
        }

        if(Auth::id() == 1){
            $price = 1000;
        }else{
            $price = intval(str_replace(',', '', $currentOrder->payment));
        }

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
            CURLOPT_POSTFIELDS => 'api_key=9a5b953b-b230-4010-adf9-1ef0c8d15050&amount='.@$price.'&order_id='.@$currentOrder->id.'&customer_phone='.@$currentOrder->user->mobile.'&custom_json_fields={ "productName":"Shoes752" , "id":52 }&callback_uri='.url('/finish'),
        ));

        $result = curl_exec($curl);

        curl_close($curl);
        $x = json_decode($result);
        $x2 = (array)$x;

        if(@$x2['trans_id']){
            $currentOrder->update([
                'order_status_id' => 2,
                'bank_id'=>2,
                'ref_id'=>$x2['trans_id']
            ]);
            $history = OrderHistory::create([
                'order_id'=>$currentOrder->id,
                'order_status_id'=> $currentOrder['order_status_id']
            ]);
            \Log::info($x2);
            header('Location: ' . 'https://nextpay.org/nx/gateway/payment/'.$x2['trans_id'], true, 301);
            exit;
        }else{
            return redirect('/')->with('error', 'خطا در پرداخت، مجدد تلاش نمایید.');
        }
    }

    public function finish(Request $request)
    {

        \Log::info(Auth::id());
        $currentOrder = Order::authUser()->where('order_status_id',2)->orderBy('id','DESC')->first();
        if(!$currentOrder){
            return redirect('/')->with('error', 'خطا در پرداخت، مجدد تلاش نمایید.');

        }
        if(Auth::id() == 1){
            $price = 1000;

        }else{
            $price = intval(str_replace(',', '', @$currentOrder->payment));
        }
        $order_items = OrderItem::where('order_id',$currentOrder->id)->get();



        if ($request['np_status'] !== "OK") {

            $currentOrder->update([
                'order_status_id'=>10
            ]);
            $history = OrderHistory::create([
                'order_id'=>$currentOrder->id,
                'order_status_id'=> $currentOrder['order_status_id']
            ]);
            if (@$currentOrder->user->mobile){
                try{
                    $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                    $receptor = $currentOrder->user->mobile;
                    $token = @$currentOrder->user->family;
                    $token2 = @$currentOrder->id;
                    $token3 = "";
                    $template = "cancel";
                    $type = "sms";//sms | call
                    $result = $api->VerifyLookup($receptor,$token,$token2,$token3,$template,$type);
                }
                catch(ApiException $e){
                    \Log::info($e->errorMessage());
                }
                catch(HttpException $e){
                    \Log::info($e->errorMessage());
                }

            }
            return redirect('/')->with('error', 'خطا در پرداخت، مجدد تلاش نمایید.');
        } else {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://nextpay.org/nx/gateway/verify',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => 'api_key=9a5b953b-b230-4010-adf9-1ef0c8d15050&amount='.$price.'&trans_id='.$request['trans_id'],
            ));

            $result = curl_exec($curl);
            curl_close($curl);

            $x = json_decode($result);
            $x2 = (array)$x;

            \Log::info($x2);
            $currentOrder->update([
                'tracking_code'=>@$x2['Shaparak_Ref_Id'],
                'order_status_id'=>3
            ]);

            $history = OrderHistory::create([
                'order_id'=>$currentOrder->id,
                'order_status_id'=> $currentOrder['order_status_id']
            ]);

            $resids = [];
            foreach($order_items as $row){
                $resids = [
                    'inventory_id'=>1,
                    'product_id'=>@$row->product_id,
                    'count'=>@$row->quantity,
                    'inventory_type_id'=>2,
                    'user_id'=>Auth::id(),
                    'product_specification_value_id'=>@$row->product_specification_value_id
                ];
                Helper::changeStockTable(@$row->product_id);
            }
            InventoryReceipt::insert($resids);


            try{
                $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                $receptor = $currentOrder->user->mobile;
                $token = @$currentOrder->user->family;
                $token2 = @$currentOrder->id;
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
            try{
                $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                $receptor = "09143530584";
                $token = @$currentOrder->id;
                $token2 = @$currentOrder->payment;
                $token3 = "";
                $template = "factor";
                $type = "sms";//sms | call
                $result = $api->VerifyLookup($receptor,$token,$token2,$token3,$template,$type);
            }
            catch(ApiException $e){
                \Log::info($e->errorMessage());
            }
            catch(HttpException $e){
                \Log::info($e->errorMessage());
            }
            try{
                $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                $receptor = "09144540926";
                $token = @$currentOrder->id;
                $token2 = @$currentOrder->payment;
                $token3 = "";
                $template = "factor";
                $type = "sms";//sms | call
                $result = $api->VerifyLookup($receptor,$token,$token2,$token3,$template,$type);
            }
            catch(ApiException $e){
                \Log::info($e->errorMessage());
            }
            catch(HttpException $e){
                \Log::info($e->errorMessage());
            }



            return redirect()->route('panel.order.details',['id'=>$currentOrder->id])->with('success','پرداخت با موفقیت انجام شد');
        }
    }
}
