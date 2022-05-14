<h2 class="fw-bolder h4 text-dark">
	نظرات کاربران درباره
	<span>
		"{{@$product->title}}"
	</span>
</h2>
<div class="row w-100 m-0 comment pt-3">
	<div class="col-lg-4 col-md-5 p-0 d-md-none d-sm-block d-xs-block">
		<div class="bg-light position-sticky sticky p-3">
			<h4 class="text-center">
				فرم ارسال نظر
			</h4>
			<form method="post" action="{{URL::action('Site\HomeController@postComment')}}"
				enctype="multipart/form-data" class="m-0">
				{{ csrf_field() }}
				<input type="hidden" name="commentable_id" value="{{$product->id}}">
				<input type="hidden" name="commentable_type" value="{{"App\Models\Product"}}">
				<div class="row w-100 m-0">
					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<input type="text" name="title" class="form-control rounded-3 border-0" id=""
								placeholder="عنوان نظر">
							<label for="">
								عنوان نظر
							</label>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<textarea class="form-control rounded-3 border-0" name="content"
								placeholder="متن نظر شما" id=""></textarea>
							<label for="">
								متن نظر شما
							</label>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="form-group position-relative m-0">
							<div>
								<div
									class="starrating risingstar d-flex align-items-center justify-content-end flex-row-reverse">
									<input type="radio" id="star5" name="star" value="5">
									<label for="star5" title="5 Star" class="m-0"></label>
									<input type="radio" id="star4" name="star" value="4">
									<label for="star4" title="4 Star" class="m-0"></label>
									<input type="radio" id="star3" name="star" value="3">
									<label for="star3" title="3 Star" class="m-0"></label>
									<input type="radio" id="star2" name="star" value="2">
									<label for="star2" title="2 Star" class="m-0"></label>
									<input type="radio" id="star1" name="star" value="1">
									<label for="star1" title="1 Star" class="m-0"></label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<button type="submit" class="btn btn-lg btn-one w-100 rounded-3">
							ارسال نظر
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	@if(count($comments) > 0)
	<div class="col-lg-8 col-md-7 pe-md-2 ps-md-0 py-md-0 px-sm-0 px-xs-0 py-sm-2 py-xs-2">
		<div class="border p-2 mb-2">
			<!-- first comment -->
			@foreach($comments as $comment)
			@include('site.products.contents.comments-blocks.first-comment')

			<!-- reply comment -->
			@foreach($comment->replies as $reply)
			@include('site.products.contents.comments-blocks.reply-comment')
			@endforeach
			@endforeach
		</div>
	</div>
	@else
	<div class="col-lg-8 col-md-7 pe-md-2 ps-md-0 py-md-0 px-sm-0 px-xs-0 py-sm-2 py-xs-2">
		<div class="empty h-100 d-flex align-items-center justify-content-center">
			<img src="{{asset('assets/site/images/emptycm.png')}}" alt="کامنتی موجود نیست" class="w-50 ic">
		</div>
	</div>
	@endif
	<div class="col-lg-4 col-md-5 p-0 d-md-block d-sm-none d-xs-none">
		<div class="bg-light position-sticky sticky p-3">
			<h4 class="text-center">
				فرم ارسال نظر
			</h4>
			<form method="post" action="{{URL::action('Site\HomeController@postComment')}}"
				enctype="multipart/form-data" class="m-0">
				{{ csrf_field() }}
				<input type="hidden" name="commentable_id" value="{{$product->id}}">
				<input type="hidden" name="commentable_type" value="{{"App\Models\Product"}}">
				<div class="row w-100 m-0">
					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<input type="text" name="title" class="form-control rounded-3 border-0" id=""
								placeholder="عنوان نظر">
							<label for="">
								عنوان نظر
							</label>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<textarea class="form-control rounded-3 border-0" name="content"
								placeholder="متن نظر شما" id=""></textarea>
							<label for="">
								متن نظر شما
							</label>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="form-group position-relative m-0">
							<div class="bg-white p-2">
								<div
									class="starrating risingstar d-flex align-items-center justify-content-end flex-row-reverse">
									<input type="radio" id="star10" name="star" value="5">
									<label for="star10" title="10 Star" class="m-0"></label>
									<input type="radio" id="star9" name="star" value="4">
									<label for="star9" title="9 Star" class="m-0"></label>
									<input type="radio" id="star8" name="star" value="3">
									<label for="star8" title="8 Star" class="m-0"></label>
									<input type="radio" id="star7" name="star" value="2">
									<label for="star7" title="7 Star" class="m-0"></label>
									<input type="radio" id="star6" name="star" value="1">
									<label for="star6" title="6 Star" class="m-0"></label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<button type="submit" class="btn btn-lg btn-one w-100 rounded-3">
							ارسال نظر
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>