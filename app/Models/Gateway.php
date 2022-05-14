<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gateway extends Model
{
    protected $table = 'gateway_transactions';
    use SoftDeletes;
    protected $fillable = [
        'order_id', 'user_id','ip','port',
        'price','ref_id','tracking_code',
        'card_number','status','payment_date'
    ];



    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function order()
    {
        return $this->belongsTo('App\Order', 'user_id');
    }


}
