<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\PassRequest;
use App\Http\Requests\RegisterRequest;
use App\Library\Helper;
use App\Models\Address;
use App\Models\City;
use App\Models\Discount;
use App\Models\Like;
use App\Models\Order;
use App\Models\State;
use App\User;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Kavenegar\KavenegarApi;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use phpDocumentor\Reflection\DocBlock\Tags\Link;


class PanelController extends Controller
{
//    public function getLogin()
//    {
//        $check=Auth::check();
//
//        if ($check)
//        {
//            return redirect('/panel/dashboard')->with('success', 'خوش آمدید');
//        } else {
//            return view('site.auth.login');
//        }
//
//    }

/////==============dash===========================================
    public function dashboard()
    {
        $user = Auth::user();
        $orders = Order::orderby('id','DESC')->where('user_id',$user->id)->where('order_status_id','<>','1')->take(5)->get();
        $likes = like::orderby('id','DESC')->where('user_id',$user->id)->take(2)->get();
        return view('site.panel.dashboard')
            ->with('user',$user)
            ->with('likes',$likes)
            ->with('orders',$orders);


    }
    public function pass()
    {
        $user = Auth::user();

        return view('site.panel.reset-pass')
            ->with('user',$user);


    }

    public function savePassword(PassRequest $request){

        $input = $request->all();
        $user= User::find(Auth::id());

        $user->update([
            'password'=>bcrypt($input['password'])
        ]);
        return redirect()->back()->with('success', 'رمز عبور با موفقیت ویراش شدند');
    }


    public function info()
    {
        $user = Auth::user();
        return view('site.panel.edit-info')
            ->with('user',$user);


    }
    public function postEditInfo(Request $request)
    {
        $input = $request->all();
        $users= User::find(Auth::id());
        if ($request->hasFile('avatar')) {
            File::delete('assets/uploads/content/users/' . $users->avatar);
            $pathMain = "assets/uploads/content/users";
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $ext = ['jpg', 'jpeg', 'png', 'xls', 'mp3', 'ogg'];
            if (true) {
                $fileName = md5(microtime()) . ".$extension";
                $request->file('avatar')->move($pathMain, $fileName);
                $input['avatar'] = $fileName;
            } else {
                return Redirect::back()->with('error', 'فایل ارسالی صحیح نیست.');
            }
        } else {
            $input['avatar'] = $users->avatar;
        }
        if ($request->mobile != $users->mobile ){
            $code= random_int(100000, 999999);
            $users->update([
                'mobile'=> $input['mobile'],
                'mobile_confirm'=> 0,
                'confirm_code' => $code
            ]);

            try{
                $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                $receptor = $users->mobile;
                $token = $code;
                $token2 = "";
                $token3 = "";
                $template = "verify";
                $type = "sms";//sms | call
                $result = $api->VerifyLookup($receptor,$token,$token2,$token3,$template,$type);
            }
            catch(ApiException $e){
                \Log::info($e->errorMessage());
            }
            catch(HttpException $e){
                \Log::info($e->errorMessage());
            }

            return redirect('panel/confirm/'.$users->mobile)->with('success', 'لطفا تلفن خود را تایید کنید');
        }
        $users->update($input);
        return redirect()->back()->with('success', 'اطلاعات با موفقیت ویرایش شدند');



    }
    public function address()
    {
        $states = State::get();
        $cities = City::get();
        $user = Auth::user();
        $addresses = Address::where('user_id',$user->id)->get();
        return view('site.panel.address')
            ->with('user',$user)
            ->with('states',$states)
            ->with('cities',$cities)
            ->with('addresses',$addresses);


    }
    public function getDeleteAddress($id)
    {


        Address::destroy($id);
        return redirect()->back()->with('success', 'آدرس با موفقیت حذف شد');

    }
    public function defaultAddress($id)
    {
        $user = Auth::user();
        $default_addresses = Address::where('user_id',$user->id)->where('default_address',1)->get();
        foreach ($default_addresses as $default_address){
            $default_address->update([
                'default_address'=> 0,
            ]);
        }
        $address = Address::find($id);
        $address->update([
            'default_address'=> 1,
        ]);

        return redirect()->back()->with('success', 'آدرس پیشفرض با موفقیت ثبت شد');

    }
    public function postAddAddress(Request $request)
    {
        $user = Auth::user();
    $input =$request->all();

    $address= Address::create([
        'name'=>$input['name'],
        'user_id'=>$user->id,
        'state_id'=>@$input['state_id'],
        'city_id'=>@$input['city_id'],
        'location'=>@$input['location'],
        'postal_code'=>@$input['postal_code'],
        'transferee_name'=>@$input['transferee_name'],
        'transferee_family'=>@$input['transferee_family'],
        'transferee_mobile'=>@$input['transferee_mobile'],
        'default_address'=> 1,
    ]);
        $default_addresses = Address::where('id','<>',$address->id)->where('user_id',$user->id)->where('default_address',1)->get();
        foreach ($default_addresses as $default_address){
            $default_address->update([
                'default_address'=> 0,
            ]);
        }

        return redirect()->back()->with('success', 'آدرس با موفقیت اضافه شد');

    }
    public function postEditAddress(Request $request, $id)
    {
       $input =  $request->all();
        $address= Address::find($id);
        $address->update($input);

        return redirect()->back()->with('success', 'آدرس با موفقیت ویرایش شد');

    }
    public function setCity(Request $request){
        $req = $request->all();
        $cities = null;
        if(!isset($req['body']['state_id'])){
            $cities =  City::orderBy('name','ASC')->where('state_code','<>',0)->get();

        }else{
            $cities = City::orderBy('name','ASC')->where('state_code',$req['body']['state_id'])->get();

        }

        return json_encode(['success' => true, 'cities' => $cities]);
    }

