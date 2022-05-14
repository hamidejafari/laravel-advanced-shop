@extends('layouts.site.master')
@section('robots'){{'noindex ,nofollow' }}@stop
@section('content')

<div class="auth py-5 my-5 d-flex align-items-center justify-content-center">
	<div class="row w-100 m-0">
		<div class="col-xxl-4 col-xl-6 col-lg-7 col-md-8 col-sm-10 col-xs-12 m-auto p-1">
			<div class="card shadow border-0 rounded-0 p-3">
				<div class="headerr">
					<a href="/" class="">
						<img src="{{asset('assets/site/images/kaj/kaj.png')}}" />
					</a>
					<p class="h4 fw-bolder text-center text-dark m-0">
						ثبت نام
					</p>
					<i class="bi bi-person-plus d-flex"></i>
				</div>
				<form class="mb-0 mt-4" method="post" action="{{ route('register') }}" enctype="multipart/form-data">
					{{ csrf_field() }}


					<input name="product_id" value="{{$product_id}}" type="hidden" />
                    <input name="reminder_id" value="{{@$reminder_id}}" type="hidden" />

                    @if(isset($order))
                        <input name="order" value="1" type="hidden" />
                    @endif
					<div class="row w-100 m-0">
						<div class="col-sm-6 p-1">
							<div class="form-floating">
								<input value="{{ old('name') }}" type="text" class="form-control input_id"
									id="floatingInput" placeholder="نام" name="name">
								<label for="floatingInput">
									نام
								</label>
							</div>
						</div>
						<div class="col-sm-6 p-1">
							<div class="form-floating">
								<input value="{{ old('family') }}" type="text" class="form-control"
									id="floatingInput" placeholder="  نام خانوادگی" name="family">
								<label for="floatingInput">
									نام خانوادگی
								</label>
							</div>
						</div>
						<div class="col-sm-6 col-xs-6 p-1">
							<div class="form-floating">
								<select class="form-select" name="gender" id="floatingSelect"
									aria-label="Floating label select example">
									<option value="" selected disabled>انتخاب کنید</option>
									@foreach($gender as $key=>$item)
									<option value="{{$key}}">{{$item}}</option>
									@endforeach
								</select>
								<label for="floatingSelect">جنسیت</label>
							</div>
						</div>
						<div class="col-sm-6 col-xs-6 p-1">
							<div class="form-floating">
								<input value="" type="text" name="birthday" class="form-control example1 pwt-datepicker-input-element"
									placeholder="تاریخ تولد">
								<label for="">
									تاریخ تولد
								</label>
							</div>
						</div>
						<div class="col-sm-6 p-1">
							<div class="form-floating">
								<input value="{{ old('mobile') }}" type="tel" name="mobile" class="form-control"
									id="floatingInput" placeholder="شماره موبایل">
								<label for="floatingInput">
									شماره موبایل
								</label>
							</div>
						</div>
						<div class="col-sm-6 p-1">
							<div class="form-floating">
								<input value="{{ old('email') }}" type="email" name="email" class="form-control"
									id="floatingInput" placeholder="ایمیل">
								<label for="floatingInput">
									ایمیل
								</label>
							</div>
						</div>
						<div class="col-sm-6 text-start p-0">
							<div class="col-sm-12 text-start p-1">
								<div class="form-floating">
									<input type="password" name="password" class="form-control" id="myInput" placeholder="رمز ورود">
									<label for="txtPassword">
										رمز ورود
									</label>
								</div>
							</div>
							<div class="col-sm-12 text-start p-1">
								<div class="text-start border p-2">
									<div class="form-check d-flex align-items-center p-0">
										<input type="checkbox" class="d-flex" id="checkboxsd" onclick="myFunction()">
										<label for="checkboxsd">
										نمایش رمز ورود
										</label>
									</div>
								</div>
								<small class="text-danger">
									حداقل ۶ کاراکتر به دلخواه
								</small>
							</div>
						</div>
						<div class="col-sm-6 text-end p-1">
							<div class="form-floating">
								<input type="password" name="re-password" class="form-control" id="myInput"
									placeholder="تکرار رمز ورود">
								<label for="txtrePassword">
									تکرار رمز ورود
								</label>
							</div>
						</div>
						<div class="col-xxl-12 p-1">
							<div class="form-floating">
								<button type="submit" class="btn btn-success btn-lg w-100">
									ثبت نام
								</button>
							</div>
						</div>
						<div class="col-xxl-12 text-center px-1 py-4">
							<div class="form-floating">
								<p class="m-0">
									اگر قبلا ثبت نام کرده اید،
									<a href="{{ route('panel.log') }}" class="text-one fw-bolder">
										وارد
									</a>
									شوید
								</p>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

    <script type="text/javascript">
        $(document).ready(function () {
        $(".input_id").keypress(function (event) {
            var ew = event.which;
            // alert(ew);
            if (48 <= ew && ew <= 57)
                return false;
            if (65 <= ew && ew <= 90)
                return false;
            if (97 <= ew && ew <= 122)
                return false;
            if (8 == ew || ew == 64 || ew == 46)

                return false;


            return true;

        });
    });

</script>
@stop
@section('js')

<script id="rendered-js">
	$(document).ready(function () {
		$(".example1").pDatepicker({
			initialValueType: "gregorian",
			format: "YYYY/MM/DD",
			onSelect: "year"
		});

	});
</script>


@stop
