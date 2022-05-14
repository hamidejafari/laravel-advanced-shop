<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sloagen extends Model
{
    protected $table = 'sloagens';
    use SoftDeletes;
   protected $fillable = [
     'image' , 'product_id','title'
   ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id','id');
    }


}
