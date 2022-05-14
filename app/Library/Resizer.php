<?php
namespace app\Library;

class resizer {

    public static function resizePic($main, $copy, $w, $h, $ext, $delete = false) {

        list($w_orig, $h_orig) = getimagesize($main);
        $scale_ratio = $w_orig / $h_orig;
        if(($w / $h) > $scale_ratio) {
            $w = $h * $scale_ratio;
        } else {
            $h = $w / $scale_ratio;
        }
        $img = "";
        $ext = strtolower($ext);
        if($ext == "gif") {
            $img = imagecreatefromgif($main);
        } else {
            if($ext == "png") {
                $img = imagecreatefrompng($main);
            } else {
                $img = imagecreatefromjpeg($main);
            }
        }
        $tci = imagecreatetruecolor($w, $h);
        imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
        imagejpeg($tci, $copy, 80);
        if($delete) unlink($main);
    }
}
