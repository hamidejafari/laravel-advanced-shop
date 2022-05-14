<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    protected $table = 'discounts';
    use SoftDeletes;
    protected $fillable = [
        'code', 'type', 'amount', 'used','from_date','to_date','product_id','order_id','user_id','show_panel',
        'description','count','category_id','kind','title'
    ];
    public function scopePercent($query)
    {
        $records = $query->whereType('1');
        return $records;
    }
    public function scopeCash($query)
    {
        $records = $query->whereType('2');
        return $records;
    }
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
    public function productItem()
    {
        return $this->belongsTo('App\Models\OrderItem', 'product_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}

