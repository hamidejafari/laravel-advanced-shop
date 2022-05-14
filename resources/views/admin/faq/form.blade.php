<div class="row w-100 m-0">
    {{ csrf_field() }}

    <div class="col-lg-6 form-group">
        <label for="question" class="col-form-label">سوال</label>
        <textarea class="form-control" type="text" id="question" name="question" >@if(isset($data->question)){{$data->question}}@endif</textarea>
    </div>
    <div class="col-lg-6 form-group">
        <label for="question" class="col-form-label">پاسخ</label>
        <textarea class="form-control" type="text" id="answer" name="answer" >@if(isset($data->answer)){{$data->answer}}@endif</textarea>
    </div>


    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
        </div>
    </div>
</div>

@section('js')

@endsection
