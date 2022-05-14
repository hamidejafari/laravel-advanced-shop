{{ csrf_field() }}
<div class="row">
	<div class="col-lg-6 form-group">
		<label for="title" class="col-form-label">عنوان</label>
		<input id="title" name="title" type="text" class="form-control"
			value="@if(isset($data->title)){{$data->title}}@endif">
	</div>
    <div class="form-group col-lg-6">
        <label for="content_type" class="col-form-label">
            نوع
        </label>

            <select name="content_type" class="form-control">
                <option  value="8"  @if(isset($data->content_type) && $data->content_type== 8) selected @endif >بنرهای اول موبایل </option>
                <option  value="9"  @if(isset($data->content_type) && $data->content_type== 9) selected @endif >بنرهای دوم موبایل </option>
                <option  value="10" @if(isset($data->content_type) && $data->content_type== 10) selected @endif >اسلایدر موبایل </option>
                <option  value="11" @if(isset($data->content_type) && $data->content_type== 11) selected @endif >بنرهای انتهایی موبایل </option>


            </select>

        </div>
</div>

	<div class="col-lg-6 form-group">
		<label class="col-form-label"> تصویر </label>
		<input class="form-control" type="file" name="image" >
		@if(isset($data->image))
            <img src="{{asset('assets/uploads/content/sli/'.$data->image)}}" class="w-100" style="height: 150px;">
        @endif
	</div>
<div class="form-group">
    <label for="link" class="col-form-label">لینک خارجی به سایت دیگر </label>
    <input class="form-control" id="link" name="link" value="@if(isset($data->link)){!!$data->link !!}@endif"/>
</div>
    <div class="form-group">
        <label for="description" class="col-form-label">توضیحات </label>
        <textarea class="form-control ckeditor" type="text" id="description" name="description" rows="3">@if(isset($data->description)){!!$data->description !!}@endif</textarea>
    </div>

    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5">ذخیره</button>
        </div>
    </div>
</div>
