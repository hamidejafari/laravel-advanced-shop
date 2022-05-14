<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceDiscount extends Model
{
    protected $table = 'price_discounts';
    use SoftDeletes;
    protected $fillable = [
        'category_id', 'brand_id', 'percent',
    ];

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

}

