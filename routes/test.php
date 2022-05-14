

<?php


use Illuminate\Http\Request;

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
Route::get('/finish-next-test', function(Request  $request){


    dd($request->all());
////////////
// step 5 //
////////////



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
    CURLOPT_POSTFIELDS => 'api_key=b9a5b953b-b230-4010-adf9-1ef0c8d15050&amount=1000&trans_id=f7c07568-c6d1-4bee-87b1-4a9e5ed2e4c1',
));

$response = curl_exec($curl);
curl_close($curl);
});
?>
