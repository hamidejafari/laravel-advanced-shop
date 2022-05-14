<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    protected $table = 'tags';
    use SoftDeletes;
    protected $fillable = ['title','title_seo','description','description_seo','index','h1','url'];



    public function products()
    {
        return $this->morphedByMany('App\Models\Product', 'taggable');
    }
    public function brands()
    {
        return $this->morphedByMany('App\Models\Brand', 'taggable');
    }


    public function contents()
    {
        return $this->morphedByMany('App\Models\Content', 'taggable');
    }


}
