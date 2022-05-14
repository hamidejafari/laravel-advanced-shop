<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogType extends Model
{
    protected $table = 'logtypes';
    use SoftDeletes;
    protected $fillable = [
        'title'
    ];



}
