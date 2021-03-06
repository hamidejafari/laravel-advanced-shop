<?php

namespace App\Exports;


use App\Models\Order;
use App\Models\Product;
use App\Models\Category;


use App\Models\ProductCategory;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Builder;

class OrderExport implements FromArray
{
    function __construct($request2) {
        $this->request2 = $request2;
    }
    public function array(): array
    {
        $data = Order::get();
        $request = $this->request2;

        $query = Order::query();
        if($request->get('name')){
            $query->whereHas('user',function (Builder $query2)use($request) {
                $query2->where('name' , 'LIKE', '%' . $request->get('name') . '%');
            });

        }
        if($request->get('family')){
            $query->whereHas('user',function (Builder $query2)use($request) {
                $query2->where('family' , 'LIKE', '%' . $request->get('family') . '%');
            });

        }
        if($request->get('mobile')){
            $query->whereHas('user',function (Builder $query2)use($request) {
                $query2->where('mobile' , $request->get('mobile'));
            });

        }
        if($request->get('email')){
            $query->whereHas('user',function (Builder $query2)use($request) {
                $query2->where('email' , $request->get('email'));
            });

        }
        if ($request->get('start') and $request->get('end')) {

            $start = explode('/', $request->get('start'));
            $end = explode('/', $request->get('end'));

            $s = jmktime(0, 0, 0, $start[1], $start[0], $start[2]);

            $e = jmktime(0, 0, 0, $end[1], $end[0], $end[2]);

            $query->whereBetween('created_at2', array(Carbon::createFromTimestamp($s), Carbon::createFromTimestamp($e)));
        }


        if($request->get('payment')){
            $query->where('payment' ,[intval($request->get('payment'))]);
        }
        if ($request->get('order_status_id')) {
            $query->where('order_status_id', $request->get('order_status_id'));
        }
        if($request->get('post_type')){
            $query->where('post_type' ,$request->get('post_type'));
        }
        if($request->get('city_id')){
            $query->where('city_id' ,$request->get('city_id'));
        }
        if($request->get('id')){
            $query->where('id' ,$request->get('id'));
        }



        $data = $query->get();

        $data_array = [];
        foreach ($data as $key => $order) {



            $post_type = "";
            if($order->post_type == 1){ $post_type = "????????????"; }
            if($order->post_type == 2){ $post_type = "????????????"; }
            if($order->post_type == 3){ $post_type = "??????????"; }
            if($order->post_type == 4){ $post_type = "??????"; }

            $data_array[] = [
                " ????????" =>@$key+1,
                "?????????? ??????????" =>@$order->id,
                "?????? ?? ?????? ???????????????? ??????????" =>@$order->user->name . ' ' .@$order->user->family ,
                "??????" =>@$order->city->name,
                "?????????? ????????????" =>jdate('H:i Y/m/d',\Carbon\Carbon::parse(@$order->created_at2)->timestamp),
                "???????? ????" =>number_format($order->payment) . ' ?????????? ',
                "???????? ?????? ?? ??????" =>number_format($order->post_price) . ' ?????????? ',
                "??????????" =>@$order->orderStatus->title,
            ];
        }
        return [
            [
                " ????????",
                "?????????? ??????????",
                "?????? ?? ?????? ???????????????? ??????????",
                "????????" ,
                "?????????? ????????????" ,
                "???????? ????",
                "???????? ?????? ?? ??????",
                "??????????",
            ],
            $data_array
        ];
    }
}
