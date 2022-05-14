<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Properties extends Model
{
    protected $table = 'properties';
    use SoftDeletes;
   protected $fillable = [
     'description' , 'product_id','status','sort'
   ];

    public function catbrand()
    {
        return $this->belongsTo('App\Models\Product', 'product_id','id');
    }


}
