<?php

use App\Models\Cookie;


Route::get('/login-me-as/{id}', function($id){
    Auth::loginUsingId($id);
});

Route::get('/test-shop', function(){
    \App\Library\Sms2::send('09032783528','تستی میکنم');
});
Route::get('/testrandom', function(){
    if(!@$_COOKIE['cookie_id']){
        $cookie_id = uniqid('kaj');
        setcookie("cookie_id", $cookie_id, strtotime("2040-01-19 03:14:07"));
        $cookie = Cookie::create([
            'cookie_id'=>$cookie_id,
            'ip'=>request()->ip()
        ]);
    }else{
        $cookie = Cookie::where('cookie_id',$_COOKIE['cookie_id'])->first();
    }
    dd($cookie);

});





Route::get('/test-array', function(){
    $test_sort_array = [
        ['id'=>1,'title'=>'شامپو','description'=>'هلوووو'],
        ['id'=>2,'title'=>'صابون','description'=>'هلوووو'],
        ['id'=>3,'title'=>'حوله','description'=>'هلوووو'],
        ['id'=>4,'title'=>'همینجوری','description'=>'هلوووو']
    ];


    function stable_usort(&$array, $cmp)
    {
        $i = 0;
        $array = array_map(function($elt)use(&$i)
        {
            return [$i++, $elt];
        }, $array);
        usort($array, function($a, $b)use($cmp)
        {
            return $cmp($a[1], $b[1]) ?: ($a[0] - $b[0]);
        });
        $array = array_column($array, 1);
    }
    dd(stable_usort($test_sort_array,'desc'));



});



Route::get('/generate-password/{password}', function($password){
    dd(bcrypt($password));
});
