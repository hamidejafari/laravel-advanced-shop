<div class="row w-100 m-0">
	{{ csrf_field() }}
    <div class="col-lg-12 p-1 form-group">
        <label class="col-form-label"> تصویر </label>
{{--        <input class="form-control" type="file" name="file">--}}
        <input type="file" name="images[]" multiple  class="form-control" />
        @if(isset($data->file))
            <img src="{{asset('assets/uploads/content/pro/medium/'.$data->file)}}" class="w-100" style="height: 150px;">
        @endif
    </div>
{{--    <div class="col-lg-12 p-1 form-group">--}}
{{--        <div class="row w-100 m-0 nthsd">--}}
{{--            <div class="col-lg-12 p-0">--}}
{{--                <div class="form-group sd m-0">--}}
{{--                    <label for="image" class="col-form-label m-0">--}}
{{--                       انتخاب به عنوان کاور--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-12 p-0">--}}
{{--                <div class="switch-button switch-button-yesno">--}}
{{--                    <input type="checkbox" value="1" @if(isset($data->thumbnail) && $data->thumbnail == 1) checked="checked" @endif name="thumbnail" id="thumbnail">--}}
{{--                    <span>--}}
{{--                        <label for="thumbnail"></label>--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
	<div class="col-lg-12 p-1">
		<div class="form-group m-0">
			<button type="submit" class="btn btn-space btn-success m-0 px-5" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
		</div>
	</div>
</div>
