<?php

namespace App\Models\Convert;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'wp_posts';

    protected $fillable = [
        'converted','post_content'
    ];


    public function categories()
    {
        return $this->hasMany('App\Models\Convert\TermRelation', 'object_id','ID')->where('term_taxonomy_id',208);
    }
}
