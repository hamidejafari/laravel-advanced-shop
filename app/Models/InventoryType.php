<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryType extends Model
{
    protected $table = 'inventory_type';

    protected $fillable = [
        'title', 'status',

    ];
}
