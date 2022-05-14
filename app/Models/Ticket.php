<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    protected $fillable = [
        'user_id','parent_id','order_item_id','status','message','subject','file','department_id'
    ];
use SoftDeletes;
    public function user()
    {
        return $this->belongsTo('App\User' , 'user_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department' , 'department_id');
    }
    public function replies()
    {
        return $this->hasMany(Ticket::class,'reply_id');
    }

}
