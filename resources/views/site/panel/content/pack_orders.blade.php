<div class="border bg-light shadow-sm p-0">
	<!-- <h4 class="fw-boldeer border-bottom h5 pb-2">
		لیست سفارشات ارسال شده اخیر
	</h4> -->
	<div class="d-md-block d-sm-none d-xs-none">
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="table-secondary">
					<tr>
						<th class="text-center" scope="col">
							#
						</th>
						<th class="text-center" scope="col">
							شماره سفارش
						</th>
						<th class="text-center" scope="col">
							تاریخ ثبت سفارش
						</th>
						<th class="text-center" scope="col">
							مبلغ قابل پرداخت
						</th>
						<th class="text-center" scope="col">
							مبلغ کل
						</th>
						<th class="text-center" scope="col">
							عملیات پرداخت
						</th>
						<th class="text-center" scope="col">
							جزییات
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach($pack_orders as $key => $pack_order)
					<tr>
						<th class="text-center text-secondary" scope="row">
							{{$key+1}}
						</th>
						<td class="text-center text-secondary">
							{{@$pack_order->id}}
						</td>
						<td class="text-center text-secondary">
							{!! $pack_order->order_date !!}
						</td>
						<td class="text-center text-secondary">
							{{number_format(@$pack_order->payment)}}
						</td>
						<td class="text-center text-secondary">
							{{number_format(@$pack_order->total_prices)}}
						</td>
						<td class="text-center text-secondary">
							{{@$pack_order->orderstatus->title}}
						</td>
						<td class="text-center text-secondary">
							<a href="{{route('panel.order.details',['id'=>$pack_order->id])}}"
								class="btn btn-outline-secondary max-content mx-auto rounded-0 d-flex align-items-center justify-content-center">
								<i class="bi bi-eye-fill d-flex"></i>
							</a>
                            <a href="{{url('panel/pdf/'.$pack_order->id)}}"

                               class="btn btn-outline-secondary max-content mx-auto rounded-0 d-flex align-items-center justify-content-center">
                                <i class="bi bi-folder d-flex"></i>
                            </a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="d-md-none d-sm-block d-xs-block">
		@foreach($pack_orders as $key => $pack_order)
		<div class="row w-100 mx-0 mb-2 border border-dark bg-white">
			<div class="col-sm-2 col-2 text-center py-1 px-2 border">
				<p class="my-1 h6 fw-bolder">
					{{$key+1}}
				</p>
			</div>
			<div class="col-sm-5 col-10 py-1 px-2 border">
				<p class="my-1 text-start text-secondary h6">
					شماره سفارش :
				</p>
				<p class="my-1 text-end text-secondary h6">
					{{@$pack_order->id}}
				</p>
			</div>
			<div class="col-sm-5 col-6 py-1 px-2 border">
				<p class="my-1 text-start text-secondary h6">
					تاریخ ثبت سفارش :
				</p>
				<p class="my-1 text-end text-secondary h6">
					{!! $pack_order->order_date !!}
				</p>
			</div>
			<div class="col-sm-4 col-6 py-1 px-2 border">
				<p class="my-1 text-start text-secondary h6">
					مبلغ قابل پرداخت :
				</p>
				<p class="my-1 text-end text-secondary h6">
					{{number_format(@$pack_order->payment)}}
				</p>
			</div>
			<div class="col-sm-4 col-6 py-1 px-2 border">
				<p class="my-1 text-start text-secondary h6">
					مبلغ کل :
				</p>
				<p class="my-1 text-end text-secondary h6">
					{{number_format(@$pack_order->total_prices)}}
				</p>
			</div>
			<div class="col-sm-4 col-6 py-1 px-2 border">
				<p class="my-1 text-start text-secondary h6">
					وضعیت سفارش :
				</p>
				<p class="my-1 text-end text-secondary h6">
					{{@$pack_order->orderstatus->title}}
				</p>
			</div>
			<div class="col-12 p-2 border">
				<a href="{{route('panel.order.details',['id'=>$pack_order->id])}}"
					class="btn btn-outline-secondary rounded-0 d-flex align-items-center justify-content-center">
					<i class="bi bi-eye-fill d-flex me-2"></i>
					مشاهده جزییات
				</a>
                <a href="{{url('panel/pdf/'.$pack_order->id)}}"

                   class="btn btn-outline-secondary max-content mx-auto rounded-0 d-flex align-items-center justify-content-center">
                    <i class="bi bi-folder d-flex"></i>
                    چاپ فاکتور
                </a>
			</div>
		</div>
		@endforeach
	</div>
</div>
