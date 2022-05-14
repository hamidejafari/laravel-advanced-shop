@extends('layouts.admin.master')
@section('title',' دسته بندی محصولات')
@section('content')
<div class="container-fluid  dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row w-100 m-0">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
			<div class="page-header">
				<h3 class="bg-white py-2 px-4 rounded-lg">
					دسته بندی محصولات
				</h3>
			</div>
		</div>
	</div>
	<div class="card">
{{--		<form method="post" action="{{url('/admin/category/delete')}}" style="float: left">--}}
{{--			{{ csrf_field() }}--}}
			<div class="">
{{--				{{ csrf_field() }}--}}
				<div class="px-2 py-3">
{{--					<button type="submit" onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید؟');"--}}
{{--						data-toggle="tooltip" data-original-title="Delete selected items"--}}
{{--						class="btn btn-space btn-secondary">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
{{--                            class="bi bi-trash me-2" viewBox="0 0 16 16">--}}
{{--                            <path--}}
{{--                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />--}}
{{--                            <path fill-rule="evenodd"--}}
{{--                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />--}}
{{--                        </svg>--}}
{{--						حذف انتخاب شده ها--}}
{{--					</button>--}}

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
{{--							<h5 class="card-header">دسته بندی محصولات</h5>--}}
							<div class="card-body px-1">
								<div class="table-responsive">
									<div id="DataTables_Table_0_wrapper"
										class="dataTables_wrapper dt-bootstrap4">
{{--										<div class="row w-100 m-0">--}}
{{--                                            <div class="col-sm-12 col-md-6">--}}
{{--                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">--}}
{{--                                                    <label>--}}
{{--                                                        <input type="search"--}}
{{--                                                            class="form-control form-control-sm"--}}
{{--                                                            aria-controls="DataTables_Table_0"--}}
{{--                                                            placeholder="جستجو ...">--}}
{{--                                                    </label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--										</div>--}}
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
{{--																<input id="check-all"--}}
{{--																	style="opacity: 1;position:static;"--}}
{{--																	type="checkbox" />--}}
															ردیف
															</th>
															<th class="sorting_asc" tabindex="0"
																aria-controls="DataTables_Table_0"
																rowspan="1" colspan="1"
																style="width: 80.0667px;"
																aria-sort="ascending"
																aria-label="Name: activate to sort column descending">
																کاور
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
																style="width: 80.0667px;"
																aria-label="Position: activate to sort column ascending">
																دسته
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
														@foreach($category as $key=> $cat)
														<tr role="row" class="odd">
															<td class="sorting_1">
{{--																<input--}}
{{--																	style="opacity: 1;position:static;"--}}
{{--																	name="deleteId[]"--}}
{{--																	class="delete-all" type="checkbox"--}}
{{--																	value="{{@$cat['id']}}" />--}}
                                                                {{$key+1}}
															</td>
                                                            @php
                                                                $parent =
															\App\Models\Category::find($cat['parent_id']);
                                                                 $cat_cover =
															\App\Models\Category::find($cat['id']);
                                                            @endphp
															<td class="sorting_1">
                                                                <img src="{{@$cat_cover['cat_image']}}"
                                                                     class="mx-auto w-100 swiper-lazy">
                                                                </td>
															<td class="sorting_1">{{@$cat['title']}}</td>

															<td class="sorting_1">@if(@$cat['parent_id']
																!== null){{@$parent['title']}}@else دسته
																اصلی @endif </td>

                                                            <td class="sorting_1">
                                                                {{@$cat['status'] == 1 ? 'نمایش در صفحه' : 'عدم نمایش در صفحه'}}
                                                            </td>
															<td>
																<a href="{{URL::action('Admin\CategoryController@getEditCategory',@$cat['id'])}}"
																	type="button"
																	class="btn btn-space btn-warning"
																	data-toggle="tooltip"
																	title="ویرایش">
																	<i class="fa fa-edit"> </i>
																</a>
                                                                <a href="{{URL::action('Admin\CategoryController@getDeleteCategory',@$cat['id'])}}"
                                                                   type="button" onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید؟');"
                                                                   class="btn btn-space btn-danger"
                                                                   data-toggle="tooltip" title="حذف">
                                                                    <i class="fa fa-trash"> </i>
                                                                </a>

																<a href="{{route('site.product.list',['id'=>$cat_cover->id])}}"
																	target="_blank" type="button"
																	class="btn btn-space btn-primary"
																	data-toggle="tooltip"
																	title="مشاهده در سایت">
																	<i class="fa fa-eye"></i>
																</a>

															</td>
														</tr>

														@endforeach
													</tbody>
												</table>
												<div class="pagii">
													@if(count($category))
													{!!
													$category->appends(Request::except('page'))->render()
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
{{--		</form>--}}
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
