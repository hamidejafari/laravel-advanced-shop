<script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js" charset="utf-8"></script>
{{ csrf_field() }}
<div class="row">
	<div class="col-lg-6 form-group">
		<label for="title" class="col-form-label">عنوان</label>
		<input id="title" name="title" type="text" class="form-control"
			value="@if(isset($data->title)){{$data->title}}@endif">
	</div>
    <div class="col-lg-6 form-group">
        <div class="row w-100 m-0 nthsd">
            <div class="col-lg-12 p-0">
                <div class="form-group sd">
                    <label for="image" class="col-form-label">تصویر </label>
                    @include('admin.article-cat.cropper')
                </div>
            </div>

        </div>
    </div>
{{--	<div class="col-lg-6 form-group">--}}
{{--		<label for="keyword" class="col-form-label">کلمات کلیدی</label>--}}
{{--		<input id="keyword" name="keyword" type="text" class="form-control"--}}
{{--			value="@if(isset($data->keyword)){{$data->keyword}}@endif">--}}
{{--	</div>--}}
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
    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
        </div>
    </div>
</div>
