<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    protected $table = 'departments';
    use SoftDeletes;
    protected $fillable = ['name'];

public function users()
{
    return $this->belongsToMany('App\User',
        'user_department', 'department_id', 'user_id');
}

}
