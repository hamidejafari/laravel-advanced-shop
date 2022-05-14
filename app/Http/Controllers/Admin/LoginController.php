<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\DriveLoginRequest;
use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('auth.logins');

    }
    public function postLogin(AdminRequest $request)
    {

        $input = $request->all();
        $login = Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'admin' => true,
        ]);

        if ($login) {
            return redirect('/admin')->with('success', 'خوش آمدید');
        } else {
            return redirect('/login')->with('error', 'اطلاعات ورودی اشتباه است');
        }
    }
}
