<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Box extends Model
{
    protected $table = 'boxes';
    use SoftDeletes;
   protected $fillable = [
     'description' , 'product_id','sort'
   ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id','id');
    }


}
