<?php

namespace App\Http\Controllers\Admin;

use App\Library\Logs;
use App\Models\Redirects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RedirectController extends Controller
{
    //---Redirects-----
    public function getRedirect(){

        $redirect = Redirects::orderby('id','DESC')->paginate(100);

        return view('admin.redirect.index')
            ->with('redirect', $redirect);
    }
    public function getRedirectAdd(){
        return view('admin.redirect.add');

    }
    public function postRedirectAdd(Request $request){
        $input=$request->all();
        $remove = array(url('/'.@$input->old_address).'/');
        $remove2 = array(url('/'.@$input->new_address).'/');
        $input['old_address']=str_replace($remove, "", $input['old_address']);
        $input['new_address']=str_replace($remove2, "", $input['new_address']);
       $redirect = Redirects::create($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$redirect->id);

        return Redirect::action('Admin\RedirectController@getRedirect');

    }
    public function getRedirectDelete($id){
        $redirect = Redirects::find($id);
        $array = array($redirect);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$redirect->id);
        Redirects::destroy($id);
        return Redirect::action('Admin\RedirectController@getRedirect');
    }

}
