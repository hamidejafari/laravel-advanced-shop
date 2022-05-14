<?php

namespace App\Http\Controllers\Admin;

use App\Events\LogUserEvent;
use App\Exports\UserExport;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Library\Help;
use App\Library\Logs;
use App\Models\Address;
use App\Models\City;
use App\Models\Department;
use App\Models\Inventory;
use App\Models\Role;
use App\Models\State;
use App\Models\UserDept;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;



class UserController extends Controller
{
    public function getIndex(Request $request)
    {
        $query = User::query();
        $query->whereAdmin(1);
        $departments = Department::all();
        if ($request->has('search')) {

            if ($request->get('start') and $request->get('end')) {

                $start = explode('/', $request->get('start'));
                $end = explode('/', $request->get('end'));

                $s = jmktime(0, 0, 0, $start[1], $start[0], $start[2]);
                $e = jmktime(0, 0, 0, $end[1], $end[0], $end[2]);

                $query->whereBetween('created_at', array($s, $e));
            }

            if ($request->get('name')) {
                $query->where('name', 'LIKE', '%' . $request->get('name') . '%');
            }
            if ($request->get('family')) {
                $query->where('family', 'LIKE', '%' . $request->get('family') . '%');
            }
            if ($request->get('email')) {
                $query->where('email', 'LIKE', '%' . $request->get('email') . '%');
            }
            if ($request->get('department_id')) {
                $users=UserDept::where('department_id',$request->department_id)->pluck('user_id')->toArray();
                $query->whereIn('id', $users);

            }
        }

        $data = $query->paginate(15);

        return View('admin.user.index')
            ->with('departments', $departments)
            ->with('data', $data);
    }
    public function getIndex2(Request $request)
    {

        $query = User::query();
        $query->where('admin','<>','1');



            if ($request->get('start') and $request->get('end')) {

                $start = explode('/', $request->get('start'));
                $end = explode('/', $request->get('end'));

                $s = jmktime(0, 0, 0, $start[1], $start[0], $start[2]);
                $e = jmktime(0, 0, 0, $end[1], $end[0], $end[2]);

                $query->whereBetween('created_at', array(Carbon::createFromTimestamp($s), Carbon::createFromTimestamp($e)));
            }

            if ($request->get('name')) {
                $query->where('name', 'LIKE', '%' . $request->get('name') . '%');
            }
            if ($request->get('family')) {
                $query->where('family', 'LIKE', '%' . $request->get('family') . '%');
            }
            if ($request->get('email')) {
                $query->where('email', 'LIKE', '%' . $request->get('email') . '%');
            }
            if ($request->get('gender')) {
                $query->where('gender', $request->get('gender'));
            }


        $gender = [
            '1' => 'مذکر',
            '0' => 'مونث',
        ];

        $data = $query->orderBy('id','desc')->paginate(100);

        return View('admin.user.index2')

            ->with('gender', $gender)
            ->with('data', $data);
    }

    public function getAdd(Request $request)
    {

        $groups = Role::all();
        $groupsId = array();


        $status = [
            '1' => 'فعال',
            '0' => 'غیر فعال',
        ];
        $departments = Department::all();

        return View('admin.user.add')
            ->with('status', $status)
            ->with('departments', $departments)
            ->with('groups', $groups)
            ->with('groupsId', $groupsId);

    }


    public function postAdd(Request $request)
    {
        $input = $request->all();
        $input['admin'] = 1;
        $input['password'] = bcrypt($request->get('password'));
        $user = User::create($input);
        if ($request->has('group')) {
            $user->assignRole($request['group']);
        }
        $arr = [];

        if($request->has('department_id')){

            foreach($input['department_id'] as $item){
                $arr[] = [
                    'department_id'=>$item,
                    'user_id'=>$user->id,
                ];
            }

            UserDept::insert($arr);
        }
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$user->id);
        return Redirect::action('Admin\UserController@getIndex')->with('success', 'آیتم جدید اضافه شد.');
    }

    public function getEdit($id, Request $request)
    {
        $data = User::find($id);


        $groups = Role::all();
        $groupsId = array();

        foreach ($data->roles as $role) {
            $groupsId[] = $role->id;
        }
        $status = [
            '1' => 'فعال',
            '0' => 'غیر فعال',
        ];
        $departments = Department::all();
        $user_department = UserDept::orderby('id','DESC')->where('user_id',$data->id)->pluck('department_id')->toArray();


        return View('admin.user.edit')
            ->with('status', $status)
            ->with('data', $data)
            ->with('departments', $departments)
            ->with('user_department', $user_department)
            ->with('groups', $groups)
            ->with('groupsId', $groupsId);

    }


    public function postEdit($id, Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users,email,' . $id,
            // 'mobile' => 'required|unique:users,mobile,' . $id,
//            'username' => 'required|unique:users,username,' . $id,
        ];
        $input = $request->all();

            $user = User::find($id);
//        $input['password'] = bcrypt($request->get('password'));
            $user->update($input);

            $user->roles()->detach();
            if ($request->has('group')) {
                $user->assignRole($request['group']);
            }

