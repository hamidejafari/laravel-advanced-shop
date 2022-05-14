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
					<i class="bi bi-box-arrow-in-right d-flex"></i>
				</div>
				<form class="mb-0 mt-4" method="POST" action="{{URL::action('Panel\LoginController@postPassword')}}"
					enctype="multipart/form-data">
					{{ csrf_field() }}

                    <input name="product_id" value="{{$product_id}}" type="hidden" />
                    <input name="reminder_id" value="{{@$reminder_id}}" type="hidden" />

                    @if(isset($order))
                        <input name="order" value="1" type="hidden" />
                    @endif

					<div class="row w-100 m-0">
						<div class="col-xxl-12 p-1">
							<div class="form-floating">
								<input type="tel" name="mobile" class="form-control" id="floatingInput" placeholder="شماره موبایل">
								<label for="floatingInput">
									شماره موبایل یا ایمیل
								</label>
							</div>
							<small class="text-success">
								شماره موبایل یا ایمیل خود را وارد کنید
							</small>
						</div>
						<div class="col-xxl-12 p-1">
							<div class="form-floating">
								<button type="submit" class="btn btn-success btn-lg w-100">
									ورود
								</button>
							</div>
						</div>
						<div class="col-xxl-12 text-center px-1 py-4">
							<div class="form-floating">
								<p class="m-0">
									اگر قبلا ثبت نام نکرده اید،
									<a href="{{ url('/panel/register?order=1') }}" class="text-one fw-bolder">
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
