<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Redirects extends Model
{
    protected $table='redirect';
    use SoftDeletes;
    protected $fillable=['old_address', 'new_address','type'];
}
