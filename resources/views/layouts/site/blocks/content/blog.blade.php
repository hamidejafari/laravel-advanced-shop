<div class="bg-two blog-home p-md-2 p-sm-2 p-xs-1">
	<!-- <div class="bartitle max-content mx-auto position-relative">
		<img srcset="{{asset('assets/site/images/kaj/end-title.png')}} 2x, {{asset('assets/site/images/kaj/end-title.png')}} 1x"
			src="{{asset('assets/site/images/kaj/end-title.png')}}" alt="" class="end">
		<h2 class="fw-bolder">
			مقالات کاج شاپ
		</h2>
		<img srcset="{{asset('assets/site/images/kaj/start-title.png')}} 2x, {{asset('assets/site/images/kaj/start-title.png')}} 1x"
			src="{{asset('assets/site/images/kaj/start-title.png')}}" alt="" class="start">
	</div> -->
	<div class="container">
		<div class="px-2">
			<div class="barnew position-relative">
				<hr>
				<p class="h6 text-center m-auto px-3 position-absolute top-0 bottom-0 end-0 start-0">
					مقالات کاج شاپ
				</p>
			</div>
		</div>
		<section id="demos">
			<div class="row">
				<div class="large-12 columns">
					<div class="owl-carousel-blog owl-theme my-0">
						@foreach($articles as $blog)
						<div class="item p-2 px-xs-1">
							<a href="{{route('site.blog.detail',['id'=>$blog->id])}}">
								<div class="card border-0 rounded-0">
									<div class="imgbox">
										<img srcset=" {{asset('assets/uploads/content/art/medium/'.@$blog->image)}} 2x, {{asset('assets/uploads/content/art/medium/'.@$blog->image)}} 1x"
											src="{{asset('assets/uploads/content/art/medium/'.@$blog->image)}}"
											alt="{!! @$blog->title !!}" />
									</div>
									<h4>
										{!! @$blog->title !!}
									</h4>
									<div class="caption">
										<p>
                                            {!! strip_tags(\Illuminate\Support\Str::words($blog->description,30)) !!}
										</p>
									</div>
									<div class="ic mt-2">
										<ul class="p-0 m-0">
											{{--											<li class="float-end list-unstyled ms-4">--}}
											{{--												<p class="m-0 d-flex align-items-center text-secondary">--}}
											{{--													۴۰--}}
											{{--													<i class="bi bi-heart text-one d-flex ms-2"></i>--}}
											{{--												</p>--}}
											{{--											</li>--}}
											<li class="float-end list-unstyled ms-4">
												<p class="m-0 d-flex align-items-center text-secondary">
													{{$blog->view}}
													<i class="bi bi-eye text-one d-flex ms-2"></i>
												</p>
											</li>
										</ul>
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
