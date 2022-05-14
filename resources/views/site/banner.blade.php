@extends('layouts.site.master')
@section('title')	{{@$banner->title}} @stop
@section('image_seo'){{ @$banner['image'] ? asset('assets/uploads/content/sli/'.@$banner['image']) : asset('assets/uploads/content/set/'.@$setting->logo)}} @endsection
@section('description')
    {!! strip_tags(\Illuminate\Support\Str::limit(@$banner->description,100))  !!}
@stop
@section('content')

<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="bnrdet">
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
									{{$banner->title}}
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="card border-0 rounded-0 p-3">
							<div class="row w-100 m-0">
								<div
									class="col-xxl-7 col-xl-8 col-lg-9 col-md-10 col-sm-11 col-xs-12 mx-auto text-center p-1">
									<img src="{{asset('assets/uploads/content/sli/'.@$banner['image'])}}"
										alt=" {{@$banner->title}}" class="w-100">
									<div class="d-flex align-items-center justify-content-between">
										<h1 class="ismb mt-3 mb-2 h3 text-one">
                                            {{@$banner->title}}
										</h1>

									</div>
								</div>
								<div class="col-sm-12 col-xs-12 mx-auto text-center p-1">
									<div class="text-justify des">
										<p>
                                          {!! @$banner->description !!}
										</p>
									</div>
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
