<?php

namespace Classes;

use App\Models\Inventory;
use App\Models\InventoryManagement;
use App\Models\InventoryReceipt;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\City;
use App\Models\Setting;
use http\Env\Request;
use Illuminate\Database\Eloquent\Builder;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderFactor;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use mPDF;


class Helper
{
    public static function image($file)
    {
        if (request()->hasFile('file')) {
            $path = "assets/uploads/content/";
            $uploader = new UploadImg();
            $fileName = $uploader->uploadPic(request()->file('file'), $path);
           return $fileName;
        }
    }
    public static function upDepth()
    {
        $users = User::whereAdmin(0)->get();
        foreach ($users as $user) {
            $result = User::withDepth()->find($user->id);
            $depth = $result->depth;
            $result->update(['depth_at' => $depth]);
        }

        return true;
    }

    public static function pdfFile($html)
    {
        $mpdf = new mPDF('ar');
        $mpdf->SetDirectionality('rtl');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        return $mpdf->Output();
    }

    public static function calculateOff($price, $percent)
    {
        $off = $price * $percent / 100;
        $price = $price - $off;
        $resualt = ['price' => $price, 'off' => $off];
        return $resualt;
    }

    public static function persian2LatinDigit($string)
    {
        $persian_digits = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabic_digits = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $english_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        $string = str_replace($persian_digits, $english_digits, $string);
        $string = str_replace($arabic_digits, $english_digits, $string);

        return $string;
    }

    static function menuActive($url, $section)
    {
        $array_url = [];
        foreach ($url as $item) {
            $array_url[] = Config::get('site.' . $section) . '/' . $item;
            $array_url[] = Config::get('site.' . $section) . '/' . $item . '/*';
        }
        return call_user_func_array('Request::is', (array)$array_url) ? 'active' : '';
    }

    static function curl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public static function timeAgo($date)
    {
        $time['diff'] = time() - $date;
        $time['minute'] = 0;
        $time['hour'] = 0;
        $time['day'] = 0;
        $time['year'] = 0;

        if ($time['diff'] >= 86400) {
            if ($time['diff'] >= (86400 * 365)) {
                $time['year'] = round($time['diff'] / 86400 * 365);
            } else {
                $time['day'] = round($time['diff'] / 86400);
            }
        } else {
            $time['minute'] = round($time['diff'] / 60);
            if ($time['minute'] >= 60) {
                $time['hour'] = round($time['diff'] / 3600);
            }
        }

        if ($time['year'] != 0) $resualt = $time['day'] . ' سال پیش ';
        elseif ($time['day'] != 0) $resualt = $time['day'] . ' روز پیش ';
        elseif ($time['hour'] != 0) $resualt = $time['hour'] . ' ساعت پیش ';
        elseif ($time['minute'] != 0) $resualt = $time['minute'] . ' دقیقه پیش ';
        else $resualt = 'همین الان';

        return $resualt;
    }

    public static function digit_to_persain_letters($money)
    {
        $one = array(
            'صفر',
            'یک',
            'دو',
            'سه',
            'چهار',
            'پنج',
            'شش',
            'هفت',
            'هشت',
            'نه');
        $ten = array(
            '',
            'ده',
            'بیست',
            'سی',
            'چهل',
            'پنجاه',
            'شصت',
            'هفتاد',
            'هشتاد',
            'نود',
        );
        $hundred = array(
            '',
            'یکصد',
            'دویست',
            'سیصد',
            'چهارصد',
            'پانصد',
            'ششصد',
            'هفتصد',
            'هشتصد',
            'نهصد',
        );
        $categories = array(
            '',
            'هزار',
            'میلیون',
            'میلیارد',
        );
        $exceptions = array(
            '',
            'یازده',
            'دوازده',
            'سیزده',
            'چهارده',
            'پانزده',
            'شانزده',
            'هفده',
            'هجده',
            'نوزده',
        );

        $x = floor(strlen($money) / 3);
        $y = strlen($money) - ($x * 3);

        if ($x + $y > count($categories)) {
            Return '';
            /* throw new Exception('number is longger!'); */
        }

        $letters_separator = ' و ';
        $money = (string)(int)$money;
        $money_len = strlen($money);
        $persian_letters = '';

        for ($i = $money_len - 1; $i >= 0; $i -= 3) {
            $i_one = (int)isset($money[$i]) ? $money[$i] : -1;
            $i_ten = (int)isset($money[$i - 1]) ? $money[$i - 1] : -1;
            $i_hundred = (int)isset($money[$i - 2]) ? $money[$i - 2] : -1;

            $isset_one = false;
            $isset_ten = false;
            $isset_hundred = false;

            $letters = '';

            // zero
            if ($i_one == 0 && $i_ten < 0 && $i_hundred < 0) {
                $letters = $one[$i_one];
            }

            // one
            if (($i >= 0) && $i_one > 0 && $i_ten != 1 && isset($one[$i_one])) {
                $letters = $one[$i_one];
                $isset_one = true;
            }

            // ten
            if (($i - 1 >= 0) && $i_ten > 0 && isset($ten[$i_ten])) {
                if ($isset_one) {
                    $letters = $letters_separator . $letters;
                }

                if ($i_one == 0) {
                    $letters = $ten[$i_ten];
                } elseif ($i_ten == 1 && $i_one > 0) {
                    $letters = $exceptions[$i_one];
                } else {
                    $letters = $ten[$i_ten] . $letters;
                }

                $isset_ten = true;
            }

            // hundred
            if (($i - 2 >= 0) && $i_hundred > 0 && isset($hundred[$i_hundred])) {
                if ($isset_ten || $isset_one) {
                    $letters = $letters_separator . $letters;
                }

                $letters = $hundred[$i_hundred] . $letters;
                $isset_hundred = true;
            }

            if ($i_one < 1 && $i_ten < 1 && $i_hundred < 1) {
                $letters = '';
            } else {
                $letters .= ' ' . $categories[($money_len - $i - 1) / 3];
            }

            if (!empty($letters) && $i >= 3) {
                $letters = $letters_separator . $letters;
            }

            $persian_letters = $letters . $persian_letters;
        }

        return $persian_letters;
    }


