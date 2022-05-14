<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Bell extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'product_id', 'cookie_id','status'

    ];

    public function scopeCookieUser($query)
    {
        return $query->where('cookie_id', @$_COOKIE['cookie_id']);

    }
    public function scopeAuthUser($query)
    {
        if(Auth::check()){
            return $query->where('user_id', Auth::id());
        }else{
            return $query->where('cookie_id', @$_COOKIE['cookie_id']);
        }
    }


    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id')->withTrashed();
    }


}
