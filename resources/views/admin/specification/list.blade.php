
@extends('layouts.admin.master')
@section('title','لیست مشخصات')
@section('content')
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">لیست مشخصات</h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="py-3">
                    <a href="{{route('admin.specification-type.add')}}" type="button" class="btn btn-space btn-primary">
                        +جدید
                    </a>
            </div>

                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">لیست مشخصات</h5>
                            <p>    تعداد مشخصات :  <code dir="ltr">{{$count}}</code>  عدد  </p>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">

                                            <div class="col-sm-12 col-md-6">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                    <label>Search:<input type="search" class="form-control form-control-sm"
                                                                         placeholder=""
                                                                         aria-controls="DataTables_Table_0"></label></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-striped table-bordered first dataTable"
                                                       id="DataTables_Table_0" role="grid"
                                                       aria-describedby="DataTables_Table_0_info">
                                                    <thead>
                                                    <tr role="row">

                                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1" style="width: 80.0667px;"
                                                            aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending">ردیف
                                                        </th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1" style="width: 213.75px;"
                                                            aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending">عنوان
                                                        </th>

                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1" style="width: 155.217px;"
                                                            aria-label="Office: activate to sort column ascending">تاریخ ایجاد
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1" style="width: 155.217px;"
                                                            aria-label="Age: activate to sort column ascending">عملیات
                                                        </th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($specification as $key => $row)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">{{$key+1}}</td>
                                                            <td class="sorting_1">{{$row->title}}</td>
                                                            <td class="sorting_1">{{jdate('Y/m/d H:i',$row->created_at->timestamp)}}</td>
                                                            <td>
                                                                <a href="{{url('admin/specification-type/edit/'.$row->id)}}"
                                                                   type="button" class="btn btn-space btn-warning" data-toggle="tooltip" title="ویرایش">
                                                                    <i class="fa fa-edit"> </i>
                                                                </a>
                                                                <a href="{{url('admin/specification-type/delete/'.$row->id)}}"
                                                                   type="button" class="btn btn-space btn-danger" data-toggle="tooltip" data-placement="top" title="حذف"  onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید.');" data-original-title="حذف">
                                                                    <i class="fa fa-trash"> </i>
                                                                </a>


                                                            </td>
                                                        </tr>

                                                    @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                                     aria-live="polite">
                                                </div>
                                            </div>
{{--                                            <div class="col-sm-12 col-md-7">--}}
{{--                                                <div class="pagii">--}}
{{--                                                    @if(count($products))--}}
{{--                                                        {!! $products->appends(Request::except('page'))->render() !!}--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
    </div>

    <!-- ============================================================== -->
    <!-- end basic table  -->
    <!-- ============================================================== -->
    </div>

    </div>

@stop
@section('css')
    <style>
        ul {
            padding: 0px;
            margin: 0px;
        }

        #response {
            padding: 10px;
            background-color: #9F9;
            border: 2px solid #396;
            margin-bottom: 20px;
        }

        #list li {
            margin: 0 0 3px;
            padding: 8px;
            background-color: #333;
            color: #fff;
            list-style: none;
        }
    </style>
@stop

@section('js')

    <script>
        $(document).ready(function () {
            $('#check-all').change(function () {
                $(".delete-all").prop('checked', $(this).prop('checked'));
            });
        });
    </script>

    <meta name="csrf-token" content="{!! csrf_token() !!}"/>



@stop
