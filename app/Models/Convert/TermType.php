<?php

namespace App\Models\Convert;

use Illuminate\Database\Eloquent\Model;

class TermType extends Model
{
    protected $table = 'wp_term_taxonomy';



    public function productsRel()
    {
        return $this->hasMany('App\Models\Convert\TermRelation', 'term_taxonomy_id','term_taxonomy_id');
    }

    public function metas()
    {
        return $this->hasMany('App\Models\Convert\TermMeta', 'term_id','term_taxonomy_id');
    }


    public function metasColor()
    {
        return $this->hasMany('App\Models\Convert\TermMeta', 'term_id','term_taxonomy_id')->where('meta_value','LIKE','%#%');
    }



}
