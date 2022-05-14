@extends('layouts.site.master')
@section('title'){{'با ما در تماس باشید [راه های ارتباط با ما] | کاج شاپ'}} @stop
@section('description')
    {{'با ما در تماس باشید؛ راه های ارتباط با ما شامل تلفن تماس با پشتیبانی، ایمیل پشتیبانی، آدرس فروشگاه مرکزی، دایرکت اینستاگرام کاج شاپ و واتس اپ کاج شاپ می‌باشد.'}}
@stop
@section('content')
    @include('layouts.message-swal')
<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="contactus">
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
										تماس با ما
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-lg-6 p-1">
						<div class="card border-0 rounded-0 p-2">
							<h2 class="h4 text-one fw-bolder p-1">
								فرم ارتباط با ما
							</h2>
                            <form action="{{URL::action('Site\HomeController@postContact')}}" method="POST" class="m-0">
                                {{csrf_field()}}
                                <input type="hidden" name="type" value="4">
								<div class="row w-100 m-0">
									<div class="col-sm-12 p-1">
										<div class="form-floating">
											<input type="text" class="form-control rounded-0" name="name"
												id="floatingInput" placeholder="نام و نام خانوادگی">
											<label for="floatingInput">
												نام و نام خانوادگی
												<span class="text-danger">*</span>
											</label>
										</div>
									</div>
									<div class="col-sm-12 p-1">
										<div class="form-floating">
											<input type="tel" class="form-control rounded-0" name="phone"
												id="floatingInput" placeholder="شماره همراه">
											<label for="floatingInput">
												شماره همراه
												<span class="text-danger">*</span>
											</label>
										</div>
									</div>
									<div class="col-sm-12 p-1">
										<div class="form-floating">
											<input type="tel" class="form-control rounded-0" name="subject"
												id="floatingInput" placeholder="موضوع پیام">
											<label for="floatingInput">
												موضوع پیام
												<span class="text-danger">*</span>
											</label>
										</div>
									</div>
									<div class="col-sm-12 p-1">
										<div class="form-floating">
											<textarea class="form-control rounded-0" name="message"
												placeholder="متن پیام شما" id="floatingTextarea2"
												style="height: 7rem"></textarea>
											<label for="floatingTextarea2">
												متن پیام شما
												<span class="text-danger">*</span>
											</label>
										</div>
									</div>
									<div class="col-xl-6 ms-auto p-1">
										<button type="submit" class="btn btn-success btn-lg rounded-0 w-100">
											ارسال پیام
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6 p-1">
						<div class="card border-0 rounded-0 p-1 h-100">
							<h2 class="h4 text-one fw-bolder px-2 py-1">
								راه های ارتباط با ما
							</h2>
							<div class="row w-100 m-0">
								<div class="col-sm-12 p-1">
									<ul class="p-0 m-0">
										<li class="list-unstyled p-1">
											<div class="alert alert-danger rounded-0 d-flex align-items-center" role="alert">
												<i class="bi bi-exclamation-triangle d-flex me-2"></i>
												<div>
													برای پیشگری از شیوع ویروس کرونا تا اطلاع بعدی فروش
													حضوری تعطیل می باشد.
												</div>
											</div>
										</li>
										<li class="list-unstyled p-1">
											<a href="tel:{{@$setting_header->contact}}" class="d-flex align-items-center text-secondary">
												<i class="bi bi-telephone d-flex my-0 me-2 h4"></i>
												تماس با پشتیبانی : {{@$setting_header->contact}}
											</a>
										</li>
										<li class="list-unstyled p-1">
											<a href="mailto:{{@$setting_header->email}}" class="d-flex align-items-center text-secondary">
												<i class="bi bi-envelope d-flex my-0 me-2 h4"></i>
												ایمیل پشتیبانی : {{@$setting_header->email}}
											</a>
										</li>
										<li class="list-unstyled p-1">
											<a class="d-flex align-items-center text-secondary">
												<i class="bi bi-pin-map d-flex my-0 me-2 h4"></i>
												آدرس فروشگاه مرکزی :  {{@$setting_header->address}}
											</a>
										</li>
                                        @php
                                            $instagram = \App\Models\Social::where('name','instagram')->first();
                                            $whatsapp = \App\Models\Social::where('name','whatsapp')->first();
                                            @endphp
										<li class="list-unstyled p-1">
											<p class="my-1 text-secondary">
												در صورت عدم پاسخگویی از طریق دایرکت
												<a href="{{@$instagram->address}}" class="text-one" rel="noopener noreferrer nofollow">
													اینستاگرام کاج
												</a>
												و یا از طریق
												<a href="{{@$whatsapp->address}}" class="text-one" rel="noopener noreferrer nofollow">
													واتس اپ کاج
												</a>
												به شماره
												<a href="tel:{{@$setting_header->phone}}" class="text-one">
                                                    {{@$setting_header->phone}}
												</a>
												پیام ارسال نمایید.
											</p>
											<p class="my-1 text-secondary">
											از طریق صفحه بالا (موبایل) سمت راست (کامپوتر دسکتاپ) پیام ارسال نمایید.
											</p>
											<p class="my-1 text-secondary">
											از طریق صفحه سفارش هم می توانید با ما در تماس باشید.
											</p>
										</li>
										<li class="list-unstyled p-0">
											<ul class="px-0 pt-3 pb-0 m-0">
                                                @foreach($social_header as $social)
												<li class="list-unstyled float-start p-1 me-2">
													<a href="{{@$social->address}}" class="" rel="noopener noreferrer nofollow">
														<i class="{{@$social->icon}}"></i>
													</a>
												</li>
                                                @endforeach
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 p-1">
						<div class="card border-0 rounded-0 p-3" style="direction:ltr">
                            {!! @$setting_header->maps !!}
                      </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@stop
