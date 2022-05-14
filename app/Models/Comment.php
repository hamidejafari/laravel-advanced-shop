<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Maatwebsite\Excel\Concerns\FromCollection;

class Comment extends Model
{
    protected $table = 'comments';
    use SoftDeletes;
    protected $fillable = [
        'content', 'status', 'parent_id','title','readat',
        'commentable_id' , 'commentable_type','user_id','star'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\Comment', 'parent_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product','commentable_id','id');
    }
    public function blog()
    {
        return $this->belongsTo('App\Models\Content','commentable_id','id');
    }


}
