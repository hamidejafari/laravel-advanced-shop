<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'products';
    use SoftDeletes;
    protected $fillable = [
        'title', 'description', 'status', 'keyword','description_seo',
        'url', 'title_seo', 'brand_id', 'lead','popular','end_date',
        'sort','special','max','weight','sell','newest','available','timer','date',
        'hour','video_link','title_en','warning','old_id','count','seo_convert','not_found','convert_spf','how_to_use'
        ,'ingredients','specification_title','barcode','check_stock','image','price','old_price','fix','stocks','stock_fix',
        'vid_fix'

    ];



    public function getPriceFirstAttribute(){
        $set = Setting::first();
        if ($set->black_friday == 1){
            $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->whereNotNull('old_price')->whereNotNull('price')->first();
            if (!$prices){
                $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();

            }
        }
        else{
            $prices = Price::where('black_friday',0)->where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();

        }

        $prcies_specification = ProductSpecification::whereHas('prices')->orderBy('id','DESC')->where('product_id',$this->attributes['id'])->first();

        if($prices && (@$prcies_specification->prices[0]->price == 0)){
            return ['old'=> number_format(intval($prices->old_price)) . ' تومان ','price'=> $prices->price ? number_format(intval($prices->price)) . ' تومان ': 'ناموجود'];
        }elseif($prcies_specification){
            return ['old'=> number_format(intval($prcies_specification->prices[0]->old_price)) . ' تومان ','price'=> $prcies_specification->prices[0]->price ? number_format(intval($prcies_specification->prices[0]->price)) . ' تومان ': 'ناموجود'];
        }else{
            return ['old'=>'','price'=>'ندارد'];
        }

    }

    public function getStockCountAttribute(){
        $stock_in = InventoryReceipt::where('product_id',$this->attributes['id'])->orderBy('id','DESC')->In()->sum('count');
        $stock_out = InventoryReceipt::where('product_id',$this->attributes['id'])->orderBy('id','DESC')->Out()->sum('count');
        $mines = intval($stock_in-$stock_out);
        if($mines > 0 ){
            return $mines;

        }else{
            return 0;

        }
    }


    public function getStockCountEditAttribute(){
        $stock_in = InventoryReceipt::where('product_id',$this->attributes['id'])->whereHas('productSpecificationValue',function($q){
            $q->whereHas('sp');
        })->orderBy('id','DESC')->In()->sum('count');
        $stock_out = InventoryReceipt::where('product_id',$this->attributes['id'])->whereHas('productSpecificationValue',function($q){
            $q->whereHas('sp');
        })->orderBy('id','DESC')->Out()->sum('count');
        $mines = intval($stock_in-$stock_out);
        if($mines > 0 ){
            return $mines;

        }else{
            return 0;

        }
    }



    public function getPriceSecondAttribute(){
        $set = Setting::first();
        if ($set->black_friday == 1){
            $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->whereNotNull('old_price')->whereNotNull('price')->first();
            if (!$prices){
                $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();

            }
        }
        else{
            $prices = Price::where('black_friday',0)->where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();

        }
        $prcies_specification = ProductSpecification::whereHas('prices')->orderBy('id','DESC')->where('product_id',$this->attributes['id'])->first();

        if($prices && (@$prcies_specification->prices[0]->price == 0)){
            return ['old'=>$prices->old_price ,'price'=>$prices->price ];
        }elseif($prcies_specification){
            return ['old'=>$prcies_specification->prices[0]->old_price ,'price'=>$prcies_specification->prices[0]->price];

        }else{
            return ['old'=>0,'price'=>0];
        }
    }

    public function getPriceAdminAttribute(){
        $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();
        $prcies_specification = ProductSpecification::whereHas('prices')->orderBy('id','DESC')->where('product_id',$this->attributes['id'])->first();

        if($prices){
            return ['old'=>$prices->old_price ,'price'=>$prices->price ];
        }elseif($prcies_specification){
            return ['old'=>$prcies_specification->prices[0]->old_price ,'price'=>$prcies_specification->prices[0]->price];

        }else{
            return ['old'=>0,'price'=>0];
        }
    }


    public function getCalcuteListAttribute(){
        if($this->attributes['old_price'] == null || $this->attributes['old_price'] == 0){
            $off = 0;
        }else{
            $off = ($this->attributes['old_price'] - $this->attributes['price'])*100/$this->attributes['old_price'];
        }
        return round($off);
    }

    public function getCalcuteAttribute(){
        $set = Setting::first();
        if ($set->black_friday == 1){
            $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->whereNotNull('old_price')->whereNotNull('price')->first();
            if (!$prices){
                $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();

            }
        }
        else{
            $prices = Price::where('black_friday',0)->where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();

        }
        $prcies_specification = ProductSpecification::whereHas('prices')->orderBy('id','DESC')->where('product_id',$this->attributes['id'])->first();
        if($prices && (@$prcies_specification->prices[0]->price == 0)){
            if($prices->old_price == null || $prices->old_price == 0){
                $off = 0;
            }else{
                $off = ($prices->old_price - $prices->price)*100/$prices->old_price;
            }
            return round($off);
        }elseif($prcies_specification) {
            if($prcies_specification->prices[0]->old_price == null || $prcies_specification->prices[0]->old_price == 0){
                $off = 0;

            }else{
                $off = ($prcies_specification->prices[0]->old_price - $prcies_specification->prices[0]->price) * 100/$prcies_specification->prices[0]->old_price;

            }
            return round($off);
        }
    }

    public function getProImageAttribute(){
        $thumbnail = Image::where('product_id',$this->attributes['id'])->show()->whereNotNull('file')->first();
        $product_image = Image::where('product_id',$this->attributes['id'])->whereNotNull('file')->first();


        if($thumbnail){
            return file_exists('assets/uploads/content/pro/big/'.@$thumbnail->file) ? asset('assets/uploads/content/pro/big/'.@$thumbnail->file) :asset('assets/site/images/notfound.png');
        }elseif($product_image){
            return file_exists('assets/uploads/content/pro/big/'.@$product_image->file) ? asset('assets/uploads/content/pro/big/'.@$product_image->file) :asset('assets/site/images/notfound.png');
        }else{
            return asset('assets/site/images/notfound.png');
        }
    }


    public function scopeSpecial($query)
    {
        $records = $query->whereSpecial('1');
        return $records;
    }

    public function scopeactive($query)
    {
        $records = $query->whereStatus('1');
        return $records;
    }


    public function brands()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }


    public function sp()
    {
        return $this->hasMany('App\Models\ProductSpecification', 'product_id')->orderBy('sort','ASC')->with('prices');
    }
    public function pro_sp()
    {
        return $this->hasMany('App\Models\ProductSpecification', 'product_id')->orderBy('sort','ASC');
    }
    public function sprcificationstock()
    {
        return $this->hasMany('App\Models\ProductSpecification', 'product_id')->orderBy('sort','ASC')->whereHas('prices');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','product_category');
    }
    public function cats()
    {
        return $this->belongsToMany('App\Models\Category','product_category')->orderBy('id','desc');
    }
    public function category()
    {
        return $this->belongsToMany('App\Models\Category','product_category')->whereDoesntHave('childs')->orderBy('id','desc');
    }

    public function assignCategory($role)
    {
        return $this->categories()->attach($role);
    }

    public function deleteCategory($role)
    {
        return $this->categories()->detach($role);
    }


    public function specifications()
    {
        return $this->belongsToMany('App\Models\ProductSpecificationType',
            'product_specifications', 'product_id', 'product_specification_value_id')
            ->withPivot('product_specification_type_id', 'description', 'price', 'id')->whereNull('product_specifications.deleted_at')->withTimestamps();
    }


