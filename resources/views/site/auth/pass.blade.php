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
						در انتظار تایید
					</p>
					<i class="bi bi-clock-history d-flex"></i>
				</div>
				<form class="mb-0 mt-4" method="POST"
					action="{{URL::action('Panel\LoginController@postPanelLogin')}}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="mobile" value="{{$user->mobile}}"/>
                    <input name="reminder_id" value="{{@$reminder_id}}" type="hidden" />


                    @if(isset($order))
					<input type="hidden" name="order" value="1"/>
                    @endif
					<div class="row w-100 m-0">
						<div class="col-xxl-12 text-end p-1">
							<small class="text-danger">
								رمز ورود که به شماره همراهتان ارسال شده را وارد کنید
							</small>
							<div class="form-floating">
								<input type="password" class="form-control" id="myInput" name="temp_password" placeholder="رمز ورود">
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

					</div>
				</form>
				<form class="mb-0 mt-4" method="post"
					action="{{URL::action('Panel\LoginController@postRePassword',[$user->mobile])}}"
					enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="mobile" value="{{$user->mobile}}">
					<button type="submit"
						class="btn btn-lg btn-link w-100 text-decoration-none text-success d-flex align-items-center justify-content-center">
						<i class="bi bi-arrow-repeat d-flex me-2 h3 my-0"></i>
						ارسال مجدد کد تایید
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
