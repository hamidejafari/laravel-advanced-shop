<div class="row">
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="float: right">عنوان مشخصه</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" name="title" value="@if(isset($data->title)){{$data->title}}@endif" id="title" class="form-control" >

    </div>
</div>


<div class="form-group">
    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
        <button type="submit" class="btn btn-success">ذخیره</button>
    </div>
</div>
</div>

