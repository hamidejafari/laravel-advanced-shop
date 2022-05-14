<?php

namespace Classes;

use App\Models\Content;
use Carbon\Carbon;
use Hamcrest\Core\IsNull;

class Usetype
{

    public static function getusertype($usertype){
        if($usertype=='0'){
        return "مرکز";
        }
        elseif($usertype=='1'){
            return "کاربر";
    }


        }
    }


