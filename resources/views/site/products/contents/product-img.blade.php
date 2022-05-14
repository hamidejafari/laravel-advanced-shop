<div class="preview w-100 p-2 border">

	<div class="api-controls d-flex align-items-center justify-content-center mb-1">
		<button class="btn btn-light w-auto position-relative mx-1 d-md-none" data-bs-toggle="modal"
			data-bs-target="#shareModal">
			<i class="bi bi-share d-flex h5 max-content my-0 mx-auto justify-content-center"></i>
			<div class="over-tool">
				<p class="m-0">
					اشتراک محصول با دیگران
				</p>
			</div>
		</button>
		{{--		<button class="btn btn-light w-auto position-relative mx-1 like">--}}
		{{--			<i--}}
		{{--				class="bi likeButton bi-suit-heart-fill heart d-flex h5 max-content my-0 mx-auto justify-content-center"></i>--}}

		{{--			<!-- like 👍 -->--}}
		{{--			<div class="over-tool">--}}
		{{--				<p class="m-0">--}}
		{{--					اضافه به علاقه مندی--}}
		{{--				</p>--}}
		{{--			</div>--}}

		{{--			<!-- dis like 👎 -->--}}
		{{--			 <div class="over-tool">--}}
		{{--				<p class="m-0">--}}
		{{--					حذف از علاقه مندی--}}
		{{--				</p>--}}
		{{--			</div> --}}
		{{--		</button>--}}
		<button class="btn btn-light w-auto position-relative mx-1 d-md-block d-sm-none d-xs-none"
			onclick="MagicZoom.expand('Zoom-1')">
			<i class="bi bi-arrows-fullscreen d-flex h5 max-content my-0 mx-auto justify-content-center"></i>
			<div class="over-tool">
				<p class="m-0">
					بزرگنمایی محصول
				</p>
			</div>
		</button>
		<button class="btn btn-light w-auto position-relative mx-1 d-md-block d-sm-none d-xs-none">
			<i class="bi bi-share d-flex h5 max-content my-0 mx-auto justify-content-center"></i>
			<div class="over-tool">
				<p class="m-0">
					اشتراک محصول با دیگران
				</p>
			</div>
			<div class="over-share bg-light">
				<ul class="p-0 m-0">
					<li class="list-unstyled">
						<a href="https://t.me/share/url?url={{route('site.product.detail',['id'=>$product->id])}}"
							data-social="telegram"
							data-url="{{route('site.product.detail',['id'=>$product->id])}}"
							rel="noopener noreferrer nofollow">
							<i class="bi bi-telegram d-flex align-items-center justify-content-center"></i>
						</a>
					</li>
					<li class="list-unstyled">
						<a href="whatsapp://send?text={{route('site.product.detail',['id'=>$product->id])}}"
							rel="noopener noreferrer nofollow">
							<i class="bi bi-whatsapp d-flex align-items-center justify-content-center"></i>
						</a>
					</li>

					<li class="list-unstyled">
						<a href="https://www.instagram.com/?url={{route('site.product.detail',['id'=>$product->id])}}"
							rel="noopener noreferrer nofollow">
							<i class="bi bi-instagram d-flex align-items-center justify-content-center"></i>
						</a>
					</li>
				</ul>
			</div>
		</button>
	</div>
	@if($color->sp_images->count() != 0)
	<div class="app-figure w-100 m-0" id="zoom-fig">
		<a id="Zoom-{{$color->id}}" class="MagicZoom w-100" href="{{@$color->sp_images[0]->pro_image}}">
			<img src="{{@$color->sp_images[0]->pro_image}}?scale.height=400" alt="{{@$product->title}}" />
		</a>
		<div class="selectors">
			<section id="demos">
				<div class="row">
					<div class="large-12 columns">
						<div class="owl-carousel-zoom owl-theme my-0">
							@foreach($color->sp_images as $img)
							<div class="item border d-flex">
								<a data-zoom-id="Zoom-{{$color->id}}" class="w-100 border-0" href="{{$img->pro_image}}" data-image="{{$img->pro_image}}">
									<div class="figure">
										<div class="figure-inn">
											<img srcset="{{$img->pro_image}}" class="w-100 border-0 shadow-none" src="{{$img->pro_image}}" />
										</div>
									</div>
								</a>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	@elseif($color)
	<div class="app-figure w-100 m-0" id="zoom-fig">
		<a id="Zoom-1" class="MagicZoom w-100" href="{{@$product->pro_image}}">
			<img src="{{@$product->pro_image}}?scale.height=400" alt="{{@$product->pro_image}}" />
		</a>
		<div class="selectors">
			<section id="demos">
				<div class="row">
					<div class="large-12 columns">
						<div class="owl-carousel-zoom owl-theme my-0">
							<div class="item border d-flex">
								<a data-zoom-id="Zoom-1" class="w-100 border-0" href="{{$product->pro_image}}"
									data-image="{{$product->pro_image}}">
									<div class="figure">
										<div class="figure-inn">
											<img srcset="{{$product->pro_image}}"
												class="w-100 border-0 shadow-none"
												src="{{$product->pro_image}}" />
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

	@endif
</div>
<!-- Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="shareModalLabel">اشتراک این محصول</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row w-100 m-0">
					<div class="col-sm col-xs p-1">
						<a href="https://t.me/share/url?url={{route('site.product.detail',['id'=>$product->id])}}"
							data-social="telegram"
							data-url="{{route('site.product.detail',['id'=>$product->id])}}"
							rel="noopener noreferrer nofollow">

							<i class="bi bi-telegram d-flex align-items-center justify-content-center"></i>
						</a>
					</div>
					<div class="col-sm col-xs p-1">
						<a href="whatsapp://send?text={{route('site.product.detail',['id'=>$product->id])}}"
							rel="noopener noreferrer nofollow">

							<i class="bi bi-whatsapp d-flex align-items-center justify-content-center"></i>
						</a>
					</div>
					<div class="col-sm col-xs p-1">
						<a href="https://www.instagram.com/?url={{route('site.product.detail',['id'=>$product->id])}}"
							rel="noopener noreferrer nofollow">
							<i class="bi bi-instagram d-flex align-items-center justify-content-center"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
