@extends('layouts.site.master')
@section('title'){{'برندهای لوازم آرایشی و بهداشتی اصل و اورجینال | کاج شاپ'}} @stop
@section('description')
    {{'برندهای لوازم آرایشی و بهداشتی اصل و اورجینال را می‌توانید در سایت کاج شاپ مشاهده کنید و از فروشگاه آنلاین کاج شاپ با خیالی آسوده برای اصل بودن کالای خود، خرید کنید.'}}
@stop
@section('content')

<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="brandssd">
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
										برندها
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="card border-0 rounded-0 p-3">
							<h1 class="fw-bolder text-one">
								<span>
									لیست برندها
								</span>
							</h1>
							<div dir="ltr">
								<span class="d-md-none d-sm-block d-xs-block helpsc">
									برای مشاهده بیشتر حروف به چپ و راست بکشید
								</span>
								<div class="overflow-y-scroll">
									<ul class="nav nav-pills m-auto p-0 max-content" id="pills-tab"
										role="tablist">
                                        @foreach($letters as $key => $letter)
										<li class="nav-item mx-auto" role="presentation">
											<button class="nav-link w-100 fw-bolder px-3 @if($key == 0) active @endif"
												id="pills-{{$letter['title']}}-tab" data-bs-toggle="pill"
												data-bs-target="#pills-{{$letter['title']}}" type="button" role="tab"
												aria-controls="pills-{{$letter['title']}}" aria-selected="true">
								{{$letter['title']}}
												<i class="bi bi-caret-down-fill me-2"></i>
											</button>
										</li>
                                        @endforeach
									</ul>
								</div>
								<div class="tab-content" id="pills-tabContent">
                                    @foreach($letters as $key => $letter)
									@include('site.brand.content.tab-content')
                                    @endforeach
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@stop
