<?php

namespace App\Library;
use App\Models\Content;

class SliderBanner
{

    public static function Banner()
    {
        $banner_sliders = Content::orderby('sort','ASC')->Banner()->get();
        $banners= [
            'above'=>[],
            'mid'=>[],
            'below'=>[]
        ];
        foreach ($banner_sliders as $banner_slider ){
            if($banner_slider->content_type == 3){
                if (count($banners['above']) < 4){
                $banners['above'][] = [
                    'id'=>@$banner_slider->id,
                    'title'=> @$banner_slider->title,
                    'url' => @$banner_slider->url,
                    'link' => @$banner_slider->link,
                    'image' => @$banner_slider->image,
                    'description' => @$banner_slider->description,
                ];
            }
            }
            elseif($banner_slider->content_type == 6){
                $banners['mid'][] = [
                    'id'=>@$banner_slider->id,
                    'title'=> @$banner_slider->title,
                    'url' => @$banner_slider->url,
                    'link' => @$banner_slider->link,
                    'image' => @$banner_slider->image,
                    'description' => @$banner_slider->description,
                ];
            }
            elseif($banner_slider->content_type == 7){
                $banners['below'][] = [
                    'id'=>@$banner_slider->id,
                    'title'=> @$banner_slider->title,
                    'url' => @$banner_slider->url,
                    'link' => @$banner_slider->link,
                    'image' => @$banner_slider->image,
                    'description' => @$banner_slider->description,
                ];
            }


        }

        return $banners;
    }
    public static function Mobile()
    {
        $banner_mobiles = Content::orderby('sort','ASC')->Mobile()->get();
        $mobiles= [

            'mid'=>[],
            'below'=>[],
            'main'=>[]
        ];
        foreach ($banner_mobiles as $banner_mobile ){

            if($banner_mobile->content_type == 8){
                $mobiles['mid'][] = [
                    'id'=>@$banner_mobile->id,
                    'title'=> @$banner_mobile->title,
                    'url' => @$banner_mobile->url,
                    'link' => @$banner_mobile->link,
                    'image' => @$banner_mobile->image,
                    'description' => @$banner_mobile->description,
                ];
            }
            elseif($banner_mobile->content_type == 9){
                $mobiles['below'][] = [
                    'id'=>@$banner_mobile->id,
                    'title'=> @$banner_mobile->title,
                    'url' => @$banner_mobile->url,
                    'link' => @$banner_mobile->link,
                    'image' => @$banner_mobile->image,
                    'description' => @$banner_mobile->description,
                ];
            }
            elseif($banner_mobile->content_type == 11){
                $mobiles['main'][] = [
                    'id'=>@$banner_mobile->id,
                    'title'=> @$banner_mobile->title,
                    'url' => @$banner_mobile->url,
                    'link' => @$banner_mobile->link,
                    'image' => @$banner_mobile->image,
                    'description' => @$banner_mobile->description,
                ];
            }


        }

        return $mobiles;
    }
}
