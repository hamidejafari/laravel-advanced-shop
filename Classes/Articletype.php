<?php

namespace Classes;

use App\Models\Content;
use Carbon\Carbon;
use Hamcrest\Core\IsNull;

class Articletype
{

    public static function getarticletype($kind){
        if($kind =='1'){
        return "مقاله";
        }
        elseif($kind =='2'){
            return "خبر";
    }


        }
    }


