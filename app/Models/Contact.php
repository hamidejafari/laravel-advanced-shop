<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Maatwebsite\Excel\Concerns\FromCollection;

class Contact extends Model
{
    protected $table = 'contacts';
    use SoftDeletes;
    protected $fillable = [
        'name', 'email', 'message','subject','phone', 'readat','type','category_id'
        ,'address'
    ];
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
}
