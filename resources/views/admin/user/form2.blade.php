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
        <label class="col-form-label">جنسیت</label>
        <select name="gender" id="gender" class="form-control">
            @foreach($gender as $key=>$item2)
                <option value="{{$key}}" @if(isset($data->gender) and $data->gender==$key)
                selected
                    @endif>{{$item2}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6 form-group">
        <label for="from_date" class="col-form-label">تاریخ شروع اعتبار</label>

        <div class="controls">
            <input type="text" name="birthday" id="datepicker1" class="form-control" value="@if(isset($data->birthday)){{$data->birthday ? \App\Library\Help::persian2LatinDigit(jdate('d/m/Y', DateTime::createFromFormat('Y-m-d H:i:s', $data->birthday)->getTimestamp()))  : ''}}@endif" />
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


    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5">ذخیره</button>
        </div>
    </div>
</div>
<style>
    .ui-datepicker-title {
        margin: 0 !important;
    }
</style>
@section('js')
    <script>
        $(document).ready(function() {
            $("#datepicker1").datepicker({
                changeMonth: true,
                changeYear: true
            });
            $("#datepicker2").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
@endsection
