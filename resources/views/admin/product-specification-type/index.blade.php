@extends('layouts.admin.master')
@section('title','مشخصات')
@section('content')
<div class="container-fluid  dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
    <div class="row w-100 m-0">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
            @if($parent)
                <a href="{{URL::action('Admin\ProductSpecificationTypeController@getList',$parent->parent_id)}}" class="btn btn-default btn-info" style="float: left" data-toggle="tooltip" data-placement="top" title="" data-original-title="بازگشت">
                    بازگشت
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle ms-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                </a>
            @endif
			<div class="page-header">

				<h3 class="bg-white py-2 px-4 rounded-lg">
                    @if($parent)
                        {{'مشخصات'.' '.$parent->title}}
                    @else
                        مشخصات
                    @endif
				</h3>


			</div>
		</div>
	</div>
	<div class="card">
{{--		<form method="post" action="{{URL::action('Admin\ProductSpecificationTypeController@postDelete')}}">--}}
{{--			{{ csrf_field() }}--}}
			<div class="py-3 px-2">
{{--				<button type="submit" onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید؟');"--}}
{{--					data-toggle="tooltip" data-original-title="Delete selected items"--}}
{{--					class="btn btn-space btn-secondary">--}}
{{--					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
{{--						class="bi bi-trash me-2" viewBox="0 0 16 16">--}}
{{--						<path--}}
{{--							d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />--}}
{{--						<path fill-rule="evenodd"--}}
{{--							d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />--}}
{{--					</svg>--}}
{{--					حذف انتخاب شده ها--}}
{{--				</button>--}}


                @include('admin.product-specification-type.main')
                <a href="{{URL::action('Admin\ProductSpecificationTypeController@getAdd',$parent_id)}}"
					type="button" class="btn btn-space btn-primary">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-plus-circle-dotted me-2" viewBox="0 0 16 16">
						<path
							d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
					</svg>
					جدید
				</a>
			</div>
			<div class="row w-100 m-0">
				<!-- ============================================================== -->
				<!-- basic table  -->
				<!-- ============================================================== -->
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="card">
{{--						<h5 class="card-header">مشخصات</h5>--}}
						<div class="card-body px-1">
							<div class="table-responsive">
								<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row w-100 m-0">
                                        <div class="col-sm-12 col-md-6">

                                            <button id="myBtn" class="btn-primary btn mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                </svg>
                                                جستجو
                                            </button>

                                            <!-- The Modal -->
                                            <div id="myModal" class="modal">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                    <div class="modal-content border-0">
                                                        <div class="modal-header py-2 px-4">
                                                        <span class="close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg text-dark" viewBox="0 0 16 16">
                                                                <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                                            </svg>
                                                        </span>
                                                            <h2 class="m-0">
                                                                جستجو در ویژگی ها
                                                            </h2>
                                                        </div>
                                                        <div class="modal-body p-3">
                                                            <form action="{{URL::current()}}" method="GET" class="m-0">
                                                                <div class="row w-100 m-0">
                                                                    <div class="col-lg-9 p-1">
                                                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                                            <label class="w-100">
                                                                                <input type="text" name="title"
                                                                                       class="form-control form-control-sm"
                                                                                       aria-controls="DataTables_Table_0"
                                                                                       placeholder="جستجو ...">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 p-1">
                                                                        <button type="submit" class="btn btn-success w-100">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">
                                                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                                            </svg>
                                                                            جستجو
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
{{--									<div class="row w-100 m-0">--}}
{{--                                        <div class="col-sm-12 col-md-6">--}}
{{--											<div id="DataTables_Table_0_filter" class="dataTables_filter">--}}
{{--												<label>--}}
{{--													<input type="search"--}}
{{--														class="form-control form-control-sm"--}}
{{--														aria-controls="DataTables_Table_0"--}}
{{--														placeholder="جستجو ...">--}}
{{--												</label>--}}
{{--											</div>--}}
{{--										</div>--}}
{{--									</div>--}}
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
															عنوان
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
													@foreach($data as $key => $row)
													<tr role="row" class="odd">
														<td class="sorting_1">
															<input style="opacity: 1;position:static;"
																name="deleteId[]" class="delete-all"
																type="checkbox"
																value="{{$row['id']}}" />
														</td>
														<td class="sorting_1">{{$key+1}}</td>
														<td class="sorting_1">{{$row['title']}} @if($row['status'] == 1) (مشخصه ثابت) @endif</td>
														<td>
															<a href="{{URL::action('Admin\ProductSpecificationTypeController@getEdit',$row['id'])}}"
																type="button"
																class="btn btn-space btn-warning"
																data-toggle="tooltip" title="ویرایش">
																<i class="fa fa-edit"> </i>
															</a>
                                                            <a href="{{URL::action('Admin\ProductSpecificationTypeController@getDelete',$row['id'])}}"
                                                               type="button"
                                                               class="btn btn-space btn-danger"
                                                               data-toggle="tooltip" title="حذف">
                                                                <i class="fa fa-trash"> </i>
                                                            </a>
															@if($row->parent_id == null)
															<a href="{{URL::action('Admin\ProductSpecificationTypeController@getList',$row['id'])}}"
																type="button"
																class="btn btn-space btn-secondary"
																data-toggle="tooltip" title="مقادیر">
																<i class="fa fa-puzzle-piece"> </i>
															</a>
															<a href="#" data-toggle="modal"
																data-target="#messageModal{{$row['id']}}"
																data-original-title="ویرایش دسته ها"
																title="ویرایش دسته ها"
																class="btn btn-space btn-info"><i
																	class="fa fa-list"></i></a>
															@endif


														</td>

													</tr>

													@endforeach

											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
{{--		</form>--}}
		<center>
			@if(count($data))
			{!! $data->appends(Request::except('page'))->render() !!}
			@endif
		</center>
	</div>
</div>

@foreach($data as $row)
<div class="modal fade" id="messageModal{{$row['id']}}" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close btn btn-sm" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="messageModalLabel">
					{{ $row->title }}
				</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="{{URL::action('Admin\ProductSpecificationTypeController@postCatAdd')}}">
					{{ csrf_field() }}
					<input type="hidden" name="pst_id" value="{{$row->id}}">
					<div class="row w-100 m-0">
						<div class="col-md-12 col-sm-12 col-xs-12 p-1 align-self-center">
							<select class="form-control" name="category_id">
								<option>
									انتخاب دسته . . .
								</option>
								@foreach($category as $item)
								<option value="{{$item->id}}">{{$item->parent->title}}: {{$item->title}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 px-1 pt-3 align-self-center">
							<button type="submit" class="btn btn-success"> اضافه کردن </button>
						</div>
					</div>
				</form>
				<hr>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">
								عنوان
								</th>
								<th scope="col">
								عملیات
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach(@$row->categories as $item)
							<tr>
								<th scope="row">
									{{$item->title}}
								</th>
								<td class="text-center">
									<a href="{{URL::action('Admin\ProductSpecificationTypeController@getCatDelete',[$row->id,$item->id])}}"
										data-toggle="tooltip" data-original-title="حذف اطلاعات"
										class="btn btn-danger  btn-xs">
										<i class="fa fa-trash"></i>
										حذف
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
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
<script type="text/javascript">
    $(document).ready(function () {
        function slideout() {
            setTimeout(function () {
                $("#response").slideUp("slow", function () {
                });

            }, 2000);
        }

        $("#response").hide();
        $(function () {
            $("#list ul").sortable({
                opacity: 0.8, cursor: 'move', update: function () {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    var order = $(this).sortable("serialize") + '&update=update' + '&_token=' + CSRF_TOKEN;
                    $.post("{!!URL::action('Admin\ProductController@postSort')!!} ", order, function (theResponse) {
                        $("#response").html(theResponse);
                        $("#response").slideDown('slow');
                        slideout();
                    });

                }
            });
        });

    });
</script>


@stop
