<div class="row w-100 m-0">
    {{ csrf_field() }}

    <div class="col-lg-4 form-group">
        <label for="title" class="col-form-label">عنوان به انگلیسی</label>
        <input id="title" name="name" type="text" class="form-control" value="@if(isset($data->name)){{$data->name}}@endif">
    </div>
    <div class="col-lg-4 form-group">
        <label class="col-form-label"> آیکون </label>
        <input id="icon" name="icon" style="float: left" type="text" class="form-control" value="@if(isset($data->icon)){{$data->icon}}@endif">
    </div>
    <div class="col-lg-4 form-group">
        <label class="col-form-label"> آدرس </label>
        <input id="address" name="address" type="text" class="form-control" value="@if(isset($data->address)){{$data->address}}@endif">
    </div>
    <div class="col-lg-4 p-2 form-group">
        <div class="border p-1">
            <label  class="col-form-label">
                راهنمای  آیکون   :
            </label>
            <div class="row w-100 m-0 bg-light p-2">
                <i class="bi bi-whatsapp h3 m-0"> bi bi-whatsapp h3 m-0</i>
                <i class="bi bi-telegram h3 m-0"> bi bi-telegram h3 m-0</i>
                <i class="bi bi-instagram h3 m-0"> bi bi-instagram h3 m-0</i>
                <i class="bi bi-twitter h3 m-0"> bi bi-twitter h3 m-0</i>
                <i class="bi bi-linkedin h3 m-0"> bi bi-linkedin h3 m-0</i>

            </div>
        </div>
    </div>
    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5">ذخیره</button>
        </div>
    </div>
</div>

@section('js')

@endsection
