<?php

namespace App\Exports;


use App\Models\Order;
use App\Models\Product;
use App\Models\Category;


use App\Models\ProductCategory;

use App\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Builder;

class UserExport implements FromArray
{
    function __construct($request2) {
        $this->request2 = $request2;
    }
    public function array(): array
    {
        $data = User::where('admin','<>','1')->get();
        $request = $this->request2;

        $query = User::query();
        if ($request->get('name')) {
            $query->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }
        if ($request->get('family')) {
            $query->where('family', 'LIKE', '%' . $request->get('family') . '%');
        }
        if ($request->get('mobile')) {
            $query->where('mobile', 'LIKE', '%' . $request->get('mobile') . '%');
        }
        if ($request->get('email')) {
            $query->where('email', 'LIKE', '%' . $request->get('email') . '%');
        }
        if ($request->get('gender')) {
            $query->where('gender', $request->get('gender'));
        }
        if ($request->get('start') and $request->get('end')) {

            $start = explode('/', $request->get('start'));
            $end = explode('/', $request->get('end'));

            $s = jmktime(0, 0, 0, $start[1], $start[0], $start[2]);
            $e = jmktime(0, 0, 0, $end[1], $end[0], $end[2]);

            $query->whereBetween('created_at', array($s, $e));
        }








        $data = $query->where('admin','<>','1')->get();

        $data_array = [];
        foreach ($data as $user) {



            $data_array[] = [
                "نام" =>@$user->name,
                "نام خانوادگی" =>@$user->family,
                "ایمیل" =>@$user->email,
                "تلفن" =>@$user->mobile,
                "جنسیت" =>$user->gender == 1 ? 'مذکر':'مونث' ,

            ];
        }
        return [
            [
                'نام' ,
                'نام خانوادگی',
                'ایمیل',
                'تلفن',
                'جنسیت',
            ],
            $data_array
        ];
    }
}
