<?php

namespace App\Console;

use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Site\ConvertController;
use App\Models\Setting;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Cookie;
use App\Models\Order;
use App\Models\Price;
use App\Models\InventoryReceipt;

use App\Models\OrderItem;

use Kavenegar\Exceptions\HttpException;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\KavenegarApi;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // $schedule->call(function () {
        //     \Log::info('start fix orders');

        //     $orders = Order::where('created_at','>','2021-11-24 14:31:03')->where('order_status_id',10)->whereNotNull('ref_id')->get();

        //     foreach($orders as $row){
        //          $curl = curl_init();

        //         curl_setopt_array($curl, array(
        //             CURLOPT_URL => 'https://nextpay.org/nx/gateway/verify',
        //             CURLOPT_RETURNTRANSFER => true,
        //             CURLOPT_ENCODING => '',
        //             CURLOPT_MAXREDIRS => 10,
        //             CURLOPT_TIMEOUT => 0,
        //             CURLOPT_FOLLOWLOCATION => true,
        //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //             CURLOPT_CUSTOMREQUEST => 'POST',
        //             CURLOPT_POSTFIELDS => 'api_key=9a5b953b-b230-4010-adf9-1ef0c8d15050&amount='.$row->payment.'&trans_id='.$row->ref_id,
        //         ));

        //         $result = curl_exec($curl);
        //         curl_close($curl);

        //         $x = json_decode($result);
        //         $x2 = (array)$x;
        // if(@$x2['code'] == 0){
        //             $order_find = Order::find($row->id);
        //             $order_find->update(['order_status_id'=>3]);
        //         }


        //     }

        //     \Log::info('finish fix orders');


        // })->everyFiveMinutes();


        $schedule->call(function () {

            \Log::info('start proccess fix orders');

            $orders = Order::where('created_at','>','2021-11-24 14:31:03')->where('order_status_id',2)->whereNotNull('ref_id')->where('convert_fix',0)->take(50)->get();
            foreach($orders as $row){
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
                    CURLOPT_POSTFIELDS => 'api_key=9a5b953b-b230-4010-adf9-1ef0c8d15050&amount='.$row->payment.'&trans_id='.$row->ref_id,
                ));

                $result = curl_exec($curl);
                curl_close($curl);

                $x = json_decode($result);
                $x2 = (array)$x;
                if(@$x2['code'] == 0){
                    $order_find = Order::find($row->id);
                    $order_find->update(['order_status_id'=>3,'convert_fix'=>1]);
                }else{
                    $order_find = Order::find($row->id);

                    $order_find->update(['convert_fix'=>1]);
                }


            }

            \Log::info('finish proccess fix orders');


        })->everyFiveMinutes();


        $schedule->call(function () {

            \Log::info('start  fix inventory');
            $items = OrderItem::where('created_at','>','2021-11-24 14:31:03')->whereHas('order',function($x){$x->where('order_status_id',3);})->where('convert_inventory',0)->take(400)->get();
            foreach($items as $row){
                $check_inventory = InventoryReceipt::where('product_id',$row->product_id)->where('user_id',$row->order->user_id)->first();
                if(!$check_inventory){

                    $check_inventory = InventoryReceipt::create([
                        'product_id'=>$row->product_id,
                        'inventory_id'=>1,
                        'inventory_type_id'=>2,
                        'product_specification_value_id'=>$row->product_specification_value_id,
                        'count'=>$row->quantity,
                        'user_id'=>@$row->order->user_id
                    ]);
                }
                $order_item = OrderItem::find($row->id);
                $order_item->update(['convert_inventory'=>1]);
            }

            \Log::info('finish  fix inventory');


        })->everyFiveMinutes();


        $schedule->call(function () {
            set_time_limit(300000000000000);

            \Log::info('fix check paid');



            $orders = Order::where('created_at','>','2021-11-24 14:31:03')->where('order_status_id',3)->whereNotNull('ref_id')->where('check_paid',0)->take(50)->get();
            foreach($orders as $row){
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
                    CURLOPT_POSTFIELDS => 'api_key=9a5b953b-b230-4010-adf9-1ef0c8d15050&amount='.$row->payment.'&trans_id='.$row->ref_id,
                ));

                $result = curl_exec($curl);
                curl_close($curl);

                $x = json_decode($result);
                $x2 = (array)$x;
                if(@$x2['code'] == 0){
                    $order_find = Order::find($row->id);
                    $order_find->update(['check_paid'=>1]);
                }else{
                    $order_find = Order::find($row->id);
                    $order_find->update(['check_unpaid'=>1,'check_paid'=>1]);
                }


            }



        })->everyFiveMinutes();


        $schedule->call(function () {
            \Log::info('fix unpaid');

            set_time_limit(300000000000000);

            $orders = Order::where('check_unpaid',1)->where('order_status_id',3)->take(10)->get();
            foreach($orders as $row){
                $order_find = Order::find($row->id);
                $order_find->update(['order_status_id'=>10]);

                foreach($order_find->orderItems as $item){
                    InventoryReceipt::where('product_id',$item->product_id)->where('user_id',$row->user_id)->delete();
                }

                if (@$row->user->mobile){
                    try{
                        $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                        $receptor = @$row->user->mobile;
                        $token = @$row->user->family;
                        $token2 = @$row->id;
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

            }

        })->everyFiveMinutes();



        $setting = Setting::first();

        if($setting->fixing_price == 1){
            $schedule->call(function () {
//            \Log::info('heeee');
                SettingController::fixingPrice();
            })->everyMinute();
        }




    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
