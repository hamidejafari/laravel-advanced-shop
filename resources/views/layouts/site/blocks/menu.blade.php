<menu class="menu">
	<div class="d-md-block d-sm-none d-xs-none">
		<div class="topnav">
			<div class="container">
				<div class="row w-100 m-0">
					<div class="col-lg-4 col-md-6 p-xxl-2 p-md-1 align-self-center">
						@include('layouts.site.blocks.search-form')
					</div>
					<div class="col-lg-4 col-md-2 p-xxl-2 text-center p-md-1 align-self-center">
						<a href="{{route('site.home')}}" class="navbar-brand mx-auto">
							<img src="{{asset('assets/uploads/content/set/'.$setting_header->logo)}}" alt="{{$setting_header->title}}" class="text-white">
						</a>
					</div>
					<div class="col-lg-4 col-md-4 p-xxl-2 p-md-1 align-self-center">
						<ul class="p-0 my-0 ms-auto max-content user d-flex me-0">
							<li class="d-inline my-0 ms-2 me-0 dr position-relative">
								<a @if(!\Auth::check()) href="{{route('panel.log')}}" @else
									href="{{route('panel.dashboard')}}" @endif>
									<div class="user-icon">
										<i class="bi bi-person-circle justify-content-center d-flex"></i>
									</div>
								</a>
								<div class="over-tool">
                                    @if(!\Auth::check())
                                    <p class="m-0">
										ثبت نام کنید یا وارد شوید
									</p>
                                    @else
                                        <p class="m-0">
                                            {{\Auth::user()->name.' '.\Auth::user()->family}}
                                        </p>
                                    @endif
								</div>
							</li>

							<li class="d-inline my-0 ms-2 me-0 bag dr position-relative">
								<a href="{{route('site.cart.checkout')}}">
									<div class="user-icon">
										<i class="bi bi-cart2 justify-content-center d-flex"></i>
										<div class="badge">
											@{{ cartTotal }}
										</div>
									</div>
								</a>
								@if(Auth::check())
								@include('layouts.site.blocks.cartnav')
								@else
								<div class="over-tool">
									<p class="m-0">
										سبد خرید
									</p>
								</div>
								@endif
							</li>

							<li class="d-inline my-0 ms-2 me-0 dr position-relative">
								<a @if(!\Auth::check()) href="{{route('panel.log')}}" @else
									href="{{route('panel.favorites')}}" @endif>
									<div class="user-icon">
										<i class="bi bi-suit-heart justify-content-center d-flex"></i>
									</div>
									<div class="over-tool">
										<p class="m-0">
											مشاهده علاقه مندی ها
										</p>
									</div>
								</a>
							</li>
						</ul>
					</div>
					<!-- <div class="col-lg-2 col-md-4 ms-md-auto p-xxl-2 p-md-1 align-self-center">
						<a href="tel:{{@$setting_header->contact}}" class="d-flex justify-content-end nav-call">
							{{@$setting_header->contact}}
							<i class="bi bi-telephone text-one ms-2"></i>
						</a>
						<a href="mailto:{{@$setting_header->email}}" class="d-flex justify-content-end nav-call">
							{{@$setting_header->email}}
							<i class="bi bi-envelope text-one ms-2"></i>
						</a>
					</div> -->
				</div>
			</div>
		</div>
		<div class="bottmnav bg-dark">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<div class="container-fluid px-2">
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
							data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
							aria-label="Toggle navigation">
							<i class="bi bi-list d-flex"></i>
						</button>
						<div class="collapse navbar-collapse" id="navbarNav">
							<ul class="navbar-nav mx-auto">
								<li class="nav-item mega">
									<a class="nav-link" href="">
										دسته بندی محصولات
									</a>
									<div class="mega-box position-absolute">
										@include('layouts.site.blocks.mega-cat')
									</div>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('site.home')}}">
										صفحه اصلی
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('site.brand.list')}}">
										برندها
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('site.timer')}}">
										فروش ویژه
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('site.tracking')}}">
										پیگیری سفارشات
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('site.rules')}}">
										قوانین و مقررات
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('site.contact')}}">
										تماس با ما
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('site.about')}}">
										درباره ما
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('site.blog.cat')}}">
										مجله مد و زیبایی
									</a>
								</li>
                                								<li class="nav-item">
                                									<a class="nav-link" href="{{route('site.dis')}}">
                                                                        تخفیف دار ها
                                									</a>
                                								</li>
{{--								<li class="nav-item">--}}
{{--									<a class="nav-link" href="{{route('site.timer')}}">--}}
{{--										پیشنهاد ویژه--}}
{{--									</a>--}}
{{--								</li>--}}

								<li class="nav-item">
									<a class="nav-link" href="{{route('site.orderrules')}}">
										راهنمای ثبت سفارش
									</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<div class="d-md-none d-sm-block d-xs-block">
		<div class="searche p-1">
			<div class="row w-100 m-0 menu-form-row">
				<div class="col-sm-1 col-xs-3 align-self-center p-1">
					<a href="{{route('site.home')}}">
						<img src="{{asset('assets/uploads/content/set/'.$setting_header->logo)}}"
							alt="" class="w-100" />
					</a>
				</div>
				<div class="col-sm-9 col-xs-6 align-self-center p-1">
					<div class="rounded-pill overflow-hidden">
						@include('layouts.site.blocks.search-form')
					</div>
				</div>
				<div class="col-sm-2 col-xs-3 align-self-center p-1">
					<div class="d-flex align-items-center justify-content-center">
						<a @if(\Auth::check()) href="{{route('site.cart.checkout')}}" @else
							href="{{route('panel.log')}}" @endif
							class="d-flex max-content mx-auto text-one p-1 align-items-center justify-content-center">
							<i class="bi bi-cart2 justify-content-center d-flex text-dark h3 my-0"></i>
						</a>
						<a @if(!\Auth::check()) href="{{route('panel.log')}}" @else
							href="{{route('panel.favorites')}}" @endif
							class="d-flex max-content mx-auto text-one p-1 align-items-center justify-content-center">
							<i class="bi bi-suit-heart justify-content-center d-flex text-dark h3 my-0"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="scroll-menu">
			<div class="scrollmenu p-xs-2 p-sm-1 p-0">
				<a href="{{route('site.home')}}" class="text-dark bg-white shadow-sm rounded-3">
					صفحه اصلی
				</a>
				<a href="{{route('site.brand.list')}}" class="text-dark bg-white shadow-sm rounded-3">
					برندها
				</a>
				<a href="{{route('site.timer')}}" class="text-dark bg-white shadow-sm rounded-3">
					فروش ویژه
				</a>
				<a href="{{route('site.tracking')}}" class="text-dark bg-white shadow-sm rounded-3">
					پیگیری سفارشات
				</a>
				<a href="{{route('site.rules')}}" class="text-dark bg-white shadow-sm rounded-3">
					قوانین و مقررات
				</a>
				<a href="{{route('site.contact')}}" class="text-dark bg-white shadow-sm rounded-3">
					تماس با ما
				</a>
				<a href="{{route('site.about')}}" class="text-dark bg-white shadow-sm rounded-3">
					درباره ما
				</a>
				<a href="{{route('site.blog.cat')}}" class="text-dark bg-white shadow-sm rounded-3">
					مجله مد و زیبایی
				</a>
                <a href="{{route('site.dis')}}" class="text-dark bg-white shadow-sm rounded-3">
                    تخفیف دار ها
                </a>
{{--				<a href="{{route('site.timer')}}" class="text-dark bg-white shadow-sm rounded-3">--}}
{{--					پیشنهاد ویژه--}}
{{--				</a>--}}
				<a href="{{route('site.orderrules')}}" class="text-dark bg-white shadow-sm rounded-3">
					راهنمای ثبت سفارش
				</a>
			</div>
		</div>
	</div>
