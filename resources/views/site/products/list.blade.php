@extends('layouts.site.master')
@section('title'){{@$category->title_seo ? $category->title_seo : $category->title}} @stop
@section('image_seo'){{ @$category->image ? $category->cat_image : asset('assets/uploads/content/set/'.@$setting->logo)}}
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
		<div class="product product-list">
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
                                    @if($category->parent && @$category->parent->parent)
									<li class="breadcrumb-item" aria-current="page">
										<a
											href="{{route('site.product.list',['id'=>$category->parent->parent->id])}}">
											{{@$category->parent->parent->title}}
										</a>
									</li>
									@endif
									@if($category->parent)
									<li class="breadcrumb-item" aria-current="page">
										<a
											href="{{route('site.product.list',['id'=>$category->parent->id])}}">
											{{@$category->parent->title}}
										</a>
									</li>
									@endif
									<li class="breadcrumb-item active" aria-current="page">
										{{@$category->title}}
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="card rounded-0 border-0 p-3 ">
							<h1 class="ismb text-one mt-2 mb-0">
								{{@$category->title}}
							</h1>
							@if($category->description != null)
							<div class="text-secondary text-justify" style="height: 12rem;overflow-y: scroll;">
								{!! @$category->description !!}
							</div>
							@endif
						</div>
					</div>
					<div class="col-lg-3 col-sm-5 col-md-4 col-sm-12 d-sm-block d-xs-none p-0">
						@include('site.products.contents.sidebar')
					</div>
					<div class="col-xxl-9 col-lg-9 col-md-8 col-sm-12 col-xs-12 p-0">
						<div class="row w-100 m-0">
							<div class="col-xs-12 d-sm-none d-xs-block p-0">
								<div class="row w-100 m-0">
									<div class="col-xs-6 p-1">
										<button type="button"
											class="btn btn-light rounded-0 shadow-sm d-flex align-items-center justify-content-between w-100"
											data-bs-toggle="modal" data-bs-target="#filterModal">
											<i class="bi bi-funnel d-flex"></i>
											فیلتر محصولات
										</button>
									</div>
									<div class="col-xs-6 p-1">
										<button type="button"
											class="btn btn-light rounded-0 shadow-sm d-flex align-items-center justify-content-between w-100"
											data-bs-toggle="modal" data-bs-target="#viewbyModal">
											<i class="bi bi-sort-down-alt d-flex"></i>
											مشاهده بر اساس
										</button>
									</div>
								</div>
								@include('site.products.contents.modal')
							</div>
							<div class="col-lg-12 col-sm-12 col-md-12 p-0">
								<div class="d-sm-block d-xs-none">
									@include('site.products.contents.viewby')
								</div>
								<div class="row w-100 m-0 proli">
									@include('site.products.contents.products')
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
