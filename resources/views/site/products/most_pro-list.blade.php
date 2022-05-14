@extends('layouts.site.master')
@section('title')
    @if($seg[0] == 'popular')
    {{'محبوب ترین محصولات فروشگاه اینترنتی و آنلاین کاج شاپ | کاج شاپ'}}
    @elseif($seg[0] == 'latest')
        {{'جدیدترین محصولات فروشگاه اینترنتی و آنلاین کاج شاپ | کاج شاپ'}}
    @else
        {{'پرفروش ترین محصولات لوازم آرایشی و بهداشتی اورجینال | کاج شاپ'}}
    @endif
@stop
@section('description')

    @if($seg[0] == 'popular')
        {{'محبوب ترین محصولات فروشگاه اینترنتی کاج شاپ را با بهترین قیمت از بهترین برندهای لوازم آرایشی و بهداشتی به صورت آنلاین از کاج شاپ خریداری کنید.'}}
    @elseif($seg[0] == 'latest')
        {{'جدیدترین محصولات فروشگاه اینترنتی کاج شاپ را با بهترین قیمت از بهترین برندهای لوازم آرایشی و بهداشتی به صورت آنلاین از کاج شاپ خریداری کنید.'}}
    @else
        {{'پرفروش ترین محصولات لوازم آرایشی اورجینال را می‌توانید در سایت کاج شاپ مشاهده کنید و از فروشگاه آنلاین کاج شاپ با خیالی آسوده برای اصل بودن کالای خود، خرید کنید.'}}
    @endif
@stop
@section('content')

<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="product product-list">
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
                                    @php
                                    $seg = request()->segments();
                                    @endphp
                                    @if($seg[0] == 'popular')
									<li class="breadcrumb-item active" aria-current="page">
									محبوبترین ها
									</li>
                                    @elseif($seg[0] == 'latest')
                                        <li class="breadcrumb-item active" aria-current="page">
                                         جدیدترین ها
                                        </li>
                                    @else
                                        <li class="breadcrumb-item active" aria-current="page">
                                            پرفروش ترین ها
                                        </li>
                                    @endif
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-12 p-0">
						<div class="row w-100 m-0">
                            @foreach($most_products as $most)
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 p-1 pros-col">
                                    @include('layouts.site.blocks.product-box',['item' => $most])

                                </div>
                            @endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@stop
