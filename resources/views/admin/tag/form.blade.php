{{ csrf_field() }}
<div class="row">
	<div class="col-lg-6 form-group">
		<label for="title" class="col-form-label">عنوان</label>
		<input id="title" name="title" type="text" class="form-control"
			value="@if(isset($data->title)){{$data->title}}@endif">
	</div>
    <div class="col-lg-6 form-group">
        <label for="title" class="col-form-label">h1</label>
        <input id="h1" name="h1" type="text" class="form-control"
               value="@if(isset($data->h1)){{$data->h1}}@endif">
    </div>

    <div class="form-group">
        <label for="description" class="col-form-label">توضیحات </label>
        <textarea class="form-control ckeditor" id="description" name="description" rows="3">
            @if(isset($data->description)){!!$data->description !!}@endif</textarea>
    </div>
	<div class="col-lg-6 form-group">
		<label for="title_seo" class="col-form-label">عنوان سئو </label>
		<input id="title_seo" name="title_seo" type="text" class="form-control"
			value="@if(isset($data->title_seo)){{$data->title_seo}}@endif">
	</div>
	<div class="col-lg-6 form-group">
		<label for="description_seo" class="col-form-label">توضیحات سئو</label>
		<textarea class="form-control" id="description_seo" name="description_seo" rows="3">@if(isset($data->description_seo)){!!$data->description_seo !!}@endif</textarea>
	</div>
    <div class="col-lg-3 form-group">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">
      ایندکس
        </label>
        <div class="col-12 col-sm-8 col-lg-6 pt-1">
            <div class="switch-button switch-button-yesno">
                <input type="checkbox" value="1" @if(isset($data->index) && $data->index == 1) checked="checked" @endif name="index" id="index">
                <span>
                    <label for="index"></label>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5">ذخیره</button>
        </div>
    </div>
</div>

