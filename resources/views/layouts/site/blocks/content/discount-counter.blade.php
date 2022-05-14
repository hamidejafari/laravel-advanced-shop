<div class="w-100">
	<div class="offer">
		فروش ویژه
	</div>
	<div id="offCarousel" class="carousel carousel-fade slide position-inherit" data-bs-ride="carousel" data-bs-interval="5000">
		<div class="carousel-inner">
			@foreach($timer_products as $key => $timer)
			<div class="carousel-item @if($key == 0) active @endif">
				<div dir="ltr" class="w-100">
					<div class="row w-100 m-0">
						<div class="col-xxl-12 p-0">
							<div class="timer position-relative">
								@if($timer->date > \Carbon\Carbon::now())
								<div>
									<span class="days" id="days{{$timer->id}}"></span>
									<div class="smalltext mx-1">:</div>
								</div>
								<div>
									<span class="hours" id="hours{{$timer->id}}"></span>
									<div class="smalltext mx-1">:</div>
								</div>
								<div>
									<span class="minutes" id="minutes{{$timer->id}}"></span>
									<div class="smalltext mx-1">:</div>
								</div>
								<div>
									<span class="seconds" id="seconds{{$timer->id}}"></span>
								</div>
								@else
								<p class="position-absolute top-0 bottom-0 end-0 start-0 bg-light h-100 d-flex align-items-center justify-content-center fw-bolder">
									به پایان رسید
								</p>
								@endif
							</div>
						</div>
					</div>
				</div>
				<a href="{{route('site.product.detail',['id'=>$timer->id])}}">
					<img src="{{$timer->pro_image}}" class="d-block mx-auto mt-3 w-50" alt="{!! $timer->title !!}">
					<h4 class="off-name text-center d-flex">
						{!! $timer->title !!}
					</h4>
					<div class="price">
						@if($timer->stock_count == 0)
						<span class="off">
							ناموجود
						</span>
						@else
						<span class="off">
							{!! $timer->price_first['price'] !!}
						</span>
						@endif
						@if($timer->calcute > 0)
						<span class="old">
							{!! $timer->price_first['old'] !!}
						</span>
						@endif
					</div>
				</a>
			</div>
			@endforeach
		</div>
		<div class="carousel-indicators">
			@foreach($timer_products as $key => $timer)
			<button type="button" data-bs-target="#offCarousel" data-bs-slide-to="{{$key}}" @if($key==0)
				class="active" @endif aria-current="true" aria-label="Slide {{$key++}}"></button>
			@endforeach
		</div>
	</div>
</div>

<script>
	@foreach($timer_products as $key => $timer)
	@if($timer->date > \Carbon\Carbon::now())
	const second{{$timer->id}} = 1000,
	minute{{$timer->id}} = second{{$timer->id}} * 60,
	hour{{$timer->id}} = minute{{$timer->id}} * 60,
	day{{$timer->id}} = hour{{$timer->id}} * 24;
	let countDown{{$timer->id}} = new Date("{{$timer->date}}").getTime(),
	x{{$timer->id}} = setInterval(function() {
		let now{{$timer->id}} = new Date().getTime(),
		distance{{$timer->id}} = countDown{{$timer->id}} - now{{$timer->id}};
		document.getElementById("days{{$timer->id}}").innerText = Math.floor(distance{{$timer->id}} / (day{{$timer->id}}));
		document.getElementById("hours{{$timer->id}}").innerText = Math.floor((distance{{$timer->id}} % (day{{$timer->id}})) / (hour{{$timer->id}}));
		document.getElementById("minutes{{$timer->id}}").innerText = Math.floor((distance{{$timer->id}} % (hour{{$timer->id}})) / (minute{{$timer->id}}));
		document.getElementById("seconds{{$timer->id}}").innerText = Math.floor((distance{{$timer->id}} % (minute{{$timer->id}})) / second{{$timer->id}});

	}, 0)
	@endif
	@endforeach
</script>
