@extends('layouts.admin.master')
@section('title','ویرایش')
@section('content')
<div class="container-fluid dashboard-content">
	<div class="row w-100 m-0">
		<div class="col-lg-12 mx-auto py-1 px-0">
			<h3 class="bg-white py-2 px-4 rounded-lg">
				ویرایش
			</h3>
			<div class="card rounded-lg border-0 p-3">
				<form method="post" action="{{URL::action('Admin\BoxController@postEdit',$data->id)}}"
					enctype="multipart/form-data">
					@include('admin.box.form')
				</form>
			</div>
		</div>
	</div>
</div>
@stop
