<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
	<li class="nav-item" role="presentation">
		<button class="nav-link active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button"
			role="tab" aria-controls="pills-1" aria-selected="false">
			توضیحات محصول
		</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button"
			role="tab" aria-controls="pills-2" aria-selected="false">
			مشخصات محصول
		</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="pills-6-tab" data-bs-toggle="pill" data-bs-target="#pills-6" type="button"
			role="tab" aria-controls="pills-6" aria-selected="false">
			ترکیبات
		</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="pills-7-tab" data-bs-toggle="pill" data-bs-target="#pills-7" type="button"
			role="tab" aria-controls="pills-7" aria-selected="false">
			طرز استفاده
		</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="pills-3-tab" data-bs-toggle="pill" data-bs-target="#pills-3" type="button"
			role="tab" aria-controls="pills-3" aria-selected="true">
			نظرات کاربران
		</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="pills-4-tab" data-bs-toggle="pill" data-bs-target="#pills-4" type="button"
			role="tab" aria-controls="pills-4" aria-selected="false">
			پرسش و پاسخ
		</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="pills-5-tab" data-bs-toggle="pill" data-bs-target="#pills-5" type="button"
			role="tab" aria-controls="pills-5" aria-selected="false">
			ویدئو و تیزر
		</button>
	</li>
</ul>
<hr class="my-1">
<div class="tab-content" id="pills-tabContent">
	<div class="tab-pane fade px-md-3 py-3 show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
		@include('site.products.contents.description')
	</div>
	<div class="tab-pane fade px-md-3 py-3" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
		@include('site.products.contents.specifications')
	</div>
	<div class="tab-pane fade px-md-3 py-3" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
		@include('site.products.contents.usercomments')
	</div>
	<div class="tab-pane fade px-md-3 py-3" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
		@include('site.products.contents.faq')
	</div>
	<div class="tab-pane fade px-md-3 py-3" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
		@include('site.products.contents.videos')
	</div>
	<div class="tab-pane fade px-md-3 py-3" id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab">
		@include('site.products.contents.compounds')
	</div>
	<div class="tab-pane fade px-md-3 py-3" id="pills-7" role="tabpanel" aria-labelledby="pills-7-tab">
		@include('site.products.contents.how-to-use')
	</div>
</div>