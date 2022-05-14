<header class="header pb-3">
	<div class="">
		<div class="row w-100 m-0">
			<div class="col-md-12 p-0 px-sm-0 py-sm-0">
				<div class="row w-100 m-0">
					<!-- desktop -->
					<div class="col-xxl-12 py-0 px-0 p-xs-0 d-md-block d-sm-none d-xs-none">
						<div class="card rounded-0 border-0 p-0">
							<div id="kajshopCarousel" class="carousel slide carousel-fade"
								data-bs-ride="carousel" data-bs-interval="3000">
                                <div class="carousel-indicators">
                                    @foreach($sliders as $key => $slider)
                                    <button type="button" data-bs-target="#kajshopCarousel" data-bs-slide-to="{{$key}}" class="@if($loop->first) active @endif" aria-current="true" aria-label="Slide {{$key+1}}"></button>
                                    @endforeach
                                </div>
								<div class="carousel-inner h-100">
									@foreach($sliders as $key => $slider)
									<div class="carousel-item @if($key == 0)active @endif">
										<a @if($slider->link != null) href= "{{@$slider->link}}" rel="noopener
											noreferrer nofollow" @else href="{{route('site.banner.detail',['id'=>@$slider['id']])}}"
											@endif>
											<img srcset="{{asset('assets/uploads/content/sli/'.@$slider->image)}} 2x, {{asset('assets/uploads/content/sli/'.@$slider->image)}} 1x" src="{{asset('assets/uploads/content/sli/'.@$slider->image)}}" class="d-block w-100 text-secondary text-center h2 m-0" alt="{!! @$slider->title !!}">
										</a>
									</div>
									@endforeach
									<!-- <a href="" class="carousel-item h-100 active" style="background-image: url('assets/site/images/c1.jpg');"></a> -->
									<!-- <a href="" class="carousel-item h-100" style="background-image: url('assets/site/images/c2.jpg');"></a> -->
								</div>
							</div>
						</div>
					</div>
					<!-- mobile -->
					<div class="col-xxl-12 py-0 px-0 p-xs-0 d-md-none d-sm-block d-xs-block">
						<div class="card rounded-0 border-0 p-0">
							<div id="kajshopCarousel" class="carousel slide carousel-fade"
								data-bs-ride="carousel" data-bs-interval="3000">
								<div class="carousel-inner h-100">
									@foreach($mobile_sliders as $key => $mobile_slider)
									<div class="carousel-item @if($key == 0)active @endif">
										<a @if($mobile_slider->link != null) href= "{{@$mobile_slider->link}}" rel="noopener noreferrer nofollow" @else href="{{route('site.banner.detail',['id'=>@$mobile_slider['id']])}}" @endif>
											<img srcset="{{asset('assets/uploads/content/sli/'.@$mobile_slider->image)}} 2x, {{asset('assets/uploads/content/sli/'.@$mobile_slider->image)}} 1x" src="{{asset('assets/uploads/content/sli/'.@$mobile_slider->image)}}" class="d-block w-100 text-secondary text-center h2 m-0" alt="{!! @$mobile_slider->title !!}">
										</a>
									</div>
									@endforeach
									<!-- <a href="" class="carousel-item h-100 active" style="background-image: url('assets/site/images/c1.jpg');"></a> -->
									<!-- <a href="" class="carousel-item h-100" style="background-image: url('assets/site/images/c2.jpg');"></a> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 py-2 pe-2 ps-0 px-xs-1">
				<div class="card rounded-0 border-line p-0 w-100 h-100 counter-box d-flex align-items-center justify-content-center">
					@include('layouts.site.blocks.content.discount-counter')
				</div>
			</div> -->
		</div>
	</div>
</header>
