@extends('site.panel.master')
@section('content')
    <div class="bg-one panel-head p-2">
        <h1 class="fw-bolder text-white d-flex align-items-center h4 m-0">
            <i class="bi bi-envelope me-2 d-flex h2 my-0"></i>
            تیکت ها
        </h1>
    </div>
    <div class="favorit h-100 py-1">
        <div class="row w-100 h-100 m-0">
            <div class="col-sm-12 h-100 p-2">
					@include('site.panel.content.tickets.ticketdetails')
            </div>
        </div>
    </div>

@stop
