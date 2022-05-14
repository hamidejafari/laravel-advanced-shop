@extends('layouts.site.master')
@section('title'){{'جستجوی'.' '.$search.' '.'در فروشگاه اینترنتی کاج شاپ | کاج شاپ'}} @stop
@section('description')
{{'برای جستجوی'.' '.$search.' '.'در فروشگاه اینترنتی کاج شاپ می‌توانید به این صفحه مراجعه کنید و محصول و برند دلخواه خود را انتخاب کنید و خریدی آسان داشته باشید.'}}
@stop

@section('content')

<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="product product-details">
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
										جستجوی {{$search}}
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-xxl-12 p-1 p-list-custom">
						<div class="card bg-transparent border-0 p-0 rounded-0">
							<div class="row w-100 m-0">
								@if($search_products != null)
								@foreach($search_products as $product)
								<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 p-1">
									<div class="item p-0">
										@include('layouts.site.blocks.product-box',['item' => $product])
									</div>
								</div>
								@endforeach
								@endif
								@if($brands != null)
								@foreach($brands as $brand)
								<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 p-1">
									<div class="card card-pro">
										<a href="{{route('site.brand.detail',['id'=>$brand->id])}}">
											<div class="bxs">
												<figure class="m-0">
													<div class="figure-inn">
														<img src="{{asset('assets/uploads/content/brand/small/'.@$brand->image)}}"
															class="swiper-lazy text-one"
															alt="{{ @$brand['title']}}" />
													</div>
												</figure>
												<h4 class="text-dark">
													{{ @$brand['title']}}
												</h4>
											</div>
										</a>
									</div>
								</div>
								@endforeach
								@endif
								@if($search_products->count() == 0 && $brands->count() == 0)
								@include('site.panel.content.empty')
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@stop