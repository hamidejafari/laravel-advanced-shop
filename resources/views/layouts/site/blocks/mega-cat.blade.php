<div class="p-0">
	<div class="d-flex align-items-start">
		<div class="nav flex-column nav-pills col-xxl-2 col-xl-2 col-lg-3 col-md-4 border-end" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			@foreach($category_footer as $key=>$main)
			<button class="nav-link text-dark rounded-0 @if($key==0) active @endif" id="v-pills-home-tab{{$main->id}}" data-bs-toggle="pill" data-bs-target="#v-pills-home{{$main->id}}" type="button" role="tab" aria-controls="v-pills-home{{$main->id}}" aria-selected="true">
				<i class="bi bi-arrow-left-short d-flex me-1"></i>
				{{@$main->title}}
			</button>
			@endforeach
		</div>
		<div class="tab-content col-xxl-10 col-xl-9 col-lg-9 col-md-8 border-start" id="v-pills-tabContent">
			@foreach($category_footer as $key=>$main)
			<div class="tab-pane fade show @if($key==0) active @endif" id="v-pills-home{{$main->id}}" role="tabpanel" aria-labelledby="v-pills-home-tab{{$main->id}}">
				<div class="p-2">
					<a href="{{route('site.product.list',['id'=>$main->id])}}" class="text-dark fw-bolder titlelink bg-light p-1 d-flex">
						<p class="h5 m-0 d-flex align-items-center fw-bolder">
							<i class="bi bi-caret-left-fill d-flex me-2"></i>
							{{@$main->title}}
						</p>
					</a>
					<div class="row w-100 mx-0 my-2">
						@foreach($main->childs as $key=>$child)
						@if(count($child->childs) > 0)
						@foreach($child->childs->chunk(6)->take(4) as $item=>$cats)
						<div class="col-xxl-3 col-lg-3 col-md-6 p-1">
							<ul class="p-0 m-0">
						       @if(!$item)
								<a href="{{route('site.product.list',['id'=>$child->id])}}" class="text-one fw-bolder titlelink">
									<p class="h6 m-0 d-flex align-items-center fw-bolder">
										<i class="bi bi-caret-left d-flex me-2"></i>
										{{@$child->title}}
									</p>
								</a>
                                @endif
								@foreach($cats as $cat)
								<li class="list-unstyled">
									<a href="{{route('site.product.list',['id'=>$cat->id])}}" class="link d-flex align-items-center">
										<i class="bi bi-caret-left d-flex me-1"></i>
										{{@$cat->title}}
									</a>
								</li>
								@endforeach
							</ul>
						</div>
						@endforeach
						@else
						<div class="col-xxl-3 col-lg-4 col-md-6 p-1">
							<ul class="p-0 m-0">
								<li class="list-unstyled">
									<a href="{{route('site.product.list',['id'=>$child->id])}}" class="text-one fw-bolder titlelink">
										<p class="h6 m-0 d-flex align-items-center fw-bolder">
											<i class="bi bi-caret-left d-flex me-2"></i>
											{{@$child->title}}
										</p>
									</a>
								</li>
							</ul>
						</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>