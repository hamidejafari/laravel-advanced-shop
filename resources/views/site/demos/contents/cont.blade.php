<div class="card p-2 border-0 rounded-0">
	<div class="row w-100 m-0">
		<div class="col-xl-6 p-1">
			<div class="card rounded-0 p-2">
				<button class="btn btn-link btn-trash">
					<i class="bi bi-trash"></i>
				</button>
				<div class="row w-100 m-0">
					<div class="col-xl-3 col-md-2 col-sm-2 col-xs-3 p-1">
						<img src="{{asset('assets/site/images/11.png')}}" style="background-color:#fc8e6d"
							alt="عنوان محصول" class="w-100 text-center">
					</div>
					<div class="col-xl-12 p-1">
						<ul class="p-0 m-0">
							<li class="list-unstyled">
								<h5 class="fw-bolder my-1">
									ادو تویلت زنانه دوان دلچه گابانا
								</h5>
								<h6 class="fw-bolder my-1">
									Punk Volumizer Mascara DOUCCE
								</h6>
							</li>
							<li class="list-unstyled">
								<p class="m-0 d-flex align-items-center text-secondary">
									<i class="bi bi-tag d-flex me-2"></i>
									قیمت : ۱۰۰،۰۰۰ تومان
								</p>
							</li>
							<li class="list-unstyled">
								<p class="m-0 d-flex align-items-center text-secondary">
									<i class="bi bi-shield-check d-flex me-2"></i>
									گارانتی اصالت و سلامت فیزیکی کالا
								</p>
							</li>
							<li class="list-unstyled">
								<p class="m-0 d-flex align-items-center text-secondary">
									<i class="bi bi-triangle d-flex me-2"></i>
									پرشین سلکت
								</p>
							</li>
						</ul>
					</div>
					<div class="col-xl-12 p-1">
						<ul class="p-0 m-0">
							<li class="list-unstyled">
								<p class="m-0 d-flex align-items-center fw-bolder">
									تعداد
								</p>
							</li>
						</ul>
						<div class="input-number-box">
							<div class="qty my-1 mx-auto w-100">
								<span class="minus bg-transparent text-dark">
									<i class="bi bi-dash"></i>
								</span>
								<input type="" class="count" name="qty" value="1">
								<span class="plus bg-transparent text-dark">
									<i class="bi bi-plus"></i>
								</span>
							</div>
						</div>
						<small class="d-flex align-items-center justify-content-end text-danger">
							میتوانید تعداد را کم یا زیاد کنید
						</small>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 p-1">
			<div class="card rounded-0 p-2">
				<button class="btn btn-link btn-trash">
					<i class="bi bi-trash"></i>
				</button>
				<div class="row w-100 m-0">
					<div class="col-xl-3 col-md-2 col-sm-2 col-xs-3 p-1">
						<img src="{{asset('assets/site/images/11.png')}}" style="background-color:#fc8e6d"
							alt="عنوان محصول" class="w-100 text-center">
					</div>
					<div class="col-xl-12 p-1">
						<ul class="p-0 m-0">
							<li class="list-unstyled">
								<h5 class="fw-bolder my-1">
									ادو تویلت زنانه دوان دلچه گابانا
								</h5>
								<h6 class="fw-bolder my-1">
									Punk Volumizer Mascara DOUCCE
								</h6>
							</li>
							<li class="list-unstyled">
								<p class="m-0 d-flex align-items-center text-secondary">
									<i class="bi bi-tag d-flex me-2"></i>
									قیمت : ۱۰۰،۰۰۰ تومان
								</p>
							</li>
							<li class="list-unstyled">
								<p class="m-0 d-flex align-items-center text-secondary">
									<i class="bi bi-shield-check d-flex me-2"></i>
									گارانتی اصالت و سلامت فیزیکی کالا
								</p>
							</li>
							<li class="list-unstyled">
								<p class="m-0 d-flex align-items-center text-secondary">
									<i class="bi bi-triangle d-flex me-2"></i>
									پرشین سلکت
								</p>
							</li>
						</ul>
					</div>
					<div class="col-xl-12 p-1">
						<ul class="p-0 m-0">
							<li class="list-unstyled">
								<p class="m-0 d-flex align-items-center fw-bolder">
									تعداد
								</p>
							</li>
						</ul>
						<div class="input-number-box">
							<div class="qty my-1 mx-auto w-100">
								<span class="minus bg-transparent text-dark">
									<i class="bi bi-dash"></i>
								</span>
								<input type="" class="count" name="qty" value="1">
								<span class="plus bg-transparent text-dark">
									<i class="bi bi-plus"></i>
								</span>
							</div>
						</div>
						<small class="d-flex align-items-center justify-content-end text-danger">
							میتوانید تعداد را کم یا زیاد کنید
						</small>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
	$('.count').prop('disabled', true);
	$(document).on('click', '.plus', function() {
		$('.count').val(parseInt($('.count').val()) + 1);
	});
	$(document).on('click', '.minus', function() {
		$('.count').val(parseInt($('.count').val()) - 1);
		if ($('.count').val() == 0) {
			$('.count').val(1);
		}
	});
});
</script>