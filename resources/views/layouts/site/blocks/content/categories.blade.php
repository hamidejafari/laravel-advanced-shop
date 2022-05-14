<div class="p-2 mb-5 px-xs-2 px-xl-2 px-sm-1 cate">
	<!-- <div class="bartitle max-content mx-auto position-relative">
		<img src="{{asset('assets/site/images/kaj/end-title.png')}}" alt="" class="end">
		<h2 class="fw-bolder">
			دسته بندی های کاج شاپ
		</h2>
		<img src="{{asset('assets/site/images/kaj/start-title.png')}}" alt="" class="start">
	</div> -->
	<div class="barnew position-relative">
		<hr>
		<p class="h6 text-center m-auto px-3 position-absolute top-0 bottom-0 end-0 start-0">
			دسته بندی های کاج شاپ
		</p>
	</div>
	<div class="row w-100 m-0">
		@foreach($categories as $category)
		<div class="col-xxl col-md col-sm-6 col-xs-6 text-center mx-auto p-1">
			<a href="{{route('site.product.list',['id'=>$category->id])}}">
				<div class="card border-0 rounded-0 shadow-sm">
					<figure class="m-0">
						<div class="figure-inn">
							<img srcset="{{$category->cat_image}} 2x, {{$category->cat_image}} 1x" src="{{$category->cat_image}}" alt="{!! $category->title !!}"
								class="w-100" />
						</div>
					</figure>
					<h4 class="h6 my-0 py-3 bg-transparent text-center">
						{!! $category->title !!}
					</h4>
				</div>
			</a>
		</div>
		@endforeach
	</div>
	<div class="categories-home bg-white p-2 d-none d-sm-none d-xs-none">
		<div class="row w-100 m-0">
			@foreach($categories as $category)
			<div class="col-xl-3 col-lg-4 col-sm-4 p-2">
				<a href="{{route('site.product.list',['id'=>$category->id])}}" class="d-flex w-100 h-100">
					<div class="card rounded-0 p-2 w-100">
						<div>
							<img srcset="{{$category->cat_image}} 2x, {{$category->cat_image}} 1x" src="{{$category->cat_image}}" alt="{!! $category->title !!}"
								class="text-secondary" />
							<h4 class="m-0">
								{!! $category->title !!}
							</h4>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
	<div class="categories-home bg-white p-2 d-md-none d-sm-none d-xs-none">
		<div class="scrollmenu">
			@foreach($categories as $category)
			<a href="{{route('site.product.list',['id'=>$category->id])}}">
				<div class="card rounded-0 p-2">
					<div>
						<img srcset="{{$category->cat_image}} 2x, {{$category->cat_image}} 1x" src="{{$category->cat_image}}" alt="{!! $category->title !!}"
							class="text-secondary" />
						<h4 class="m-0">
							{!! $category->title !!}
						</h4>
					</div>
				</div>
			</a>
			@endforeach
		</div>
	</div>
</div>