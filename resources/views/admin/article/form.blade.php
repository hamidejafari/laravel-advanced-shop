{{ csrf_field() }}
<div class="row">
	<div class="col-lg-6 form-group">
		<label for="title" class="col-form-label">عنوان</label>
		<input id="title" name="title" type="text" class="form-control"
			value="@if(isset($data->title)){{$data->title}}@endif">
	</div>
    <div class="col-lg-6 form-group">
        <label for="parent_id" class="col-form-label">
            دسته بندی :
        </label>
        <select class="form-control" id="parent_id" name="parent_id" value="@if(isset($data->parent_id)){{$data->parent_id}}@endif">
            <option value="">انتخاب دسته : </option>
            @foreach($article_cat as $row)
                <option value="{{$row->id}}" @if(isset($data->parent_id)) @if($data->parent_id==$row->id) selected @endif @endif >
                    {{$row->title}}
                </option>
            @endforeach
        </select>

    </div>
    <!-- <div class="col-lg-6 p-2">
        <div class="row w-100 m-0 nthsd">
            <div class="col-lg-12 p-0">
                <div class="form-group sd">
                    <label class="col-form-label">تصویر </label>
                    <div class="py-2 crp">
                        <input id="input-preview" name="image_get" type="hidden" />
                        <input type="file" name="image" id="image" class="form-control" onchange="readURL(this);"/>
                        <div class="sd-group">
                            <div class="max-content my-2">
                                <img id="blah" src="@if(isset($data->image)) {{asset('assets/uploads/content/art/medium/'.$data->image)}} @endif" alt="your image" style="width:50%" />
                                <div id="cropped_result"></div>
                                <button id="crop_button" type="button">Crop</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> -->
{{--    <div class="col-lg-6 form-group">--}}
{{--        <div class="row w-100 m-0 nthsd">--}}
{{--            <div class="col-lg-12 p-0">--}}
{{--                <div class="form-group sd">--}}
{{--                    <label for="image" class="col-form-label">تصویر </label>--}}
{{--                    @include('admin.article.cropper')--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}


	<div class="col-lg-6 form-group">
		<label class="col-form-label"> تصویر </label>
		<input class="form-control" type="file" name="image">
		@if(isset($data->image))
            <img src="{{asset('assets/uploads/content/art/medium/'.$data->image)}}" class="w-50">
        @endif
	</div>
{{--	<div class="col-lg-6 form-group">--}}
{{--		<label for="keyword" class="col-form-label">کلمات کلیدی</label>--}}
{{--		<input id="keyword" name="keyword" type="text" class="form-control"--}}
{{--			value="@if(isset($data->keyword)){{$data->keyword}}@endif">--}}
{{--	</div>--}}
    <div class="col-lg-12 form-group ">
        <label for="tags" class="col-form-label">برچسب‌ها</label>
        <input type="text" class="form-control" name="tags" id="tags"
               value="@if(isset($data->tags)) @foreach($tag as $row2){{$row2->title}} @if(!$loop->last) , @endif @endforeach @endif">
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
            نمایش
        </label>
        <div class="col-12 col-sm-8 col-lg-6 pt-1">
            <div class="switch-button switch-button-yesno">
                <input type="checkbox" value="1" @if(isset($data->status) && $data->status == 1) checked="checked" @endif name="status" id="status">
                <span>
                    <label for="status"></label>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
        </div>
    </div>
</div>
@section('js')
    <script src="{{asset('assets/admin/js/selectize.js')}}"></script>
    <script>
        $( document ).ready(function() {
            $('#tags').selectize({
                plugins: ['remove_button'],
                delimiter: ',',
                persist: false,
                valueField: 'tag',
                labelField: 'tag',
                searchField: 'tag',
                create: function(input) {
                    return {
                        tag: input
                    }
                }
            });
        });
        var tags = [
                @foreach ($tag as $tags)
            {tag: "{{$tags}}" },
            @endforeach
        ];

    </script>
@endsection
