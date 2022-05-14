<?php

namespace App\Models\Convert;

use Illuminate\Database\Eloquent\Model;

class TermRelation extends Model
{
    protected $table = 'wp_term_relationships';

    public function termCat()
    {
        return $this->hasMany('App\Models\Convert\TermType', 'term_taxonomy_id','term_taxonomy_id')
            ->where('taxonomy','product_cat');
    }
    public function termBrand()
    {
        return $this->hasMany('App\Models\Convert\TermType', 'term_taxonomy_id','term_taxonomy_id')
            ->where('taxonomy','brand');
    }
}
