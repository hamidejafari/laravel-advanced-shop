@extends('layouts.site.master')
@section('content')

<main class="content bg-two" v-if="cartItems.length > 0">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<form action="{{route('site.cart.post-checkout')}}" method="POST">
			{{ csrf_field() }}
			<div class="cart">
				<div class="container">
					<div class="row w-100 m-0">
						<div class="col-sm-12 p-1">
							<div class="card card-mobile border-0 rounded-0 py-2 px-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item">
											<a href="/">
												<i class="bi bi-house"></i>
												خانه
											</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											سبد خرید
										</li>
									</ol>
								</nav>
							</div>
						</div>

						<div class="col-xl-9 col-md-7 p-0">
							<div class="col-sm-12 px-1">
								<div class="alert alert-danger alert-dismissible mx-0 my-1 rounded-0 fade show"
									role="alert">
									{{@$setting_header->alert}}
									<button type="button" class="btn-close" data-bs-dismiss="alert"
										aria-label="Close"></button>
								</div>
							</div>
							<div class="col-sm-12 p-1">
								@include('site.cart.contents.cont')
							</div>
						</div>
						<div class="col-xl-3 col-md-5 p-1">
							@include('site.cart.contents.sidebar')
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

	<!-- Modal -->
	@if($addresses != null)
	@foreach($addresses as $row)
	<!-- Modal -->
	<div class="modal fade" id="adressModal{{$row->id}}" tabindex="-1" aria-labelledby="adressModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="adressModalLabel">
						اضافه کردن آدرس
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form class="m-0" method="post"
						action="{{URL::action('Panel\PanelController@postEditAddress',$row->id)}}"
						enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="row w-100 m-0">
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<input type="text" class="form-control" name="transferee_name"
										value="{{$row->transferee_name}}" placeholder="نام گیرنده" />
									<label for="floatingSelect">
										نام گیرنده<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<input type="text" class="form-control" name="transferee_family"
										value="{{$row->transferee_family}}"
										placeholder="نام خانوادگی گیرنده" />
									<label for="floatingSelect">
										نام خانوادگی گیرنده<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<input type="text" class="form-control" name="transferee_mobile"
										value="{{$row->transferee_mobile}}" placeholder="شماره گیرنده" />
									<label for="floatingSelect">
										شماره گیرنده<span class="text-danger">*</span>
									</label>
								</div>
							</div>
                            <div class="col-lg-4 p-1">
                                <div class="form-floating">
                                    <select name="name" class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" required>
                                        <option value="خانه">خانه</option>
                                        <option value="محل کار">محل کار</option>
                                        <option value="غیره">غیره</option>

                                    </select>
                                    <label for="floatingSelect">
                                        نام آدرس<span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<select name="state_id" class="form-select" id="floatingSelect" required
										aria-label="Floating label select example"
										v-model="selectedState{{$row->id}}"
										@change="getEditCities(selectedState{{$row->id}})">
										<option value=""> انتخاب استان </option>
										@foreach($states as $state)
										<option value="{{$state->id}}">{{$state->name}}</option>
										@endforeach
									</select>
									<label for="floatingSelect">
										استان<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<select class="form-select" id="floatingSelect"
										aria-label="Floating label select example" required
										v-model="selectedCity{{$row->id}}" name="city_id">
										<option value="">انتخاب شهر </option>
										<option v-for="city in cities" :value="city.id">@{{city.name}}
										</option>
									</select>
									<label for="floatingSelect">
										شهر<span class="text-danger">*</span>
									</label>
								</div>
							</div>

							<div class="col-sm-8 p-1">
								<div class="form-floating">
									<textarea class="form-control" placeholder="ادامه آدرس
مثال:محله-خیابان اصلی-خیابان فرعی-کوچه-پلاک -طبقه"
										id="floatingTextarea" id="location" name="location" required
										style="height:auto !important">{{$row->location}}</textarea>
									<label for="floatingTextarea">نشانی پستی
