<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Logs;
use App\Models\City;
use App\Models\Content;
use App\Models\Product;
use App\Models\Question;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller
{



    public function get($id)
    {
        $questions = Question::where('product_id',$id)->paginate(100);
        $product = Product::where('id',$id)->first();
        return View('admin.question.index')
            ->with('questions', $questions)
            ->with('product', $product)
            ->with('id',$id);
    }

    public function getAdd($id)
    {
        $questions = Question::where('product_id',$id)->get();
        return View('admin.question.add')
            ->with('id',$id)
            ->with('questions', $questions);


    }
    public function getFaq()
    {
        $questions = Question::whereNull('product_id')->paginate(100);
        return View('admin.question.index2')
            ->with('questions', $questions);
    }

    public function getAddFaq()
    {

        return View('admin.question.add2');


    }

    public function postAdd(Request $request)
    {
        $input = $request->all();
        $arr = [];
        foreach ($input['question'] as $key=>$item){

            if ($item != null && $input['answer'][$key] !== null ){

            $arr[] = [

                'question'=>$item,
                'answer'=>@$input['answer'][$key],
                'product_id'=>@$input['product_id']
            ];
            }
        }

        $question = Question::insert($arr);
        $serialized_question = serialize($arr);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$serialized_question);
        if ($input['product_id'] != null) {
            return Redirect::action('Admin\QuestionController@get', $input['product_id'])->with('success', 'کدهای مورد نظر با موفقیت اضافه شدند.');
        }else{
                return \redirect('/admin/questions/')->with('success','آیتم موردنظر با موفقیت ثبت شد.');
            }
        }

    public function getEdit($id)
    {

        $data = Question::find($id);
        return View('admin.question.edit')
            ->with('id',$id)
            ->with('data', $data);
    }

    public function postEdit($id, Request $request)
    {
        $input = $request->all();
        $question = Question::find($id);
        $question->update($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$question->id);
        if ($question->product_id != null){
        return \redirect('/admin/question/'.$question->product_id)->with('success','آیتم موردنظر با موفقیت ثبت شد.');
        }
        else{
            return \redirect('/admin/questions/')->with('success','آیتم موردنظر با موفقیت ثبت شد.');
        }
    }
    public function getDelete($id)
    {

        $content = Question::find($id);
        $array = array($content);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        Question::destroy($id);
        return Redirect::back()
            ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');

    }
    public function postDelete(Request $request)
    {
        $orders = Question::find($request['deleteId']);
        foreach($orders as $order)
        {
            $array = array($order);
            $serialized_array = serialize($array);

            $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$order->id);
            $order->delete();
        }

            return Redirect::back()
                ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');


    }
    public function getQa()
    {
        $questions = Question::orderby('id','desc')->whereNotNull('product_id')->whereNull('answer')->paginate(100);
        return View('admin.faq.index')
            ->with('questions', $questions);
    }
    public function getEditQa($id)
    {

        $data = Question::find($id);
        return View('admin.faq.edit')
            ->with('id',$id)
            ->with('data', $data);
    }
    public function postEditQa($id, Request $request)
    {
        $input = $request->all();
        $question = Question::find($id);
        $question->update($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$question->id);

            return \redirect('/admin/faq/')->with('success','آیتم موردنظر با موفقیت ثبت شد.');

    }
}
