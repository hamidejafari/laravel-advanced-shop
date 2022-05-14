<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDept extends Model
{
    protected $table = 'user_department';

    protected $fillable = [
        'user_id', 'department_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }

}