</menu>
<div class="cont-fix d-sm-block d-xs-block d-md-none">
	<div class="row w-100 m-0">
		<div class="col-xs text-center col-sm psd">
			<a href="{{route('site.home')}}" @if(count($seg)==0) class="active" @endif>
				<i class="bi bi-inactive bi-house"></i>
				<i class="bi bi-active bi-house-fill"></i>
				<p>
					خانه
				</p>
			</a>
		</div>
		<div class="col-xs text-center col-sm psd">
			<a href="" class="" data-bs-toggle="modal" data-bs-target="#catModal">
				<i class="bi bi-inactive bi-grid"></i>
				<i class="bi bi-active bi-grid-fill"></i>
				<p>
					دسته بندی
				</p>
			</a>
		</div>

		<div class="col-xs text-center col-sm psd">
            <a href="{{route('site.dis')}}" @if(count($seg)==1 && $seg[0]=='discount' ) class="active"
                @endif>
				<i class="bi bi-inactive bi-tags"></i>
				<i class="bi bi-active bi-tags-fill"></i>
				<p>
				تخفیف دار ها
				</p>
			</a>
		</div>
		<div class="col-xs text-center col-sm psd">
			<a @if(!\Auth::check()) href="{{route('panel.log')}}" @else href="{{route('panel.dashboard')}}"
				@if(count($seg)>= 2 && $seg[1] == 'dashboard' ) class="active" @endif
				@endif>
				<i class="bi bi-inactive bi-person"></i>
				<i class="bi bi-active bi-person-fill"></i>
				<p>
					@if(!\Auth::check()) ورود/ثبت نام @else حساب کاربری @endif

				</p>
			</a>
		</div>
	</div>
</div>
