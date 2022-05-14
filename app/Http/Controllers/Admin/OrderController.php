<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\Library\Logs;
use App\Models\Address;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderHistory;
use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Kavenegar\KavenegarApi;
use Maatwebsite\Excel\Facades\Excel;
use SoapClient;
class OrderController extends Controller
{
    public function getIndex(Request $request)
    {
        $query = Order::query();
        $query->where('order_status_id','<>','1');
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

            $query->whereBetween('updated_at', array(Carbon::createFromTimestamp($s), Carbon::createFromTimestamp($e)));
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
        $status = OrderStatus::all();
        $cities = City::all();
        $data =  $query->orderBy('updated_at','DESC')->orderBy('user_id','ASC')->paginate(50);
        $sum = $query->orderBy('user_id','DESC')->whereIn('order_status_id',[3,4,5])->sum('payment');
        return View('admin.order.index')
            ->with('status', $status)
            ->with('cities', $cities)
            ->with('sum', $sum)
            ->with('data', $data);
    }

    public function getDetail($id)
    {
        $order = Order::find($id);
        $history = OrderHistory::orderby('id','DESC')->where('order_id',$id)->get();
        $status = OrderStatus::all();
        $orders = Order::orderBy('created_at2','DESC')->where('user_id',$order->user_id)->where('id','<>',$id)->get();
        return View('admin.order.details')
            ->with('status', $status)
            ->with('orders', $orders)
            ->with('history', $history)
            ->with('order', $order);
    }

    public function orderStatus($id, Request $request)
    {
        $order = Order::find($id);
        $input = $request->all();
        $order->update([

            'order_status_id' => @$input['order_status_id'],

        ]);
        $history = OrderHistory::create([
            'order_id'=>$order->id,
            'order_status_id'=> $input['order_status_id'],
              'order_description' => @$input['order_description']
        ]);
        $mobile = Helper::persian2LatinDigit($order->user->mobile);
        $x = @$order->user->family;
        if ($input['order_status_id'] == 6){
            try{

                $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                $receptor = @$mobile;
                $token = @$x;
                $token2 = @$order->id;
                $token3 = "";
                $template = "decline";
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
        elseif ($input['order_status_id'] == 10){
            try{
                $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                $receptor = @$mobile;
                $token = @$x;
                $token2 = @$order->id;
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
        elseif ($input['order_status_id'] == 5){
            try{
                $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                $receptor = @$mobile;
                $token = @$x;
                $token2 = @$order->id;
                $token3 = "";
                $template = "send";
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
        elseif ($input['order_status_id'] == 4){
            try{
                $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                $receptor = @$mobile;
                $token = @$x;
                $token2 = @$order->id;
                $token3 = "";
                $template = "pack";
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
        elseif ($input['order_status_id'] == 3){
            try{
                $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                $receptor = @$mobile;
                $token = @$x;
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

        }

        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$order->id);
        return Redirect::action('Admin\OrderController@getIndex')
            ->with('success', 'آیتم مورد نظر با موفقیت ویرایش شد.');
    }
    public function postDelete(Request $request)
    {

        $input = $request->all();
        $orders = Order::orderby('user_id','desc')->find($request['deleteId']);
        if($input['order_status_id'] !== null){
            if ($input['order_status_id'] == 13){

                $status = OrderStatus::all();
                return View('admin.order.allfactor')
                    ->with('status', $status)
                    ->with('orders', $orders);
            }
            foreach($orders as $order)
            {
                $array = array($order);
                $serialized_array = serialize($array);
                $order->update([
                    'order_status_id'=> $input['order_status_id']
                ]);
                $history = OrderHistory::create([
                    'order_id'=>$order->id,
                    'order_status_id'=> $input['order_status_id']
                ]);

                $mobile = Helper::persian2LatinDigit($order->user->mobile);
                $x = @$order->user->family;
                if ($input['order_status_id'] == 6){
                    try{
                        $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                        $receptor = @$mobile;
                        $token = @$x;
                        $token2 = @$order->id;
                        $token3 = "";
                        $template = "decline";
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
                elseif ($input['order_status_id'] == 10){
                    try{
                        $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                        $receptor = @$mobile;
                        $token = @$x;
                        $token2 = @$order->id;
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
                elseif ($input['order_status_id'] == 5){
                    try{
                        $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                        $receptor = @$mobile;
                        $token = @$x;
                        $token2 = @$order->id;
                        $token3 = "";
                        $template = "send";
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
                elseif ($input['order_status_id'] == 4){
                    try{
                        $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                        $receptor = @$mobile;
                        $token = @$x;
                        $token2 = @$order->id;
                        $token3 = "";
                        $template = "pack";
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
                elseif ($input['order_status_id'] == 3){
                    try{
                        $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                        $receptor = @$mobile;
                        $token = @$x;
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

                }


                $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$order->id);
            }

        }

        return \redirect()->back()
            ->with('success', 'وضعیت های مورد نظر با موفقیت ویرایش شدند.');
    }

    public function getfactor($id)
    {
        $order = Order::find($id);
        $status = OrderStatus::all();
        return View('admin.order.factor')
            ->with('status', $status)
            ->with('order', $order);
    }
    public function getAddress($id)
    {
        $order = Order::find($id);
        $status = OrderStatus::all();
        return View('admin.order.address')
            ->with('status', $status)
            ->with('order', $order);
    }

    public function export(Request $request2)
    {
        return Excel::download(new OrderExport($request2), 'order.xlsx');
    }


    public function address()
    {
        $orders = Order::orderby('id','desc')->whereIn('order_status_id',[4,3])->get();
        foreach ($orders as $row){
            $address = Address::orderby('id','desc')->where('user_id',$row->user_id)->where('default_address',1)->first();
            if ($address && $row->address_id != @$address->id){
                $row->update([
                    'address_id'=>$address->id,
                    'state_id'=>$address->state_id,
                    'city_id'=>$address->city_id,
                    'fixdef'=>1
                ]);
            }
        }

    }
    public function postTrack($id, Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
       $order = Order::find($id);
        $order->update([
            'post_tracking'=> $input['post_tracking'],
        ]);

        return redirect()->back()->with('success', ' با موفقیت ثبت شد');

    }
}
