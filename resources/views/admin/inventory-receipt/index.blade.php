@extends('layouts.admin.master')
@section('title','رسید جدید')
@section('content')
<div class="container-fluid dashboard-content" role="main" id="feature">
	<div class="row w-100 m-0">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
			<div class="section-block" id="basicform" tabindex="-1">
                <div class="page-header">
                    <h3 class="bg-white py-2 px-4 rounded-lg">
                    اضافه کردن رسید
                    </h3>
                </div>
			</div>
			<div class="card" id="app34534567">
				<h5 class="card-header">رسید جدید</h5>
				<div class="card-body">
					<form method="post"
						action="{{URL::action('Admin\InventoryController@postAddReceipt')}}"
						enctype="multipart/form-data">
						@include('admin.inventory-receipt.form')
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row w-100 m-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
            <div class="card">
                <div class="row w-100 m-0">
                    <div class="col-sm-12 col-md-6 pt-2 px-1">
                        <a type="button" href="{{URL::action('Admin\InventoryController@export')}}" class="btn-success btn btn-space">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet-fill" viewBox="0 0 16 16">
                                <path d="M6 12v-2h3v2H6z"/>
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM3 9h10v1h-3v2h3v1h-3v2H9v-2H6v2H5v-2H3v-1h2v-2H3V9z"/>
                            </svg>
                            خروجی اکسل
                        </a>
                    </div>
                </div>

                <form method="post" action="{{URL::action('Admin\InventoryController@postDeleteReceipt')}}">
                    {{ csrf_field() }}
                    <div class="py-1 px-1">
                        <button type="submit" onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید؟');"
                            data-toggle="tooltip" data-original-title="Delete selected items"
                            class="btn btn-space btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash me-2" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                            حذف انتخاب شده ها
                        </button>
{{--                        <a href="{{URL::action('Admin\ProductSpecificationController@getAdd',$product_id)}}" type="button"--}}
{{--                            class="btn btn-space btn-primary">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
{{--                                class="bi bi-plus-circle-dotted me-2" viewBox="0 0 16 16">--}}
{{--                                <path--}}
{{--                                    d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />--}}
{{--                            </svg>--}}
{{--                            جدید--}}
{{--                        </a>--}}
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
                                <h5 class="card-header">لیست رسید انبار</h5>
                                <div class="card-body px-1 py-3">
                                    <div class="table-responsive">
                                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
{{--                                            <div class="row w-100 m-0">--}}
{{--                                                <div class="col-sm-12 col-md-6">--}}
{{--                                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">--}}
{{--                                                            <label>--}}
{{--                                                                <input type="search"--}}
{{--                                                                    class="form-control form-control-sm"--}}
{{--                                                                    aria-controls="DataTables_Table_0"--}}
{{--                                                                    placeholder="جستجو ...">--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                            </div>--}}
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
                                                                    <input id="check-all"
                                                                        style="opacity: 1;position:static;"
                                                                        type="checkbox" class="me-1" />
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
                                                                    style="width: 213.75px;"
                                                                    aria-sort="ascending"
                                                                    aria-label="Name: activate to sort column descending">
                                                                    محصول
                                                                </th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    style="width: 80.0667px;"
                                                                    aria-label="Position: activate to sort column ascending">
                                                                    انبار
                                                                </th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    style="width: 155.217px;"
                                                                    aria-label="Office: activate to sort column ascending">
                                                                    تعداد
                                                                </th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    style="width: 155.217px;"
                                                                    aria-label="Office: activate to sort column ascending">
                                                                    نوع
                                                                </th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    style="width: 155.217px;"
                                                                    aria-label="Office: activate to sort column ascending">
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

                                                            @foreach($data as $key=> $row)
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1">
                                                                    <input style="opacity: 1;position:static;"
                                                                        name="deleteId[]" class="delete-all"
                                                                        type="checkbox"
                                                                        value="{{$row->id}}" />
                                                                </td>
                                                                <td class="sorting_1">{{$key+1}}</td>
                                                                <td class="sorting_1">
                                                                    {{@$row->product->title}}
                                                                </td>
                                                                <td class="sorting_1">
                                                                    {{@$row->inventory->title}}
                                                                </td>
                                                                <td class="sorting_1">
                                                                    {{@$row->count}}
                                                                </td>
                                                                <td class="sorting_1">
                                                                    {{@$row->inventoryType->title}}
                                                                </td>
                                                                <td class="sorting_1">{{$row->status  ? 'نمایش در صفحه' : 'عدم نمایش در صفحه'}}</td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-info" data-toggle="modal" data-target="#edit{{$row->id}}"> اصلاح وضعیت
                                                                    </button>
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
                                                    {{--                                                <div class="pagii">--}}
                                                    {{--                                                    @if(count($products))--}}
                                                    {{--                                                        {!! $products->appends(Request::except('page'))->render() !!}--}}
                                                    {{--                                                    @endif--}}
                                                    {{--                                                </div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>
@foreach($data as $row)
    <div class="modal fade" id="edit{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn btn-sm" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="messageModalLabel">
                    تغییر وضعیت
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{URL::action('Admin\InventoryController@postEditReceiptStatus',$row->id)}}">
                        {{ csrf_field() }}
                        <div class="col-lg-3 form-group">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">
                                نمایش
                            </label>
                            <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                <div class="switch-button switch-button-yesno">
                                    <input type="checkbox" value="1" @if(isset($row->status) && $row->status == 1) checked="checked" @endif name="status" id="status{{$row->id}}">
                                    <span>
                    <label for="status{{$row->id}}"></label>
                </span>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 px-1 pt-3 align-self-center">
                                <button type="submit" class="btn btn-success"> اصلاح </button>
                            </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>
    </div>

@endforeach

@endsection

@section('js')

    <script src="{{asset('asset/site/js/lodash.min.js')}}"></script>
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <script src="https://unpkg.com/element-ui/lib/umd/locale/fa.js"></script>
    <script>
        var app = new Vue({
            el: '#app34534567',
            data:{
                numbers :[
                    {
                        title: 'someinput'+1,
                        title2: 'optlist'+1,
                    }
                ],
                number : 1
            },
            methods: {
                plusMe: function(){
                    this.number = this.number+1;
                    this.numbers.push( { title : 'someinput'+this.number  , title2 : 'optlist'+this.number  } );
                },
                search: function(){


                    @for($i = 0; $i < 10; $i++)


                        var opts = $('#optlist{{$i}} option').map(function(){
                            return [[this.value, $(this).text()]];
                        });
                        console.log('heeelp');
                        var rxp = new RegExp($('#someinput{{$i}}').val(), 'i');
                        var optlist = $('#optlist{{$i}}').empty();
                        opts.each(function(){
                            if (rxp.test(this[1])) {
                                optlist.append($('<option/>').attr('value', this[0]).text(this[1]));
                            }
                        });

                    @endfor

                },

            }
        })
    </script>


{{--        <script type="text/javascript">--}}

{{--            $(function() {--}}



{{--                @for($i = 0; $i < 10; $i++)--}}

{{--                    var opts = $('#optlist{{$i}} option').map(function(){--}}
{{--                        return [[this.value, $(this).text()]];--}}
{{--                    });--}}

{{--                    $('#someinput{{$i}}').keyup(function(){--}}
{{--                        console.log('heeelp');--}}
{{--                        var rxp = new RegExp($('#someinput{{$i}}').val(), 'i');--}}
{{--                        var optlist = $('#optlist{{$i}}').empty();--}}
{{--                        opts.each(function(){--}}
{{--                            if (rxp.test(this[1])) {--}}
{{--                                optlist.append($('<option/>').attr('value', this[0]).text(this[1]));--}}
{{--                            }--}}
{{--                        });--}}
{{--                    });--}}
{{--                @endfor--}}
{{--            });--}}
{{--        </script>--}}


@endsection
