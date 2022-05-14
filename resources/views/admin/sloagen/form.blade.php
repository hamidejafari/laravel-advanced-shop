<div class="row w-100 m-0">
	{{ csrf_field() }}
	<div class="col-lg-12 p-2 form-group m-0">
		<label for="title" class="col-form-label">عنوان</label>
		<textarea class="form-control" type="text" id="title" rows="4" name="title">@if(isset($data->title)){{$data->title}}@endif</textarea>
	</div>
	<div class="col-lg-12 p-2 form-group m-0">
		<label for="image" class="col-form-label">تصویر</label>
		<input class="form-control" type="file" name="image">
		@if(isset($data->image))
		<img src="{{asset('assets/uploads/content/sloagen/'.$data->image)}}" class="w-100 my-1">
		@endif
	</div>
	<div class="col-lg-12 p-2">
		<div class="form-group m-0">
			<button type="submit" class="btn btn-space btn-success m-0 px-5">ذخیره</button>
		</div>
	</div>
</div>

@section('js')

@endsection