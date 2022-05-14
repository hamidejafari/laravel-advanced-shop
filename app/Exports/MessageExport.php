<?php

namespace App\Exports;


use App\Models\Content;
use App\Models\Message;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class MessageExport implements FromArray
{
    public function array(): array
    {
        $data = Message::get();
        $data       =  $data->toArray();

        $data_array = [];
        foreach ($data as $row) {
            $content = Product::where('id',$row['messageable_id'])->first();
            $data_array[] = [

                "نام" =>$row["name"],
                "تلفن" =>$row["phone"],
                "متن پیام" =>$row["message"],
                "متعلق به" =>$content["title"],
            ];
        }
        return [
      ['نام', 'تلفن ', 'متن پیام', 'متعلق به'],
           $data_array
        ];
    }
}

