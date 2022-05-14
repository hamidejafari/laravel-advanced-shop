@extends('layouts.admin.master')
@section('title','تایمر')
@section('content')
<div class="container-fluid dashboard-content">
	<div class="row w-100 m-0">

		<div class="col-lg-6 mx-auto py-1 px-0">
            <div class="bg-white d-flex align-items-center justify-content-between">
                <h3 class="bg-white m-0 px-2 rounded-lg">
                    فروش ویژه
                </h3>
                <a href="{{url('/admin/products/')}}" class="btn btn-default btn-info" style="float: left"
                    data-toggle="tooltip" data-placement="top" title="" data-original-title="بازگشت">
                    بازگشت
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-left-circle ms-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </a>
            </div>
			<br>
			@if($data->timer ==1)
			<div class="card rounded-lg border-0 p-3">
				<form method="post" action="{{URL::action('Admin\ProductController@postEditTimer',$data->id)}}"
					enctype="multipart/form-data">
					@include('admin.timer.form')
				</form>
			</div>
			@else
			<div class="card rounded-lg border-0 p-3">
				<form method="post" action="{{URL::action('Admin\ProductController@postTimer')}}"
					enctype="multipart/form-data">
					@include('admin.timer.form')
				</form>
			</div>
			@endif
		</div>
	</div>
</div>
@stop