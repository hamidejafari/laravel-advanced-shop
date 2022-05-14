<div class="border bg-light shadow-sm p-2">
	<h4 class="fw-boldeer border-bottom h5 pb-2">
		لیست علاقه مندی ها
	</h4>
	<div class="table-responsive">
		<div class="row w-100 m-0">
			@foreach($likes as $like)
			<div class="col-xl-3 p-1">
				<a href="{{route('site.product.detail',['id'=>$like->product->id])}}">
					<div class="border card bg-white pb-2">
						<div class="row w-100 m-0">
							<div class="col-xl-12 align-self-center p-1">
								<img src="{{asset('assets/uploads/content/pro/big/'.@$like->product->image[0]->file)}}" alt="{!! @$like->product->title !!}" class="w-100"/>
							</div>
							<div class="col-xl-12 text-center align-self-center p-1">
								<div class="des-fav">
									<h5 class="fa-name ismb my-1 text-dark">
										{!! @$like->product->title !!}
									</h5>
									<div class="text text-secondary">
										{!! @$like->product->lead !!}
									</div>
									<p class="price text-one my-1">
										{!! $like->product->price_first['price'] !!}
									</p>
									<a href="{{URL::action('Panel\LikeController@getDeleteLike',$like->id)}}"
										onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید؟');" class="aa">
										<button
											class="btn btn-outline-danger d-flex align-items-center justify-content-end rounded-0">
											<i class="bi bi-trash d-flex"></i>
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
</div>