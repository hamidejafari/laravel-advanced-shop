<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    protected $table = 'videos';
    use SoftDeletes;
   protected $fillable = [
     'link' , 'product_id',
   ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id','id');
    }


}
