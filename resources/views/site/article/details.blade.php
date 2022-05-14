@extends('layouts.site.master')
@section('title'){{@$blog->title_seo ? $blog->title_seo : $blog->title}} @stop
@section('image_seo'){{ @$blog->image ? asset('assets/uploads/content/art/big/'.$blog->image) : asset('assets/uploads/content/set/'.@$setting->logo)}}
@endsection

@section('description')
@if($blog->description_seo != null)
{!! $blog->description_seo !!}
@else
{!! strip_tags(\Illuminate\Support\Str::limit($blog->description,100)) !!}
@endif
@stop
@section('content')

<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="article article-details">
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
										<a href="{{route('site.blog.cat')}}">
											دسته بندی مقالات
										</a>
									</li>
									<li class="breadcrumb-item">
										<a href="{{route('site.blog.list',['id'=>$blog->cat->id])}}">
											{{@$blog->cat->title}}
										</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										{{@$blog->title}}
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<!-- <h1 class="text-one my-2 ismb h2">
							{{@$blog->title}}
						</h1> -->
					</div>
					<div class="col-sm-12 p-0">
						<div class="row w-100 m-0">
							<div class="col-xl-3 col-lg-4 d-lg-block d-md-none d-sm-none d-xs-none p-0">
								@include('site.article.content.related')
							</div>
							<div class="col-xl-9 col-lg-8 p-0">
								<div class="detart">
									<div class="row w-100 m-0">
										<div class="col-sm-12 p-1">
											@include('site.article.content.info')
										</div>
										<div class="col-sm-12 p-1">
											@include('site.article.content.social')
										</div>

										<div class="col-sm-12 p-1">
											@include('site.article.content.comments')
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 d-lg-none d-md-block d-sm-block d-xs-block p-0">
								@include('site.article.content.related')
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@stop