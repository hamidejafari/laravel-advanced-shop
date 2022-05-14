<div class="row w-100 m-0">
    {{ csrf_field() }}

    <div class="col-lg-6 form-group">
        <label for="title" class="col-form-label">عنوان</label>
        <input id="title" name="title" type="text" class="form-control" value="@if(isset($data->title)){{$data->title}}@endif">
    </div>
    <div class="col-lg-6 form-group">
        <label class="col-form-label"> تصویر </label>
        <input class="form-control" type="file" name="image">
        @if(isset($data->image))
            <img src="{{asset('assets/uploads/content/upl/medium/'.$data->image)}}" class="w-50">
        @endif
    </div>
    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5">ذخیره</button>
        </div>
    </div>
</div>

@section('js')

@endsection
