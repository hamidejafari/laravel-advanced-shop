@extends('layouts.site.master')
@section('title'){{@$brand->title_seo ? $brand->title_seo : $brand->title}} @stop
@section('image_seo'){{ @$brand->image ? $brand->brand_image : asset('assets/uploads/content/set/'.@$setting->logo)}}
@endsection

@section('description')
    @if($brand->description_seo != null)
        {!! $brand->description_seo !!}
    @else
        {!! strip_tags(\Illuminate\Support\Str::limit($brand->description,100)) !!}
    @endif
@stop
@section('content')
<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="brand brand-details">
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
									<li class="breadcrumb-item">
										<a href="{{route('site.brand.list')}}">
											همه برند ها
										</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										{!! @$brand->title !!}
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-12 p-0">

						@include('site.brand.content.info')
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection
