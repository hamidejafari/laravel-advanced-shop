@extends('layouts.site.master')
@section('robots'){{'noindex ,nofollow' }}@stop
@section('content')

<div class="auth py-5 my-5 d-flex align-items-center justify-content-center">
	<div class="row w-100 m-0">
		<div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-8 col-xs-12 m-auto p-1">
			<div class="card shadow border-0 rounded-0 p-3">
				<div class="headerr">
					<a href="/" class="">
						<img src="{{asset('assets/site/images/kaj/kaj.png')}}" />
					</a>
					<p class="h4 fw-bolder text-center text-dark m-0">
						ورود
					</p>
					<i class="bi bi-person-plus d-flex"></i>
				</div>
				<form class="mb-0 mt-4" method="post" action="{{ route('panel.login') }}"
					enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="row w-100 m-0">

						<div class="col-xxl-12 p-1">
							<div class="form-floating">
								<input type="text" name="username" class="form-control" id="floatingInput"
									placeholder="شماره موبایل یا ایمیل">
								<label for="floatingInput">
									شماره موبایل یا ایمیل
								</label>
							</div>
							<small class="text-success">
								شماره موبایل یا ایمیل خود را وارد کنید
							</small>
						</div>

						<div class="col-xxl-12 text-end p-1">
							<div class="form-floating">
								<input type="password" name="password" class="form-control" id="myInput" placeholder="رمز ورود">
								<label for="txtPassword">
									رمز ورود
								</label>
							</div>
							<div class="text-start py-2">
								<input type="checkbox" onclick="myFunction()"> نمایش رمز ورود
							</div>
						</div>
						<div class="col-xxl-12 p-1">
							<div class="form-floating">
								<button type="submit" class="btn btn-success btn-lg w-100">
									ورود
								</button>
							</div>
						</div>
						<div class="col-xxl-12 text-center p-1">
							<div class="form-floating">
								<p class="m-0">
									اگر قبلا ثبت نام نکرده اید،
									<a href="{{ route('panel.register') }}" class="text-one fw-bolder">
										ثبت نام
									</a>
									کنید
								</p>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@stop
