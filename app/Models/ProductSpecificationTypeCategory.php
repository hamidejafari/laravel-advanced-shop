<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSpecificationTypeCategory extends Model
{
    protected $table = 'product_specification_type_category';

    protected $fillable = ['pst_id','category_id'];

}
