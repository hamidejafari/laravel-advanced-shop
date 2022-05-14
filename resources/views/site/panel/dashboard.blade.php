@extends('site.panel.master')
@section('robots'){{'noindex ,nofollow' }}@stop
@section('content')

<div class="bg-one panel-head p-2">
	<h1 class="fw-bolder text-white d-flex align-items-center h4 m-0">
		<i class="bi bi-speedometer2 me-2 d-flex h2 my-0"></i>
		داشبورد
	</h1>
</div>
<div class="dash h-100 py-1">
	<div class="row w-100 h-100 m-0">
		<div class="col-xl-5 col-sm-12 p-2">
			@include('site.panel.dashboard.personal-info')
		</div>
		<div class="col-xl-7 col-sm-12 p-2">
			@include('site.panel.dashboard.latest-favorites')
		</div>
		<div class="col-sm-12 p-2">
			@include('site.panel.dashboard.recent-orders')
		</div>
	</div>
</div>

@stop
