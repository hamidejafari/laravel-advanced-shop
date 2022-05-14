@extends('layouts.admin.master')
@section('title',' جزییات فاکتور')
@section('content')
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row w-100 m-0">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
                <div class="page-header">
                    <h3 class="bg-white py-2 px-4 rounded-lg">
                        جزییات فاکتور
                    </h3>
                </div>
            </div>
        </div>
        <div class="row w-100 m-0">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header" style="color: #3c8dbc;"><i class="fa fa-user" aria-hidden="true"></i>
                        &nbsp;&nbsp;
                        اطلاعات کاربر</h5>

                    <div class="card-body px-1">
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper"
                                 class="dataTables_wrapper dt-bootstrap4">
                                <div class="row w-100 m-0">
                                    <div class="col-sm-12">
                                        <table
                                            class="table table-striped table-bordered first dataTable"
                                            id="DataTables_Table_0" role="grid"
                                            aria-describedby="DataTables_Table_0_info">

                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">نام کاربر
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">{{@$order->user->name . ' ' . @$order->user->family}}</th>
                                            </tr>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">کد کاربر
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">{{@$order->user->id}}</th>
                                            </tr>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">نام گیرنده
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">  {{@$order->address->transferee_name . ' ' . @$order->address->transferee_family}}</th>
                                            </tr>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">شماره همراه
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">{{@$order->user->mobile}}</th>
                                            </tr>
                                            <tr role="row">


                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">آدرس
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">
                                                    {{@$order->address->location}}

                                                </th>

                                            </tr>
                                            <tr role="row">


                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">شهر
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">
                                                    {{@$order->city->name}}

                                                </th>

                                            </tr>



                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">تاریخ فاکتور
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">{{jdate(' H:i Y/m/d ',@$order->created_at->timestamp)}}</th>
                                            </tr>

                                        </table>

                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::action('Admin\OrderController@getfactor',$order->id)}}"
                   type="button"
                   class="btn btn-space btn-info"
                   data-toggle="tooltip" target="_blank"
                   title="نسخه قابل چاپ">
                    <i class="fa fa-print"> نسخه قابل چاپ</i>
                </a>
                <a href="{{URL::action('Admin\OrderController@getAddress',$order->id)}}"
                   type="button"
                   class="btn btn-space btn-info"
                   data-toggle="tooltip" target="_blank"
                   title="چاپ آدرس">
                    <i class="fa fa-print">  چاپ آدرس</i>
                </a>
                @if($history->count() > 0)
                <div class="col-xl-12 ">
                    <div class="card">
                        <h5 class="card-header" style="color: #3c8dbc;"><i class="fa fa-file" aria-hidden="true"></i>
                            &nbsp;&nbsp;
                            مراحل انجام شده</h5>

                        <div class="card-body px-1">
                            <div class="table-responsive">
                                <div id="DataTables_Table_0_wrapper"
                                     class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row w-100 m-0">
                                        <div class="col-sm-12">
                                            <table
                                                class="table table-striped table-bordered first dataTable"
                                                id="DataTables_Table_0" role="grid"
                                                aria-describedby="DataTables_Table_0_info">
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        style="width: 80.0667px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">وضعیت
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        style="width: 80.0667px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">توضیحات ادمین
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        style="width: 80.0667px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">زمان ثبت</th>
                                                </tr>
                                    @foreach($history as $row)
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        style="width: 80.0667px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">{{@$row->orderstatus->title}}
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        style="width: 80.0667px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">{{@$row->order_description}}
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        style="width: 80.0667px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">{{jdate(' H:i Y/m/d ',@$row->created_at->timestamp)}}</th>
                                                </tr>
                                                @endforeach



                                            </table>

                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header" style="color: #3c8dbc;"><i class="fa fa-file" aria-hidden="true"></i>
                        &nbsp;&nbsp;
                        اطلاعات فاکتور</h5>

                    <div class="card-body px-1">
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper"
                                 class="dataTables_wrapper dt-bootstrap4">
                                <div class="row w-100 m-0">
                                    <div class="col-sm-12">
                                        <table
                                            class="table table-striped table-bordered first dataTable"
                                            id="DataTables_Table_0" role="grid"
                                            aria-describedby="DataTables_Table_0_info">


                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">شماره سفارش
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">{{@$order->id}}</th>
                                            </tr>


                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">شماره سفارش قدیمی
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">{{@$order->old_id ? @$order->old_id : ''}}</th>
                                            </tr>

                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">روش ارسال
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">

                                                    @if($order->post_type == 1) پیشتاز @endif
                                                    @if($order->post_type == 4) پیک @endif
                                                    @if($order->post_type == 2) تیپاکس @endif
                                                    @if($order->post_type == 3) هوایی @endif
                                                </th>
                                            </tr>


                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">درگاه پرداخت
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">
                                                    @if($order->order_status_id !== 9 && $order->order_status_id != 10)
                                                    @if($order->bank_id !== 2 && $order->bank_id != null)
                                                        آیدیپی | IDPay
                                                    @else
                                                        نکست پی
                                                    @endif
                                                    @else
                                                        ------
                                                    @endif
                                                </th>
                                            </tr>



                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">مبلغ کل
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">{{number_format(@$order->total_prices)}}</th>
                                            </tr>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">مبلغ محاسبه شده
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">{{number_format(@$order->total_calculated)}}</th>
                                            </tr>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">مالیات
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">{{number_format(@$setting_header->tax)}}</th>
                                            </tr>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">حمل و نقل
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">{{number_format(@$order->post_price)}}</th>
                                            </tr>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">مبلغ پرداختی
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">{{number_format(@$order->payment)}}</th>
                                            </tr>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">کد پیگیری
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">{{@$order->tracking_code}}</th>
                                            </tr>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">وضعیت پرداخت
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">
                                                    @if($order->order_status_id >= 3 && $order->order_status_id < 10)
                                                        <span class='label label-success'>پرداخت شده</span>
                                                    @else
                                                        <span class='label label-danger'>پرداخت نشده</span>
                                                    @endif
                                                </th>
                                            </tr>
                                            <tr role="row">
                                                <form
                                                    action="{{URL::action('Admin\OrderController@orderStatus',$order->id)}}"
                                                    method="POST">
                                                    {{ csrf_field() }}

                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        style="width: 80.0667px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">وضعیت
                                                        فاکتور
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        style="width: 80.0667px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">
                                                        <select name="order_status_id" class="form-control">
                                                            @foreach($status as $key=>$item)
                                                                <option value="{{$item->id}}"
                                                                        @if($order->order_status_id == $item->id) selected @endif>{{$item->title}}</option>
                                                            @endforeach
                                                        </select>
                                                        </br>
                                                        <label for="order_description" class="col-form-label">توضیحات </label>
                                                        <textarea class="form-control" id="order_description" name="order_description" rows="3" @if(isset($order->order_description)) disabled @endif>@if(isset($order->order_description)){!!$order->order_description !!}@endif</textarea>
                                                        </br>
                                                        <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>

                                                    </th>
                                                </form>
                                            </tr>


                                        </table>

                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(isset($order->order_description))
