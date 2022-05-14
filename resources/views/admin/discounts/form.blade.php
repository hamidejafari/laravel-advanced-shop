<div class="row w-100 m-0">
	{{ csrf_field() }}
    @if(!isset($data->id))
	<div class="col-lg-6 form-group">
		<label for="type" class="col-form-label"> نوع تخفیف</label>
		<select class="form-control" id="type" name="type">
			<option value="1">درصدی</option>
			<option value="2">نقدی</option>

		</select>
	</div>
    <div class="col-lg-6 form-group">
        <label for="category_id" class="col-form-label"> دسته مورد نظر</label>
        <select class="form-control" id="category_id" name="category_id">
            <option value="">هیچکدام</option>

            @foreach($categories as $row)
                <option value="{{$row->id}}">{{$row->title}}</option>
            @endforeach

        </select>
    </div>
        <div class="col-lg-6 form-group">
            <label for="product_id" class="col-form-label"> محصول مورد نظر</label>
            <select class="form-control" id="product_id" name="product_id">
                <option value="">هیچکدام</option>

                @foreach($products as $row2)
                    <option value="{{$row2->id}}">{{$row2->title}}</option>
                @endforeach

            </select>
        </div>
	<div class="col-lg-6 form-group">
		<label for="count" class="col-form-label">تعداد کد موردنیاز</label>
		<input id="count" name="count" type="text" class="form-control">
	</div>
	<div class="col-lg-6 form-group">
		<label for="amount" class="col-form-label">مقدار تخفیف(درصدی یا نقدی) </label>
		<input id="amount" name="amount" type="text" class="form-control"
			value="@if(isset($data->amount)){{$data->amount}}@endif">
	</div>

	<div class="col-lg-6 form-group">
		<label for="from_date" class="col-form-label">تاریخ شروع اعتبار</label>

		<div class="controls">
			<input type="text" name="from_date" id="datepicker1" class="form-control" />
		</div>
	</div>
	<div class="col-lg-6 form-group">
		<label for="to_date" class="col-form-label">تاریخ پایان اعتبار</label>
        <div class="controls">
			<input type="text" name="to_date" id="datepicker2" class="form-control" />
		</div>
	</div>
        <div class="col-lg-6 form-group">
            <label for="kind" class="col-form-label">انواع تخفیف </label>
            <select class="form-control" id="kind" name="kind">
                <option value="1">یکبار مصرف</option>
                <option value="2">مناسبتی</option>

            </select>
        </div>
        <div class="col-lg-6 form-group">
            <label for="title" class="col-form-label">عنوان تخفیف(اگر تخفیف شما مناسبتی است این فیلد را بصورت انگلیسی با کلمه موردنظر خود پر کنید):</label>
            <input id="title" name="title" type="text" class="form-control">
        </div>
    @else
        <div class="col-lg-6 form-group">
            <label for="to_date" class="col-form-label">انتخاب کاربر</label>
            <select name="user_id" class="form-control" >
                    @foreach($user as $row)
                        <option value="{{$row->id}}">{{$row->name.' '.$row->family}}</option>
                    @endforeach
                </select>
            </div>

        <div class="col-lg-6 form-group">
            <label for="description" class="col-form-label">توضیحات </label>
            <textarea class="form-control" id="description" name="description" placeholder="توضیحات وارد کنید . . ." rows="3">
			@if(isset($data->description)){!!$data->description !!}@endif</textarea>
        </div>
        <div class="col-lg-3 form-group">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">
                نمایش
            </label>
            <div class="col-12 col-sm-8 col-lg-6 pt-1">
                <div class="switch-button switch-button-yesno">
                    <input type="checkbox" value="1" @if(isset($data->show_panel) && $data->show_panel == 1) checked="checked" @endif name="show_panel" id="show_panel">
                    <span>
                    <label for="show_panel"></label>
                </span>
                </div>
            </div>
        </div>
    @endif


	<div class="col-lg-12 p-2">
		<div class="form-group">
			<button type="submit" class="btn btn-space btn-success m-0 px-5" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
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
