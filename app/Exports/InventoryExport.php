<?php

namespace App\Exports;


use App\Models\City;
use App\Models\Content;
use App\Models\Inventory;
use App\Models\InventoryReceipt;
use App\Models\InventoryType;
use App\Models\Message;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class InventoryExport implements FromArray
{
    public function array(): array
    {
        $data = InventoryReceipt::get();
        $data       =  $data->toArray();

        $data_array = [];
        foreach ($data as $row) {
            $product = Product::where('id',$row['product_id'])->first();
            $inventory = Inventory::where('id',$row['inventory_id'])->first();
            $inventoryType = InventoryType::where('id',$row['inventory_type_id'])->first();
            $data_array[] = [

                "محصول" =>@$product->title,
                "انبار" =>@$inventory->title,
                "تعداد" =>@$row["count"],
                "نوع" =>@$inventoryType->title,
            ];
        }
        return [
      ['محصول', 'انبار ', 'تعداد', 'نوع'],
           $data_array
        ];
    }
}

