<div class="row w-100 m-0">
    {{ csrf_field() }}
    <div class="col-lg-12 p-1 form-group">
        <label class="col-form-label"> تصویر </label>
        <input class="form-control" type="file" name="file">
        @if(isset($data->file))
            <img src="{{asset('assets/uploads/content/art/medium/'.$data->file)}}" class="w-100" style="height: 150px;">
        @endif
    </div>

    <div class="col-lg-12 p-1">
        <div class="form-group m-0">
            <button type="submit" class="btn btn-space btn-success m-0 px-5">ذخیره</button>
        </div>
    </div>
</div>
