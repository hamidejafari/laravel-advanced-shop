<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Bell;


use Classes\Helper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class BellController extends Controller
{



    public function get(Request $request)
    {
        $query = Bell::query();
        if($request->get('name')){
            $query->whereHas('product',function (Builder $query2)use($request) {
                $query2->where('title' , 'LIKE', '%' . $request->get('name') . '%');
            });

        }
        if ($request->get('status')) {
            $query->where('status', $request->get('status'));
        }

        $data =  $query->orderBy('id','DESC')->paginate(100);
        return View('admin.bell.index')

            ->with('data', $data);
    }
    public function getDelete($id)
    {

        $content = Bell::find($id);

        Bell::destroy($id);
        return Redirect::action('Admin\BellController@get')->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');

    }


}
