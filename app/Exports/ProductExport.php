<?php

namespace App\Exports;


use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Content;
use App\Models\Inventory;
use App\Models\InventoryReceipt;
use App\Models\InventoryType;
use App\Models\Message;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromArray
{
    public function array(): array
    {
        $data = Product::get();
//        $data =  $data->toArray();

        $data_array = [];
        foreach ($data as $row) {


            $brand = Brand::where('id',@$row['brand_id'])->first();
          $category = '';
          foreach($row->categories as $row2){
              $category .= $row2->title;
          }
            $data_array[] = [

                "کد" => @$row['id'],
                "عنوان" =>@$row['title'],
                "دسته" =>$category,
                "برند" =>@$brand->title,
                "بارکد" =>@$row['barcode'],

            ];
        }

        return [
      ['کد', 'عنوان ', 'دسته', 'برند','بارکد'],
           $data_array
        ];
    }
}

