<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ContactExport;
use App\Exports\MessageExport;
use App\Library\Logs;
use App\Models\Comments;

use App\Models\Contact;
use App\Models\Content;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Classes\UploadImg;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\Excel as MaatExcel;


class ContactController extends Controller
{
    public function getIndex(Request $request)
    {
//        $query = Contact::query();
//        if ($request->has('search')) {
//            if ($request->has('title')) {
//                $query->where('title', 'LIKE', '%' . $request->get('title') . '%');
//            }
//            if ($request->has('id')) {
//                $query->where('id', $request->get('id'));
//            }
//
//        }
//        $data = $query->latest()->paginate(15);
//
//        $all = Contact::whereStatus(1)->orderby('listorder', 'ASC')->get();

        $data = Contact::paginate(100);
        return View('admin.contact.index')
            ->with('data', $data);


    }
    public function getTrash(Request $request)
    {
//        $query = Contact::query();
//        if ($request->has('search')) {
//            if ($request->has('title')) {
//                $query->where('title', 'LIKE', '%' . $request->get('title') . '%');
//            }
//            if ($request->has('id')) {
//                $query->where('id', $request->get('id'));
//            }
//
//        }
//        $data = $query->latest()->paginate(15);
//
//        $all = Contact::whereStatus(1)->orderby('listorder', 'ASC')->get();

        $data = Contact::orderby('id','DESC')->withTrashed()->whereNotNull('deleted_at')->paginate(100);
        return View('admin.contact.trash')
            ->with('data', $data);


    }

    public function postEdit($id, Request $request)
    {

        $input = $request->all();
        $contacts = Contact::find($id);
        $input['readat'] = '1';


        $contacts->update($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$contacts->id);
        return Redirect::action('Admin\ContactController@getIndex')
            ->with('success', 'آیتم مورد نظر با موفقیت ویرابش شد.');
    }
    public function getDelete($id)
    {
        $content = Contact::find($id);
        $array = array($content);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        Contact::destroy($id);
        return Redirect::back()->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');

    }

}
