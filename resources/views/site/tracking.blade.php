@extends('layouts.site.master')
@section('title'){{'پیگیری سفارش'}} @stop
@section('description')
{{'پیگیری سفارش'}}
@stop
@section('content')

<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="product product-details">
			<div class="container">
				<div class="row w-100 m-0">
					<div class="col-sm-12 p-1">
						<div class="card card-mobile border-0 rounded-0 py-2 px-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item">
										<a href="/">
											<i class="bi bi-house"></i>
											خانه
										</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										پیگیری سفارش
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-4 p-1">
						<div class="card border-0 rounded-0 p-3">
							<form class="p-4 m-0" method="GET"
								action="{{URL::action('Site\HomeController@track')}}"
								enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="col-sm-12 p-2">
									<div class="form-floating">
										<input type="tel" class="form-control" id="" name="mobile"
											placeholder="شماره همراه">
										<label for="">
											شماره همراه
										</label>
									</div>
								</div>
								<div class="col-sm-12 p-2">
									<div class="form-floating">
										<input type="text" class="form-control" id="" name="tracking_code"
											placeholder="شماره پیگیری خود را وارد کنید">
										<label for="">
											شماره پیگیری خود را وارد کنید
										</label>
									</div>
								</div>
								<div class="col-sm-12 p-2">
									<button type="submit" class="btn btn-lg btn-success w-100">
										پیگیری سفارش
									</button>
								</div>
							</form>
						</div>

					</div>
					<div class="col-sm-8 p-1">
						<div class="card border-0 rounded-0 p-3">
							<div class="row w-100 m-0">

								@if($order == null)
								<div class="col-xl-12 p-1">
									<div class="border p-2">
										<div
											class="empty h-100 d-flex align-items-center justify-content-center">
											<img src="{{asset('assets/site/images/emptytrack.png')}}"
												class="w-50 ic">
										</div>
									</div>
								</div>
								@else
								<div class="col-xl-12 p-1">
									<div class="border p-2">
										<div
											class="d-flex align-items-center justify-content-between border-bottom pb-2 mb-2">
											<ul
												class="p-0 m-0 d-flex align-items-center justify-content-center">
												<li class="list-unstyled">
													<p class="m-0">
														{!! $order->order_date !!}
													</p>
												</li>
												{{--                                                        <div class="list-unstyled">--}}
												{{--                                                            <i class="bi bi-dot d-flex text-one"></i>--}}
												{{--                                                        </div>--}}
												{{--                                                        <li class="list-unstyled en">--}}
												{{--                                                            <p class="m-0">--}}
												{{--                                                                294vdfj3e--}}
												{{--                                                            </p>--}}
												{{--                                                        </li>--}}
												<div class="list-unstyled">
													<i class="bi bi-dot d-flex text-one"></i>
												</div>
												<li class="list-unstyled">
													<p class="m-0">
														{{@$order->orderstatus->title}}
													</p>
												</li>
											</ul>
											<a href="{{route('panel.order.details',['id'=>$order->id])}}"
												class="text-one d-flex align-items-center">
												مشاهده سفارش
												<i class="bi bi-arrow-left-short d-flex h4 my-0 ms-2"></i>
											</a>
										</div>

										<div
											class="d-flex align-items-center justify-content-between border-top pt-2 mt-2">
											<div class="w-100">
												@if(@$order->order_status_id == 2)
												<div class="progress">
													<div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
														role="progressbar" style="width: 33%"
														aria-valuenow="33" aria-valuemin="0"
														aria-valuemax="100"></div>
												</div>
												<p class="m-0 text-danger">
													{{@$order->orderstatus->title}}
												</p>
												@elseif(@$order->order_status_id == 3)
												<div class="progress">
													<div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
														role="progressbar" style="width: 66%"
														aria-valuenow="66" aria-valuemin="0"
														aria-valuemax="100"></div>
												</div>
												<p class="m-0 text-warning">
													{{@$order->orderstatus->title}}
												</p>
												@elseif(@$order->order_status_id == 5)
												<div class="progress">
													<div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
														role="progressbar" style="width: 100%"
														aria-valuenow="100" aria-valuemin="0"
														aria-valuemax="100"></div>
												</div>
												<p class="m-0 text-success">
													{{@$order->orderstatus->title}}
												</p>
												@endif
											</div>
										</div>
										<!-- <div class="empty h-100 d-flex align-items-center justify-content-center">
											<img src="{{asset('assets/site/images/emptytrack.png')}}" class="w-50 ic">
										</div> -->
									</div>
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@stop