@extends('layouts.site.master')
@section('content')

<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="comparison">
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
										لیست مقایسه رژ لب
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="card border-0 rounded-0 p-3">
							<h2 class="ismb text-one border-start border-3 px-2 m-0">
								مشخصات کلی
							</h2>
							@include('site.comparison.add')
							<div class="p-1">
								@include('site.comparison.table')
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="addModalLabel">
								انتخاب محصول برای مقایسه
							</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal"
								aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="row w-100 m-0">
								<div class="col-xl-3 col-lg-4 col-sm-6 col-xs-6 text-center p-1">
									<a href="#">
										<div class="card text-center px-2 py-3">
											<img src="{{asset('assets/site/images/df.png')}}" alt=""
												class="w-75 mx-auto">
											<p class="mt-3 mb-1 text-dark h6">
												عنوان آزمایشی محصول
											</p>
										</div>
									</a>
								</div>
								<div class="col-xl-3 col-lg-4 col-sm-6 col-xs-6 text-center p-1">
									<a href="#">
										<div class="card text-center px-2 py-3">
											<img src="{{asset('assets/site/images/df.png')}}" alt=""
												class="w-75 mx-auto">
											<p class="mt-3 mb-1 text-dark h6">
												عنوان آزمایشی محصول
											</p>
										</div>
									</a>
								</div>
								<div class="col-xl-3 col-lg-4 col-sm-6 col-xs-6 text-center p-1">
									<a href="#">
										<div class="card text-center px-2 py-3">
											<img src="{{asset('assets/site/images/df.png')}}" alt=""
												class="w-75 mx-auto">
											<p class="mt-3 mb-1 text-dark h6">
												عنوان آزمایشی محصول
											</p>
										</div>
									</a>
								</div>
								<div class="col-xl-3 col-lg-4 col-sm-6 col-xs-6 text-center p-1">
									<a href="#">
										<div class="card text-center px-2 py-3">
											<img src="{{asset('assets/site/images/df.png')}}" alt=""
												class="w-75 mx-auto">
											<p class="mt-3 mb-1 text-dark h6">
												عنوان آزمایشی محصول
											</p>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@stop