<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'name', 'permission'
    ];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
