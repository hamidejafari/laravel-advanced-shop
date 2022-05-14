@extends('layouts.site.master')
@section('title'){{@$category->title_seo ? $category->title_seo : $category->title}} @stop
@section('image_seo'){{ @$category->cat_image ? $category->cat_image : asset('assets/uploads/content/set/'.@$setting->logo)}}
@endsection
@section('robots') {{$category->noindex ? 'noindex,nofollow' : 'index,follow'}} @stop
@section('description')
@if($category->description_seo != null)
{!! $category->description_seo !!}
@else
{!! strip_tags(\Illuminate\Support\Str::limit($category->description,100)) !!}
@endif
@stop
@section('content')

<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="product product-cat">
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
										{{@$category->title}}
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="card rounded-0 border-0 p-3 ">
							<h1 class="ismb text-one h2 mt-2 mb-0">
								{{@$category->title}}
							</h1>
							@if($category->description != null)
							<div class="text-secondary text-justify" style="height: 12rem;overflow-y: scroll;">
								{!! @$category->description !!}
							</div>
							@endif
						</div>
					</div>
					<div class="col-sm-12 p-0">
						<div class="row w-100 m-0">
							@foreach($category->childs as $key=>$child)
							<div class="col-xl-3 col-lg-4 col-sm-6 p-1">
								<div class="card border-0 rounded-0 p-1">
									<a href="{{route('site.product.list',['id'=>$child->id])}}">
										<div class="position-relative">
											<img src="{{$child->cat_image}}" alt="{!! @$child->title !!}"
												class="w-100 h-auto">
											<div class="over">
												{{@$child->title}}
											</div>
										</div>
									</a>
									@if(count($child->childs) > 0)
									<div class="p-1">
										<ul class="p-0 m-0">
											@foreach($child->childs as $item)
											<li class="list-unstyled p-1">
												<a href="{{route('site.product.list',['id'=>$item->id])}}"
													class="d-flex align-items-center link">
													<i class="bi bi-arrow-left-short d-flex me-1"></i>
													{{@$item->title}}
												</a>
											</li>
											@endforeach
										</ul>
									</div>
									@endif
								</div>
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
