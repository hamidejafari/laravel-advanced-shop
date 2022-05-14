
{{ csrf_field() }}
<div class="row">
	<div class="col-lg-6 form-group">
		<label for="title" class="col-form-label">عنوان</label>
		<input id="title" name="title" type="text" class="form-control"
			value="@if(isset($data->title)){{$data->title}}@endif">
	</div>
    <div class="col-lg-6 form-group">
        <label for="city_id" class="col-form-label">
            شهر  :
        </label>
        <select class="form-control" id="city_id" name="city_id" value="@if(isset($data->city_id)){{$data->city_id}}@endif">
            <option value="">انتخاب شهر : </option>
            @foreach($cities as $row)
                <option value="{{$row->id}}" @if(isset($data->city_id)) @if($data->city_id==$row->id) selected @endif @endif >
                    {{$row->name}}
                </option>
            @endforeach
        </select>

    </div>

    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5">ذخیره</button>
        </div>
    </div>
</div>
