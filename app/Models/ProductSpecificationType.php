<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class ProductSpecificationType extends Model
{
    use  SoftDeletes;

    protected $table = 'product_specification_types';

    protected $fillable = ['title', 'name', 'parent_id','old_id','old_id1','old_id2','status'];





    public function scopeMainTypes($query)
    {
        return $query->whereNull('parent_id');
    }
    public function sp()
    {
        return $this->hasMany('App\Models\ProductSpecification', 'product_specification_value_id','id')->with('prices');
    }



    public function parent()
    {
        return $this->belongsTo('App\Models\ProductSpecificationType', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\ProductSpecificationType', 'parent_id');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category',
            'product_specification_type_category', 'pst_id', 'category_id');
    }

}