//    public function color()
//    {
//        return $this->belongsToMany('App\Models\ProductSpecificationType',
//            'product_specifications', 'product_id', 'product_specification_value_id')
//            ->withPivot('product_specification_type_id', 'description', 'price', 'id','color')->whereNull('product_specifications.deleted_at')->withTimestamps();
//    }


    public function colors()
    {
        return $this->hasMany('App\Models\ProductSpecification','product_id', 'id')
            ->whereHas('pricesAdmin')->orderBy('sort','ASC');
    }
    public function img()
    {
        return $this->belongsToMany('App\Models\ProductSpecificationType',
            'product_specifications', 'product_id', 'product_specification_value_id')
            ->withPivot('product_specification_type_id', 'description', 'price', 'id','color','image')->whereNull('product_specifications.deleted_at')->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'Commentable')->whereNull('parent_id');
    }

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
    public function prices()
    {
        $set = Setting::first();
        if ($set->black_friday == 1){
            return $this->morphMany('App\Models\Price', 'Priceable')->orderBy('id','DESC');
        }
        else{
            return $this->morphMany('App\Models\Price', 'Priceable')->where('black_friday',0)->orderBy('id','DESC');

        }
    }
    public function images()
    {
        return $this->hasMany('App\Models\Image', 'product_id')->whereNull('product_specification_id');
    }
    public function image()
    {
        return $this->hasMany('App\Models\Image', 'product_id')->Show()->take(1)->orderby('id','DESC');
    }
    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'Likeable')->orderBy('id','DESC');
    }

    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem', 'product_id','id');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\OrderItem', 'product_id')->where('order_item_status_id',5);
    }

}
