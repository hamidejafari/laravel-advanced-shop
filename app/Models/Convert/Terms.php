<?php

namespace App\Models\Convert;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    protected $table = 'wp_terms';



    public function types()
    {
        return $this->hasMany('App\Models\Convert\TermType', 'term_id','term_id')
            ->where('taxonomy','product_cat')
            ->where('parent',137);
    }


    public function typesBrand()
    {
        return $this->hasMany('App\Models\Convert\TermType', 'term_id','term_id')
            ->where('taxonomy','brand');
    }

}
