@extends ("layouts.admin.master")
@section('title','تیکت ها')
@section('content')

    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row w-100 m-0">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
                <div class="page-header">
                    <h3 class="bg-white py-2 px-4 rounded-lg">
                تیکت ها
                    </h3>
                </div>
            </div>
        </div>
        <div class="card">

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
{{--                                            <div class="row w-100 m-0">--}}
{{--                                                <div class="col-sm-12 col-md-6">--}}
{{--                                                    <div id="DataTables_Table_0_filter" class="dataTables_filter">--}}
{{--                                                        <label>--}}
{{--                                                            <input type="search"--}}
{{--                                                                   class="form-control form-control-sm"--}}
{{--                                                                   aria-controls="DataTables_Table_0"--}}
{{--                                                                   placeholder="جستجو ...">--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
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
                                                                #
                                                            </th>
                                                            <th class="sorting_asc" tabindex="0"
                                                                aria-controls="DataTables_Table_0"
                                                                rowspan="1" colspan="1"
                                                                style="width: 213.75px;"
                                                                aria-sort="ascending"
                                                                aria-label="Name: activate to sort column descending">
                                                                موضوع
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0"
                                                                rowspan="1" colspan="1"
                                                                style="width: 80.0667px;"
                                                                aria-label="Position: activate to sort column ascending">
                                                                کاربر
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0"
                                                                rowspan="1" colspan="1"
                                                                style="width: 80.0667px;"
                                                                aria-label="Position: activate to sort column ascending">
                                                                دپارتمان
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0"
                                                                rowspan="1" colspan="1"
                                                                style="width: 80.0667px;"
                                                                aria-label="Position: activate to sort column ascending">
                                                                وضعیت
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0"
                                                                rowspan="1" colspan="1"
                                                                style="width: 80.0667px;"
                                                                aria-label="Position: activate to sort column ascending">
                                                                   نوع
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
                                                        @foreach($data as $row)
                                                            <tr role="row" class="odd">

                                                                <td class="sorting_1">{{$row->id}}</td>
                                                                <td class="sorting_1">{{$row->subject}}</td>
                                                                <td class="sorting_1">
                                                                    {{@$row->user->name . ' '. @$row->user->family}}
                                                                </td>
                                                                <td class="sorting_1">
                                                                    {{@$row->department->name}}
                                                                </td>
                                                                <td class="sorting_1">
                                                                    @if($row->status == 0)
                                                                        <span class='label label-danger'> پاسخ داده نشده</span>

                                                                    @elseif($row->status == 1)
                                                                        <span class='label label-success'> پاسخ داده شده</span>
                                                                    @elseif($row->status == 2)
                                                                        <span class='label label' style="background-color:#0e0e0e"> بسته شده</span>
                                                                    @elseif($row->status == 3)
                                                                        <span class='label label-warning' style="background-color:#ffc107"> مرجوعی</span>
                                                                    @endif

                                                                </td>
                                                                <td class="sorting_1">
                                                                    @if($row->order_item_id == null)

                                                                        <span class='label label-success' style="">   تیکت</span>
                                                                    @else
                                                                        <span class='label label-success' style="background-color:#ffc107">        مرجوعی</span>

                                                                    @endif

                                                                </td>


                                                                <td>
                                                                    <a href="{{URL::action('Admin\TicketController@ticketDetail',$row['id'])}}" data-toggle="tooltip"
                                                                       data-original-title="ویرایش اطلاعات" class="btn btn-space  btn-success" style="background-color:#6c757d"><i
                                                                            class="fa fa-eye"></i> نمایش جزییات </a>

                                                                </td>
                                                            </tr>

                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="pagii">
                                                        @if(count($data))
                                                            {!!
                                                            $data->appends(Request::except('page'))->render()
                                                            !!}
                                                        @endif
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


@stop
