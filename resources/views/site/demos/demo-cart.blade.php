@extends('layouts.site.master')
@section('content')
<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="cart">
			<div class="container">
				<div class="row w-100 m-0">
					<div class="col-sm-12 p-1">
						<div class="card card-mobile border-0 rounded-0 py-2 px-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item">
										<a href="/demo">
											<i class="bi bi-house"></i>
											خانه
										</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										سبد خرید
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-xl-9 col-md-7 p-0">
						<div class="col-sm-12 p-1">
							@include('site.demos.contents.cont')
						</div>
						<div class="col-sm-12 p-1">
							@include('site.demos.contents.addresses')
						</div>
					</div>
					<div class="col-xl-3 col-md-5 p-1">
						@include('site.demos.contents.sidebar')
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@stop