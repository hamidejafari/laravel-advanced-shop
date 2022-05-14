@extends('layouts.site.master')
@section('title'){{@$seo->title_seo ? @$seo->title_seo : @$seo->title}} @stop
@section('robots') {{$seo->index ? 'index,follow' : 'noindex,nofollow'}} @stop
@section('description')
    @if($seo->description_seo != null)
        {!! @$seo->description_seo !!}
    @else
        {!! strip_tags(\Illuminate\Support\Str::limit(@$seo->description,100)) !!}
    @endif
@stop

@section('content')

<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="product product-details tags">
			<div class="container">
				<div class="row w-100 m-0">
					<div class="col-sm-12 p-1">
						<div class="card border-0 rounded-0 py-2 px-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item">
										<a href="/">
											<i class="bi bi-house"></i>
											خانه
										</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
                                        {{@$seo->h1}}
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-12 text-start p-1">
						<div class="card border-0 rounded-0 p-3">
							<h1 class="ismb mt-1 mb-0 h2 text-one">
                                @if(!empty($tag)) "{{@$seo->h1}}" @endif{{'('.$count.')'}}
							</h1>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="card border-0 rounded-0 p-3">
							<div class="row w-100 m-0">
								<div class="col-sm-12 p-1">
									<p class="h5 ismb">
										 محصولات در "{{@$seo->h1}}"
									</p>
                                    @include('site.tag.pro')

                                    @if(@$seo->description != null)
                                        <div class="col-sm-12 p-1">
                                            <div class="card rounded-0 border-0 p-3 figure-sc ">
                                                <div class="text-justify desc">
                                                    {!! @$seo->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
								</div>
							</div>
						</div>
					</div>


					<div class="col-sm-12 p-1">
						<div class="card border-0 rounded-0 p-3">
							<div class="row w-100 m-0">
								<div class="col-sm-12 p-1">
									<p class="h5 ismb">
										دسته بندی ها در "{{@$x}}"
									</p>
								</div>
								@include('site.tag.cat')
							</div>
						</div>
					</div>



					<div class="col-sm-12 p-1">
						<div class="card brands-home border-0 rounded-0 p-3">
							<div class="row w-100 m-0">
								<div class="col-sm-12 p-1">
									<p class="h5 ismb">
										 برندها در "{{@$x}}"
									</p>
								</div>

								@include('site.tag.br')
							</div>
						</div>
					</div>

					<div class="col-sm-12 p-1">
						<div class="card blog-home border-0 rounded-0 p-3">
							<div class="row w-100 m-0">
								<div class="col-sm-12 p-1">
									<p class="h5 ismb">
										 مقالات در "{{@$x}}"
									</p>
								</div>
								@include('site.tag.art')
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@stop
