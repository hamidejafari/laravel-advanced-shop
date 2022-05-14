

<div class="container-fluid dashboard-content">
	<div class="row w-100 m-0">
		<div class="col-lg-6 mx-auto py-1 px-0">
			<h3 class="bg-white py-2 px-4 rounded-lg">
				اضافه کردن
			</h3>
			<div class="card rounded-lg border-0 p-3">
				<form method="post" action="{{URL::action('Admin\ProductController@postAddImage')}}"
					enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="{{$image->id}}">
					@include('admin.product_image.form')
				</form>
			</div>
		</div>
	</div>
</div>


