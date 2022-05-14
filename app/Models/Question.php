<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    protected $table = 'questions';
    use SoftDeletes;
   protected $fillable = [
     'answer' , 'product_id','question'
   ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id','id');
    }


}
