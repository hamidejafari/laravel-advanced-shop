<div class="card card-pro">
	<div class="overlay-top">
		<ul class="p-0 m-0">
			<li class="float-start list-unstyled">
				<!-- Dislike 👎 -->
				<button v-if="like{{$item->id}} == 0" class="btn" @click="getLike{{$item->id}}(1,{{$item->id}})">
					<i class="bi bi-heart"></i>
				</button>
				<button v-else class="btn" @click="getLike{{$item->id}}(0,{{$item->id}})">
					<i class="bi bi-heart-fill text-danger"></i>
				</button>
			</li>
		</ul>

		<div class="sp-discount">
            @if($item->stock_count != 0)
                @if($item->calcute > 0)
			<p class="m-0">
				تخفیف ویژه
			</p>
                @endif
            @endif
		</div>

	</div>
	<a href="{{route('site.product.detail',['id'=>$item->id])}}">
		<div class="bxs">
			<figure class="w-100 mx-0 my-2">
				<div class="figure-inn">
					<img srcset="{!! $item->pro_image !!} 2x, {!! $item->pro_image !!} 1x"
						src="{!! $item->pro_image !!}" alt="{{@$item->title}}" class="swiper-lazy" loading="lazy">
				</div>
			</figure>
			<h4 class="text-dark">
				{{@$item->title}}
			</h4>

			<div class="price">
                @if($item->stock_count != 0)
				@if($item->calcute > 0)
				<div class="old text-secondary">
					<del>
						{!! $item->price_first['old'] !!}
					</del>
				</div>
				<div class="off">
					<span class="badge bg-one text-dark fw-bolder">
						{{round($item->calcute)}}%
					</span>
				</div>
				@else
				<div class="d-flex" style="opacity:0">
					<div class="old text-secondary">
					    <del>
						    {!! $item->price_first['old'] !!}
					    </del>
    				</div>
    				<div class="off">
    					<span class="badge bg-one text-dark fw-bolder">
    						{{round($item->calcute)}}%
    					</span>
    				</div>
				</div>
				@endif
                @endif
			</div>

			@if($item->stock_count == 0)
			<p class="prc fw-bolder">
				ناموجود
			</p>
			@else
			<p class="prc fw-bolder">
				{!! $item->price_first['price'] !!}
			</p>
			@endif
			<div class="colors d-flex align-items-center justify-content-center" style="height: 1.5rem;">
				@if($item->colors->count() > 0)
				@php
				$c=@$item->category[0]->specification_title;
				@endphp
				<p class="m-0">
					در {{$item->colors->count()}}
                    @if($item->specification_title != null)
                    {{$item->specification_title}}
                    @else
                    {{@$c}}
                    @endif
				</p>
				@endif
			</div>
		</div>
	</a>
</div>
