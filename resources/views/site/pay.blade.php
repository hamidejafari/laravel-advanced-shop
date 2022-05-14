@extends('layouts.site.master')
@section('title'){{'راهنمای پرداخت اینترنتی فروشگاه اینترنتی و آنلاین کاج شاپ | کاج شاپ'}} @stop
@section('description')
{{'راهنمای پرداخت اینترنتی فروشگاه اینترنتی و آنلاین کاج شاپ شامل تعریف مشتری یا کاربر، تعریف سفارش، تعریف روز کاری و سایر موارد را می‌توانید در سایت کاج شاپ مشاهده کنید.'}}
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
										راهنمای پرداخت اینترنتی
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="card border-0 rounded-0 p-3 d-md-block d-sm-none d-xs-none">
							<h1 class="fw-bolder text-one">
								<span>
									"راهنمای پرداخت اینترنتی"
								</span>
							</h1>
							<div class="text-justify des">
								{!! @$setting_header->pay !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@stop