<?php
namespace App\Library;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use SoapClient;

class Sms2
{

    static function send($mobile, $text, $verification = false)
    {
        $client = new SoapClient('http://212.16.76.90/ws/sms.asmx?wsdl');
        $param = array('requestData'=>
            '<xmsrequest>
                <userid>61018</userid>
                <password>F0rd465$</password>
                <action>smssend</action>
                <body>
                    <type>oto</type>
                    <recipient mobile="' . $mobile . '" originator="5000577">' . $text . '</recipient>
                </body>
            </xmsrequest>');
        $y =  $client->XmsRequest($param);
        dd($y);
    }
}
