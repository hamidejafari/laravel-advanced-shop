@extends('site.panel.master')
@section('robots'){{'noindex ,nofollow' }}@stop
@section('content')

<div class="bg-one panel-head p-2">
	<h1 class="fw-bolder text-white d-flex align-items-center h4 m-0">
		<i class="bi bi-list-check me-2 d-flex h2 my-0"></i>
		لیست تخفیف ها
	</h1>
</div>
<div class="favorit h-100 py-1">
	<div class="row w-100 h-100 m-0">
		<div class="col-sm-12 h-100 p-2">
            @if(count($discounts)>0)

			@include('site.panel.content.discounts')
            @else
			@include('site.panel.content.empty')
            @endif
		</div>
	</div>
</div>

@stop
