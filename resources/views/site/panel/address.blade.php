@extends('site.panel.master')
@section('robots'){{'noindex ,nofollow' }}@stop
@section('content')
<div class="bg-one panel-head p-2">
	<h1 class="fw-bolder text-white d-flex align-items-center h4 m-0">
		<i class="bi bi-geo-alt me-2 d-flex h2 my-0"></i>
		آدرس های من
	</h1>
</div>
<div class="favorit h-100 py-1">
	<div class="row w-100 m-0">
		<div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto h-100 p-2">
			<div class="px-1">
				<div class="border bg-light shadow-sm p-2">
					<p class="fw-boldeer border-bottom h5 pb-2">
						لیست آدرس های من
					</p>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead class="table-secondary">
								<tr>
									<th class="text-center" scope="col">
										#
									</th>
									<th class="text-center" scope="col">
										نام منتخب
									</th>
									<th class="text-center" scope="col">
										استان
									</th>
									<th class="text-center" scope="col">
										شهر
									</th>
									<th class="text-center" scope="col">
										آدرس
									</th>

									<th class="text-center" scope="col">
										عملیات
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach($addresses as $key => $address)
								<tr>
									<th class="text-center text-secondary" style="vertical-align: middle;" scope="row">
										{{$key+1}}
									</th>
									<th class="text-center text-secondary" style="vertical-align: middle;" scope="row">
										{{$address->name}}
									</th>
									<td class="text-center text-secondary" style="vertical-align: middle;">
										{{@$address->state->name}}
									</td>
									<td class="text-center text-secondary" style="vertical-align: middle;">
										{!! @$address->city->name !!}
									</td>

									<td class="text-start text-secondary" style="vertical-align: middle;">
										<div class="m-0" style="white-space: pre-line;">
											{{@$address->location}}
										</div>
									</td>
									<td class="text-center text-secondary" style="vertical-align: middle;">
										<div class=" d-flex align-items-center justify-content-center">
										    <a href=""
    										    class="btn btn-sm btn-warning d-flex align-items-center text-decoration-none mx-1"
    										    data-bs-toggle="modal"
    										    data-bs-target="#adressModal{{$address->id}}">
    											<i class="bi bi-pen d-flex me-1"></i>
    											ویرایش
    										</a>
    										<a href="{{URL::action('Panel\PanelController@getDeleteAddress',$address->id)}}"
    										    type="button" onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید؟');"
    										    class="btn btn-sm btn-danger d-flex align-items-center text-decoration-none mx-1">
    											<i class="bi bi-trash d-flex me-1"></i>
    											حذف
    										</a>
    										@if($address->default_address == 1)
    										<p class="btn btn-sm btn-success d-flex align-items-center mx-1 my-0">
    										    <i class="bi bi-check-lg d-flex me-2"></i>
    										    آدرس پیشفرض
    										</p>
    										@else
    										<a href="{{URL::action('Panel\PanelController@defaultAddress',$address->id)}}"
        										data-toggle="tooltip"
        										title="انتخاب به عنوان پیشفرض"
        										type="button"
        										class="btn btn-sm btn-secondary d-flex align-items-center text-decoration-none mx-1">
    											انتخاب به عنوان پیشفرض
    										</a>
    										@endif
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<hr>
		</div>
		<div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto h-100 p-2">
			<form class="m-0" method="post" action="{{URL::action('Panel\PanelController@postAddAddress')}}"
				enctype="multipart/form-data">
				{{ csrf_field() }}
				<p class="fw-boldeer h5 pb-2 px-1">
					اضافه کردن آدرس جدید
				</p>

				<div class="row w-100 m-0">
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
							<input type="text" class="form-control" name="transferee_name"
								placeholder="نام گیرنده" />
							<label for="floatingSelect">
								نام گیرنده
								<span class="text-danger">*</span>
							</label>
						</div>
					</div>
					<div class="col-lg-4 p-1">
						<div class="form-floating">
							<input type="text" class="form-control" name="transferee_family"
								placeholder="نام خانوادگی گیرنده" />
							<label for="floatingSelect">
								نام خانوادگی گیرنده
								<span class="text-danger">*</span>
							</label>
						</div>
					</div>
					<div class="col-lg-4 p-1">
						<div class="form-floating">
							<input type="text" class="form-control" name="transferee_mobile"
								placeholder="شماره گیرنده" />
							<label for="floatingSelect">
								شماره گیرنده
								<span class="text-danger">*</span>
							</label>
						</div>
					</div>

					<div class="col-lg-4 p-1">
						<div class="form-floating">
							<select name="state_id" class="form-select" id="floatingSelect"
								aria-label="Floating label select example" v-model="selectedState"
								@change="setCities(selectedState)">
								<option value="">
									انتخاب استان
								</option>
								@foreach($states as $state)
								<option value="{{$state->id}}">
									{{$state->name}}
								</option>
								@endforeach
							</select>
							<label for="floatingSelect">
								استان
								<span class="text-danger">*</span>
							</label>
						</div>
					</div>
					<div class="col-lg-4 p-1">
						<div class="form-floating">
							<select class="form-select" id="floatingSelect"
								aria-label="Floating label select example" v-model="selectedCity"
								name="city_id">
								<option value="">
									انتخاب شهر
								</option>
								<option v-for="city in cities" :value="city.id">
									@{{city.name}}
								</option>
							</select>
							<label for="floatingSelect">
								شهر
								<span class="text-danger">*</span>
							</label>
						</div>
					</div>

					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<textarea class="form-control" placeholder="نشانی پستی" id="floatingTextarea" id="location" name="location" style="height:auto !important"></textarea>
							<label for="floatingTextarea">
								نشانی پستی
								<span class="text-danger">*</span>
							</label>
						</div>
						<small class="text-danger">
							نام - خیابان - نام کوچه - پلاک - طبقه
						</small>
					</div>
					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<input type="text" class="form-control" id="floatingPassword" name="postal_code" placeholder="کد پستی">
							<label for="floatingPassword">
								کد پستی
							</label>
						</div>
						<small>
							کد پستی باید ۱۰ رقم و بدون خط تیره باشد
						</small>
					</div>
					<div class="col-sm-12 text-end p-1">
						<button type="submit" class="btn btn-success px-5">
							ثبت آدرس
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>



