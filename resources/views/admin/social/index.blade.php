@extends('layouts.admin.master')
@section('title','    شبکه های اجتماعی')
@section('content')
<div class="container-fluid  dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row w-100 m-0">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
			<div class="page-header">
				<h3 class="bg-white py-2 px-4 rounded-lg">
               شبکه های اجتماعی
				</h3>
			</div>
		</div>
	</div>
	<div class="card">

			<div class="">

				<div class="px-2 py-3">

					<a href="{{URL::action('Admin\SocialController@getAdd')}}" type="button" class="btn btn-space btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-circle-dotted me-2" viewBox="0 0 16 16">
                            <path
                                d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                        </svg>
                        جدید
					</a>
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
																ردیف
															</th>
															<th class="sorting_asc" tabindex="0"
																aria-controls="DataTables_Table_0"
																rowspan="1" colspan="1"
																style="width: 213.75px;"
																aria-sort="ascending"
																aria-label="Name: activate to sort column descending">
                                                                آیکون															</th>
															<th class="sorting" tabindex="0"
																aria-controls="DataTables_Table_0"
																rowspan="1" colspan="1"
																style="width: 80.0667px;"
																aria-label="Position: activate to sort column ascending">
                                                                نام															</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0"
                                                                rowspan="1" colspan="1"
                                                                style="width: 155.217px;"
                                                                aria-label="Age: activate to sort column ascending">
                                                                آدرس
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
                                                    @foreach($uploader as $key=> $upl)
														<tr role="row" class="odd">

															<td class="sorting_1">{{$key+1}}</td>
															<td class="sorting_1">
                                                                <i class="{{$upl->icon}}"></i>
                                                            </td>

															<td class="sorting_1">  {{$upl->name}} </td>
															<td class="sorting_1" style="direction: ltr;font-family: arial;"> {{$upl->address}}  </td>
															<td>
                                                                <a href="{{URL::action('Admin\SocialController@getEdit',$upl->id)}}"
                                                                   type="button"
                                                                   class="btn btn-space btn-warning"
                                                                   data-toggle="tooltip"
                                                                   title="ویرایش">
                                                                    <i class="fa fa-edit"> </i>
                                                                </a>
																<a href="{{URL::action('Admin\SocialController@getDelete',$upl->id)}}"
																	type="button"
																	class="btn btn-space btn-danger"
																	data-toggle="tooltip"
																	title="حذف">
																	<i class="fa fa-trash"> </i>
																</a>


															</td>
														</tr>

														@endforeach
													</tbody>
												</table>
												<div class="pagii">
{{--													@if(count($redirect))--}}
{{--													{!!--}}
{{--													$redirect->appends(Request::except('page'))->render()--}}
{{--													!!}--}}
{{--													@endif--}}
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
