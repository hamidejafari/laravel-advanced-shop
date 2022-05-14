@extends('layouts.admin.master')
@section('content')
    <div class="right_col" role="main" style="min-height: 1197px;">

        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        اسلایدر ها
                    </h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>لیست مشخصات
                            </h2>

                            <div class="clearfix"></div>
                            <div style="float: left;margin-top: -30px;">
                                <button  type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg">جستجو
                                </button>
                                {{--<a  href="{{route('admin.specification-type.add')}}" class="btn btn-success">جدید--}}
                                {{--</a>--}}
                            </div>

                        </div>

                        <div class="x_content">
{{--                            <p>    تعداد مشخصات :  <code dir="ltr">{{$count}}</code>  عدد  </p>--}}


                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr class="headings">

                                        <th class="column-title">نام دسته</th>
                                        <th class="column-title">تاریخ ایجاد</th>
                                        <th class="column-title no-link last"><span class="nobr">عملیات</span>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @php $number = 0; @endphp
                                    @foreach($category as $row)
                                        <tr class="@if($number/2 == 0) even @else odd  @endif pointer">
                                            <td>{{$row->title}}</td>
                                            <td>{{jdate('Y/m/d H:i',$row->created_at->timestamp)}}</td>
                                            <td class=" last">
                                                <a href="{{url('admin/specification-type/edit/'.$row->id)}}" class="btn btn-default btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="ویرایش">ویرایش
                                                </a>
                                                <a href="{{url('admin/specification-type/delete/'.$row->id)}}" class="btn btn-default btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف">حذف
                                                </a>

                                            </td>
                                        </tr>
                                        @php $number++; @endphp
                                    @endforeach
                                    </tbody>
                                    <thead>
                                    <tr class="headings">


                                        <th class="column-title">نام دسته</th>
                                        <th class="column-title">تاریخ ایجاد</th>
                                        <th class="column-title no-link last"><span class="nobr">عملیات</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <center>
                                        {{--@if(count($specification))--}}
                                            {{--{!! $specification->appends(Request::except('page'))->render() !!}--}}
                                        {{--@endif--}}
                                    </center>
                                </table>
                                <center>
                                    {{--@if(count($specification))--}}
                                        {{--{!! $specification->appends(Request::except('page'))->render() !!}--}}
                                    {{--@endif--}}
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">عنوان مدال</h4>
                </div>
                <div class="modal-body">
                    <form id="demo-form2" method="GET" action="{{URL::current()}}" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                        {{ csrf_field() }}
                        <input type="hidden" name="search" value="search">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">نام اسلایدر
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="title" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                        <button type="submit" class="btn btn-primary">جستجو</button>
                    </form>
                </div>


            </div>
        </div>
    </div>

@endsection
