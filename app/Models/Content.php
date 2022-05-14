<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    protected $table = 'contents';
    use SoftDeletes;
    protected $fillable = [
        'title', 'description', 'image', 'keyword', 'content_type','view','status',
        'parent_id', 'description_seo', 'url', 'title_seo','baner_type','link','old_url'

    ];

    public function getcoverImageAttribute(){

        if($this->attributes['id'] !== null && file_exists('assets/uploads/content/sli/'.$this->attributes['image'])){
            return asset('assets/uploads/content/sli/'.$this->attributes['image']);
        }else{
            return asset('assets/site/images/notfound.png');
        }
    }

    public function scopeArticle($query)
    {
        $records = $query->whereContentType('1');
        return $records;

    }
    public function scopeSlider($query)
    {
        $records = $query->whereContentType('2');
        return $records;

    }

    public function scopeBaner($query)
    {
        $records = $query->whereContentType('3');
        return $records;

    }
    public function scopeBanner($query)
    {
        $records = $query->wherein('content_type',[3,6,7]);
        return $records;

    }
    public function scopeUpl($query)
    {
        $records = $query->whereContentType('4');
        return $records;

    }
    public function scopeArticleCat($query)
    {
        $records = $query->whereContentType('5');
        return $records;

    }
    public function scopeBaner2($query)
    {
        $records = $query->whereContentType('6');
        return $records;

    }
    public function scopeBaner3($query)
    {
        $records = $query->whereContentType('7');
        return $records;

    }
    public function scopeMobile1($query)
    {
        $records = $query->whereContentType('8');
        return $records;

    }
    public function scopeMobile2($query)
    {
        $records = $query->whereContentType('9');
        return $records;

    }
    public function scopeMobile3($query)
    {
        $records = $query->whereContentType('11');
        return $records;

    }
    public function scopeMslider($query)
    {
        $records = $query->whereContentType('10');
        return $records;

    }
    public function scopeMobile($query)
    {
        $records = $query->wherein('content_type',[8,9,10,11]);
        return $records;

    }

    public function childs()
    {
        return $this->hasMany('App\Models\Content','parent_id')->with('childs');
    }
    public function cat()
    {
        return $this->belongsTo('App\Models\Content', 'parent_id', 'id');
    }
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'Commentable')->whereNull('parent_id');
    }
}
