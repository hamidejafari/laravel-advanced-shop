<?php

namespace App\Exports;


use App\Models\Contact;
use App\Models\Content;
use App\Models\Message;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactExport implements FromArray
{
    public function array(): array
    {
        $data = Contact::get();
        $data       =  $data->toArray();

        $data_array = [];
        foreach ($data as $row) {

            $data_array[] = [

                "نام" =>$row["name"],
                " موضوع"=>$row["subject"],
                "متن پیام" =>$row["message"],
                "ایمیل" =>$row["email"],
                "تلفن" =>$row["phone"],

            ];
        }
        return [
      ['نام', 'موضوع', 'متن پیام', 'ایمیل', 'تلفن',],
           $data_array
        ];
    }
}

