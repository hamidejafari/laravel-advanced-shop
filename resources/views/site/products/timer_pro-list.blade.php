@extends('layouts.site.master')
@section('title'){{'پیشنهادهای ویژه فروشگاه اینترنتی و آنلاین کاج شاپ | کاج شاپ'}} @stop
@section('description')
    {{'پیشنهادهای ویژه فروشگاه اینترنتی کاج شاپ را می‌توانید در این صفحه مشاهده کنید و با بهترین قیمت از بهترین برندهای لوازم آرایشی و بهداشتی، بهترین خرید را داشته باشید.'}}
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
									<li class="breadcrumb-item active" aria-current="page">
								پیشنهاد ویژه
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-12 p-0">
						<div class="row w-100 m-0">
                            @foreach($timer_products as $timer)
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 p-1 pros-col">
                                        <div class="item p-0">
                                            <div class="card card-pro">
                                                @if($timer->calcute > 0)
                                                    <div class="offer">
                                                        {{$timer->calcute}}%
                                                    </div>
                                                @endif
                                                <div class="overlay-top">
                                                    <ul class="p-0 m-0">
                                                        <li class="float-start list-unstyled">
                                                            <button class="btn">
                                                                <i class="bi bi-heart"></i>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <a href="{{route('site.product.detail',['id'=>$timer->id])}}">
                                                    <div class="bxs">
                                                        <figure>
                                                            <div class="figure-inn">
                                                                <img src="{{$timer->pro_image}}" class="swiper-lazy" alt="{!! $timer->title !!}">
                                                            </div>
                                                        </figure>
                                                        <h4 class="text-dark fw-bolder">
                                                            {!! $timer->title !!}
                                                        </h4>
                                                        <div class="price pb-3">
                                                            @if($timer->stock_count == 0)
                                                                <span class="off">
															ناموجود
														</span>
                                                            @else
                                                                <span class="off text-dark">
															{!! $timer->price_first['price'] !!}
														</span>
                                                            @endif
                                                            @if($timer->calcute > 0)
                                                                <span class="old text-secondary">
															<del>
																{!! $timer->price_first['old'] !!}
															</del>
														</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div dir="ltr" class="w-100 pb-3">
                                                        <div class="row w-100 m-0">
                                                            <div class="col-sm-12 p-0">
                                                                <div class="timer position-relative d-flex align-items-center justify-content-center">

                                                                        <div class="d-flex align-items-center justify-content-center">
                                                                            <span class="days bg-light d-flex py-1 px-2 shadow-sm text-secondary" id="days{{$timer->id}}"></span>
                                                                            <div class="smalltext mx-1"></div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center justify-content-center">
                                                                            <span class="hours bg-light d-flex py-1 px-2 shadow-sm text-secondary" id="hours{{$timer->id}}"></span>
                                                                            <div class="smalltext mx-1">:</div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center justify-content-center">
                                                                            <span class="minutes bg-light d-flex py-1 px-2 shadow-sm text-secondary" id="minutes{{$timer->id}}"></span>
                                                                            <div class="smalltext mx-1">:</div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center justify-content-center">
                                                                            <span class="seconds bg-light d-flex py-1 px-2 shadow-sm text-secondary" id="seconds{{$timer->id}}"></span>
                                                                        </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>


                                </div>
                            @endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script>
    @foreach($timer_products as $key => $timer)
    @if($timer->date > \Carbon\Carbon::now())
    const second{{$timer->id}} = 1000,
        minute{{$timer->id}} = second{{$timer->id}} * 60,
        hour{{$timer->id}} = minute{{$timer->id}} * 60,
        day{{$timer->id}} = hour{{$timer->id}} * 24;
    let countDown{{$timer->id}} = new Date({{explode('-',$timer->date)[0]}}, {{explode('-',$timer->date)[1]}}, {{\Carbon\Carbon::parse($timer->date)->day}}, 0, 0, 0, 0).getTime(),
        x{{$timer->id}} = setInterval(function() {
            let now{{$timer->id}} = new Date().getTime(),
                distance{{$timer->id}} = countDown{{$timer->id}} - now{{$timer->id}};
            document.getElementById("days{{$timer->id}}").innerText = Math.floor(distance{{$timer->id}} / (day{{$timer->id}})) - 30;
            document.getElementById("hours{{$timer->id}}").innerText = Math.floor((distance{{$timer->id}} % (day{{$timer->id}})) / (hour{{$timer->id}}));
            document.getElementById("minutes{{$timer->id}}").innerText = Math.floor((distance{{$timer->id}} % (hour{{$timer->id}})) / (minute{{$timer->id}}));
            document.getElementById("seconds{{$timer->id}}").innerText = Math.floor((distance{{$timer->id}} % (minute{{$timer->id}})) / second{{$timer->id}});

        }, 0)
    @endif
    @endforeach
</script>
@stop
