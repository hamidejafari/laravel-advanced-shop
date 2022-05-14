<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelateData extends Model
{
    protected $table = 'relate_datas';
    protected $fillable = [
      'datable_type' , 'datable_id' ,'relatable_type' , 'relatable_id','type'
    ];

    public function relatable()
    {
        return $this->morphTo();
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product','relatable_id','id');
    }
}
