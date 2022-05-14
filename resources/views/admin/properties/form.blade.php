<div class="row w-100 m-0">
    {{ csrf_field() }}

    <div class="col-lg-6 form-group">
        <label for="description" class="col-form-label">سایر مشخصات</label>
        <textarea class="form-control" type="text" id="description" name="description" >@if(isset($data->description)){{$data->description}}@endif</textarea>
    </div>
    <div class="col-lg-6 form-group">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">
         نشان دادن در قسمت بالایی
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

@endsection
