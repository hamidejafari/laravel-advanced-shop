<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';
    use SoftDeletes;
    protected $fillable = [
        'title', 'description', 'description_seo','cover','specification_title',
        'url', 'title_seo', 'keyword' ,'parent_id','status','old_id'

    ];


    public function parent()
    {
        return $this->belongsTo(\App\Models\Category::class, 'parent_id', 'id')->with('parent');
    }

    public function childs()
    {
        return $this->hasMany('App\Models\Category','parent_id')->with('childs');
    }
    public function products()
    {
        return $this->belongsToMany('App\Models\Product','product_category','category_id');
    }
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'parent_id', 'id');
    }
    public function getCatImageAttribute(){

        $cat_cover = Category::find($this->attributes['id']);

        return file_exists('assets/uploads/content/cat/'.$cat_cover->cover) ? asset('assets/uploads/content/cat/'.$cat_cover->cover) :asset('assets/site/images/notfound.png');

    }


}
