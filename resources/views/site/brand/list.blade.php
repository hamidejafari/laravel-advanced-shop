@extends('layouts.site.master')
@section('content')

<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="brand brand-list">
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
										همه برند ها
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<h1 class="text-one my-2 ismb h2">
							لیست برندها
						</h1>
					</div>
					<div class="col-sm-12 p-0">
						<div class="row w-100 m-0">
							@foreach($brands as $brand)
							<div class="col-xxl-3 col-lg-3 col-md-4 col-sm-4 col-xs-6 p-1">
								<a href="{{route('site.brand.detail',['id'=>$brand->id])}}" class="figure">
									<div class="card rounded-0 border-0 p-1">
										<img src="{{$brand->brand_image}}" alt="{!! @$brand->title !!}" style="width: 50%;" class="text-secondary">
										<h4>
											{!! @$brand->title !!}
										</h4>
									</div>
								</a>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@stop