    public function setCityEdit(Request $request){
        $req = $request->all();
        $cities = null;
        if(!isset($req['body']['state_id'])){
            $cities =  City::orderBy('name','ASC')->where('state_code','<>',0)->get();

        }else{
            $cities = City::orderBy('name','ASC')->where('state_code',$req['body']['state_id'])->get();

        }

        $arr = [];
        foreach ($cities as $row){
            $arr[] = [
                'id'=>$row->id,
                'name'=>$row->name
            ];
        }

        return json_encode(['success' => true, 'cities' => $arr]);
    }

    public function favorites()
    {
        $user = Auth::user();
        $likes = like::orderby('id','DESC')->where('user_id',$user->id)->get();

        return view('site.panel.favorites')
            ->with('user',$user)
            ->with('likes',$likes);


    }
    public function orders()
    {
        $user = Auth::user();
        $pay_orders = Order::orderby('id','DESC')->where('user_id',$user->id)->where('order_status_id','2')->get();
        $sent_orders = Order::orderby('id','DESC')->where('user_id',$user->id)->where('order_status_id','5')->get();
        $examine_orders = Order::orderby('id','DESC')->where('user_id',$user->id)->where('order_status_id','3')->get();
        $pack_orders = Order::orderby('id','DESC')->where('user_id',$user->id)->where('order_status_id','4')->get();
        $cancel_orders = Order::orderby('id','DESC')->where('user_id',$user->id)->where('order_status_id','10')->get();
        $orders = Order::orderby('id','DESC')->where('user_id',$user->id)->where('order_status_id','<>','12')->get();

        return view('site.panel.order.orders')
            ->with('user',$user)
            ->with('sent_orders',$sent_orders)
            ->with('examine_orders',$examine_orders)
            ->with('pack_orders',$pack_orders)
            ->with('cancel_orders',$cancel_orders)
            ->with('pay_orders',$pay_orders)
            ->with('orders',$orders);


    }
    public function orderDetails($id)
    {
        $user = Auth::user();
        $order = Order::find($id);

        return view('site.panel.order.details')
            ->with('user',$user)
            ->with('order',$order);


    }
    public function discounts()
    {
        $user = Auth::user();
        $discounts = Discount::orderby('id','DESC')->where('user_id',$user->id)->orWhereNull('user_id')->orWhere('kind','2')->where('show_panel','1')->get();

        return view('site.panel.discounts')
            ->with('user',$user)
            ->with('discounts',$discounts);


    }
    public function tracking()
    {
        $user = Auth::user();

        return view('site.panel.tracking')
            ->with('user',$user);


    }
    public function track(Request $request)
    {
        $user = Auth::user();
        $order = Order::orderby('id','DESC')->where('user_id',$user->id)->where('ref_id',$request['ref_id'])->first();
            if ($order == null){
                return redirect()->back()->with('error', 'کد پیگیری وارد شده اشتباه است');
            }
            else{
        return view('site.panel.track')
            ->with('user',$user)
            ->with('order',$order);
    }

    }
    public function getPdf($order_id) {
        // retreive all records from db

        $order = Order::find($order_id);

            view()->share(['order'=> $order]);
            $pdf = PDF::loadView('site.panel.order.factor', [$order]);

            // download PDF file with download method
            return $pdf->download('pdf_file.pdf');
        }
    public function orderStep($id)
    {
        $user = Auth::user();
        $order = Order::find($id);

        return view('site.panel.order-step')
            ->with('user',$user)
            ->with('order',$order);


    }



}
