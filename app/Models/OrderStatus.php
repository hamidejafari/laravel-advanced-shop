<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatus extends Model
{
    protected $table = 'order_statuses';
    use SoftDeletes;
    protected $fillable = [
        'title','type'
    ];



}
