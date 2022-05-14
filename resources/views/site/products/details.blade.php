@extends('layouts.site.master')
@section('title'){{@$product->title_seo ? $product->title_seo : $product->title}} @stop
@section('image_seo'){{ @$product->image[0]->file ? asset('assets/uploads/content/pro/big/'.$product->image[0]->file) : asset('assets/uploads/content/set/'.@$setting->logo)}}
@endsection
@section('robots') {{$product->noindex ? 'noindex,nofollow' : 'index,follow'}} @stop
@section('description')
@if($product->description_seo != null)
{!! $product->description_seo !!}
@else
{!! strip_tags(\Illuminate\Support\Str::limit($product->description,100)) !!}
@endif
@stop
@section('content')
@include('layouts.message-swal')
<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="product product-details">
			<div class="container">
				<div class="row w-100 m-0">
					<div class="col-sm-12 p-1">
						<div class="card card-mobile card-desktop border-0 rounded-0 py-2 px-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item">
										<a href="/">
											<i class="bi bi-house"></i>
											خانه
										</a>
									</li>

									@if($product->cats->count() >0)
									<li class="breadcrumb-item" aria-current="page">
										<a
											href="{{route('site.product.list',['id'=>$product->cats[0]->id])}}">
											{{@$product->cats[0]->title}}
										</a>
									</li>
									@if($product->cats->count() >1)
									<li class="breadcrumb-item" aria-current="page">
										<a
											href="{{route('site.product.list',['id'=>$product->cats[1]->id])}}">
											{{@$product->cats[1]->title}}
										</a>
									</li>
									@endif
									@endif

									<li class="breadcrumb-item active" aria-current="page">
										{{@$product->title}}
									</li>
								</ol>
							</nav>
						</div>
					</div>
					@if(\App\Library\Helper::isMobile())
					<div class="col-sm-12 p-1 d-md-none d-sm-block d-xs-block">
						<div class="card border-0 rounded-0 p-1 tt-xs-sm">
							<h1>
								{{@$product->title}}
								<br>
								{{@$product->title_en}}
							</h1>
						</div>
					</div>
					@endif
					<div class="col-sm-12 p-1 d-md-none d-sm-block d-xs-block">
						<div class="card border-0 rounded-0 p-1">
							<div class="d-flex align-items-center justify-content-center rate-comm bell p-0">
								@include('site.products.contents.rate-comm')
							</div>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="card border-0 rounded-0 p-2">
							<div class="d-flex align-items-start">
								<div class="row w-100 m-0">
									<div class="col-xl-4 col-lg-4 col-md-4 p-1">
										<div class="tab-content" id="v-pills-tabContent">
											@if($product->colors->count() != 0 || $product->images->count() >
											0)
											@if($product->colors->count() != 0)
											@foreach($product->colors as $key=>$color)
											<div class="tab-pane fade @if($key==0) show active @endif"
												id="v-pills-{{$color->id}}" role="tabpanel"
												aria-labelledby="v-pills-{{$color->id}}-tab">
												@include('site.products.contents.product-img')
											</div>
											@endforeach
											@else
											@foreach($product->images as $image)
											<div class="tab-pane fade @if($loop->first) show active @endif"
												id="v-pills-{{$image->id}}" role="tabpanel"
												aria-labelledby="v-pills-{{$image->id}}-tab">
												@include('site.products.contents.product-img-new')
											</div>
											@endforeach
											@endif
											@else
											<div class="app-figure w-100 m-0" id="zoom-fig">
												<a id="Zoom-1" class="MagicZoom w-100"
													style="background-color:#fc8e6d;"
													href="{{asset('assets/site/images/notfound.png')}}">
													<img src="{{asset('assets/site/images/notfound.png')}}?scale.height=400"
														alt="" />
												</a>
											</div>
											@endif
										</div>
										@if($product->colors->count() != 0)
										<div class="d-md-none d-sm-block d-xs-block">
											@include('site.products.contents.colors')
										</div>
										@endif
										<div class="d-md-none d-sm-block d-xs-block price">
											<div class="price-box px-0 pt-2 pb-0">
												@include('site.products.contents.select')
											</div>
										</div>
									</div>

									<div class="col-xl-4 col-lg-4 col-md-6 p-1">
										<div class="info p-md-2 py-sm-3 py-xs-3">
											@include('site.products.contents.product-info')
											@if($product->colors->count() != 0)
											<div class="d-md-block d-sm-none d-xs-none">
												@include('site.products.contents.colors')
											</div>
											@endif
										</div>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-6 p-1 d-md-block d-sm-none d-xs-none">
										@include('site.products.contents.product-price')
									</div>
								</div>
							</div>
						</div>
					</div>
					@if($sloagens->count() > 0)
					<div class="col-sm-12 p-1">
						<div class="card border-0 rounded-0 p-2 d-md-block d-sm-none d-xs-none">
							@include('site.products.contents.slogans')
						</div>
					</div>
					@endif
					<div id="other" class="col-sm-12 p-1">
						<div class="card border-0 rounded-0 p-3 d-md-block d-sm-none d-xs-none">
							@include('site.products.contents.other')
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="card bg-transparent border-0 rounded-0 p-0 d-md-none d-sm-block d-xs-block">
							@include('site.products.contents.other-mobile')
						</div>
					</div>
				</div>
			</div>
		</div>
		@if($relate->count() != 0)
		@include('site.products.contents.related')
		@endif
		@if($complement->count() != 0)
		@include('site.products.contents.complement')
		@endif
	</div>
	<div class="position-fixed pricefix shadow-sm bg-white d-sm-block d-xs-block d-md-none">
		<div class="pricefix-in">
			<div class="row w-100 m-0">
{{--                <!-- old -->--}}
{{--				<!-- <div class="col-sm col-xs p-1">--}}
{{--					<button type="button"--}}
{{--						class="btn btn-lg btn-addcard w-100 d-flex align-items-center justify-content-center"--}}
{{--						@click="addToCart({{$product->id}},quantity,true,selectedColor)">--}}
{{--						<i class="bi bi-cart4 d-flex me-2"></i>--}}
{{--						افزودن به سبد خرید--}}
{{--					</button>--}}
{{--				</div>--}}
{{--				<div class="col-sm col-xs text-end align-self-center p-1">--}}
{{--					@if($product->price_first['old'] !== '0 تومان ')--}}
{{--					<p class="my-0 text-secondary">--}}
{{--						<del class="fw-bolder me-2">--}}
{{--							{{ $product->price_first['old'] }}--}}
{{--						</del>--}}
{{--						<span class="badge bg-one rounded-custom">--}}
{{--							{{round($product->calcute)}}%--}}
{{--						</span>--}}
{{--					</p>--}}
{{--					@endif--}}
{{--					@if($product->stock_count == 0)--}}
{{--					<p class="d-md-none d-sm-block d-xs-block m-0 h4">--}}
{{--						ناموجود--}}
{{--					</p>--}}
{{--					<form method="post" action="{{URL::action('Site\HomeController@postBell')}}"--}}
{{--						enctype="multipart/form-data" class="m-0">--}}
{{--						{{ csrf_field() }}--}}
{{--						<input type="hidden" name="product_id" value="{{$product->id}}">--}}
{{--						<button class="btn btn-light d-flex align-items-center">--}}
{{--							<i class="bi bi-bell d-flex me-sm-2 m-xs-0"></i>--}}
{{--							<span class="d-sm-block d-xs-none">--}}
{{--								به من از طریق پیامک اطلاع بده--}}
{{--							</span>--}}
{{--						</button>--}}
{{--					</form>--}}
{{--					@else--}}
{{--					<p class="d-md-none d-sm-block d-xs-block m-0 h4">--}}
{{--						@{{ selectedPrice }}--}}
{{--					</p>--}}
{{--					@endif--}}
{{--				</div> -->--}}
{{--                <!-- old -->--}}

                @if($product->stock_count == 0)
				<div class="col-sm-3 col-xs-3 text-center align-self-center py-1 px-2">
					<p class="d-md-none d-sm-block d-xs-block m-0 h4">
						ناموجود
					</p>
				</div>
				<div class="col-sm-9 col-xs-9 py-1 px-2">
					<form method="post" action="{{URL::action('Site\HomeController@postBell')}}"
						enctype="multipart/form-data" class="m-0">
						{{ csrf_field() }}
                        <input type="hidden" name="reminder_id" value="{{$product->id}}">
						<button class="btn btn-light d-flex align-items-center justify-content-center w-100">
							<i class="bi bi-bell d-flex me-2"></i>
							<span class="">
								به من از طریق پیامک اطلاع بده
							</span>
						</button>
					</form>
				</div>
            @else


                    <div   v-if="selectedStock == 0" class="col-sm-9 col-xs-9 py-1 px-2">
                        <form method="post" action="{{URL::action('Site\HomeController@postBell')}}"
                              enctype="multipart/form-data" class="m-0">
                            {{ csrf_field() }}
                            <input type="hidden" name="reminder_id" value="{{$product->id}}">
                            <button class="btn btn-light d-flex align-items-center justify-content-center w-100">
                                <i class="bi bi-bell d-flex me-2"></i>
                                <span class="">
								به من از طریق پیامک اطلاع بده
							</span>
                            </button>
                        </form>
                    </div>

                    <div class="col-sm col-xs p-1" v-else>
                        <button type="button"
                                class="btn btn-lg btn-addcard w-100 d-flex align-items-center justify-content-center"
                                @click="addToCart({{$product->id}},quantity,true,selectedColor)">
                            <i class="bi bi-cart4 d-flex me-2"></i>
                            افزودن به سبد خرید
                        </button>
                    </div>



                    <div v-if="selectedStock == 0" class="col-sm col-xs text-end align-self-center p-1">

                        <p class="d-md-none d-sm-block d-xs-block m-0 h4">
                            ناموجود
                        </p>
                    </div>

                    <div  v-else class="col-sm col-xs text-end align-self-center p-1">
                        <p class="my-0 text-secondary" v-if="selectedRealPrice !== '0 تومان ' && selectedRealPrice !== 'NaN تومان '">
                            <del class="fw-bolder me-2">
                                @{{ selectedRealPrice }}
                            </del>
                            <span class="badge bg-one rounded-custom">
                    							{{round($product->calcute)}}%
                    						</span>
                        </p>
                        <p class="d-md-none d-sm-block d-xs-block m-0 h4">
                            @{{ selectedPrice }}
                        </p>
                    </div>

            @endif

			</div>
		</div>
	</div>
	</div>

</main>

@stop
@section('js')
@if(count($questions)>0)
<script type="application/ld+json">
{
	"@context": "https://schema.org",
	"@type": "FAQPage",
	"mainEntity": [
		@foreach($questions as $key => $answer) {
			"@type": "Question",
			"name": "{!! strip_tags($answer->question)!!}",
			"acceptedAnswer": {
				"@type": "Answer",
				"text": "{!! strip_tags($answer->answer)!!}"
			}
		}
		@if(count($questions) == $key + 1) @else, @endif
		@endforeach
	]
}
</script>
@endif
<script type="application/ld+json">
{
	"@context": "https://schema.org/",
	"@type": "Product",
	"name": "{{@$product->title}}",
	"image": "{{asset('assets/uploads/content/pro/big/'.@$product->image[0]->file)}}",
	"description": "{{@$product->description_seo}}.",
	"brand": "{{@$product->title}}",
	"aggregateRating": {
		"@type": "AggregateRating",
		"ratingValue": "4.90",
		"bestRating": "5",
		"worstRating": "1",
		"ratingCount": "490"
	}
}
</script>
@endsection
