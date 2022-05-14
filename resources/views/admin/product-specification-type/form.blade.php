{{ csrf_field() }}
<div class="row">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="float: right">عنوان مشخصه</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" name="title" value="@if(isset($data->title)){{$data->title}}@endif" id="title" class="form-control" >

        </div>
    </div>
    <div class="col-lg-2 p-4">
        <div class="form-group">
            <label>مشخصه ثابت </label>
            <div class="switch-button switch-button-yesno">
                <input type="checkbox" value="1" @if(isset($data->status) && $data->status == 1) checked="checked" @endif name="status" id="status">
                <span>
                    <label for="status"></label>
                </span>
            </div>
        </div>

    </div>


    <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
        </div>
    </div>
</div>
