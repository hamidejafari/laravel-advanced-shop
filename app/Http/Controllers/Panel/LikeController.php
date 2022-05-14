<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;

use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class LikeController extends Controller
{
    public function postLike(Request $request)
    {
        $ip= request()->ip();
        if(Auth::check())
        {
            $likes = Like::create([
                'ip'=>$ip,
                'user_id'=>Auth::id(),
                'likeable_id'=>$request->get('likeable_id'),
                'likeable_type'=>$request->get('likeable_type'),
            ]);
            return redirect()->back();
        }
        else
        {
            $likes = Like::create([
                'ip'=>$ip,
                'user_id'=>null,
                'likeable_id'=>$request->get('likeable_id'),
                'likeable_type'=>$request->get('likeable_type'),
            ]);
            return redirect()->back();
        }
    }

    public function getDeleteLike($id)
    {
        $id = Like::find($id);
        $id->delete();
        return \redirect()->back();
    }
/////\\\\\\\\\\\\\\\\\///////////////
    public function postVueLike(Request $request)
    {
        $user = Auth::user();
        $req = $request->all();
        $ip= request()->ip();
        if ($req['like'] == true)
        {
        $likes = Like::create([
            'ip'=>$ip,
            'user_id'=>Auth::check() ? Auth::id() : null,
            'likeable_id'=>$request->get('likeable_id'),
            'likeable_type'=>'App\Models\Product',
        ]);

            return ['like'=>1];
        }
        else
        {
            if ($user == null){
                $id = Like::where('ip',request()->ip())->where('likeable_id',$req['likeable_id'])->first();
            }
                else{
                $id = Like::where('user_id',$user->id)->where('likeable_id',$req['likeable_id'])->first();
            }
            $id->delete();
            return ['like'=>0];
        }
    }
}
