<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    protected $table = 'inventory';

    protected $fillable = [
        'title', 'city_id', 'delivery',
         'depot',

    ];
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id', 'id');
    }

}
