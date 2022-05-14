<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{

    protected $table = 'cities';
    use SoftDeletes;
    protected $fillable = [
        'name', 'status', 'state_code',
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
