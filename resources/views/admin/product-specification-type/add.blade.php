@extends('layouts.admin.master')
@section('title','خصوصیت جدید')
@section('content')
<div class="container-fluid dashboard-content">
	<div class="row w-100 m-0">
		<div class="col-lg-12 mx-auto py-1 px-0">
            <a href="{{url('admin/product-specification-type/list/'.@$parent_id)}}" class="btn btn-default btn-info" style="float: left" data-toggle="tooltip" data-placement="top" title="" data-original-title="بازگشت">  بازگشت
            </a>
			<h3 class="bg-white py-2 px-4 rounded-lg">

                @if($parent_id != null)
                    @php $parent = \App\Models\ProductSpecificationType::find($parent_id); @endphp
                    {{'   اضافه کردن خصوصیت جدید'.' '.$parent->title}}
                @else
                    اضافه کردن خصوصیت جدید
                @endif

			</h3>
            @include('admin.product-specification-type.main')
{{--			<div class="card rounded-lg border-0 p-3">--}}
{{--                @if($parent_id == null)--}}
{{--                <form method="post"--}}
{{--					action="{{URL::action('Admin\ProductSpecificationTypeController@postAddMain',$parent_id)}}"--}}
{{--					class="form-horizontal form-label-left">--}}
{{--                    <div class="row">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <div class="col-lg-6 offset-3 p-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>عنوان مشخصه </label>--}}
{{--                                <input class="form-control" type="text"   name="title_main" />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--					@include('admin.product-specification-type.form')--}}
{{--                    <div class="row">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <div class="col-lg-6 offset-3 p-2"  v-for="me in number" >--}}
{{--                            <div class="form-group">--}}
{{--                                <label>عنوان مقادیر </label>--}}
{{--                                <input class="form-control" type="text"   name="title[]" />--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-lg-6 p-5">--}}
{{--                            <a @click="plusMe()" class="btn btn-default btn-success" style="font-size: 9px;">--}}
{{--                                <span class="fa fa-plus"></span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-12 p-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <button type="submit" class="btn btn-primary">ذخیره</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--				</form>--}}
{{--                @else--}}
{{--                <form method="post"--}}
{{--                      action="{{URL::action('Admin\ProductSpecificationTypeController@postAdd',$parent_id)}}"--}}
{{--                      class="form-horizontal form-label-left">--}}
{{--                    --}}{{--					@include('admin.product-specification-type.form')--}}
{{--                    <div class="row">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <div class="col-lg-6 offset-3 p-2"  v-for="me in number" >--}}
{{--                            <div class="form-group">--}}
{{--                                <label>عنوان مشخصه </label>--}}
{{--                                <input class="form-control" type="text"   name="title[]" />--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-lg-6 p-5">--}}
{{--                            <a @click="plusMe()" class="btn btn-default btn-success" style="font-size: 9px;">--}}
{{--                                <span class="fa fa-plus"></span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-12 p-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <button type="submit" class="btn btn-primary">ذخیره</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--                @endif--}}
{{--			</div>--}}
		</div>
	</div>
</div>
@endsection

