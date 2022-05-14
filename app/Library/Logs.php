<?php

namespace App\Library;
use App\Models\Content;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class Logs
{

    public static function log($action,$datas,$user_id,$related)
    {
        $log = Log::create([
            'action' => $action,
            'data' => $datas,
            'user_id' => $user_id,
            'related' => $related,



        ]);
    }
}
