 <form method="post" action="{{URL::action('Site\HomeController@postReply')}}"
          enctype="multipart/form-data" class="m-0">
        {{ csrf_field() }}
     <input type="hidden" name="commentable_id" value="{{$product->id}}">
     <input type="hidden" name="commentable_type" value="{{"App\Models\Product"}}">
     <input type="hidden" name="parent_id" value="{{$comment->id}}">
	<div class="row w-100 m-0">
		<div class="col-sm-12 p-1">
			<div class="form-floating">
				<input type="text" name="title" class="form-control rounded-3 border-0" id="" placeholder="عنوان نظر">
				<label for="">
					عنوان نظر
				</label>
			</div>
		</div>
		<div class="col-sm-12 p-1">
			<div class="form-floating">
				<textarea class="form-control rounded-3 border-0" name="content" placeholder="متن نظر شما" id=""></textarea>
				<label for="">
					متن نظر شما
				</label>
			</div>
		</div>
{{--		<div class="col-sm-12 p-1">--}}
{{--			<div class="starrr">--}}
{{--				<div class="feedback rounded-3">--}}
{{--					<div class="rating">--}}
{{--						<input type="radio" name="star" title="star5" id="rating-5" value="5">--}}
{{--						<label for="rating-5"></label>--}}
{{--						<input type="radio" name="star" title="star4" id="rating-4" value="4">--}}
{{--						<label for="rating-4"></label>--}}
{{--						<input type="radio" name="star" title="star3" id="rating-3" value="3">--}}
{{--						<label for="rating-3"></label>--}}
{{--						<input type="radio" name="star" title="star2" id="rating-2" value="2">--}}
{{--						<label for="rating-2"></label>--}}
{{--						<input type="radio" name="star" title="star1" id="rating-1" value="1">--}}
{{--						<label for="rating-1"></label>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
		<div class="col-sm-12 p-1">
			<button type="submit" class="btn btn-lg btn-one w-100 rounded-3">
				ارسال نظر
			</button>
		</div>
	</div>
</form>