<br>
ادامه آدرس
مثال:محله-خیابان اصلی-خیابان فرعی-کوچه-پلاک -طبقه<span class="text-danger">*</span></label>

								</div>
							</div>
							<div class="col-sm-4  p-1">
								<div class="form-floating">
									<input type="text" class="form-control" id="floatingPassword"
										name="postal_code" value="{{$row->postal_code}}"
										placeholder="کد پستی">
									<label for="floatingPassword">
										کد پستی
									</label>
								</div>
								<small>
									کد پستی باید ۱۰ رقم و بدون خط تیره باشد
								</small>
							</div>
							<div class="col-sm-12 text-end p-1">
								<button type="submit" class="btn btn-success">
									تایید و ثبت ارسال
								</button>
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	@endforeach
	<div class="modal fade" id="adressModalmain" tabindex="-1" aria-labelledby="adressModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="adressModalLabel">
						اضافه کردن آدرس
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form class="m-0" method="post" action="{{URL::action('Site\ShopController@postAddAddress')}}"
						enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="hidden" name="order_id" :value="order.id">
						<div class="row w-100 m-0">
                            <div class="col-lg-4 p-1">
                                <div class="form-floating">
                                    <select name="name" class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" required
                                            oninvalid='swal("", "عنوان آدرس اجباری  است", "error")'>
                                        <option value="خانه">خانه</option>
                                        <option value="محل کار">محل کار</option>
                                        <option value="غیره">غیره</option>

                                    </select>
                                    <label for="floatingSelect">
                                        عنوان آدرس<span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<input type="text" class="form-control" required
										oninvalid='swal("", "نام گیرنده اجباری است", "error")'
										name="transferee_name" placeholder="نام گیرنده" />
									<label for="floatingSelect">
										نام گیرنده<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<input type="text" class="form-control" name="transferee_family"
										placeholder="نام خانوادگی گیرنده" required
										oninvalid='swal("", "نام خانوادگی اجباری است", "error")' />
									<label for="floatingSelect">
										نام خانوادگی گیرنده<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<input type="text" class="form-control" name="transferee_mobile"
										placeholder="شماره گیرنده" required
										oninvalid='swal("", " شماره گیرنده اجباری است", "error")' />
									<label for="floatingSelect">
										شماره گیرنده<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<select name="state_id" class="form-select" required
										oninvalid='swal("", " انتخاب استان", "error")' id="floatingSelect"
										aria-label="Floating label select example" v-model="selectedState"
										@change="setCities(selectedState)">
										<option value=""> انتخاب استان </option>
										@foreach($states as $state)
										<option value="{{$state->id}}">{{$state->name}}</option>
										@endforeach
									</select>
									<label for="floatingSelect">
										استان<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<select class="form-select" id="floatingSelect"
										aria-label="Floating label select example" required
										oninvalid='swal("", " انتخاب شهر اجباری است", "error")'
										v-model="selectedCity" name="city_id">
										<option value="">انتخاب شهر </option>
										<option v-for="city in cities" :value="city.id">@{{city.name}}
										</option>
									</select>
									<label for="floatingSelect">
										شهر<span class="text-danger">*</span>
									</label>
								</div>
							</div>

							<div class="col-sm-12 p-1">
								<div class="form-floating">
									<textarea class="form-control" placeholder="نشانی پستی" required
										oninvalid='swal("", "نشانی پستی اجباری است", "error")'
										id="floatingTextarea" id="location" name="location"
										style="height:auto !important"></textarea>
<label for="floatingTextarea">نشانی پستی <span class="text-danger">*</span> <br><p style="color: #9d9c9c;">ادامه آدرس مثال:محله-خیابان اصلی-خیابان فرعی-کوچه-پلاک -طبقه</p></label>

								</div>
							</div>
							<div class="col-sm-12 p-1">
								<div class="form-floating">
									<input type="number" class="form-control" id="floatingPassword"
										name="postal_code"  placeholder="کد پستی" minlength="10"
                                           oninvalid='swal("", "کد پستی حتما باید ۱۰ رقم باشد", "error")'
                                    >
									<label for="floatingPassword">
										کد پستی
									</label>
								</div>
								<small>
									کد پستی باید ۱۰ رقم و بدون خط تیره باشد
								</small>
							</div>
							<div class="col-sm-12 text-end p-1">
								<button type="submit" class="btn btn-success">
									تایید و ثبت ارسال
								</button>
							</div>

						</div>
					</form>
					<div class="col-sm-12 text-end p-1">
						@include('site.cart.contents.add-addresses')
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
</main>
<main class="content bg-two" v-else>
	<div class="row w-100 m-0 py-5">
		@include('site.panel.content.empty')
	</div>
</main>


@stop
