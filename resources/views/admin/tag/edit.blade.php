@extends('layouts.admin.master')
@section('title','ویرایش')
@section('content')
<div class="container-fluid dashboard-content">
	<div class="row w-100 m-0">
		<div class="col-lg-12 mx-auto py-1 px-0">
			<h3 class="bg-white py-2 px-4 rounded-lg">
            ویرایش
			</h3>
{{--            <div class="col-md-1 p-1">--}}
{{--                <a href="{{route('site.blog.detail',['id'=>$data->id])}}"--}}
{{--                   target="_blank" type="button"--}}
{{--                   class="btn btn-space btn-primary m-0 w-100"--}}
{{--                   data-toggle="tooltip"--}}
{{--                   title="مشاهده در سایت">--}}
{{--                    <i class="fa fa-eye"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
			<div class="card rounded-lg border-0 p-3">
                <form method="post" action="{{URL::action('Admin\TagController@postEdit',$data->id)}}"
                    enctype="multipart/form-data">
                    @include('admin.tag.form')
                </form>
			</div>
		</div>
	</div>
</div>
@stop
