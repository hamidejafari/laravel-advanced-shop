<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CommentExport;
use App\Http\Requests\ComRequest;
use App\Library\Logs;
use App\Models\Comments;

use App\Models\Content;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Classes\UploadImg;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\Excel as MaatExcel;


class CommentController extends Controller
{
    public function getIndex(Request $request)
    {

        $data = Comment::orderby('id','DESC')->paginate(100);
        $status = [
            '1' => 'تایید شده',
            '0' => 'عدم تایید',
        ];
        return View('admin.comment.index')
            ->with('status', $status)
            ->with('data', $data);

    }
    public function getEdit($id)
    {

        $data = Comment::find($id);
        $status = [
            '1' => 'تایید شده',
            '0' => 'عدم تایید',
        ];


        return View('admin.comment.edit')
            ->with('data', $data)
            ->with('status', $status);


    }
    public function postEdit($id, Request $request)
    {

        $input = $request->all();
        $comments = Comment::find($id);



        $comments->update($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$comments->id);
        return Redirect::action('Admin\CommentController@getIndex')
            ->with('success', 'آیتم مورد نظر با موفقیت ویرایش شد.');
    }
    public function postDelete(Request $request)
    {
        if (Comment::destroy($request->get('deleteId'))) {

            return Redirect::action('Admin\CommentController@getIndex')
                ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
        }

    }
    public function getDelete($id)
    {

        $content = Comment::find($id);
        $array = array($content);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        Comment::destroy($id);
        return Redirect::action('Admin\CommentController@getIndex')->with('success', 'کد مورد نظر با موفقیت حذف شدند.');

    }
    public function getTrash(Request $request)
    {

        $data = Comment::orderby('id','DESC')->withTrashed()->whereNotNull('deleted_at')->paginate(100);
        $status = [
            '1' => 'تایید شده',
            '0' => 'عدم تایید',
        ];
        return View('admin.comment.trash')
            ->with('status', $status)
            ->with('data', $data);

    }


}
