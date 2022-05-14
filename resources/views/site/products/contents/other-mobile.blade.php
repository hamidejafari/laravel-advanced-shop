<div class="accordion" id="accordionExample">
	<div class="accordion-item border rounded-0 my-1">
		<h2 class="accordion-header" id="heading1">
			<button class="accordion-button bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1"
				aria-expanded="true" aria-controls="collapse1">
				توضیحات محصول
			</button>
		</h2>
		<div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1"
			data-bs-parent="#accordionExample">
			<div class="accordion-body bg-white border-top px-2 py-3">
				@include('site.products.contents.description-xs')
			</div>
		</div>
	</div>
	<div class="accordion-item border rounded-0 my-1">
		<h2 class="accordion-header" id="heading2">
			<button class="accordion-button bg-white collapsed" type="button" data-bs-toggle="collapse"
				data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
				مشخصات محصول
			</button>
		</h2>
		<div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
			data-bs-parent="#accordionExample">
			<div class="accordion-body bg-white border-top px-2 py-3">
				@include('site.products.contents.specifications')
			</div>
		</div>
	</div>
	<div class="accordion-item border rounded-0 my-1">
		<h2 class="accordion-header" id="heading6">
			<button class="accordion-button bg-white collapsed" type="button" data-bs-toggle="collapse"
				data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
				ترکیبات
			</button>
		</h2>
		<div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6"
			data-bs-parent="#accordionExample">
			<div class="accordion-body bg-white border-top px-2 py-3">
				@include('site.products.contents.compounds')
			</div>
		</div>
	</div>
	<div class="accordion-item border rounded-0 my-1">
		<h2 class="accordion-header" id="heading6">
			<button class="accordion-button bg-white collapsed" type="button" data-bs-toggle="collapse"
				data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
				طرز استفاده
			</button>
		</h2>
		<div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading6"
			data-bs-parent="#accordionExample">
			<div class="accordion-body bg-white border-top px-2 py-3">
				@include('site.products.contents.how-to-use')
			</div>
		</div>
	</div>
	<div class="accordion-item border rounded-0 my-1">
		<h2 class="accordion-header" id="heading3">
			<button class="accordion-button bg-white collapsed" type="button" data-bs-toggle="collapse"
				data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
				نظرات کاربران
			</button>
		</h2>
		<div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
			data-bs-parent="#accordionExample">
			<div class="accordion-body bg-white border-top px-2 py-3">
				@include('site.products.contents.usercomments')
			</div>
		</div>
	</div>
	<div class="accordion-item border rounded-0 my-1">
		<h2 class="accordion-header" id="heading4">
			<button class="accordion-button bg-white collapsed" type="button" data-bs-toggle="collapse"
				data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
				پرسش و پاسخ
			</button>
		</h2>
		<div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4"
			data-bs-parent="#accordionExample">
			<div class="accordion-body bg-white border-top px-2 py-3">
				@include('site.products.contents.faq')
			</div>
		</div>
	</div>
	<div class="accordion-item border rounded-0 my-1">
		<h2 class="accordion-header" id="heading5">
			<button class="accordion-button bg-white collapsed" type="button" data-bs-toggle="collapse"
				data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
				ویدئو و تیزر
			</button>
		</h2>
		<div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5"
			data-bs-parent="#accordionExample">
			<div class="accordion-body bg-white border-top px-2 py-3">
				@include('site.products.contents.videos')
			</div>
		</div>
	</div>
</div>