<hr>
        <div class="row w-100 m-0">
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">

                    <div class="card-body px-1">
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper"
                                 class="dataTables_wrapper dt-bootstrap4">
                                {{--                                <div class="row w-100 m-0">--}}
                                {{--                                    <div class="col-sm-12 col-md-6">--}}
                                {{--                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">--}}
                                {{--                                            <label>--}}
                                {{--                                                <input type="search"--}}
                                {{--                                                       class="form-control form-control-sm"--}}
                                {{--                                                       aria-controls="DataTables_Table_0"--}}
                                {{--                                                       placeholder="جستجو ...">--}}
                                {{--                                            </label>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <div class="row w-100 m-0">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
                                        <div class="page-header">
                                            <h3 class="bg-white py-2 px-4 rounded-lg">
                                         توضیحات مشتری
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                            <p>
                                {!! $order->order_description !!}
                            </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
    @endif
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row w-100 m-0">
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">

                    <div class="card-body px-1">
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper"
                                 class="dataTables_wrapper dt-bootstrap4">
                                {{--                                <div class="row w-100 m-0">--}}
                                {{--                                    <div class="col-sm-12 col-md-6">--}}
                                {{--                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">--}}
                                {{--                                            <label>--}}
                                {{--                                                <input type="search"--}}
                                {{--                                                       class="form-control form-control-sm"--}}
                                {{--                                                       aria-controls="DataTables_Table_0"--}}
                                {{--                                                       placeholder="جستجو ...">--}}
                                {{--                                            </label>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <div class="row w-100 m-0">
                                    <div class="col-sm-12">
                                        <table
                                            class="table table-striped table-bordered first dataTable"
                                            id="DataTables_Table_0" role="grid"
                                            aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">
                                                    ردیف
                                                </th>

                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">
                                                    کد محصول
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 213.75px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">
                                                    تصویر محصول
                                                </th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-label="Position: activate to sort column ascending">
                                                    عنوان محصول
                                                </th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 80.0667px;"
                                                    aria-label="Position: activate to sort column ascending">
                                                    عنوان انگلیسی محصول
                                                </th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 155.217px;"
                                                    aria-label="Age: activate to sort column ascending">
                                                    مبلغ واحد
                                                </th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 155.217px;"
                                                    aria-label="Age: activate to sort column ascending">
                                                    تعداد
                                                </th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 155.217px;"
                                                    aria-label="Age: activate to sort column ascending">
                                                    مبلغ کل
                                                </th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 155.217px;"
                                                    aria-label="Age: activate to sort column ascending">
                                                    وضعیت مرجوعی
                                                </th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order->orderItems as $key=> $item)
                                                @if($item->quantity > 0)


                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">{{@$key+1}}</td>
                                                        <td class="sorting_1"> @if(isset($item->product->id)){{@$item->product->id}}@endif</td>
                                                        <td class="sorting_1">
                                                            @if(isset($item->product->id))
                                                            <a href="{{route('site.product.detail',['id'=>@$item->product->id])}}">
                                                                @if(@$item->productspecification !== null)
                                                                    <img
                                                                        src="{{@$item->productspecification->pro_image}}"
                                                                        height="70" width="70">
                                                            </a>
                                                            @else
                                                                <img
                                                                    src="{{asset('assets/uploads/content/pro/big/'.@$item->product->image[0]->file)}}"
                                                                    height="70" width="70">
                                                                </a>
                                                            @endif
                                                            @endif

                                                        </td>
                                                        <td class="sorting_1">{{@$item->product->title . ' | '.@$item->productSpecificationValue->title }} </td>
                                                        <td class="sorting_1">
                                                            {{@$item->product->title_en}}
                                                        </td>
                                                        @if($order->created_at > \Carbon\Carbon::parse('2021-11-25') && $order->created_at < \Carbon\Carbon::parse('2021-11-28') && $order->order_status_id !== 4)
                                                            @php
                                                                if ($item->product_specification_id != null){
                                        $blackfriday_price = \App\Models\Price::where('priceable_id',$item->product_specification_id)->where('priceable_type','App\Models\ProductSpecification')
                                    ->withTrashed()->orderby('id','desc')->where('black_friday','1')->first();
                                        }
                                                if ($item->product_specification_id == null){
                                        $blackfriday_price = \App\Models\Price::where('priceable_id',$item->product_id)->where('priceable_type','App\Models\Product')
                                    ->withTrashed()->orderby('id','desc')->where('black_friday','1')->first();
                                    }

                                                            @endphp
                                                            <td class="sorting_1">
                                                                {{number_format(@$blackfriday_price->price)}}
                                                            </td>
                                                        @else
                                                            <td class="sorting_1">
                                                                {{number_format($item->price)}}تومان
                                                            </td>
                                                        @endif

                                                        <td class="sorting_1">
                                                            {{$item->quantity}}
                                                        </td>
                                                        <td class="sorting_1">
                                                            {{number_format(@$item->quantity * @$item->price)}} تومان
                                                        </td>
                                                        <td class="sorting_1">
                                                            @if($item->order_item_status_id == 5)<span class='label label-danger'>مرجوع شد@else<span class='label label-warning'>--</span>@endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="row w-100 m-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
            <div class="page-header">
                <h3 class="bg-white py-2 px-4 rounded-lg">
                    سفارشات قبلی
                </h3>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body px-1">
                <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper"
                         class="dataTables_wrapper dt-bootstrap4">

                        <div class="row w-100 m-0">
                            <div class="col-sm-12">
                                <table
                                    class="table table-striped table-bordered first dataTable"
                                    id="DataTables_Table_0" role="grid"
                                    aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0"
                                            aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            style="width: 80.0667px;"
                                            aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">
                                            <input id="check-all"
                                                   style="opacity: 1;position:static;"
                                                   type="checkbox" />
                                            انتخاب همه
                                        </th>
                                        <th class="sorting_asc" tabindex="0"
                                            aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            style="width: 80.0667px;"
                                            aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">
                                            ردیف
                                        </th>
                                        <th class="sorting_asc" tabindex="0"
                                            aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            style="width: 80.0667px;"
                                            aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">
                                            شماره فاکتور
                                        </th>
                                        <th class="sorting_asc" tabindex="0"
                                            aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            style="width: 213.75px;"
                                            aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">
                                            نام کاربر
                                        </th>
                                        <th class="sorting_asc" tabindex="0"
                                            aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            style="width: 213.75px;"
                                            aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">
                                            شهر
                                        </th>
                                        <th class="sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            style="width: 80.0667px;"
                                            aria-label="Position: activate to sort column ascending">
                                            مبلغ فاکتور
                                        </th>
                                        <th class="sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            style="width: 80.0667px;"
                                            aria-label="Position: activate to sort column ascending">
                                            وضعیت فاکتور
                                        </th>
                                        <th class="sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            style="width: 80.0667px;"
                                            aria-label="Position: activate to sort column ascending">
                                            تاریخ فاکتور
                                        </th>
                                        <th class="sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            style="width: 155.217px;"
                                            aria-label="Age: activate to sort column ascending">
                                            عملیات
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $key=> $row)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">
                                                <input
                                                    style="opacity: 1;position:static;"
                                                    name="deleteId[]"
                                                    class="delete-all" type="checkbox"
                                                    value="{{@$row['id']}}" />
                                            </td>
                                            <td class="sorting_1">{{@$key+1}}</td>
                                            <td class="sorting_1">{{@$row['id']}}</td>
                                            <td class="sorting_1">{{@$row->user->name . ' ' .@$row->user->family}}</td>
                                            <td class="sorting_1">{{@$row->address->city->name}}</td>
                                            <td class="sorting_1">{{number_format(@$row->payment)}} </td>
                                            <td class="sorting_1">
                                                                <span class="badge" style="@if($row->orderStatus->id == 1) background-color:#6610f2 @endif @if($row->orderStatus->id == 3) background-color:#198754 @endif
                                                                @if($row->orderStatus->id == 4) background-color:#ffc107 @endif @if($row->orderStatus->id == 5) background-color:#6c757d @endif
                                                                @if($row->orderStatus->id == 6) background-color:#0d6efd @endif @if($row->orderStatus->id == 10) background-color:#dc3545 @endif
                                                                @if($row->orderStatus->id == 9) background-color:#0e0e0e @endif @if($row->orderStatus->id == 2) background-color:#0dcaf0 @endif
                                                                    ">
                                                                    {{@$row->orderStatus->title}}
                                                                </span>

                                            </td>
                                            <td class="sorting_1">{{jdate('H:i Y/m/d',\Carbon\Carbon::parse(@$row->created_at2)->timestamp)}} </td>
                                            <td>
                                                <a href="{{URL::action('Admin\OrderController@getDetail',$row['id'])}}"
                                                   type="button"
                                                   class="btn btn-space btn-info"
                                                   data-toggle="tooltip"
                                                   title="جزئیات فاکتور">
                                                    <i class="fa fa-eye"> </i>
                                                </a>

                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#check-all').change(function () {
                $(".delete-all").prop('checked', $(this).prop('checked'));
            });
        });
    </script>
@stop
