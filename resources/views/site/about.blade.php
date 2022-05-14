@extends('layouts.site.master')
@section('title'){{@$setting_header->abouttitle ? $setting_header->abouttitle : $setting_header->title}} @stop
@section('image_seo'){{ @$setting_header->aboutimg ? asset('assets/uploads/content/set/big/'.$setting_header->aboutimg) : asset('assets/uploads/content/set/'.@$setting_header->logo)}} @endsection
@section('description')
    {!! strip_tags(\Illuminate\Support\Str::limit(@$setting_header->about,100))  !!}
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
										درباره ما
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="card border-0 rounded-0 p-3">
							<h1 class="fw-bolder text-one">
								<span>
									"{{@$setting_header->abouttitle}}"
								</span>
							</h1>
							<div class="text-justify des">
								{!! @$setting_header->about !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@stop
