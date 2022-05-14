@extends('layouts.admin.master2')
@section('robots', 'noindex')
<!-- ============================================================== -->
<!-- login page  -->
<!-- ============================================================== -->
<div class="vh-100 d-flex align-items-center">
	<div class="splash-container">
		<div class="card">
			<div class="card-header text-center">
				<span class="splash-description">
					ورود به پنل مدیریت
				</span>
			</div>
			<div class="card-body">
				<form action="{{URL::action('Admin\LoginController@postLogin')}}" method="POST"
					enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group">
						<input class="form-control form-control-lg" name="email" id="username" type="text"
							placeholder="نام کاربری" autocomplete="off">
					</div>
					<div class="form-group">
						<input class="form-control form-control-lg" name="password" id="password" type="password"
							placeholder="رمز عبور">
					</div>

                    <div class="g-recaptcha" data-sitekey="6LfnGaMdAAAAANivoygagDYwEWuTyylkfDLU1ULn"></div>
					<button type="submit" class="btn btn-success btn-lg w-100">
						ورود
					</button>
				</form>
			</div>
			<!-- <div class="card-footer bg-white p-0  ">
			<div class="card-footer-item card-footer-item-bordered">
				<a href="#" class="footer-link">Create An Account</a>
			</div>
			<div class="card-footer-item card-footer-item-bordered">
				<a href="#" class="footer-link">Forgot Password</a>
			</div>
		</div> -->
		</div>
	</div>
</div>
