<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderHistory extends Model
{
    protected $table = 'order_histories';
    use SoftDeletes;
    protected $fillable = [
        'order_id','order_status_id','order_description'
    ];

    public function orderStatus()
    {
        return $this->belongsTo('App\Models\OrderStatus', 'order_status_id', 'id');
    }
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }

}
