<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class ProductCategory extends Model
{
    protected $table='product_category';
    protected $fillable = [
        'product_id',
        'category_id',

    ];
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id','id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id','id');
    }




}
