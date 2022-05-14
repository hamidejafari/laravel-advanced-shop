<?php

namespace App\Library;
use App\Models\Product;

class Helper
{
    public static function changePriceTable($product_id){
        $product = Product::find($product_id);
        $product->update([
            'price'=>@$product->price_second['price'],
            'old_price'=>@$product->price_second['old'],
        ]);
        return true;
    }
    public static function changeStockTable($product_id){
        $product = Product::find($product_id);
        $product->update([
            'stocks'=>@$product->stock_count,

        ]);
        return true;
    }
    public static function camelCase($str, array $noStrip = [])
    {
// non-alpha and non-numeric characters become spaces
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
// uppercase the first character of each word
        $str = ucwords($str);
        $str = str_replace(" ", "", $str);
        $str = lcfirst($str);

        return $str;
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
      public static function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
}
