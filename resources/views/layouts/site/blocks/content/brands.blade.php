<div class="brands-home p-2 px-xs-0">
	<div class="p-2 p-xs-0">
		<!-- <h2 class="fw-bolder">
			برندهای پرفروش
		</h2> -->
		<section id="demos">
			<div class="row">
				<div class="large-12 columns">
					<div class="owl-carousel-brand owl-theme my-0">
						@foreach($brands as $brand)
						<div class="item">
							<a href="{{route('site.brand.detail',['id'=>$brand->id])}}">
								<img srcset="{{$brand->brand_image}} 2x, {{$brand->brand_image}} 1x" src="{{$brand->brand_image}}" alt="{!! @$brand->title !!}">
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>
	</div>
</div>