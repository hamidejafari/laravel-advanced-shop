<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class OrderItem extends Model
{
    protected $table = 'order_items';
    use SoftDeletes;
    protected $fillable = [
        'order_id', 'order_item_status_id', 'product_id',
        'product_specification_type_id','product_specification_value_id','old_price',
        'price', 'discount', 'quantity', 'tax1', 'tax2','product_specification_id'
    ];

//    protected function getDateFormat()
//    {
//        return 'U';
//    }



    public function orderStatus()
    {
        return $this->belongsTo('App\Models\OrderStatus', 'order_item_status_id', 'id');
    }



    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function productspecification()
    {
        return $this->belongsTo('App\Models\ProductSpecification', 'product_specification_id', 'id')->withTrashed();
    }
    public function productSpecificationValue()
    {
        return $this->belongsTo('App\Models\ProductSpecificationType', 'product_specification_value_id')->withTrashed();
    }


    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }
    public function sale()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id')->whereIn('order_status_id',[5,3,4]);
    }

}