    public static function showPrice($productId)
    {
        $product = Product::where('id', $productId)
            ->whereStatus(1)
            ->first();
        if ($product->priceActive) {

            $price = $product->priceActive->price;

            if ($product->offActive) {
                $discount = $price - ($price * ($product->offActive->percent / 100));
                $price = $price - $discount;  //discount
                $price = $price + ($price * 9 / 100);   //tax

                return $price;
            } else {

                $price = $price + ($price * 9 / 100);   //tax
                return $price;
            }
        } else {
            return 0;
        }


    }

    public static function smsConfirm($user_id)
    {
        $user = User::find($user_id);
        $confirm_code = random_int(100000, 999999);
        $user->update([
            'confirm_code' => $confirm_code
        ]);

        try {
            Sms::send($confirm_code, [$user->mobile], true);
            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public static function urlGenerate()
    {
        $url = (str_random(6));
        return $url;
    }

    public static function howAge($birthday)
    {
        $yC = jdate('y', time(), '', '', 'en');
        $yT = jdate('y', $birthday, '', '', 'en');
        $diff = intval($yC) - intval($yT);
        return $diff;
    }

    public static function productCountInventory($product_id,$inventory_id){
        $inventoryAccess = Inventory::where('id', $inventory_id)->first();
        $buy = OrderItem::where('product_id', $product_id)
            ->join('order_factor', 'order_item.order_factor_id', '=', 'order_factor.id')
            ->where('order_factor.status', 1)
            ->where('order_factor.storage_id', $inventoryAccess->id)
            ->sum('order_item.quantity');

        $entry = InventoryReceipt::whereProductId($product_id)
            ->where('status', 1)->where('inventory_type_id', 1)
            ->where('inventory_id', $inventoryAccess->id)
            ->sum('count');

        $transferEnt= InventoryReceipt::whereProductId($product_id)
            ->where('status', 1)->where('inventory_type_id', 3)
            ->where('inventory_id', $inventoryAccess->id)
            ->sum('count');


        $transferRet = InventoryReceipt::whereProductId($product_id)
            ->where('status', 1)->where('inventory_type_id', 3)
            ->where('inventory_from_id', $inventoryAccess->id)
            ->sum('count');

        $return= InventoryReceipt::whereProductId($product_id)
            ->where('status', 1)->where('inventory_type_id', 4)
            ->where('inventory_id', $inventoryAccess->id)
            ->sum('count');

        $inc = $entry + $transferEnt;
        $red = $buy + $transferRet + $return;
        $resualt = $inc - $red;
        return $resualt;
    }
    public static function cityUserCount($city_id){
        $city = City::find($city_id);
        $users = User::where('status',1)->where('city_id',$city->code)->count();
        return $users;
    }
    public static function boughtPercentCity($city_id){

        $city = City::find($city_id);
        $orders_bought_perecent = OrderFactor::whereHas('user', function (Builder $query) {
            $query->whereNotNull('city_id');
        })->where('status',1)->sum('total_prices');
        $all_users = User::where('city_id',$city->code)->where('status',1)->where('admin',0)->pluck('id');
        $users_bought_perecent = OrderFactor::whereIn('user_id',$all_users)->where('status',1)->where('order_status_id','>',1)->sum('total_prices');
        return (100 * $users_bought_perecent) / $orders_bought_perecent;
    }

    public static function excelMember($user_id,$start,$end,$type){
        $query = OrderFactor::query();
        $setting = Setting::first();

        $start = explode('/', $start);
        $end = explode('/', $end);

        $s = jmktime(0, 0, 0, $start[1], $start[0], $start[2]);
        $e = jmktime(0, 0, 0, $end[1], $end[0], $end[2]);

        $order = OrderFactor::whereStatus(1)
            ->with('user', 'orderStatus')
            ->whereBetween('created_at', array($s, $e))
            ->where('user_id', $user_id)
            ->first();

//        if(!$order) return redirect()->back()->with('error','فاکتوری برای این کاربر وجود ندارد!');

        $order_ids = $query->whereStatus(1)
            ->with('user', 'orderStatus')
            ->whereBetween('created_at', array($s, $e))
            ->where('user_id', $user_id)
            ->pluck('id');



        $orders_fee = $query->whereStatus(1)
            ->with('user', 'orderStatus')
            ->whereBetween('created_at', array($s, $e))
            ->where('user_id', $user_id)
            ->sum('fee');



        $final = collect([]);
        $order_items = OrderItem::whereIn('order_factor_id',$order_ids)->get();
        foreach($order_items as $row){
            $filtered = $final->filter(function($value,$key) use ($row){
                // dd($row->product_id);
                return $value['product_id'] == $row->product_id;
            });
            if($filtered->count() != 0){
                foreach ($filtered as $row2){
                    if($row2['price'] != $row->price){
                        $quantity = OrderItem::whereIn('order_factor_id',$order_ids)->where('price',$row->price)->where('product_id',$row->product_id)->sum('quantity');
                        $total_prices = OrderItem::whereIn('order_factor_id',$order_ids)->where('price',$row->price)->where('product_id',$row->product_id)->sum('total_prices');
                        $final->push([
                            'product_id' => $row->product->id,
                            'product_title' => $row->product->title,
                            'quantity' => $quantity,
                            'price' => $row->price,
                            'total_prices'=>$total_prices,
                            'commission'=>$row->price*(11/100)* OrderItem::whereIn('order_factor_id',$order_ids)->where('price',$row->price)->where('product_id',$row->product_id)->sum('quantity'),
                            'total_price'=>$total_prices - ($row->price*(11/100)* $quantity),
                            'base_count'=>'عدد',
                            'tax'=>(($setting->tax2/100)*$row->price*$quantity) + (($setting->tax1/100)*$row->price*$quantity),
                            'total'=>((($setting->tax2/100)*$row->price*$quantity) + (($setting->tax1/100)*$row->price*$quantity) + ($total_prices - ($row->price*(11/100)* $quantity ) ))
                        ]);
                    }
                }
            }
            if($filtered->count() == 0){
                $quantity = OrderItem::whereIn('order_factor_id',$order_ids)->where('price',$row->price)->where('product_id',$row->product_id)->sum('quantity');
                $total_prices = OrderItem::whereIn('order_factor_id',$order_ids)->where('price',$row->price)->where('product_id',$row->product_id)->sum('total_prices');
                $final->push([
                    'product_id' => $row->product->id,
                    'product_title' => $row->product->title,
                    'quantity' => $quantity,
                    'price' => $row->price,
                    'total_prices'=>$total_prices,
                    'commission'=>$row->price*(11/100)* OrderItem::whereIn('order_factor_id',$order_ids)->where('price',$row->price)->where('product_id',$row->product_id)->sum('quantity'),
                    'total_price'=>$total_prices - ($row->price*(11/100)* $quantity),
                    'base_count'=>'عدد',
                    'tax'=>(($setting->tax2/100)*$row->price*$quantity) + (($setting->tax1/100)*$row->price*$quantity),
                    'total'=>((($setting->tax2/100)*$row->price*$quantity) + (($setting->tax1/100)*$row->price*$quantity) + ($total_prices - ($row->price*(11/100)* $quantity ) ))
                ]);
            }
        }

        $user_info = [
            'national_code' => @$order->user->national_code,
            'city'=>@$order->orderInfo->city->pname,
            'name'=>@$order->user->name.' '.@$order->user->family,
            'city2'=>@$order->orderInfo->city->pname,
            'phone'=>@$order->orderInfo->phone,
            'address'=>@$order->orderInfo->address
        ];

        $orderInfo = [

            'postal_code'=>@$order->orderInfo->postal_code

        ];

        $all = [
            'order_info'=>$orderInfo,
            'user_info'=>$user_info
        ];

        if($type == 'product'){
            return $final;

        }elseif($type == 'all'){
            return $all;

        }elseif($type == 'orders_fee'){
            return $orders_fee;

        }elseif($type == 'order'){
            return $order;
        }

    }

}
