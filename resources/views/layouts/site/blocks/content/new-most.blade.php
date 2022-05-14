<div class="bg-two most py-md-3 py-sm-0 py-xs-0">
	<div class="container px-xs-0">
		<div class="row w-100 m-0">
			<div class="col-md-6 p-md-2 py-xs-0 py-sm-0 px-xs-0 start">
				<div class="p-2 px-xs-0 px-sm-1 pros">
					<div class="d-md-none d-sm-block d-xs-block">
						<div class="d-flex align-items-center justify-content-between px-3 pb-2">
							<a href="{{route('site.most')}}" class="ismb text-dark">
								پرفروش ترین ها
							</a>
							<a href="{{route('site.most')}}" class="d-flex align-items-center text-dark">
								مشاهده بیشتر
								<i class="bi bi-arrow-left d-flex ms-2"></i>
							</a>
						</div>
					</div>
					<div class="d-md-block d-sm-none d-xs-none">
						<div class="newline position-relative">
							<hr>
							<p class="h5 my-0 me-auto pe-3 position-absolute top-0 bottom-0 start-25">
								<a href="{{route('site.most')}}" class="d-flex align-items-center">
									<i class="bi bi-arrow-right d-flex me-2"></i>
									مشاهده بیشتر
								</a>
							</p>
							<p class="h5 m-auto px-3 position-absolute top-0 bottom-0 end-0 start-0">
								<a href="{{route('site.most')}}">
									پرفروش ترین ها
								</a>
							</p>
						</div>
					</div>
					<div class="products-home p-2">
						@include('layouts.site.blocks.content.most-popular')
					</div>
					<div class="over d-md-block d-sm-none d-xs-none"></div>
				</div>
			</div>
			<div class="col-md-6 p-md-2 py-xs-0 py-sm-0 px-xs-0 end">
				<div class="p-2 px-xs-0 px-sm-1 pros">
					<div class="d-md-none d-sm-block d-xs-block">
						<div class="d-flex align-items-center justify-content-between px-3 pb-2">
							<a href="{{route('site.popular')}}" class="ismb text-dark">
								محبوب ترین ها
							</a>
							<a href="{{route('site.popular')}}" class="d-flex align-items-center text-dark">
								مشاهده بیشتر
								<i class="bi bi-arrow-left d-flex ms-2"></i>
							</a>
						</div>
					</div>
					<div class="d-md-block d-sm-none d-xs-none">
						<div class="newline position-relative">
							<hr>
							<p class="h5 m-auto px-3 position-absolute top-0 bottom-0 end-0 start-0">
								<a href="{{route('site.popular')}}">
									محبوب ترین ها
								</a>
							</p>
							<p class="h5 my-0 ms-auto ps-3 position-absolute top-0 bottom-0 end-25">
								<a href="{{route('site.popular')}}" class="d-flex align-items-center">
									مشاهده بیشتر
									<i class="bi bi-arrow-left d-flex ms-2"></i>
								</a>
							</p>
						</div>
					</div>
					<div class="products-home p-2">
						@include('layouts.site.blocks.content.most-bestselling')
					</div>
					<div class="over d-md-block d-sm-none d-xs-none"></div>
				</div>
			</div>
		</div>
	</div>
</div>