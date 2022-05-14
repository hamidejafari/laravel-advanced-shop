{{ csrf_field() }}
<div class="row">
	<div class="col-lg-6 form-group">
		<label for="name" class="col-form-label">نام</label>
		<input id="name" name="name" type="text" class="form-control"
			value="@if(isset($data->name)){{$data->name}}@endif">
	</div>
    <div class="col-lg-6 form-group">
        <label for="family" class="col-form-label">نام خانوادگی</label>
        <input id="family" name="family" type="text" class="form-control"
               value="@if(isset($data->family)){{$data->family}}@endif">
    </div>
    <div class="col-lg-6 form-group">
        <label class="col-form-label"> ایمیل </label>
        <input id="email" name="email" type="text" class="form-control"
               value="@if(isset($data->email)){{$data->email}}@endif">
    </div>
    <div class="col-lg-6 form-group">
        <label class="col-form-label"> تلفن </label>
        <input id="mobile" name="mobile" type="text" class="form-control"
               value="@if(isset($data->mobile)){{$data->mobile}}@endif">
    </div>
    <div class="col-lg-6 form-group">
        <label for="department_id" class="col-form-label">
            انتخاب دپارتمان :
        </label>
        <div class="sd-checkbox bg-light p-3">
            @foreach(@$departments as $dept)

                <label class="custom-ch">
                    {{$dept['name']}}
                    <input type="checkbox" value="{{$dept['id']}}" @if(isset($data) and
                                    in_array($dept['id'],$user_department)) checked="checked" @endif
                    name="department_id[]" class="form-control" multiple >
                    <span class="checkmark"></span>
                </label>
            @endforeach
        </div>
    </div>

	<div class="col-lg-6 form-group">
        <label class="col-form-label">وضعیت</label>
        <select name="status" id="status" class="form-control">
            @foreach($status as $key=>$item)
                <option value="{{$key}}" @if(isset($data->status) and $data->status==$key)
                selected
                    @endif>{{$item}}</option>
            @endforeach
        </select>
	</div>

	<div class="col-lg-6 form-group">
        <label class="col-form-label">گروه کاربری</label>
        @foreach($groups as $group)
            <div class="col-md-6 px-0">
                <input type="checkbox" name="group[]" value="{{$group->id}}" @if(in_array($group->id,
							$groupsId)) checked="checked" @endif>
                <span class="text">{{ $group->name }}</span>
            </div>
        @endforeach
	</div>

    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5">ذخیره</button>
        </div>
    </div>
</div>
