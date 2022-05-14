@extends('layouts.site.master')
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
                                            سوالات متداول
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-sm-12 p-1">
                            <div class="card border-0 rounded-0 p-3 d-md-block d-sm-none d-xs-none">
                                <h2 class="fw-bolder h4 text-one">

                                    <span>
		          سوالات متداول
	                                </span>
                                </h2>
                                <div class="row w-100 m-0 comment pt-3">
                                    <div class="col-lg-8 col-md-7 pe-2 ps-0">
                                        @include('site.faq.faq-blocks.accordion')
                                    </div>
                                    <div class="col-lg-4 col-md-5 p-0">
                                        <div class="bg-light position-sticky sticky p-3">
                                            <h4 class="text-center">
                                                سوال خود را بپرسید
                                            </h4>
                                            @include('site.faq.faq-blocks.form')
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