@foreach($addresses as $key => $address)
<div class="modal fade" id="adressModal{{$address->id}}" tabindex="-1" aria-labelledby="adressModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="adressModalLabel">
					اضافه کردن آدرس
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				@include('site.panel.address_form.form')
			</div>
		</div>
	</div>
</div>
@endforeach


@stop
@section('js')
{{--    <script>--}}
{{--        var app = new Vue({--}}
{{--            el: '#address23',--}}
{{--            data:{--}}
{{--                selectedState:'',--}}
{{--                selectedCity: '',--}}


{{--                @foreach($addresses as $row)--}}
{{--                selectedState{{$row->id}}:{{$row->state_id}},--}}
{{--                selectedCity{{$row->id}}: {{$row->city_id}},--}}
{{--                @endforeach--}}
{{--                cities: [],--}}

{{--                msg: 'Test'--}}
{{--            },--}}
{{--            mounted() {--}}

{{--                this.getCities();--}}
{{--                this.getEditCities(null);--}}


{{--            },--}}
{{--            methods: {--}}
{{--                getCities:function ()  {--}}
{{--                    var vm = this;--}}


{{--                    axios.post(`{{route('panel.set-city')}}`, {--}}
{{--                        body: {}--}}
{{--                    })--}}
{{--                        .then(response => {--}}
{{--                            if (response.data.success === true) {--}}
{{--                                vm.cities = response.data.cities;--}}
{{--                            }--}}
{{--                        })--}}
{{--                        .catch(e => {--}}
{{--                            console.log(e);--}}
{{--                        });--}}
{{--                },--}}
{{--                setCities:function ()  {--}}

{{--                    var vm = this;--}}

{{--                    axios.post(`{{route('panel.set-city')}}`, {--}}
{{--                        body: {  state_id: this.selectedState }--}}
{{--                    })--}}
{{--                        .then(response => {--}}
{{--                            if (response.data.success === true) {--}}
{{--                                vm.cities = [];--}}
{{--                                vm.cities = response.data.cities;--}}
{{--                            }--}}
{{--                        })--}}
{{--                        .catch(e => {--}}
{{--                            console.log(e);--}}
{{--                        });--}}
{{--                },--}}
{{--                getEditCities:function (selectedState)  {--}}
{{--                    var vm = this;--}}


{{--                    axios.post(`{{route('panel.set-city-edit')}}`, {--}}
{{--                        body: {--}}
{{--                            state_id: selectedState--}}
{{--                        }--}}
{{--                    })--}}
{{--                        .then(response => {--}}
{{--                            if (response.data.success === true) {--}}
{{--                                vm.cities = response.data.cities;--}}
{{--                            }--}}
{{--                        })--}}
{{--                        .catch(e => {--}}
{{--                            console.log(e);--}}
{{--                        });--}}

{{--                }--}}
{{--            }--}}
{{--        })--}}
{{--    </script>--}}

@endsection
