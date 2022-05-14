@extends('layouts.site.master')
@section('title'){{@$blog_category->title_seo ? $blog_category->title_seo : $blog_category->title}} @stop
@section('image_seo'){{ @$blog_category->image ? asset('assets/uploads/content/art/big/'.$blog_category->image) : asset('assets/uploads/content/set/'.@$setting->logo)}}
@endsection

@section('description')
@if($blog_category->description_seo != null)
{!! $blog_category->description_seo !!}
@else
{!! strip_tags(\Illuminate\Support\Str::limit($blog_category->description,100)) !!}
@endif
@stop
@section('content')

<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="article blog-home">
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
											لیست مقالات
										</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										{{@$blog_category->title}}
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<h1 class="text-one my-2 ismb h2">
							لیست مقالات {{@$blog_category->title}}
						</h1>
					</div>
					<div class="col-sm-12 p-0">
						<div class="row w-100 m-0">
							@foreach($blogs as $blog)
							@php
							$comments_count =
							App\Models\Comment::where('commentable_id',$blog->id)->whereStatus(1)->where('commentable_type','App\Models\Content')->count();
							@endphp
							<div class="col-xxl-3 col-lg-4 col-sm-6 col-xs-12 p-1">
								<a href="{{route('site.blog.detail',['id'=>$blog->id])}}">
									<div class="card border-0 rounded-0">
										<div class="imgbox">
											<figure class="m-0" style="height: 10rem;">
												<div style="display: flex;width: auto;height: auto;overflow: hidden;align-items: center;justify-content: center;">
													<img @if(file_exists('assets/uploads/content/art/big/'.$blog->image)) src="{{asset('assets/uploads/content/art/big/'.$blog->image)}}" alt="{{@$blog->title}}" @else src="{{asset('assets/site/images/notfound.png')}}" @endif style="display: inline-block;width: auto;height: auto;max-height: 100%;max-width: 100%;"/>
												</div>
											</figure>
										</div>
										<h4>
											{{@$blog->title}}
										</h4>
										<div class="caption">
											<p>
                                                {!! strip_tags(\Illuminate\Support\Str::words($blog->description,30)) !!}
											</p>
										</div>
										<div class="ic mt-2">
											<ul class="p-0 m-0">
												{{--												<li class="float-end list-unstyled ms-4">--}}
												{{--													<p--}}
												{{--														class="m-0 d-flex align-items-center text-secondary">--}}
												{{--														۴۰--}}
												{{--														<i class="bi bi-heart text-one d-flex ms-2"></i>--}}
												{{--													</p>--}}
												{{--												</li>--}}
												<li class="float-end list-unstyled ms-4">
													<p
														class="m-0 d-flex align-items-center text-secondary">
														{{$blog->view}}
														<i class="bi bi-eye text-one d-flex ms-2"></i>
													</p>
												</li>
											</ul>
										</div>
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
