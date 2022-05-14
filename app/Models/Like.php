<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Maatwebsite\Excel\Concerns\FromCollection;

class Like extends Model
{
    protected $table = 'likes';
    use SoftDeletes;
    protected $fillable = [
        'ip', 'likeable_type','likeable_id','user_id'
    ];

    public function likeable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function product()
    {
        return $this->belongsTo('App\Models\Product','likeable_id','id');
    }


}
