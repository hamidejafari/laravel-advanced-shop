@extends('layouts.site.master')
@section('title'){{'دسته بندی مقالات مجله مد و زیبایی کاج شاپ | کاج شاپ'}} @stop

@section('description')
       {{'دسته بندی مقالات مجله مد و زیبایی کاج شاپ را می‌توانید در این صفحه مشاهده کنید و به مطالب مفید و کاربردی درباره محصولات آرایشی و بهداشتی دسترسی پیدا کنید.'}}
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
									<li class="breadcrumb-item active" aria-current="page">
										دسته بندی مقالات
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-sm-12 p-0">
						<div class="row w-100 m-0">
                            @foreach($blogs as $blog)
							<div class="col-xxl-3 col-lg-4 col-sm-6 col-xs-12 p-1">
								<a href="{{route('site.blog.list',['id'=>$blog->id])}}">
									<div class="card border-0 rounded-0">
										<div class="imgbox">
                                            <img @if(file_exists('assets/uploads/content/art/big/'.$blog->image)) src="{{asset('assets/uploads/content/art/big/'.$blog->image)}}" alt="{{@$blog->title}}" @else src="{{asset('assets/site/images/notfound.png')}}" @endif />

                                        </div>
										<h4 class="m-0">
										{{@$blog->title}}
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
