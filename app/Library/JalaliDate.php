<?php
namespace app\Library;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class JalaliDate
{

    public static function jCurrentDateAndTime()
    {
        $date = jdate('H:i:s') . " | " . jdate('Y/n/j');
        return $date;
    }
    public static function jCurrentDate($format=null)
    {
        if(is_null($format)){
            $date = jdate('Y/n/j');
        }else{
            $date = jdate($format);
        }
        return $date;
    }

    public static function jGetDate($ts = '')
    {
        return jgetdate($ts);
    }

    public static function dateShow($time = null, $format='Y/m/d')
    {

        if ($time == null)
            return jdate($format, time());
        else
            return jdate($format, $time);
    }

    public static function fDate($y, $m, $d=1, $format='Y/m/d', $lang='en')
    {
        $time = strtotime(jalali_to_gregorian($y,$m,$d,'-'));
        return jdate($format, $time, '', '', $lang);
    }

    public static function jalaliToGregorian($date, $delimiter = '-')
    {
        $dateArray = explode("/", $date);

        return jalali_to_gregorian($dateArray[0], $dateArray[1], $dateArray[2], $delimiter);
    }

    public static function jalaliToGregorian2($y, $m, $d=1, $delimiter = '-')
    {
        return jalali_to_gregorian($y, $m, $d, $delimiter);
    }

    public static function jalaliToGregorianRevers($date, $delimiter = '-')
    {
        $dateArray = explode("/", $date);

        return jalali_to_gregorian($dateArray[2], $dateArray[1], $dateArray[0], $delimiter);
    }

    public static function GregorianToJalali($date, $delimiter = '/')
    {

        $cDate = Carbon::parse($date);

        return gregorian_to_jalali($cDate->year, $cDate->month, $cDate->day, $delimiter);

    }

    public static function jTS($jm='',$jd='',$jy='',$jh=0,$ji=0,$js=0){
        return jmktime($jh, $ji, $js, $jm, $jd, $jy);
    }

    public static function getMonthlyRange($ts)
    {

        $arrJalali = jgetdate($ts);

        $startMonth = intval($arrJalali['mon']);

        $endMonth = $startMonth < 12 ? $startMonth + 1 : 1;

        $startYear = intval($arrJalali['year']);

        $endYear = $startMonth < 12 ? $startYear : $startYear + 1;

        $start_date = jmktime(0, 0, 0, $startMonth, 1, $startYear);

        $end_date = jmktime(0, 0, 0, $endMonth, 1, $endYear);

        return ['start_date' => $start_date,
            'end_date' => $end_date];
    }

    public static function getCurrentMonth($currentMonth = 0, $justMonth = true)
    {
        date_default_timezone_set('Asia/Tehran');

        $arrJalali = jgetdate(strtotime(date('Y/m/d')));

        $month = intval($arrJalali['mon']);

        $pre_month = 1;
        $year = $arrJalali['year'];

        if ($month <= $currentMonth) {
            $pre_month = 12 - ($currentMonth - $month);
            $year--;
        } else {
            $pre_month = $month - $currentMonth;
        }

        if ($justMonth) {
            $next_month = $pre_month + 1;
        } else {
            $next_month = $month;
        }
        $start_date = jmktime('0', '0', '0', $pre_month, '1', $year);

        //$next_date = jmktime('0', '0', '0', $next_month, '1', $arrJalali['year']);
        //$end_date = strtotime('-1 day', $next_date);
        if ($next_month == 13) {
            $end_date = jmktime('0', '0', '0', 1, '1', $year + 1);


        } else {
            $end_date = jmktime('0', '0', '0', $next_month, '1', $year);

        }

        return ['start_date' => $start_date,
            'end_date' => $end_date];
    }

    public static function ydm()
    {
        $time = time();
        $y = jdate('13y', $time, '', '', 'en');
        $m = jdate('m', $time, '', '', 'en');
        $d = jdate('d', $time, '', '', 'en');
        $date = [
            'y' => $y,
            'm' => $m,
            'd' => $d
        ];
//        Log::info($date);
        return $date;
    }

    public static function current_date($back = 0)
    {

        $time = time() - ($back * 86400);
        $y = jdate('13y', $time);
        $m = jdate('m', $time);
        $d = jdate('d', $time);

        $y_1 = jdate('13y', $time + (1 * 86400));
        $m_1 = jdate('m', $time + (1 * 86400));
        $d_1 = jdate('d', $time + (1 * 86400));

        $date['start'] = jmktime(0, 0, 0, $m, $d, $y);
        $date['end'] = jmktime(0, 0, 0, $m_1, $d_1, $y_1);

        return $date;
    }
}