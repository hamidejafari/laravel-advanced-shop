@extends('layouts.admin.master')
@section('title',' ناتیفیکیشن')
@section('content')
<div class="container-fluid  dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row w-100 m-0">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
			<div class="page-header">
				<h3 class="bg-white py-2 px-4 rounded-lg">
					ناتیفیکیشن ها
				</h3>
			</div>
		</div>
	</div>
	<div class="card">
        <div class="row w-100 m-0 px-3">
            <div class="col-sm-6 col-md-3 p-1">

                <button id="myBtn" class="btn-primary btn btn-space w-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                    جستجو
                </button>


                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content border-0" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);">
                            <div class="modal-header py-2 px-4">
                                    <span class="close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                        </svg>
                                    </span>
                                <h2 class="m-0">
                                    جستجو
                                </h2>
                            </div>
                            <div class="modal-body p-3">
                                <form method="GET" action="{{URL::current()}}" class="m-0">
                                    <div class="row w-100 m-0">

                                        <div class="col-md-6 p-1">
                                            <div class="form-group w-100 m-0">
                                                <label class="col-lg-3 control-label">نام محصول:</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" type="text" id="name" name="name">
                                                </div>
                                            </div>
                                        </div>

                                    <div class="col-lg-6 p-1">
                                        <button type="submit" class="btn btn-success w-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                            </svg>
                                            جستجو
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="px-4">
            <div class="p-1 border shadow-sm">
                <div class="row w-100 m-0">

                    @php
                        $bell =App\Models\Bell::where('status','0')->count();
                        $sent_bell =App\Models\Bell::where('status','1')->count();
                    @endphp
                    <div class="col-xl-3 col-md-4 col-sm-6 col-6 p-1">
                        <form action="{{URL::current()}}">
                            <input type="hidden" name="status" value="0">
                            <button type="submit" class="btn w-100 btn-instagram">
                                درخواست ها
                                ({{$bell}})

                            </button>
                        </form>
                        <form action="{{URL::current()}}">
                            <input type="hidden" name="status" value="1">
                            <button type="submit" class="btn w-100 btn-success">
                            ارسالی ها
                                ({{$sent_bell}})

                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
		<form method="post" action="{{URL::action('Admin\OrderController@postDelete')}}" style="float: left">
			{{ csrf_field() }}
			<div class="px-3">

				<div class="px-2 py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-control" name="status">
                                <option value="" selected>
                                  انتخاب کنید
                                </option>

                                    <option value="1">
                                    ارسال
                                    </option>
                            </select>
                        </div>
                    <div class="col-md-12 px-3 pt-2">
                        <button type="submit"
                            data-toggle="tooltip" data-original-title="اعمال"
                            class="btn btn-space btn-secondary m-0">

                        اعمال
                        </button>
                    </div>
				</div>
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
                                                               محصول
                                                            </th>

                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0"
                                                                rowspan="1" colspan="1"
                                                                style="width: 80.0667px;"
                                                                aria-label="Position: activate to sort column ascending">
                                                                وضعیت ناتیفیکیشن
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0"
                                                                rowspan="1" colspan="1"
                                                                style="width: 80.0667px;"
                                                                aria-label="Position: activate to sort column ascending">
                                                                تاریخ ناتیفیکیشن
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
																<input
																	style="opacity: 1;position:static;"
																	name="deleteId[]"
																	class="delete-all" type="checkbox"
																	value="{{@$row['id']}}" />
															</td>
															<td class="sorting_1">{{@$key+1}}</td>
															<td class="sorting_1">{{@$row->user->name . ' ' .@$row->user->family}}</td>
															<td class="sorting_1">{{@$row->product->title}}</td>
															<td class="sorting_1">
                                                                @if($row->status == 0)
                                                                <span class="badge" style="background-color:#6610f2 ">
                                                                   درخواست
                                                                </span>
                                                                @endif
                                                                    @if($row->status == 1)
                                                                <span class="badge" style=" background-color:#198754">
                                                                   ارسال شده
                                                                </span>
                                                                    @endif
                                                            </td>
															<td class="sorting_1">{{jdate('H:i Y/m/d',\Carbon\Carbon::parse(@$row->created_at)->timestamp)}} </td>
															<td>
																<a href="{{URL::action('Admin\BellController@getDelete',$row['id'])}}"
																	type="button"
																	class="btn btn-danger btn-info"
																	data-toggle="tooltip"
																	title="حذف ناتیفیکیشن">
																	<i class="fa fa-trash"> </i>
																</a>

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
		</form>
	</div>
</div>

@stop

@section('css')
<style>
    .card{
        padding: 1rem 0 0;
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



        // my modal
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        // my modal2
        var modal2 = document.getElementById("myModal2");
        var btn2 = document.getElementById("myBtn2");
        var span2 = document.getElementsByClassName("close2")[0];
        btn2.onclick = function() {
            modal2.style.display = "block";
        }
        span2.onclick = function() {
            modal2.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }

        $(document).ready(function() {
            $("#datepicker1").datepicker({
                changeMonth: true,
                changeYear: true
            });
            $("#datepicker2").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
        $(document).ready(function() {
            $("#datepicker3").datepicker({
                changeMonth: true,
                changeYear: true
            });
            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });



    </script>
@stop
