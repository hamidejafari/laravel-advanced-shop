<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Logs;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DiscountController extends Controller
{
    public function getIndex()
    {
        $data = Discount::orderby('id','DESC')->paginate(100);
        return View('admin.discounts.index')
            ->with('data', $data);
    }
    public function getAdd()
    {
        $categories = Category::whereNotNull('parent_id')->get();
        $products = Product::all();
        return View('admin.discounts.add')
            ->with('products', $products)
            ->with('categories', $categories);

    }


    public  function postAdd(Request $request) {
        $input = $request->all();
            $date = explode('/', $request->get('from_date'));

            $s = jmktime(0, 0, 0, $date[1], $date[0], $date[2]);
            $x = \Carbon\Carbon::createFromTimestamp($s)->toDateTimeString();



            $date1 = explode('/', $request->get('to_date'));
            $s = jmktime(0, 0, 0, $date1[1], $date1[0], $date1[2]);
            $y = \Carbon\Carbon::createFromTimestamp($s)->toDateTimeString();


        $discounts = [];
        if ($request->get('kind') == 1)
        {
            for ($i = 1; $i <= $input['count']; $i++) {
                $discounts[] = [
                    'type' => $input['type'],
                    'amount' => $input['amount'],
                    'from_date' => $x,
                    'to_date' => $y,
                    'category_id' => $input['category_id'],
                    'product_id' => $input['product_id'],
                    'kind' => $input['kind'],
                    'title' => $request->get('title'),
                    'description' => $request->get('description'),
                    'code' => $this->generateRandomString(),
                    'count'=>1,
                ];
            }
            $discounts = Discount::insert($discounts);
        }
        elseif($request->get('kind') == 2)
        {
            $discounts = Discount::create ([
                'type' => $input['type'],
                'amount' => $input['amount'],
                'from_date' => $x,
                'to_date' => $y,
                'category_id' => $input['category_id'],
                'product_id' => $input['product_id'],
                'kind' => $input['kind'],
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'code' => $request->get('title'),
                'count'=>$request->get('count'),
            ]);
        }
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),'discount');

        return Redirect::action('Admin\DiscountController@getIndex')
            ->with('success', 'آیتم جدید اضافه شد.');
    }
    public function getEdit($id)
{
    $categories = Category::whereNotNull('parent_id')->get();
    $products = Product::get();
    $data = Discount::find($id);
    $user = User::all();
    return view('admin.discounts.edit')
        ->with('data',$data)
        ->with('user',$user)
        ->with('products',$products)
        ->with('categories', $categories);
}

    public function postEdit($id , Request $request)
    {
        $input = $request->all();
        $dis = Discount::find($id);
        $dis->update([
            'user_id'=>$request->get('user_id'),
            'show_panel'=>$request->get('show_panel'),
            'description'=>$request->get('description')
        ]);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$dis->id);
        return Redirect::action('Admin\DiscountController@getIndex')->with('success', 'آیتم جدید اضافه شد.');
    }



    public  function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function postDelete(Request $request)
    {
        $discounts = Discount::find($request['deleteId']);
        foreach($discounts as $discount)
        {
            $array = array($discount);
            $serialized_array = serialize($array);

            $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$discount->id);
            $discount->delete();
        }
        return Redirect::action('Admin\DiscountController@getIndex')
            ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
    }



}
