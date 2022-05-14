<div class="row w-100 m-0">
    {{ csrf_field() }}

    <div class="col-lg-6 form-group">
        <label for="description" class="col-form-label">سایر </label>
        <textarea class="form-control" type="text" id="description" name="description" >@if(isset($data->description)){{$data->description}}@endif</textarea>
    </div>



    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
        </div>
    </div>
</div>

@section('js')

@endsection
