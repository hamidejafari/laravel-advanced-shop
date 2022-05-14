<div class="card p-2 border-0 rounded-0">
	<h4 class="fw-bolder p-2 d-flex align-items-center justify-content-between">
		آدرس های تحویل سفارش
		<button type="button" class="btn btn-link text-one fw-bolder text-decoration-none d-flex align-items-center"
			data-bs-toggle="modal" data-bs-target="#adressModal">
			<i class="bi bi-pin-map d-flex me-2"></i>
			اضافه کردن آدرس
		</button>
	</h4>
	<div class="row w-100 m-0">
		<div class="col-xl-6 p-1">
			<div class="card bg-light rounded-0 shadow-sm p-2">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label mt-1" for="flexRadioDefault1">
						ارسال به این آدرس
					</label>
				</div>
				<hr class="my-2">
				<ul class="p-0 m-0">
					<li class="list-unstyled">
						<p class="fw-bolder">
							تهران، سعادت آباد، علامه، پلاک ۱۰، طبقه ۱۰
						</p>
					</li>
					<li class="list-unstyled">
						<p class="m-0 text-secondary">
							<i class="bi bi-envelope"></i>
							کد پستی : ۴۵۷۶۹۸۳۴۷۶
						</p>
					</li>
					<li class="list-unstyled">
						<p class="m-0 text-secondary">
							<i class="bi bi-telephone"></i>
							شماره تماس : ۰۹۱۲۳۴۵۶۷۸۹
						</p>
					</li>
					<li class="list-unstyled">
						<p class="m-0 text-secondary">
							<i class="bi bi-person"></i>
							نام و نام خانوادگی
						</p>
					</li>
				</ul>
				<div class="text-end d-flex justify-content-end">
					<a href="" class="btn-link btn text-success d-flex align-items-center text-decoration-none"
						data-bs-toggle="modal" data-bs-target="#adressModal">
						<i class="bi bi-pen d-flex me-1"></i>
						ویرایش
					</a>
					<button href=""
						class="btn-link btn text-danger d-flex align-items-center text-decoration-none">
						<i class="bi bi-trash d-flex me-1"></i>
						حذف
					</button>
				</div>
			</div>
		</div>
		<div class="col-xl-6 p-1">
			<div class="card bg-light rounded-0 shadow-sm p-2">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
					<label class="form-check-label mt-1" for="flexRadioDefault2">
						ارسال به این آدرس
					</label>
				</div>
				<hr class="my-2">
				<ul class="p-0 m-0">
					<li class="list-unstyled">
						<p class="fw-bolder">
							تهران، سعادت آباد، علامه، پلاک ۱۰، طبقه ۱۰
						</p>
					</li>
					<li class="list-unstyled">
						<p class="m-0 text-secondary">
							<i class="bi bi-envelope"></i>
							کد پستی : ۴۵۷۶۹۸۳۴۷۶
						</p>
					</li>
					<li class="list-unstyled">
						<p class="m-0 text-secondary">
							<i class="bi bi-telephone"></i>
							شماره تماس : ۰۹۱۲۳۴۵۶۷۸۹
						</p>
					</li>
					<li class="list-unstyled">
						<p class="m-0 text-secondary">
							<i class="bi bi-person"></i>
							نام و نام خانوادگی
						</p>
					</li>
				</ul>
				<div class="text-end d-flex justify-content-end">
					<a href="" class="btn-link btn text-success d-flex align-items-center text-decoration-none"
						data-bs-toggle="modal" data-bs-target="#adressModal">
						<i class="bi bi-pen d-flex me-1"></i>
						ویرایش
					</a>
					<button href=""
						class="btn-link btn text-danger d-flex align-items-center text-decoration-none">
						<i class="bi bi-trash d-flex me-1"></i>
						حذف
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="adressModal" tabindex="-1" aria-labelledby="adressModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="adressModalLabel">
					اضافه کردن آدرس
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="" class="m-0">
					<div class="row w-100 m-0">
						<div class="col-lg-4 p-1">
							<div class="form-floating">
								<select class="form-select" id="floatingSelect"
									aria-label="Floating label select example">
									<option selected>یک</option>
									<option value="1">دو</option>
									<option value="2">سه</option>
									<option value="3">چهار</option>
								</select>
								<label for="floatingSelect">
									استان<span class="text-danger">*</span>
								</label>
							</div>
						</div>
						<div class="col-lg-4 p-1">
							<div class="form-floating">
								<select class="form-select" id="floatingSelect"
									aria-label="Floating label select example">
									<option selected>یک</option>
									<option value="1">دو</option>
									<option value="2">سه</option>
									<option value="3">چهار</option>
								</select>
								<label for="floatingSelect">
									شهر<span class="text-danger">*</span>
								</label>
							</div>
						</div>
						<div class="col-lg-4 p-1">
							<div class="form-floating">
								<select class="form-select" id="floatingSelect"
									aria-label="Floating label select example">
									<option selected>یک</option>
									<option value="1">دو</option>
									<option value="2">سه</option>
									<option value="3">چهار</option>
								</select>
								<label for="floatingSelect">
									محله<span class="text-danger">*</span>
								</label>
							</div>
						</div>
						<div class="col-sm-12 p-1">
							<div class="form-floating">
								<textarea class="form-control" placeholder="نشانی پستی" id="floatingTextarea"
									style="height:auto !important"></textarea>
								<label for="floatingTextarea">
									نشانی پستی<span class="text-danger">*</span>
								</label>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6 p-1">
							<div class="form-floating">
								<input type="text" class="form-control" id="floatingPassword"
									placeholder="پلاک">
								<label for="floatingPassword">
									پلاک<span class="text-danger">*</span>
								</label>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6 p-1">
							<div class="form-floating">
								<input type="text" class="form-control" id="floatingPassword"
									placeholder="واحد">
								<label for="floatingPassword">
									واحد
								</label>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12 p-1">
							<div class="form-floating">
								<input type="text" class="form-control" id="floatingPassword"
									placeholder="کد پستی">
								<label for="floatingPassword">
									کد پستی<span class="text-danger">*</span>
								</label>
							</div>
							<small>
								کد پستی باید ۱۰ رقم و بدون خط تیره باشد
							</small>
						</div>
						<div class="col-sm-12 text-end p-1">
							<button type="submit" class="btn btn-success">
								تایید و ثبت ارسال
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>