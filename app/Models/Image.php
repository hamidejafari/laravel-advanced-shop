<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;
   protected $fillable = [
     'old_file','file' , 'product_id','thumbnail','product_specification_id','old_id','convert','fix_pic','sort'
   ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function specification()
    {
        return $this->belongsTo('App\Models\ProductSpecification','product_specification_id');
    }
    public function scopeShow($query)
    {
        $records = $query->whereThumbnail(1);
        return $records;
    }

    public function getProImageAttribute(){
        if(file_exists('assets/uploads/content/pro/big/'.@$this->attributes['file'])){
            return asset('assets/uploads/content/pro/big/'.@$this->attributes['file']);

        }elseif(file_exists('assets/uploads/content/sp/big/'.@$this->attributes['file'])){
            return asset('assets/uploads/content/sp/big/'.@$this->attributes['file']);

        }else{
            return asset('assets/site/images/notfound.png');
        }
    }

}
