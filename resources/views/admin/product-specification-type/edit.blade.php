@extends('layouts.admin.master')
@section('title','ویرایش')
@section('content')
<div class="container-fluid dashboard-content">
	<div class="row w-100 m-0">
		<div class="col-lg-12 mx-auto py-1 px-0">
            <a href="{{url('admin/product-specification-type/list/')}}" class="btn btn-default btn-info" style="float: left" data-toggle="tooltip" data-placement="top" title="" data-original-title="بازگشت">  بازگشت
            </a>
			<h3 class="bg-white py-2 px-4 rounded-lg">
            ویرایش خصوصیت
			</h3>
			<div class="card rounded-lg border-0 p-3">
                <form method="post"
					action="{{URL::action('Admin\ProductSpecificationTypeController@postEdit',$data->id)}}"
					class="form-horizontal form-label-left">
					@include('admin.product-specification-type.form')
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
