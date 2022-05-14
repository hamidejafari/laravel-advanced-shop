<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Library\Help;
use App\Library\Helper;
use App\Models\Bell;
use App\Models\Order;
use App\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Kavenegar\KavenegarApi;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use SoapClient;
class LoginController extends Controller
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
    /////==============Pass===========================================
    public function getPassword(Request $request)
    {
        $product_id = @$request->product_id;
        $reminder_id = @$request->reminder_id;
        $user = \App\User::where('mobile',Helper::persian2LatinDigit($request->get('mobile')))->first();

        if($request->has('order')){
            return view('site.auth.pass')
                ->with('user',$user)
                ->with('order',1)
                ->with('reminder_id',$reminder_id)
                ->with('product_id', $product_id);
        }else{

            return view('site.auth.pass')
                ->with('user',$user)
                ->with('reminder_id',$reminder_id)
                ->with('product_id', $product_id);
        }


    }
    public function postPassword(Request $request)
    {
        set_time_limit(30000000000);

        if ($request['mobile'] != null){
            $users = \App\User::where('mobile',Helper::persian2LatinDigit($request->get('mobile')))->first();
            if($users != null) {

                if ($users->mobile_confirm == 1) {
                    $new = random_int(100000, 999999);
                    $users['temp_password'] = $new;

                    $users->save();

                    try {
                        $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                        $receptor = $users->mobile;
                        $token = $new;
                        $token2 = "";
                        $token3 = "";
                        $template = "password";
                        $type = "sms";//sms | call
                        $result = $api->VerifyLookup($receptor, $token, $token2, $token3, $template, $type);
                    } catch (ApiException $e) {
                        \Log::info($e->errorMessage());
                    } catch (HttpException $e) {
                        \Log::info($e->errorMessage());
                    }

                    if(@$request->has('order')) {
                        return redirect('/panel/login-pass/' . $users->mobile . '?order=1')
                            ->with('success', 'با رمز عبور ارسال شده به شماره همراهتان وارد پنل کاربری شوید.')
                            ->with('user', $users);
                    }
                    elseif(@$request->has('reminder_id')){
                        return redirect('/panel/login-pass/' . $users->mobile.'?reminder_id='.@$request->reminder_id)
                            ->with('success', 'با رمز عبور ارسال شده به شماره همراهتان وارد پنل کاربری شوید.')
                            ->with('user',$users);
                    }
                    else{
                        return redirect('/panel/login-pass/' . $users->mobile)
                            ->with('success', 'با رمز عبور ارسال شده به شماره همراهتان وارد پنل کاربری شوید.')
                            ->with('user',$users);
                    }

                }
                else {


                    $code= random_int(100000, 999999);
                    $users['confirm_code'] = $code;
                    $users->save();
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
                }
                return redirect('panel/confirm/'.$users->mobile)->with('success', 'کد تایید ارسال شده به شماره موبایلتان را ارسال کنید');
            }
            else
            {
                return redirect()->back()->with('error',' شما در سایت عضو نیستید لطفا ثبت نام کنید');
            }
        }
        else{
            return redirect()->back()->with('error',' لطفا شماره خود را وارد کنید');
        }
    }

    public function postRePassword($mobile)
    {
        set_time_limit(30000000000);

        $users = \App\User::where('mobile',$mobile)->first();

        if($users)
        {
            $new = random_int(100000, 999999);
            $users['temp_password'] = $new ;

            $users->save();
            try{
                $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                $receptor = $users->mobile;
                $token = $new;
                $token2 = "";
                $token3 = "";
                $template = "password";
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
        else
        {
            return redirect()->back()->with('error',' شما در سایت عضو نیستید لطفا ثبت نام کنید');
        }
        return redirect()->back()->with('success','با رمز عبور ارسال شده به شماره همراهتان وارد پنل کاربری شوید.');
    }
    /////==============Login With Pass===========================================
    public function getLoginWpass()
    {
        return view('site.auth.loginwithpass');
    }
    public function getPanelLogin(Request $request)
    {

        $product_id = @$request->product_id;
        $reminder_id = @$request->reminder_id;
        if($request->has('order')){
            return view('site.auth.login')
                ->with('product_id', $product_id)
                ->with('reminder_id', $reminder_id)
                ->with('order', 1)
                ->with('info', 'کاربر گرامی, برای ادامه فرایند خرید وارد پنل کاربری خود شوید.');
        }elseif($request->has('address')){
            return view('site.auth.login')
                ->with('product_id', $product_id)
                ->with('reminder_id', $reminder_id)
                ->with('order', 1)
                ->with('info', 'کاربر گرامی, برای انتخاب ادرس ابتدا وارد پنل کاربری خود شوید.');
        }else{
            return view('site.auth.login')
                ->with('product_id', $product_id)
                ->with('reminder_id', $reminder_id);
        }
    }

    /////==============Login Panel===========================================
    public function postPanelLogin(Request $request)
    {
        set_time_limit(30000000000);

        $input = $request->all();
        $user = User::where('mobile',Helper::persian2LatinDigit($request->get('mobile')))->first();

        if ($user->mobile_confirm == 0){

            return redirect('panel/confirm/'.$user->mobile.'?reminder_id='.@$request->reminder_id)->with('success', 'لطفا شماره خود را تایید کنید');
        }

        if ($user->temp_password == $request->get('temp_password')){
            Auth::loginUsingId($user->id);
            setcookie('mobileLoginCookie',$request->get('mobile') , time()+(60*60*24*180));
            $user->update([
                'last_login'=> Carbon::Now(),
            ]);
            $currentOrder = Order::cookieUser()->currentOrder()->first();
            $currentOrders = Order::where('user_id',Auth::id())->currentOrder()->get();
            if($currentOrder){
                foreach($currentOrders as $row){
                    $x = Order::find($row->id);
                    $x->update(['order_status_id'=>10]);
                }
                $currentOrder->update([
                    'user_id'=>Auth::id()
                ]);
            }

            if(@$request->has('order')) {
                return redirect('checkout/')->with('success', ' ورود شما با موفقیت انجام شد, به خرید خود ادامه بدهید.');
            }
            elseif(@$request->get('reminder_id')){

                $check = Bell::where('user_id',auth()->user()->id)->where('product_id',$input['reminder_id'])->whereStatus('0')->first();
                if (!$check){
                    $bell = Bell::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $input['reminder_id']
                    ]);
                }
                else{
                    return redirect('pro/'.$input['reminder_id'])->with('error', 'شما قبلا برای این محصول درخواست ثبت کرده اید');
                }



                return redirect('pro/'.$request->reminder_id)->with('success', 'در صورت موجود شدن محصول به شما اطلاع داده خواهد شد');
            }else{
                return redirect('panel/dashboard');
            }
        }
        else {
            return redirect('/panel/login')->with('error', 'رمز عبور اشتباه است');
        }



    }
    /////==============Login===========================================
    public function postLogin(Request $request)
    {
        set_time_limit(30000000000);

        $input = $request->all();
        $login = request()->input('username');

        if(is_numeric(Helper::persian2LatinDigit($login))){
            $login = Auth::attempt([
                'mobile' => Helper::persian2LatinDigit($login),
                'password' =>Helper::persian2LatinDigit($request->get('password')),
                'mobile_confirm' => true,
                'status' => true,
            ]);
            $user = User::whereMobile($request->get('username'))->first();
        }

        elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $login = Auth::attempt([
                'email' => $login,
                'password' =>Helper::persian2LatinDigit($request->get('password')),
                'mobile_confirm' => true,
                'status' => true,
            ]);
            $user = User::where('email',$request->get('username'))->first();
        }


        if ($login) {
            setcookie('mobileLoginCookie',$request->get('mobile') , time()+(60*60*24*180));
            $user->update([
                'last_login'=> Carbon::Now(),
            ]);
            if($request->get('reminder_id')){
                \Log::info('heyyyyy');
                \Log::info($request->get('reminder_id'));

                $check = Bell::where('user_id',auth()->user()->id)->where('product_id',$input['reminder_id'])->whereStatus('0')->first();
                if (!$check){
                    $bell = Bell::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $input['reminder_id']
                    ]);
                }
                else{
                    return redirect('pro/'.$input['reminder_id'])->with('error', 'شما قبلا برای این محصول درخواست ثبت کرده اید');
                }
                return redirect('pro/'.$input['reminder_id'])->with('success', 'در صورت موجود شدن محصول به شما اطلاع داده خواهد شد');
            }

            return redirect('panel/dashboard')->with('success', 'خوش آمدید');
        } else {
            return redirect('/panel/register')->with('error', 'شما ثبت نام نکردید');
        }
    }
    /////==============Register===========================================
    public function getRegister(Request $request)
    {
        $gender = [

            '0' => 'خانم',
            '1' => 'آقا',
        ];

        $reminder_id = @$request->reminder_id;
        $product_id = @$request->product_id;
        if($request->has('order')){
            return view('site.auth.register')
                ->with('order', 1)
                ->with('product_id', $product_id)
                ->with('gender', $gender);
        }else{
            return view('site.auth.register')
                ->with('product_id', $product_id)
                ->with('reminder_id', $reminder_id)
                ->with('gender', $gender);
        }

    }

    public static function  is_english($str){
        if (strlen($str) != strlen(utf8_decode($str))) {
            return false;
        } else {
            return true;
        }
    }

    protected function postRegister(RegisterRequest $request)
    {

        set_time_limit(30000000000);


        if(self::is_english($request->name)){
            return redirect()->back()->with('error', 'نام خود را به فارسی بنویسید');

        }
        if(self::is_english($request->family)){
            return redirect()->back()->with('error', 'نام خانوادگی خود را به فارسی بنویسید');

        }
        $input = $request->all();
        if ($request->mobile == null && $request->email == null) {
            return redirect()->back()->with('error', 'یا شماره موبایل یا ایمیل را وارد کنید');
        }
        if($request->birthday == null)
        {
            return redirect()->back()->with('error', 'لطفا تاریخ تولد خود را وارد کنید');
        }
        else {

            $date = explode('/', $request->get('birthday'));
            if(@$date[1] && @$date[2] && @$date[0]){
                $s = jmktime(0, 0, 0, $date[1], $date[2], $date[0]);
                $x = \Carbon\Carbon::createFromTimestamp($s)->toDateTimeString();

            }else{
                $x=null;
            }


        }
        $code = random_int(10000, 99999);
        $password = bcrypt($request['password']);

        $users = User::create([
            'name' => $input['name'],
            'family' => $input['family'],
            'gender' => $input['gender'],
            'email' => @$input['email'],
            'mobile' => Helper::persian2LatinDigit(@$input['mobile']),
            'confirm_code' => $code,
            'password' => $password,
            'birthday' => $x,
        ]);
        if ($request->mobile != null){

            $code= random_int(100000, 999999);
            $users['confirm_code'] = $code;
            $users->save();
            try {
                $api = new KavenegarApi("6962686E2B595051784C4C59537832547035346C39654838454F5674346E39674C73717068413858484A493D");
                $receptor = $users->mobile;
                $token = $code;
                $token2 = "";
                $token3 = "";
                $template = "verify";
                $type = "sms";//sms | call
                $result = $api->VerifyLookup($receptor, $token, $token2, $token3, $template, $type);
            } catch (ApiException $e) {
                \Log::info($e->errorMessage());
            } catch (HttpException $e) {
                \Log::info($e->errorMessage());
            }

            if($request->has('order')){
                return redirect('panel/confirm/'.$users->mobile.'?product_id='.@$request->product_id.'&order=1')->with('success', 'کد تایید ارسال شده به شماره موبایلتان را ارسال کنید');
            }else{
                return redirect('panel/confirm/'.$users->mobile.'?product_id='.@$request->product_id)->with('success', 'کد تایید ارسال شده به شماره موبایلتان را ارسال کنید');
            }
        }
        elseif($request->email != null){
            Mail::raw('کد تایید:'.$code , function ($message) use ($input)  {
                $message->from("admin@kaajshop.com"  , 'From:admin');
                $message->to($input['email'])->subject('کد تایید'.'  To:'.$input['email']);
            });

            if($request->has('order')) {
                return redirect('panel/confirm/'.$users->email.'&order=1')->with('success', 'کد تایید ارسال شده به شماره ایمیلتان را ارسال کنید');
            }
            elseif(@$request->get('reminder_id')){
                return redirect('pro/'.$request->reminder_id)->with('success', 'در صورت موجود شدن محصول به شما اطلاع داده خواهد شد');
            }else{
                return redirect('panel/confirm/'.$users->email)->with('success', 'کد تایید ارسال شده به شماره ایمیلتان را ارسال کنید');
            }
        }

    }
    /////==============Confirm===========================================
    public function getConfirm($mobile,Request $request)
    {
        $product_id = @$request->product_id;
        $reminder_id = @$request->reminder_id;
        if($request->has('order')) {
            return view('site.auth.confirm')->with('product_id', $product_id)->with('mobile', $mobile)
                ->with('order', 1);
        }
        elseif($request->has('reminder_id')){
            return view('site.auth.confirm')->with('reminder_id', $reminder_id)->with('mobile',$mobile)
                ;
        }else{
            return view('site.auth.confirm')->with('product_id', $product_id)->with('mobile',$mobile);
        }
    }
    public function postConfirm(Request $request)
    {
        set_time_limit(30000000000);

        $input = $request->all();

        $user = User::where('confirm_code', Helper::persian2LatinDigit($request->get('confirm_code')))->first();

        if ($user) {
            $user->mobile_confirm = true;
            $user->status = true;
            $user->save();
            $user->assignRole([4]);
            Auth::loginUsingId($user->id);

            $currentOrder = Order::cookieUser()->currentOrder()->first();
            $currentOrders = Order::where('user_id',Auth::id())->currentOrder()->get();
            if($currentOrder){
                foreach($currentOrders as $row){
                    $x = Order::find($row->id);
                    $x->update(['order_status_id'=>10]);
                }
                $currentOrder->update([
                    'user_id'=>Auth::id()
                ]);
            }

            if(@$request->has('order')) {
                return redirect('checkout/')->with('success', 'ثبت نام شما با موفقیت انجام شد, به خرید خود ادامه بدهید.');
            }
            elseif($request->get('reminder_id')){
                return redirect('pro/'.$request->reminder_id)->with('success', 'در صورت موجود شدن محصول به شما اطلاع داده خواهد شد');

            }else{
                return redirect('panel/dashboard');
            }

        } else {
            return redirect()->back()->with('error', ' کد وارد شده صحیح نمی باشد');
        }
    }
    public function postReCon(Request $request)
    {
        set_time_limit(30000000000);

        $product_id = @$request->product_id;
        $input = $request->all();
        $users = User::where('mobile',$input['field'])->orWhere('email',$input['field'])->first();
        if($users)
        {
            $code = random_int(100000, 999999);
            $users['confirm_code'] = $code ;
            $users->save();
            if(is_numeric(Helper::persian2LatinDigit($input['field']))){

                $code= random_int(100000, 999999);
                $users['confirm_code'] = $code;
                $users->save();
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
            }

            elseif (filter_var($input['field'], FILTER_VALIDATE_EMAIL)) {
                Mail::raw('کد تایید:'.$code , function ($message) use ($input)  {
                    $message->from("admin@kaajshop.com"  , 'From:admin');
                    $message->to($input['field'])->subject('کد تایید'.'  To:'.$input['field']);
                });
            }


        }
        else
        {
            return redirect()->back()->with('error',' شما در سایت عضو نیستید لطفا ثبت نام کنید');
        }
        return redirect()->back()->with('success', 'لطفا شماره خود را تایید کنید');

    }
    /////==============Logout===========================================
    public function getlogout()
    {

        Auth::logout();

        return redirect('/')->with('success', 'به امید دیدار مجدد');
    }



}
