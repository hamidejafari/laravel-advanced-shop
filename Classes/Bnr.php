<?php

namespace Classes;

use App\Models\Content;
use Carbon\Carbon;
use Hamcrest\Core\IsNull;

class Bnr
{

    public static function getShowLocation($loc){
        if($loc=='0'){
        return "زیر اسلایدر سمت راست";
        }
        if($loc=='1'){
            return "زیر اسلایدر وسط";
        }
        elseif($loc=='2'){
            return "زیر اسلایدر چپ ";
        }
        elseif($loc=='3'){
            return "پایین صفحه";
        }

    }
}


