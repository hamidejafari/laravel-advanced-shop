<div class="d-md-none d-sm-block d-xs-block">
	@include('layouts.site.blocks.content.quiz')
</div>
<footer class="footer">
	<div class="container">
		<div class="top">
			<div class="row w-100 m-0">
				<div class="col-xxl-7 col-xl-7 col-md-6 col-sm-12 p-0">
					<div class="row w-100 m-0">
						<div class="col-xxl-3 col-xl-3 col-md-12 col-sm-3 col-xs-12 p-md-2 p-sm-0 p-xs-0">
							<a href="tel:{{@$setting_header->contact}}">
								<div class="row w-100 m-0">
									<div
										class="col-xl-3 col-md-2 col-sm-3 col-xs-2 align-self-center text-center p-1">
										<i class="bi bi-telephone"></i>
									</div>
									<div class="col-xl-9 col-md-10 col-sm-9 col-xs-10 align-self-center p-1">
										<h2 class="text-one">
											تماس با پشتیبانی
										</h2>
										<h4 class="text-white">
											{{@$setting_header->contact}}
										</h4>
									</div>
								</div>
							</a>
						</div>
						<div class="col-xxl-9 col-xl-9 col-md-12 col-sm-9 col-xs-12 p-md-2 p-sm-0 p-xs-0">
							<a href="#">
								<div class="row w-100 m-0">
									<div
										class="col-xl-2 col-md-2 col-sm-2 col-xs-2 align-self-center text-center p-1">
										<i class="bi bi-geo-alt"></i>
									</div>
									<div class="col-xl-10 col-md-10 col-sm-10 col-xs-10 align-self-center p-1">
										<h2 class="text-one">
											آدرس فروشگاه مرکزی
										</h2>
										<h4 class="text-white">
											{{@$setting_header->address}}
										</h4>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xxl-5 col-xl-5 col-md-6 col-sm-12 p-0">
					<div class="row w-100 m-0">
						<div class="col-xl-6 col-md-12 col-sm-6 col-xs-12 p-md-2 p-sm-0 p-xs-0">
							<a href="mailto:{{@$setting_header->email}}">
								<div class="row w-100 m-0">
									<div
										class="col-xl-3 col-md-2 col-sm-2 col-xs-2 align-self-center text-center p-1">
										<i class="bi bi-envelope"></i>
									</div>
									<div class="col-xl-9 col-md-10 col-sm-10 col-xs-10 align-self-center p-1">
										<h2 class="text-one">
											ایمیل پشتیبانی
										</h2>
										<h4 class="text-white">
											{{@$setting_header->email}}
										</h4>
									</div>
								</div>
							</a>
						</div>
						<div class="col-xl-6 col-md-12 d-md-block d-sm-none d-xs-none p-md-2 p-sm-0 p-xs-0">
							<a href="tel:{{@$setting_header->phone}}">
								<div class="row w-100 m-0">
									<div
										class="col-xl-3 col-md-2 col-sm-2 col-xs-2 align-self-center text-center p-1">
										<i class="bi bi-headset"></i>
									</div>
									<div class="col-xl-9 col-md-10 col-sm-10 col-xs-10 align-self-center p-1">
										<h2 class="text-one">
											مشاوره پوست و زیبایی
										</h2>
										<h4 class="text-white">
											{{@$setting_header->phone}}
										</h4>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr class="my-xs-1 my-sm-2">
		<div class="d-md-block d-sm-none d-xs-none">
			<div class="bottom">
				<div class="row w-100 m-0">
					<div class="col-md-7 col-sm-12 p-0">
						<div class="row w-100 m-0">
							<div class="col-sm-4 col-xs-5 mx-auto p-2">
								<h4 class="fw-bolder text-white">
									دسترسی سریع
								</h4>
								<ul class="p-3">
									<li class="text-one">
										<a href="{{route('site.timer')}}" class="text-white">
											تخفیف دارها
										</a>
									</li>
									<li class="text-one">
										<a href="{{route('panel.log')}}" class="text-white">
											ورود
										</a>
									</li>
									<li class="text-one">
										<a href="{{route('panel.register')}}" class="text-white">
											ثبت نام
										</a>
									</li>
									<li class="text-one">
										<a href="{{route('site.rules')}}" class="text-white">
											قوانین و مقررات
										</a>
									</li>
									<li class="text-one">
										<a href="{{route('site.pay')}}" class="text-white">
											راهنمای خرید
										</a>
									</li>
									<li class="text-one">
										<a href="{{route('site.tracking')}}" class="text-white">
											پیگیری مرسوله پستی
										</a>
									</li>
									<li class="text-one">
										<a href="{{route('site.about')}}" class="text-white">
											درباره ما
										</a>
									</li>
									<li class="text-one">
										<a href="{{route('site.contact')}}" class="text-white">
											تماس با ما
										</a>
									</li>
								</ul>
							</div>
							<div class="col-sm-4 col-xs-5 mx-auto p-2">
								<h4 class="fw-bolder text-white">
									دسته بندی محصولات
								</h4>
								<ul class="p-3">
									@foreach($category_footer as $cat)
									<li class="text-one">
										<a href="{{route('site.product.list',['id'=>$cat->id])}}"
											class="text-white">
											{{@$cat->title}}
										</a>
									</li>
									@endforeach
								</ul>
							</div>
							<div class="col-sm-4 col-xs-6 mx-auto d-sm-block d-xs-none p-2">
								<h4 class="fw-bolder text-white">
									برندهای پرطرفدار
								</h4>
								<ul class="p-3">
									@foreach($brands_footer as $br)
									<li class="text-one">
										<a href="{{route('site.brand.detail',['id'=>$br->id])}}"
											class="text-white">
											{{@$br->title}}
										</a>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-5 col-sm-12 p-2">
						<!--<ul class="p-0 m-0 namad">-->
						<!--	<li class="">-->
						<!--		<a href="">-->
						<!--			<img src="{{asset('assets/site/images/kaj/psr.jpg')}}" alt="">-->
						<!--		</a>-->
						<!--	</li>-->
						<!--	<li class="">-->
						<!--		<a href="">-->
						<!--			<img src="{{asset('assets/site/images/kaj/nmd.jpg')}}" alt="">-->
						<!--		</a>-->
						<!--	</li>-->
						<!--	<li class="">-->
						<!--		<a href="">-->
						<!--			<img src="{{asset('assets/site/images/kaj/ath.jpg')}}" alt="">-->
						<!--		</a>-->
						<!--	</li>-->
						<!--</ul>-->
						<div class="description">
							<p>
								{{@$setting_header->about2}}
							</p>
						</div>
						<ul class="p-0 mx-auto my-4 d-flex max-content">
							@foreach($social_header as $social)
							<li class="list-unstyled">
								<a href="{{@$social->address}}" class="bg-white d-flex mx-1 p-2 rounded-circle"
									rel="noopener noreferrer nofollow">
									<i class="d-flex {{@$social->icon}}"></i>
								</a>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-12 text-center px-2 py-3">
						<h6 class="text-white">
							توسعه و طراحی :
							<a href="https://www.rahweb.ir/" target="_blank" rel="noopener noreferrer"
								class="text-one">
								شرکت طراحی سایت ره وب
							</a>
						</h6>
						<p class="text-white">
							کلیه حقوق مادی و معنوی این سایت برای شرکت کاج شاپ محفوظ می باشد و هرگونه کپی برداری
							پیگرد قانونی دارد
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="d-md-none d-sm-block d-xs-block">
			<div class="bottom pb-5">
				<div class="accordion pb-5" id="accordionFooter">
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading1">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
								data-bs-target="#collapsefooter1" aria-expanded="false"
								aria-controls="collapsefooter1">
								دسترسی سریع
							</button>
						</h2>
						<div id="collapsefooter1" class="accordion-collapse collapse" aria-labelledby="heading1"
							data-bs-parent="#accordionFooter">
							<div class="accordion-body">
								<ul class="px-3 py-0 m-0">
									<li class="text-one">
										<a href="{{route('site.timer')}}" class="text-white">
											تخفیف دارها
										</a>
									</li>
									<li class="text-one">
										<a href="{{route('panel.log')}}" class="text-white">
											ورود
										</a>
									</li>
									<li class="text-one">
										<a href="{{route('panel.register')}}" class="text-white">
											ثبت نام
										</a>
									</li>
									<li class="text-one">
										<a href="{{route('site.rules')}}" class="text-white">
											قوانین و مقررات
										</a>
									</li>
									<li class="text-one">
										<a href="" class="text-white">
											راهنمای خرید
										</a>
									</li>
									<li class="text-one">
										<a href="{{route('site.tracking')}}" class="text-white">
											پیگیری مرسوله پستی
										</a>
									</li>
									<li class="text-one">
										<a href="{{route('site.about')}}" class="text-white">
											درباره ما
										</a>
									</li>
									<li class="text-one">
										<a href="{{route('site.contact')}}" class="text-white">
											تماس با ما
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading2">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
								data-bs-target="#collapsefooter2" aria-expanded="false"
								aria-controls="collapsefooter2">
								دسته بندی محصولات
							</button>
						</h2>
						<div id="collapsefooter2" class="accordion-collapse collapse" aria-labelledby="heading2"
							data-bs-parent="#accordionFooter">
							<div class="accordion-body">
								<ul class="px-3 py-0 m-0">
									@foreach($category_footer as $cat)
									<li class="text-one">
										<a href="{{route('site.product.list',['id'=>$cat->id])}}"
											class="text-white">
											{{@$cat->title}}
										</a>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading3">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
								data-bs-target="#collapsefooter3" aria-expanded="false"
								aria-controls="collapsefooter3">
								برندهای پرطرفدار
							</button>
						</h2>
						<div id="collapsefooter3" class="accordion-collapse collapse" aria-labelledby="heading3"
							data-bs-parent="#accordionFooter">
							<div class="accordion-body">
								<ul class="px-3 py-0 m-0">
									@foreach($brands_footer as $br)
									<li class="text-one">
										<a href="{{route('site.brand.detail',['id'=>$br->id])}}"
											class="text-white">
											{{@$br->title}}
										</a>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading5">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
								data-bs-target="#collapsefooter5" aria-expanded="false"
								aria-controls="collapsefooter5">
								درباره کاج شاپ
							</button>
						</h2>
						<div id="collapsefooter5" class="accordion-collapse collapse" aria-labelledby="heading5"
							data-bs-parent="#accordionFooter">
							<div class="accordion-body">
								<div class="description">
									<p>
										{{@$setting_header->about2}}
									</p>
								</div>
							</div>
						</div>
					</div>
					<!--<div class="accordion-item">-->
					<!--	<h2 class="accordion-header" id="heading4">-->
					<!--		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"-->
					<!--			data-bs-target="#collapsefooter4" aria-expanded="false"-->
					<!--			aria-controls="collapsefooter4">-->
					<!--			مجوزها-->
					<!--		</button>-->
					<!--	</h2>-->
					<!--	<div id="collapsefooter4" class="accordion-collapse collapse" aria-labelledby="heading4"-->
					<!--		data-bs-parent="#accordionFooter">-->
					<!--		<div class="accordion-body">-->
					<!--			<ul class="p-0 m-0 namad">-->
					<!--				<li class="">-->
					<!--					<a href="">-->
					<!--						<img src="{{asset('assets/site/images/kaj/psr.jpg')}}" alt="">-->
					<!--					</a>-->
					<!--				</li>-->
					<!--				<li class="">-->
					<!--					<a href="">-->
					<!--						<img src="{{asset('assets/site/images/kaj/nmd.jpg')}}" alt="">-->
					<!--					</a>-->
					<!--				</li>-->
					<!--				<li class="">-->
					<!--					<a href="">-->
					<!--						<img src="{{asset('assets/site/images/kaj/ath.jpg')}}" alt="">-->
					<!--					</a>-->
					<!--				</li>-->
					<!--			</ul>-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading5">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
								data-bs-target="#collapsefooter6" aria-expanded="false"
								aria-controls="collapsefooter6">
								صفحات اجتماعی
							</button>
						</h2>
						<div id="collapsefooter6" class="accordion-collapse collapse" aria-labelledby="heading5"
							data-bs-parent="#accordionFooter">
							<div class="accordion-body">
								<ul class="p-0 mx-auto my-4 d-flex max-content">
									@foreach($social_header as $social)
									<li class="list-unstyled">
										<a href="{{@$social->address}}"
											class="bg-white d-flex mx-1 p-2 rounded-circle">
											<i class="d-flex {{@$social->icon}}"></i>
										</a>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 text-center px-2 py-3">
					<h6 class="text-white">
						توسعه و طراحی :
						<a href="https://www.rahweb.ir/" target="_blank" rel="noopener noreferrer"
							class="text-one">
							شرکت طراحی سایت ره وب
						</a>
					</h6>
					<p class="text-white">
						کلیه حقوق مادی و معنوی این سایت برای شرکت کاج شاپ محفوظ می باشد و هرگونه کپی برداری
						پیگرد قانونی دارد
					</p>
				</div>
			</div>
		</div>
	</div>
</footer>
