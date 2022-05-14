@extends('site.panel.master')
@section('content')

<div class="bg-one panel-head p-2">
	<h1 class="fw-bolder text-white d-flex align-items-center justify-content-between h4 m-0">
		<span class="d-flex align-items-center">
            <i class="bi bi-envelope me-2 d-flex h2 my-0"></i>
            تیکت ها
        </span>
        <a href="{{route('panel.new-tickets')}}" class="d-flex align-items-center btn btn-light rounded-0">
            <i class="bi bi-pen d-flex me-1 h4 my-0"></i>
            نوشتن تیکت جدید
        </a>
	</h1>
</div>
<div class="favorit h-100 py-1">
	<div class="row w-100 h-100 m-0">
		<div class="col-sm-12 h-100 p-2">
			@if(count($tickets)>0)
			@include('site.panel.content.tickets.tickets')
			@else
			<a href="{{route('panel.new-tickets')}}"
				class="btn btn-success btn-lg d-flex align-items-center justify-content-center w-100">
				<i class="bi bi-plus d-flex me-1 h4 my-0"></i>
				نوشتن درخواست جدید
			</a>
			@include('site.panel.content.empty')
			@endif
		</div>
	</div>
</div>

@stop