<h2 class="fw-bolder h4 text-dark">
	پرسش و پاسخ درباره
	<span>
		"{{@$product->title}}"
	</span>
</h2>
<div class="row w-100 m-0 comment pt-3">
	@if(count($questions) > 0)
	<div class="col-lg-8 col-md-7 pe-2 ps-0">
		@include('site.products.contents.faq-blocks.accordion')
	</div>
	@else
	<div class="col-lg-8 col-md-7 pe-2 ps-0">
		<div class="empty h-100 d-flex align-items-center justify-content-center">
			<img src="{{asset('assets/site/images/emptyfaq.png')}}" alt="پرسشی موجود نیسست" class="w-50 ic">
		</div>
	</div>
	@endif
	<div class="col-lg-4 col-md-5 p-0">
		<div class="bg-light position-sticky sticky p-3">
			<h4 class="text-center">
				سوال خود را بپرسید
			</h4>
			@include('site.products.contents.faq-blocks.form')
		</div>
	</div>
</div>