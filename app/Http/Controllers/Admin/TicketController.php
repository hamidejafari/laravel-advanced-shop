<?php

namespace App\Http\Controllers\Admin;

use App\Classes\UploadImg;
use App\Http\Controllers\Controller;
use App\Library\Logs;
use App\Models\Brand;
use App\Models\InventoryReceipt;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TicketController extends Controller
{
    public function ticketsList()
    {
        $data = Ticket::whereNull('parent_id')->orderBy('id','DESC')->paginate(100);
        return view('admin.ticket.list')->with('data' , $data);
    }

    public function ticketDetail($id)
    {
        $start = Ticket::find($id);
        $end = Ticket::where('parent_id' , $id)->orderBy('created_at')->get();
        return view('admin.ticket.detail')
            ->with('start' , $start)
            ->with('end' , $end);
    }

    public function ticketStatus($id){
        $ticket = Ticket::find($id);
        $ticket->update(['status'=>2]);
        $array = array($ticket);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$ticket->id);
        return Redirect::action('Admin\TicketController@ticketsList')->with('success','  با موفقیت ثبت شد.');
    }
    public function addReply(Request $request){
        $input = $request->all();

        $start = Ticket::where('id',$request->parent_id)->first();
        $input['user_id'] = Auth::id();
        $input['parent_id'] = $request->get('parent_id');
        $input['message'] = $request->get('message');
        $input['subject'] = $start->subject;
        $input['department_id'] = $start->department_id;
        $input['status'] = 1;
        if ($request->hasFile('file')) {
            $pathMain = "assets/uploads/content/ticket";
            $extension = $request->file('file')->getClientOriginalName();
            $fileName = random_int(1000 , 9999). "$extension";
            $request->file('file')->move($pathMain, $fileName);
            $input['file'] = $fileName;
        }
        $ticket = Ticket::create($input);
        $start->update([
            'status'=>1
        ]);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$ticket->id);

        return redirect()->back()->with('success','پیام شما با موفقیت ثبت شد.');
    }
    public function ticketReturn($id){
        $ticket = Ticket::find($id);
        $order_item=OrderItem::find($ticket->order_item_id);
        $order_item->update(['order_item_status_id'=>5]);
       InventoryReceipt::create([
           'product_id'=>$order_item->product_id,
           'inventory_id'=>1,
           'inventory_type_id'=>1,
           'status'=>1,
           'count'=>$order_item->quantity
       ]);

        $ticket->update(['status'=>3]);
        $array = array($ticket);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$ticket->id);
        return Redirect::action('Admin\TicketController@ticketsList')->with('success','  با موفقیت ثبت شد.');
    }
}
