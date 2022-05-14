<form method="post" action="{{URL::action('Site\HomeController@postFaq')}}"
      enctype="multipart/form-data" class="m-0">
    {{ csrf_field() }}
    <input type="hidden" name="product_id" value="">
	<div class="row w-100 m-0">
		<div class="col-sm-12 p-1">
			<div class="form-floating">
				<input type="text" class="form-control rounded-3 border-0" id="" placeholder="عنوان پرسش">
				<label for="">
					عنوان نظر
				</label>
			</div>
		</div>
		<div class="col-sm-12 p-1">
			<div class="form-floating">
				<textarea class="form-control rounded-3 border-0" name="question" placeholder="متن پرسش شما" id=""></textarea>
				<label for="">
					متن پرسش شما
				</label>
			</div>
		</div>
		<div class="col-sm-12 p-1">
			<button type="submit" class="btn btn-lg btn-one w-100 rounded-3">
				ارسال پرسش
			</button>
		</div>
	</div>
</form>
