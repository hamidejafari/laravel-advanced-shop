@extends('site.panel.master')
@section('robots'){{'noindex ,nofollow' }}@stop
@section('content')
<div class="bg-one panel-head p-2">
	<h1 class="fw-bolder text-white d-flex align-items-center h4 m-0">
		<i class="bi bi-geo-alt me-2 d-flex h2 my-0"></i>
		پیگیری سفارش
	</h1>
</div>
<div class="favorit h-100 py-1">
	<div class="row w-100 h-100 m-0 align-items-center">
		<div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 col-sm-11 col-xs-12 mx-auto p-2">
			<form class="m-0" method="get" action="{{URL::action('Panel\PanelController@track')}}"
				enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="row w-100 m-0">
					<div class="col-sm-9 p-1">
						<div class="form-floating">
							<input type="text" class="form-control" id="ref_id" name="ref_id" placeholder="کد پیگیری">
							<label for="ref_id">
								کد پیگیری
							</label>
						</div>
					</div>
					<div class="col-sm-3 text-end p-1">
						<button type="submit" class="btn h-100 w-100 border-0 btn-success">
							پیگیری
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


@include('layouts.message-swal')

@stop
