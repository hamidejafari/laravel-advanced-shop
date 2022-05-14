<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Address extends Model
{
    protected $table = 'addresses';
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'state_id','city_id','name','location','default_address','postal_code',
        'transferee_name','transferee_family','transferee_mobile','cookie_id'
    ];

    public function scopeAuthUser($query)
    {
        if(Auth::check()){
            return $query->where('user_id', Auth::id());
        }else{
            return $query->where('cookie_id', @$_COOKIE['cookie_id']);
        }
    }

    public function scopeDefault($query)
    {
        return $query->where('default_address', 1);
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State', 'state_id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }


}