//            $user->where('id', $id)->update($input);
            if($request->has('department_id')){

                $arr = [];
                UserDept::where('user_id',$user->id)->delete();
                foreach($input['department_id'] as $item){
                    $arr[] = [
                        'department_id'=>$item,
                        'user_id'=>$user->id,
                    ];
                }
                UserDept::insert($arr);
            }
            $array = array($input);
            $serialized_array = serialize($array);

            $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$user->id);
            return Redirect::action('Admin\UserController@getIndex')->with('success', 'آیتم مورد نظر با موفقیت ویرایش شد.');
        }

    public function postDelete(UserRequest $request)
    {
        if (User::destroy($request->get('deleteId'))) {
            return Redirect::action('Admin\UserController@getIndex')
                ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
        }
    }

    public function getGroup()
    {
        $groups = Role::paginate(15);
        return View('admin.user.group.index')
            ->with('data', $groups);
    }

    public function getGroupAdd()
    {
        return View('admin.user.group.add');
    }

    public function postGroupAdd(UserRequest $request)
    {
        $role = new Role();
        $role->name = $request->get('name');
        $role->permission = serialize($request['access'] + ['fullAccess' => 0]);
        $role->save();

//        event(new LogUserEvent($role->id, 'add', Auth::id()));
        if ($role->save()) {
            return Redirect::action('Admin\UserController@getGroup')->with('success', 'آیتم جدید اضافه شد.');
        }

    }

    public function getGroupEdit($id)
    {
        $data = Role::findorfail($id);
        return View('admin.user.group.edit')
            ->with('data', $data);
    }

    public function postGroupEdit($id, UserRequest $request)
    {
        $role = Role::find($id);
        $role->name = $request->get('name');
        $role->permission = serialize($request['access'] + ['fullAccess' => 0]);
        $role->save();
//        event(new LogUserEvent($role->id, 'edit', Auth::id()));
        if ($role->save()) {
            return Redirect::action('Admin\UserController@getGroup')->with('success', 'آیتم مورد نظر با موفقیت ویرایش شد.');
        }

    }


    public function postGroupDelete(UserRequest $request)
    {
        if (Role::destroy($request->get('deleteId'))) {
//            event(new LogUserEvent(json_encode($request->get('deleteId')), 'delete', Auth::id()));
            return Redirect::action('Admin\UserController@getGroup')
                ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
        }
    }

    public function getChangePassword()
    {
        return View('admin.user.change');
    }

    public function postChangePassword(UserRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $user->password = bcrypt($request->get('password'));
        $user->save();
//        event(new LogUserEvent($user->id, 'change_password', Auth::id()));
        if ($user->save()) {
            return Redirect::back()->with('success', 'آیتم مورد نظر با موفقیت ویرایش شد.');
        }

    }
    public function export(Request $request2)
    {
        return Excel::download(new UserExport($request2), 'user.xlsx');
    }

    public function Status($id){
        $user = User::find($id);
        if($user->status == 0){

            $user->update(['status'=>1]);
            return redirect()->back();
        }elseif($user->status == 1){

            $user->update(['status'=>0]);

            return Redirect::back()->with('success', 'آیتم مورد نظر با موفقیت ویرایش شد.');
        }
    }
    public function getEdit2($id, Request $request)
    {
        $data = User::find($id);

        $status = [
            '1' => 'فعال',
            '0' => 'غیر فعال',
        ];
        $gender = [

            '0' => ' خانم',
            '1' => 'آقا',
        ];

        return View('admin.user.edit2')
            ->with('status', $status)
            ->with('gender', $gender)
            ->with('data', $data);

    }


    public function postEdit2($id, Request $request)
    {

        $input = $request->all();

        $user = User::find($id);

        $user->update($input);

        if ($request->get('birthday')){
            $time = explode('/', $request->get('birthday'));
        $b = jalali_to_gregorian($time[2],$time[1],$time[0]);
        $date = Carbon::create($b[0],$b[1],$b[2], 0, 0, 0);
        $user->update([
            'birthday'=>$date ? @$date : null,
        ]);
        }
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$user->id);
        return Redirect::action('Admin\UserController@getIndex2')->with('success', 'آیتم مورد نظر با موفقیت ویرایش شد.');
    }
    public function getAddress($id, Request $request)
    {
        $input = $request->all();

        $user = User::find($id);
        $addresses = Address::orderby('id','DESC')->where('user_id',$id)->paginate(100);
        return View('admin.user.address.index')
            ->with('data', $addresses)
            ->with('user', $user);
    }
    public function getEditAddress($id)
    {
        $data = Address::find($id);
        $states = State::get();
        $cities = City::get();
        return View('admin.user.address.edit')
            ->with('states', $states)
            ->with('cities', $cities)
            ->with('data', $data);
    }
    public function postEditAddress($id, Request $request)
    {

        $input = $request->all();

        $data = Address::find($id);
        $data->update($input);

        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$data->id);
        return Redirect::action('Admin\UserController@getAddress',$data->user->id)->with('success', 'آیتم مورد نظر با موفقیت ویرایش شد.');
    }
    public function postDeleteAddress(Request $request)
    {
        if (Address::destroy($request->get('deleteId'))) {
            return Redirect::back()
                ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
        }
    }
    public function postPassEdit($id,PasswordRequest $request){
        $input = $request->all();

        $user = User::find($id);
        if ($request->get('password')) {

            $input['password'] = bcrypt($request->get('password'));
        } else {
            $input['password'] = $user->password;
        }

        $data = $user->update($input);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$data->id);
        return Redirect::back()->with('success', 'آیتم مورد نظر با موفقیت ویرایش شد.');
    }

}
