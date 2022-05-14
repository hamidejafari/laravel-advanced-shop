<?php

namespace App\Library;
use App\Models\RelateData;

class Relate
{
    public static function relates($relate_data,$data_id,$data_type,$type,$edit){
        $data = [];
        foreach($relate_data as $row){
            $item_ex = explode('|',$row);
            $data[]=[
                'datable_type'=>$data_type,
                'datable_id'=>$data_id,
                'type'=>$type,
                'relatable_type'=>$item_ex[0],
                'relatable_id'=>$item_ex[1]
            ];

        }
        if($edit == true){
            $relate = RelateData::where('datable_id',$data_id)->where('datable_type',$data_type)->where('type',$type)->delete();
        }
        RelateData::insert($data);
        return true;
    }

    public static function relateData($data_id,$data_type){

        $arr = [];
        $relate = RelateData::where('datable_id',$data_id)->where('datable_type',$data_type)->get();
        foreach($relate as $item){
            $arr[] = $item->relatable_type.'|'.$item->relatable_id.'|'.$item->type;
        }
        return $arr;
    }

    public static function allRelate($id , $type, $t)
    {
        $array = [];
        $relate = RelateData::where('datable_id',$id)->where('datable_type' , $type)->where('type' , $t)->get();
        foreach ($relate as $row)
        {
            $array[] = [
                'id'=>@$row->relatable->id,
                'title'=>@$row->relatable->title,
                'type'=>@$row->relatable_type,
                'content_type'=>@$row->relatable->type_id,
                'price'=>@$row->relatable->price_first['price'],
                'old'=>@$row->relatable->price_first['old'],
                'image'=>@$row->relatable->image[0]->file,
                'calcute'=>$row->relatable->calcute,
                'color'=>$row->relatable->color,

            ];
        }
        return collect($array)->sortByDesc('created_at') ;
    }

    public static function allRelateUnique($id , $type , $arr)
    {
        $array = [];
        $relate = RelateData::where('datable_id',$id)->where('datable_type' , $type)->get();
        foreach ($relate as $row)
        {
            $arr[] = [
                'id'=>@$row->relatable->id,
                'title'=>@$row->relatable->title,
                'url'=>@$row->relatable->id,
                'type'=>@$row->relatable_type,
                'content_type'=>@$row->relatable->type_id,
                'price'=>@$row->relatable->price,
                'image'=>@$row->relatable->image,
                'images'=>@$row->relatable->images[0]->image,
                'parent'=>@$row->relatable->categories->id,
                'created_at'=>$row->id
            ];
        }
        return collect($arr)->sortByDesc('created_at') ;

    }
}
