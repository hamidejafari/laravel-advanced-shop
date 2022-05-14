<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    protected $table = 'states';
    use SoftDeletes;
    protected $fillable = [
        'name', 'status'
    ];
}
