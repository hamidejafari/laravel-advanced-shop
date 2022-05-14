@extends('layouts.admin.master')
@section('title',' پیام ها')
@section('content')
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row w-100 m-0">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
                <div class="page-header">
                    <h3 class="bg-white py-2 px-4 rounded-lg">
                       پیام ها
                    </h3>
                </div>
            </div>
        </div>
        <div class="card">

            <div class="px-2 py-3">

            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row w-100 m-0">
                <!-- ============================================================== -->
                <!-- basic table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">                       پیام ها
                        </h5>
                        <div class="card-body px-1">
                            <div class="table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row w-100 m-0">
                                        <div class="col-sm-12 col-md-6">

{{--                                        <button id="myBtn" class="btn-primary btn mb-3">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">--}}
{{--                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>--}}
{{--                                            </svg>--}}
{{--                                            جستجو--}}
{{--                                        </button>--}}

{{--                                        <!-- The Modal -->--}}
{{--                                        <div id="myModal" class="modal">--}}
{{--                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">--}}
{{--                                                <div class="modal-content border-0">--}}
{{--                                                    <div class="modal-header py-2 px-4">--}}
{{--                                                        <span class="close">--}}
{{--                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg text-dark" viewBox="0 0 16 16">--}}
{{--                                                                <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>--}}
{{--                                                            </svg>--}}
{{--                                                        </span>--}}
{{--                                                        <h2 class="m-0">--}}
{{--                                                            جستجو در برندها--}}
{{--                                                        </h2>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="modal-body p-3">--}}
{{--                                                        <form action="{{URL::current()}}" method="GET" class="m-0">--}}
{{--                                                        <div class="row w-100 m-0">--}}
{{--                                                            <div class="col-lg-9 p-1">--}}
{{--                                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">--}}
{{--                                                                    <label class="w-100">--}}
{{--                                                                        <input type="text" name="title"--}}
{{--                                                                            class="form-control form-control-sm"--}}
{{--                                                                            aria-controls="DataTables_Table_0"--}}
{{--                                                                            placeholder="جستجو ...">--}}
{{--                                                                    </label>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-lg-3 p-1">--}}
{{--                                                                <button type="submit" class="btn btn-success w-100">--}}
{{--                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">--}}
{{--                                                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>--}}
{{--                                                                    </svg>--}}
{{--                                                                    جستجو--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        </form>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}


                                            <a type="button" href="{{URL::action('Admin\ContactController@getTrash')}}" class="btn-success btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                                سطل زباله
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row w-100 m-0">
                                        <div class="col-sm-12">
                                            <table class="table table-striped table-bordered first dataTable"
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
                                                        style="width: 213.75px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">
                                                        نام
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        style="width: 213.75px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">
                                                        مربوط به
                                                    </th>
{{--                                                    <th class="sorting_asc" tabindex="0"--}}
{{--                                                        aria-controls="DataTables_Table_0"--}}
{{--                                                        rowspan="1" colspan="1"--}}
{{--                                                        style="width: 213.75px;"--}}
{{--                                                        aria-sort="ascending"--}}
{{--                                                        aria-label="Name: activate to sort column descending">--}}
{{--                                                       دریافت از صفحه--}}
{{--                                                    </th>--}}
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        style="width: 213.75px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">
                                                  تاریخ
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        style="width: 213.75px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">
                                                       وضعیت
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
                                                @foreach($data as $key=> $brand)
                                                    <tr role="row" class="odd">

                                                        <td class="sorting_1">{{$key+1}}</td>
                                                        <td class="sorting_1">{{$brand->name ? @$brand->name : 'فرم خبر نامه'}}</td>

                                                        <td class="sorting_1">
                                                            @if($brand->type == 1)
                                                                صفحه تماس با ما
                                                            @elseif($brand->type == 2)
                                                                تماس با ما
                                                            @elseif($brand->type == 3)
                                                                درخواست خطا
                                                            @elseif($brand->type == 4)
                                                                تماس با ما
                                                            @elseif($brand->type == 5)
                                                                فرم شماره
                                                            @endif

                                                        </td>
{{--                                                        <td class="sorting_1">--}}
{{--                                                           {{@$brand->subject}}--}}


{{--                                                        </td>--}}
                                                        <td class="sorting_1">
                                                            {{jdate('Y/m/d ',$brand->created_at->timestamp)}}


                                                        </td>
                                                        <td class="sorting_1">
                                                        @if($brand->readat == 1)
                                                                <span style="color: green;">خوانده شده</span>
                                                            @else
                                                                <span style="color: red;">خوانده نشده</span>
                                                            @endif


                                                        </td>
                                                        <td>
                                                            <a href="{{URL::action('Admin\ContactController@getDelete',$brand->id)}}"
                                                               type="button"
                                                               class="btn btn-space btn-danger"
                                                               data-toggle="tooltip" title="حذف">
                                                                <i class="fa fa-trash"> </i>
                                                            </a>


                                                            <button id="myBtn{{$brand->id}}" class="btn-primary btn btn-space">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                                </svg>
                                                                مشاهده
                                                            </button>

                                                            <!-- The Modal -->
                                                            <div id="myModal{{$brand->id}}" class="modal">
                                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                                    <div class="modal-content border-0">
                                                                        <div class="modal-header py-2 px-4">
                                                                            <span class="close{{$brand->id}}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                                                    <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                                                                </svg>
                                                                            </span>
                                                                            <h2 class="m-0">
                                                                           مشاهده
                                                                            </h2>
                                                                        </div>
                                                                        <div class="modal-body p-3">
                                                                            <form method="POST" action="{{URL::action('Admin\ContactController@postEdit',$brand->id)}}" class="m-0">
                                                                                {{ csrf_field() }}
                                                                                <div class="row w-100 m-0">
                                                                                    @if(isset($brand->name))
                                                                                    <div class="col-lg-6 p-1">
                                                                                        <label class="w-100">
                                                                                            نام
                                                                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                                                                    <label class="w-100">
                                                                                                        <input type="text" name="name" value="{{@$brand->name}}" disabled
                                                                                                            class="form-control form-control-sm"
                                                                                                            aria-controls="DataTables_Table_0"
                                                                                                            placeholder="جستجو ...">
                                                                                                    </label>
                                                                                                </div>
                                                                                        </label>
                                                                                    </div>
                                                                                    @endif
                                                                                    @if(isset($brand->phone))
                                                                                    <div class="col-lg-6 p-1">
                                                                                        <label class="w-100">
                                                                                            تلفن

                                                                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                                                                    <label class="w-100">
                                                                                                        <input type="text" name="phone" value="{{@$brand->phone}}" disabled
                                                                                                            class="form-control form-control-sm"
                                                                                                            aria-controls="DataTables_Table_0"
                                                                                                            placeholder="جستجو ...">
                                                                                                    </label>
                                                                                                </div>

                                                                                        </label>
                                                                                    </div>
                                                                                    @endif
                                                                                        @if(isset($brand->subject))
                                                                                            <div class="col-lg-12 p-1">
                                                                                                <label class="w-100">
                                                                                                    موضوع

                                                                                                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                                                                        <label class="w-100">
                                                                                                            <input type="text" name="phone" value="{{@$brand->subject}}" disabled
                                                                                                                   class="form-control form-control-sm"
                                                                                                                   aria-controls="DataTables_Table_0"
                                                                                                                   placeholder="جستجو ...">
                                                                                                        </label>
                                                                                                    </div>

                                                                                                </label>
                                                                                            </div>
                                                                                        @endif
                                                                                    @if(isset($brand->message))
                                                                                    <div class="col-lg-12 p-1">
                                                                                        <label class="w-100">
                                                                                            پیام

                                                                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                                                                    <label class="w-100">
                                                                                                    <textarea class="form-control" placeholder="نوشتن پیام" name="message" disabled
                                                                                                            id="">{{@$brand->message}}</textarea>
                                                                                                    </label>
                                                                                                </div>

                                                                                        </label>
                                                                                    </div>
                                                                                    @endif
                                                                                    @if(isset($brand->category_id))
                                                                                    <div class="col-lg-12 p-1">
                                                                                        <label class="w-100">
                                                                                            دسته

                                                                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                                                                    <label class="w-100">
                                                                                                <textarea class="form-control" placeholder="نوشتن پیام" name="category_id" disabled
                                                                                                        id="">{{@$brand->category->title}}</textarea>
                                                                                                    </label>
                                                                                                </div>

                                                                                        </label>
                                                                                        </div>
                                                                                    @endif
                                                                                    @if(isset($brand->address))
                                                                                    <div class="col-lg-12 p-1">
                                                                                    <label class="w-100">
                                                                                        آدرس

                                                                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                                                            <label class="w-100">
                                                                                                <textarea class="form-control" placeholder="نوشتن پیام" name="address" disabled
                                                                                                id="">{{@$brand->address}}</textarea>
                                                                                            </label>
                                                                                        </div>

                                                                                    </label>
                                                                                    </div>
                                                                                    @endif
                                                                                    <div class="col-lg-12 p-1">
                                                                                        <button type="submit" class="btn btn-success w-100">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                                                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                                                            </svg>
                                                                                            خوانده شد
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row w-100 m-0">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="DataTables_Table_0_info"
                                                 role="status" aria-live="polite">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="pagii">
                                                @if(count($data))
                                                    {!! $data->appends(Request::except('page'))->render()
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
            {{--		</form>--}}
        </div>
    </div>


@stop
@section('css')
    @foreach($data as $row)
<style>
    .close{{$row->id}} {
        color: #000;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
</style>
    @endforeach
@stop
@section('js')
    @foreach($data as $row)
    <script>
        $(document).ready(function () {
            $('#check-all').change(function () {
                $(".delete-all").prop('checked', $(this).prop('checked'));
            });
        });

        // my modal
        var modal{{$row->id}} = document.getElementById("myModal{{$row->id}}");
        var btn{{$row->id}} = document.getElementById("myBtn{{$row->id}}");
        var span{{$row->id}} = document.getElementsByClassName("close{{$row->id}}")[0];
        btn{{$row->id}}.onclick = function() {
        modal{{$row->id}}.style.display = "block";
        }
        span{{$row->id}}.onclick = function() {
        modal{{$row->id}}.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal{{$row->id}}) {
                modal{{$row->id}}.style.display = "none";
            }
        }
    </script>
    @endforeach
@stop
