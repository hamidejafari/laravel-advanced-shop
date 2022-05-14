@extends('site.panel.master')
@section('robots'){{'noindex ,nofollow' }}@stop
@section('content')
@include('layouts.message-swal')
<div class="bg-one panel-head p-2">
	<h1 class="fw-bolder text-white d-flex align-items-center h4 m-0">
		<i class="bi bi-key me-2 d-flex h2 my-0"></i>
		تغییر رمز عبور
	</h1>
</div>
<div class="favorit h-100 py-1">
	<div class="row w-100 h-100 m-0">
		<div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 col-sm-9 col-xs-12 mx-auto h-100 p-2">
			<form  class="m-0 py-5" method="post" action="{{url('panel/save-pass')}}"
                   enctype="multipart/form-data">
                {{ csrf_field() }}
				<div class="row w-100 m-0">
{{--					<div class="col-sm-12 p-1">--}}
{{--						<div class="form-floating">--}}
{{--							<input type="password" class="form-control" placeholder="رمز عبور فعلی">--}}
{{--							<label for="floatingInput" class="d-flex align-items-center">--}}
{{--								<i class="bi bi-shield-lock d-flex me-1"></i>--}}
{{--								رمز عبور فعلی--}}
{{--							</label>--}}
{{--						</div>--}}
{{--					</div>--}}
					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<input type="password" name="password" class="form-control" placeholder="رمز عبور جدید">
							<label for="floatingInput" class="d-flex align-items-center">
								<i class="bi bi-shield-lock d-flex me-1"></i>
								رمز عبور جدید
							</label>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<input type="password" name="re-password" class="form-control" placeholder="تکرار رمز عبور جدید">
							<label for="floatingInput" class="d-flex align-items-center">
								<i class="bi bi-shield-lock d-flex me-1"></i>
								تکرار رمز عبور جدید
							</label>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<button type="submit"
							class="btn btn-success btn-lg d-flex align-items-center justify-content-center w-100">
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
