<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cookie extends Model
{

    protected $table = 'cookies';
    protected $fillable = [
        'cookie_id','ip'
    ];

    public function state()
    {
        return $this->hasOne('App\Models\State', 'id', 'state_code');
    }
    public function users()
    {
        return $this->hasMany('App\User', 'city_id', 'code');
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'city_id', 'id');
    }

}
