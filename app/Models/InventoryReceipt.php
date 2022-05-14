<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryReceipt extends Model
{
    use SoftDeletes;


    protected $table = 'inventory_receipt';

    protected $fillable = [
        'inventory_id', 'product_id','count','inventory_type_id',
        'status','description','user_id','product_specification_value_id'

    ];

    public function productSpecificationValue()
    {
        return $this->belongsTo('App\Models\ProductSpecificationType', 'product_specification_value_id', 'id')->with('sp');
    }


    public function scopeIn($query)
    {
        return $query->where('inventory_type_id', 1);
    }
    public function scopeOut($query)
    {
        return $query->where('inventory_type_id', 2);
    }
    public function inventoryType()
    {
        return $this->belongsTo('App\Models\InventoryType','inventory_type_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function inventory()
    {
        return $this->belongsTo('App\Models\Inventory', 'inventory_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
    public function product_specification()
    {
        return $this->belongsTo('App\Models\product_specification', 'product_specification_value_id', 'id');
    }
}
