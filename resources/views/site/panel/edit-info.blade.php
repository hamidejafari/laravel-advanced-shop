@extends('site.panel.master')
@section('robots'){{'noindex ,nofollow' }}@stop
@section('content')

<div class="bg-one panel-head p-2">
	<h1 class="fw-bolder text-white d-flex align-items-center h4 m-0">
		<i class="bi bi-pen me-2 d-flex h2 my-0"></i>
		ویرایش اطلاعات
	</h1>
</div>
<div class="favorit h-100 py-1">
	<div class="row w-100 h-100 m-0">
		<div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 col-sm-9 col-xs-12 mx-auto h-100 p-2">
			<form class="m-0 py-5" method="post" action="{{URL::action('Panel\PanelController@postEditInfo')}}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="row w-100 m-0">
					<div class="col-sm-12 p-0">
						<div class="row w-100 m-0">
							<div class="col-sm-3 col-xs-3 align-self-end p-1">
								@php
									$image = "user";
									if(isset($user)) $image = $user->avatar;
								@endphp
								<img src="@if($image !== null && file_exists('assets/uploads/content/users/'.$image)) {!! asset('assets/uploads/content/users/'.$image) !!} @else {!! asset('assets/site/images/kaj/user.png') !!} @endif" id="blah" class="w-100 bg-two p-2 shadow-sm border">
							</div>
							<div class="col-sm-9 col-xs-9 align-self-end p-1">
								<div class="input-group">
									<label class="input-group-text" for="imgInp2">
										آپلود عکس پروفایل
									</label>
									<input type="file"name="avatar" class="form-control" id="imgInp2">
								</div>
								<!-- <label>انتخاب آواتار :</label> -->
								<!-- <input type="file" name="avatar" id="imgInp2" class="form-control"/> -->
							</div>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<input type="text" class="form-control" id="floatingInput" name="name" placeholder="نام" value="{{@$user->name}}">
							<label for="floatingInput" class="d-flex align-items-center">
								<i class="bi bi-person d-flex me-1"></i>
								نام
							</label>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<input type="text" class="form-control" id="floatingInput" name="family" placeholder="نام خانوادگی" value="{{@$user->family}}">
							<label for="floatingInput" class="d-flex align-items-center">
								<i class="bi bi-person d-flex me-1"></i>
								نام خانوادگی
							</label>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<input type="tel" class="form-control" id="floatingInput" name="mobile" placeholder="شماره همراه" value="{{@$user->mobile}}">
							<label for="floatingInput" class="d-flex align-items-center">
								<i class="bi bi-telephone d-flex me-1"></i>
								شماره همراه
							</label>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<input type="email" class="form-control" id="floatingInput" name="email" placeholder="ایمیل" value="{{@$user->email}}">
							<label for="floatingInput" class="d-flex align-items-center">
								<i class="bi bi-envelope d-flex me-1"></i>
								ایمیل
							</label>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<button type="submit" class="btn btn-success btn-lg d-flex align-items-center justify-content-center w-100">
							<i class="bi bi-check2-circle d-flex me-1 h4 my-0"></i>
							ثبت اطلاعات
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@stop
@section('js')
    <script>
    function readURL(input, id) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
			$('#' + id).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#imgInp2").change(function () {
		console.log('qdweveffer');
		readURL(this, 'blah');
	});
    </script>
@stop
