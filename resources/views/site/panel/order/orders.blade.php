@extends('site.panel.master')
@section('content')

<div class="bg-one panel-head p-2">
	<h1 class="fw-bolder text-white d-flex align-items-center h4 m-0">
		<i class="bi bi-list-check me-2 d-flex h2 my-0"></i>
		لیست سفارشات
	</h1>
</div>
<div class="favorit order-tab h-100 py-1">
	<div class="row w-100 h-100 m-0">
		<div class="col-sm-12 h-100 p-2">
			<div class="d-md-block d-sm-none d-xs-none">
				<ul class="nav nav-pills m-0" id="orders-tab" role="tablist">
{{--					<li class="nav-item" role="presentation">--}}
{{--						<button class="nav-link rounded-0 active" id="pills-1-tab" data-bs-toggle="pill"--}}
{{--							data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1"--}}
{{--							aria-selected="true">--}}
{{--							در حال پرداخت--}}
{{--						</button>--}}
{{--					</li>--}}
					<li class="nav-item" role="presentation">
						<button class="nav-link rounded-0" id="pills-2-tab" data-bs-toggle="pill"
							data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2"
							aria-selected="false">
						پرداخت شده
						</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link rounded-0" id="pills-3-tab" data-bs-toggle="pill"
							data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-3"
							aria-selected="false">
							تایید شده و در حال بسته بندی
						</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link rounded-0" id="pills-4-tab" data-bs-toggle="pill"
							data-bs-target="#pills-4" type="button" role="tab" aria-controls="pills-4"
							aria-selected="false">
							ارسال شده
						</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link rounded-0" id="pills-5-tab" data-bs-toggle="pill"
							data-bs-target="#pills-5" type="button" role="tab" aria-controls="pills-5"
							aria-selected="false">
                            لغو شده
						</button>
					</li>

				</ul>
				<div class="tab-content" id="orders-tabContent">
{{--					<div class="tab-pane fade show active" id="pills-1" role="tabpanel"--}}
{{--						aria-labelledby="pills-1-tab">--}}
{{--						@if(count($pay_orders)>0)--}}

{{--						@include('site.panel.content.pay_orders')--}}

{{--						@else--}}

{{--						<div class="py-5">--}}
{{--							@include('site.panel.content.empty')--}}
{{--						</div>--}}

{{--						@endif--}}
{{--					</div>--}}
					<div class="tab-pane fade show active" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
						@if(count($examine_orders)>0)

						@include('site.panel.content.examine_orders')

					@else

						<div class="py-5">
							@include('site.panel.content.empty')
						</div>

						@endif
					</div>
					<div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
						@if(count($pack_orders)>0)

						@include('site.panel.content.pack_orders')

					@else

						<div class="py-5">
							@include('site.panel.content.empty')
						</div>

						@endif
					</div>
					<div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
						@if(count($sent_orders)>0)

						@include('site.panel.content.sent_orders')

					@else


						<div class="py-5">
							@include('site.panel.content.empty')
						</div>

						@endif
					</div>
					<div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
						@if(count($cancel_orders)>0)

						@include('site.panel.content.cancel_orders')

					@else

						<div class="py-5">
							@include('site.panel.content.empty')
						</div>

						@endif
					</div>

				</div>
			</div>
			<div class="d-md-none d-sm-block d-xs-block">
				<div class="accordion" id="accordionOrder">
{{--					<div class="accordion-item my-1">--}}
{{--						<h2 class="accordion-header" id="headingOrd1">--}}
{{--							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"--}}
{{--								data-bs-target="#order1" aria-expanded="false" aria-controls="order1">--}}
{{--								در حال پرداخت--}}
{{--							</button>--}}
{{--						</h2>--}}
{{--						<div id="order1" class="accordion-collapse collapse"--}}
{{--							aria-labelledby="headingOrd1" data-bs-parent="#accordionOrder">--}}
{{--							<div class="accordion-body px-0 py-1">--}}
{{--								@if(count($pay_orders)>0)--}}

{{--								@include('site.panel.content.pay_orders')--}}

{{--						@else--}}

{{--								<div class="py-5">--}}
{{--									@include('site.panel.content.empty')--}}
{{--								</div>--}}

{{--								@endif--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
					<div class="accordion-item my-1">
						<h2 class="accordion-header" id="headingOrd2">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
								data-bs-target="#order2" aria-expanded="false" aria-controls="order2">
							پرداخت شده
							</button>
						</h2>
						<div id="order2" class="accordion-collapse collapse" aria-labelledby="headingOrd2"
							data-bs-parent="#accordionOrder">
							<div class="accordion-body px-0 py-1">
								@if(count($examine_orders)>0)

								@include('site.panel.content.examine_orders')

								@else

								<div class="py-5">
									@include('site.panel.content.empty')
								</div>

								@endif
							</div>
						</div>
					</div>
					<div class="accordion-item my-1">
						<h2 class="accordion-header" id="headingOrd3">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
								data-bs-target="#order3" aria-expanded="false"
								aria-controls="order3">
								تایید شده و در حال بسته بندی
							</button>
						</h2>
						<div id="order3" class="accordion-collapse collapse" aria-labelledby="headingOrd3"
							data-bs-parent="#accordionOrder">
							<div class="accordion-body px-0 py-1">
								@if(count($pack_orders)>0)

								@include('site.panel.content.pack_orders')

							@else

								<div class="py-5">
									@include('site.panel.content.empty')
								</div>

								@endif
							</div>
						</div>
					</div>
					<div class="accordion-item my-1">
						<h2 class="accordion-header" id="headingOrd4">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
								data-bs-target="#order4" aria-expanded="false"
								aria-controls="order4">
								ارسال شده
							</button>
						</h2>
						<div id="order4" class="accordion-collapse collapse" aria-labelledby="headingOrd4"
							data-bs-parent="#accordionOrder">
							<div class="accordion-body px-0 py-1">
								@if(count($sent_orders)>0)

								@include('site.panel.content.sent_orders')

							@else

								<div class="py-5">
									@include('site.panel.content.empty')
								</div>

								@endif
							</div>
						</div>
					</div>
					<div class="accordion-item my-1">
						<h2 class="accordion-header" id="headingOrd5">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
								data-bs-target="#order5" aria-expanded="false"
								aria-controls="order5">
								لغو شده
							</button>
						</h2>
						<div id="order5" class="accordion-collapse collapse" aria-labelledby="headingOrd5"
							data-bs-parent="#accordionOrder">
							<div class="accordion-body px-0 py-1">
								@if(count($cancel_orders)>0)

								@include('site.panel.content.cancel_orders')
                                @else

								<div class="py-5">
									@include('site.panel.content.empty')
								</div>

								@endif
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

@stop
