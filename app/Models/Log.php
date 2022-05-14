<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{

    protected $table = 'logs';
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'action', 'data','related',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
