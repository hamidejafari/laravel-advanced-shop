<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'total_prices', 'total_calculated','payment', 'discount', 'tax1', 'tax2', 'fee',
        'quantity', 'storage_id', 'order_status_id', 'bank_id', 'transaction_id', 'ref_id',
        'tracking_code', 'delivery_time','delivery_type_id', 'address_id', 'paid_date','delivery_date', 'send_date',
        'post_type', 'state_id', 'city_id','post_price','order_description','cookie_id','sms_convert','fixdef','post_tracking'

    ];

    public function scopeCookieUser($query)
    {
        return $query->where('cookie_id', @$_COOKIE['cookie_id']);

    }
    public function scopeAuthUser($query)
    {
        if(Auth::check()){
            return $query->where('user_id', Auth::id());
        }else{
            return $query->where('cookie_id', @$_COOKIE['cookie_id']);
        }
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }


//    protected function getDateFormat()
//    {
//        return 'U';
//    }


    public function getOrderDateAttribute(){
      $date =  jdate('Y/m/d H:i',$this->created_at->timestamp);
        return $date;
    }
    public function scopeCurrentOrder($query)
    {
        return $query->where('order_status_id', 1);
    }
    public function scopePayProcess($query)
    {
        return $query->where('order_status_id', 2);
    }

    public function orderStatus()
    {
        return $this->belongsTo('App\Models\OrderStatus', 'order_status_id', 'id');
    }


    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem')->with('product');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id')->withTrashed();
    }
    public function address()
    {
        return $this->belongsTo('App\Models\Address', 'address_id', 'id')->where('default_address',1);
    }

    public function inventory()
    {
        return $this->belongsTo('App\Models\Inventory', 'storage_id', 'id');
    }

}
