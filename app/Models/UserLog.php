<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLog extends Model
{
    protected $table = 'user_logs';
    use SoftDeletes;
    protected $fillable = [
        'title', 'ip','variable_id','long_variable','admin_id','section','log_type_id'
        ,'section','log_type_id',
    ];


}
