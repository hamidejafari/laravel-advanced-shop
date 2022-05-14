@extends('site.panel.master')
@section('content')
<div class="bg-one panel-head p-2">
	<h1 class="fw-bolder text-white d-flex align-items-center h4 m-0">
		<i class="bi bi-envelope-open me-2 d-flex h2 my-0"></i>
		نوشتن تیکت جدید
	</h1>
</div>
<div class="favorit h-100 py-1">
	@include('site.panel.content.tickets.newticket')
</div>
@stop