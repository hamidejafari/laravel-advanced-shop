<script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js" charset="utf-8"></script>
{{ csrf_field() }}
<div class="row">
    <div class="col-lg-6 form-group">
        <label for="title" class="col-form-label">عنوان</label>
        <input id="title" name="title" type="text" class="form-control"
               value="@if(isset($data->title)){{$data->title}}@endif">
    </div>
    <div class="col-lg-6 form-group">
        <label for="persian_title" class="col-form-label">عنوان فارسی</label>
        <input id="persian_title" name="persian_title" type="text" class="form-control"
               value="@if(isset($data->persian_title)){{$data->persian_title}}@endif">
    </div>
{{--    <div class="col-lg-6 form-group">--}}
{{--        <div class="row w-100 m-0 nthsd">--}}
{{--            <div class="col-lg-12 p-0">--}}
{{--                <div class="form-group sd">--}}
{{--                    <label for="image" class="col-form-label">تصویر </label>--}}
{{--                    @include('admin.brands.cropper')--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
    <div class="col-lg-6 form-group">
        <label>تصویر کاور </label>

        <input class="form-control" type="file" name="image">
        <div class="image_container my-2" style="position:relative;">
            <img id="blah" src="@if(isset($data->image)) {{asset('assets/uploads/content/brand/small/'.$data->image)}} @endif" />
            @if(isset($data->image))
                <a  type="button" href="{{URL::action('Admin\BrandController@getDeleteImage',$data->id)}}" onclick="return confirm('آیا از حذف عکس مطمئن هستید؟');"
                    data-toggle="tooltip" data-original-title="حذف عکس" class="btn" style="position: absolute;top: 0.5rem;right: 0.5rem;padding: 0;background: #fff;border-radius: 0;box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);">
                    <svg focusable="false" xmlns="http://www.w3.org/2000/svg" fill="currentColor" style="width: 1.5rem;color: red;" viewBox="0 0 24 24">
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                    </svg>
                </a>
            @endif
        </div>

    </div>

    <div class="form-group">
        <label for="description" class="col-form-label">توضیحات </label>
        <textarea class="form-control ckeditor" id="description" name="description" rows="3">
            @if(isset($data->description)){!!$data->description !!}@endif</textarea>
    </div>
    <div class="col-lg-6 form-group ">
        <label for="title_seo" class="col-form-label">عنوان سئو </label>
        <input id="title_seo" name="title_seo" type="text" class="form-control"
               value="@if(isset($data->title_seo)){{$data->title_seo}}@endif">
        <label for="tags" class="col-form-label">برچسب‌ها</label>
        <input type="text" class="form-control" name="tags" id="tags"
               value="@if(isset($data->tags)) @foreach($tag as $row2){{$row2->title}} @if(!$loop->last) , @endif @endforeach @endif">


    </div>
    <div class="col-lg-6 form-group">
        <label for="description_seo" class="col-form-label">توضیحات سئو</label>
        <textarea class="form-control" id="description_seo" name="description_seo" rows="4">
			@if(isset($data->description_seo)){!!$data->description_seo !!}@endif</textarea>
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
    <div class="col-lg-3 form-group">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">
            نمایش در فوتر
        </label>
        <div class="col-12 col-sm-8 col-lg-6 pt-1">
            <div class="switch-button switch-button-yesno">
                <input type="checkbox" value="1" @if(isset($data->footer) && $data->footer == 1) checked="checked" @endif name="footer" id="footer">
                <span>
                    <label for="footer"></label>
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
