<div class="card rounded-lg border-0 p-3">
    <div class="row">
        {{ csrf_field() }}
        <div class="row"  v-for="me in number" >
            <div class="col-lg-6 form-group">
                <label for="title" class="col-form-label">عنوان</label>
                <input class="form-control" type="text" id="title" name="title[]" value="@if(isset($data->title)){{$data->title}}@endif" />
            </div>


        </div>
        <div class="col-lg-6 p-5">
            <a @click="plusMe()" class="btn btn-default btn-success" style="font-size: 9px;">
                <span class="fa fa-plus"></span>
            </a>
        </div>
        <div class="col-lg-12 p-2">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>
        </div>
    </div>
</div>
