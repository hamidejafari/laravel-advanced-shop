@extends('layouts.admin.master')
@section('title','تصاویر ')
@section('content')
<div class="container-fluid  dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row w-100 m-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0 d-flex align-items-center justify-content-between bg-white">
            <div class="page-header m-0">
                <h3 class="bg-white m-0 px-2 rounded-lg">
                    تصاویر
                </h3>
            </div>
            <a href="{{url('admin/products/')}}" class="btn btn-default btn-info" style="float: left" data-toggle="tooltip" data-placement="top" title="" data-original-title="بازگشت">
                بازگشت
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle ms-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
            </a>
		</div>
	</div>
    <br>
	<div class="card">
		<form method="post" action="{{URL::action('Admin\ProductSpecificationController@postDeleteImage')}}">
			{{ csrf_field() }}
			<div class="px-2 py-3">
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
				<a href="{{URL::action('Admin\ProductSpecificationController@getAddImage' , $image->id)}}" type="button"
					class="btn btn-space btn-primary">
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
								<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
{{--									<div class="row w-100 mx-0 mb-3">--}}
{{--										<div class="col-sm-12 col-md-6">--}}
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
															تصویر
														</th>
{{--                                                        <th class="sorting_asc" tabindex="0"--}}
{{--                                                            aria-controls="DataTables_Table_0"--}}
{{--                                                            rowspan="1" colspan="1"--}}
{{--                                                            style="width: 213.75px;"--}}
{{--                                                            aria-sort="ascending"--}}
{{--                                                            aria-label="Name: activate to sort column descending">--}}
{{--                                                            وضعیت--}}
{{--                                                        </th>--}}


													</tr>
												</thead>
												<tbody>

													@foreach($data as $key=> $row)
													<tr role="row" class="odd">
														<td class="sorting_1">
															<input style="opacity: 1;position:static;"
																name="deleteId[]" class="delete-all"
																type="checkbox" value="{{$row->id}}" />
														</td>
														<td class="sorting_1">{{$key+1}}</td>
														<td class="sorting_1">
                                                            <img class="mx-auto swiper-lazy" width="60"
                                                                 @if(file_exists('assets/uploads/content/sp/big/'.@$row->file))
                                                                 src="{{asset('assets/uploads/content/sp/big/'.$row->file)}}"
                                                                 @elseif(file_exists('assets/uploads/content/pro/big/'.@$row->file))
                                                                 src="{{asset('assets/uploads/content/pro/big/'.$row->file)}}"

                                                                 @else
                                                                 src="{{asset('assets/site/images/notfound.png')}}"
                                                                @endif>
														</td>

{{--                                                        <td class="sorting_1">{{$row->thumbnail  ? 'نمایش به عنوان کاور' : 'عدم نمایش به عنوان کاور'}}</td>--}}
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
$(document).ready(function() {
	$('#check-all').change(function() {
		$(".delete-all").prop('checked', $(this).prop('checked'));
	});
});
</script>

<meta name="csrf-token" content="{!! csrf_token() !!}" />
<script type="text/javascript">
$(document).ready(function() {
	function slideout() {
		setTimeout(function() {
			$("#response").slideUp("slow", function() {});

		}, 2000);
	}

	$("#response").hide();
	$(function() {
		$("#list ul").sortable({
			opacity: 0.8,
			cursor: 'move',
			update: function() {
				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
				var order = $(this).sortable("serialize") + '&update=update' +
					'&_token=' + CSRF_TOKEN;
				$.post("{!!URL::action('Admin\ProductController@postSort')!!} ",
					order,
					function(theResponse) {
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
