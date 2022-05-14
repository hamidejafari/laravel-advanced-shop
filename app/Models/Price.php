<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Maatwebsite\Excel\Concerns\FromCollection;

class Price extends Model
{
    protected $table = 'prices';
    use SoftDeletes;
    protected $fillable = [
        'priceable_id' , 'priceable_type','old_price','price' ,'black_friday','zero_check','convert-price'
    ];

    public function priceable()
    {
        return $this->morphTo();
    }


    public function product()
    {
        return $this->belongsTo('App\Models\Product','priceable_id','id');
    }
    public function specification()
    {
        return $this->belongsTo('App\Models\ProductSpecification','priceable_id','id');
    }

}
