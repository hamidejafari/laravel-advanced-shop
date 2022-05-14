@extends('layouts.admin.master')
@section('title','محصولات')
@section('content')
    <div class="container-fluid dashboard-content">
        <div class="row w-100 m-0">
            <div class="col-xl-12 col-lg-8 col-md-12 col-sm-12 col-12 px-0">
                <div class="page-header">
                    <h3 class="bg-white py-2 px-4 rounded-lg">
                        محصولات
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card col-lg-12">

                <div class="px-2 py-3">
                    <a href="{{url('admin/products/add')}}" type="button" class="btn btn-space btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-plus-circle-dotted me-2" viewBox="0 0 16 16">
                            <path
                                d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                        </svg>
                        جدید
                    </a>
                    <a type="button" href="{{URL::action('Admin\ProductController@export')}}" class="btn-success btn btn-space">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet-fill" viewBox="0 0 16 16">
                            <path d="M6 12v-2h3v2H6z"/>
                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM3 9h10v1h-3v2h3v1h-3v2H9v-2H6v2H5v-2H3v-1h2v-2H3V9z"/>
                        </svg>
                        خروجی اکسل
                    </a>
                    <a type="button" href="{{URL::action('Admin\ProductController@getTrash')}}" class="btn-success btn btn-danger">
                        <i class="fa fa-trash"></i>
                    سطل زباله
                    </a>


                    <div style="float: right;">
                        <a type="button" class="btn btn-space btn-warning" data-toggle="tooltip" title="ویرایش"> <i class="fa fa-edit "></i>  ویرایش </a>
                        <a type="button" class="btn btn-space btn-info" data-toggle="tooltip" title="لیست مشخصات"> <i class="fa fa-clipboard-list"></i> مشخصات</a>
                        <a type="button" class="btn btn-space btn-secondary" data-toggle="tooltip" title="تصاویر بیشتر"><i class="fa fa-images"></i> تصاویر</a>
                        <a type="button" class="btn btn-space btn-dark" data-toggle="tooltip" title="فروش ویژه"><i class="bi bi-shop"></i> فروش ویژه</a>
                        <a type="button" class="btn btn-space btn-success" data-toggle="tooltip" title="اختصاص سوالات متداول"><i class="bi bi-question-circle"></i> سوالات متداول</a>
                        <a type="button" class="btn btn-space btn-twitter" data-toggle="tooltip" title="اختصاص شعار"><i class="bi bi-bookmark"></i> شعارها</a>
                        <a type="button" class="btn btn-space btn-instagram" data-toggle="tooltip" title="اختصاص  سایر مشخصات"><i class="bi bi-list-stars"></i> سایر مشخصات</a>
                        <a type="button" class="btn btn-space btn-light" data-toggle="tooltip" title="سفارشات محصول"><i class="bi bi-folder2-open"></i> سفارشات محصول</a>
                        <a target="_blank" type="button" class="btn btn-space btn-primary" data-toggle="tooltip" title="مشاهده در سایت"><i class="fa fa-eye"></i> مشاهده</a>
                        <a type="button" onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید؟');" class="btn btn-space btn-danger" data-toggle="tooltip" title="حذف"><i class="fa fa-trash"></i> حذف</a>
                    </div>
                </div>

                <div class="row w-100 m-0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
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
                                                        <div class="modal-content border-0" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);">
                                                            <div class="modal-header py-2 px-4">
                                                        <span class="close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg text-dark" viewBox="0 0 16 16">
                                                                <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                                            </svg>
                                                        </span>
                                                                <h2 class="m-0">
                                                                    جستجو در محصولات
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
                                                                                           placeholder="جستجوی نام محصول ...">
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-9 p-1">
                                                                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                                                <label class="w-100">
                                                                                    <input type="text" name="brand"
                                                                                           class="form-control form-control-sm"
                                                                                           aria-controls="DataTables_Table_0"
                                                                                           placeholder="جستجوی نام برند ...">
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-9 p-1">
                                                                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                                                <label class="w-100">
                                                                                    <input type="text" name="barcode"
                                                                                           class="form-control form-control-sm"
                                                                                           aria-controls="DataTables_Table_0"
                                                                                           placeholder="جستجوی بارکد ...">
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
                                        <div class="row w-100 m-0">
                                            <div class="col-sm-12">
                                                <table class="table table-striped table-bordered first dataTable"
                                                       id="DataTables_Table_0" role="grid"
                                                       aria-describedby="DataTables_Table_0_info">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc text-center">
                                                            {{--															<input id="check-all"--}}
                                                            {{--																style="opacity: 1;position:static;"--}}
                                                            {{--																type="checkbox" class="me-1" />--}}
                                                            ردیف
                                                        </th>
                                                        <th class="sorting_asc text-center">
                                                            تصویر
                                                        </th>
                                                        <th class="sorting_asc text-center">
                                                            عنوان
                                                        </th>
                                                        <th class="sorting text-center">
                                                            برند
                                                        </th>
                                                        <th class="sorting text-center">
                                                            قیمت
                                                        </th>
                                                        <th class="sorting text-center">
                                                            وضعیت
                                                        </th>
                                                        <th class="sorting text-center">
                                                            وضعیت موجودی
                                                        </th>
                                                        <th class="sorting text-center">
                                                            عملیات
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($products as $key=> $product)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1 text-center">
                                                                {{--															<input style="opacity: 1;position:static;"--}}
                                                                {{--																name="deleteId[]" class="delete-all"--}}
                                                                {{--																type="checkbox"--}}
                                                                {{--																value="{{$product->id}}" />--}}
                                                                {{$key+1}}
                                                            </td>
                                                            <td class="sorting_1 text-center">
                                                                <img src="{!! $product->pro_image !!}" width="50" class="mx-auto swiper-lazy">
                                                            </td>
                                                            <td class="sorting_1 text-center">
                                                                {{@$product->title}}
                                                            </td>
                                                            <td class="sorting_1 text-center">
                                                                {{@$product->brands->title}}
                                                            </td>
                                                            <td class="sorting_1 text-center">
                                                                قیمت اصلی:
                                                                {{@$product->price_admin['old'] ? number_format(@$product->price_admin['old']) : number_format(@$product->price_admin['price']) }}
                                                                </br>
                                                                @if(isset($product->prices[0]->old_price))
                                                                    قیمت با تخفیف:
                                                                    {{@$product->price_admin['price'] && (@$product->price_admin['old'] > 0) ? number_format(@$product->price_admin['price']) : ''}}
                                                                @endif
                                                            </td>
                                                            <td class="sorting_1 text-center">
                                                                {{$product->status  ? 'فعال' : ''}}@if($product->special ==1) /{{$product->special  ? '  پرفروش ترین' : ''}}@endif @if($product->newest ==1) /{{$product->newest  ? '  جدید ترین' : ''}}@endif @if($product->popular ==1) /{{$product->popular  ? '  محبوب ترین' : ''}}@endif
                                                                @if($product->timer ==1) /{{$product->timer  ? '  نمایش ویژه تایمر ' : ''}}@endif
                                                            </td>
                                                            <td class="sorting_1 text-center">

                                                                @foreach($product->sprcificationstock as $x)
                                                                    @php
                                                                        $stock_in = App\Models\InventoryReceipt::where('product_id',$product->id)->where('product_specification_value_id',$x->product_specification_value_id)->orderBy('id','DESC')->In()->sum('count');
                                                                         $stock_out = App\Models\InventoryReceipt::where('product_id',$product->id)->where('product_specification_value_id',$x->product_specification_value_id)->orderBy('id','DESC')->Out()->sum('count');
                                                                            $mines = number_format(intval($stock_in-$stock_out)) > 0 ?   intval($stock_in-$stock_out) : '0' ;
                                                                    @endphp
                                                                    <div style="decoration:ltr" ></div>

                                                                    <span>
                                                                {{@$x->productSpecificationValue->title}} :
                                                               </span>
                                                                    <span>
                                                                ({{$mines}})
                                                               </span>
                                                                @endforeach
                                                                @php
                                                                    $in = App\Models\InventoryReceipt::where('product_id',$product->id)->whereNull('product_specification_value_id')->orderBy('id','DESC')->In()->sum('count');
                                                                       $out = App\Models\InventoryReceipt::where('product_id',$product->id)->whereNull('product_specification_value_id')->orderBy('id','DESC')->Out()->sum('count');
                                                                          $mine = intval($in-$out) > 0 ?   intval($in-$out) : '0';
                                                                @endphp
                                                                @if($product->sprcificationstock->count() == 0)
                                                                    موجودی محصول  :  ({{$product->stock_count}})
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="d-flex">

                                                                    <button type="button" class="btn btn-space btn-success p-1 my-0 ms-0 me-1" data-toggle="modal" data-target="#myModal1{{$product->id}}">
                                                                        ویرایش موجودی
                                                                    </button>

                                                                    <div id="myModal1{{$product->id}}" class="modal">
                                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                                            <div class="modal-content border-0">
                                                                                <div class="modal-header py-2 px-4">
                                                                                <span class="close" data-dismiss="modal">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg text-dark" viewBox="0 0 16 16">
                                                                                        <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                                                                    </svg>
                                                                                </span>
                                                                                    <h2 class="m-0">
                                                                                        {{' ویرایش موجودی ' .@ $product->title}}
                                                                                    </h2>
                                                                                </div>
                                                                                <div class="modal-body p-3">
                                                                                    <form action="{{URL::action('Admin\InventoryController@postAddReceipt')}}" method="POST" enctype="multipart/form-data">
                                                                                        {{ csrf_field() }}
                                                                                        <input type="hidden" name="product_id[]" value="{{$product->id}}">
                                                                                        @if($product->sprcificationstock->count() == 0)
                                                                                            موجودی محصول  :  ({{$mine}})
                                                                                            <div class="row w-100 m-0">

                                                                                                <div class="col-md-6 p-1">
                                                                                                    <div class="">
                                                                                                        <input type="text" name="count[]" class="form-control" id="" placeholder="تعداد">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6 p-1">
                                                                                                    <select class="form-select" aria-label="Default select example" name="inventory_type_id[]">
                                                                                                        <option  value="" selected>نوع رسید</option>
                                                                                                        <option value="1">ورودی</option>
                                                                                                        <option value="2">خروجی</option>
                                                                                                    </select>
                                                                                                </div>

                                                                                            </div>
                                                                                        @else
                                                                                            @foreach($product->sprcificationstock as $x)
                                                                                                @php
                                                                                                    $stock_in = App\Models\InventoryReceipt::where('product_id',$product->id)->where('product_specification_value_id',$x->product_specification_value_id)->orderBy('id','DESC')->In()->sum('count');
                                                                                                     $stock_out = App\Models\InventoryReceipt::where('product_id',$product->id)->where('product_specification_value_id',$x->product_specification_value_id)->orderBy('id','DESC')->Out()->sum('count');
                                                                                                        $mines = number_format(intval($stock_in-$stock_out)) > 0 ?   intval($stock_in-$stock_out) : '0' ;
                                                                                                @endphp
                                                                                                <p style="text-align: right">
                                                                                                    {{ @$x->productSpecificationType->title}}/{{@$x->productSpecificationValue->title}}/         موجودی محصول  :  ({{$mines}}) :
                                                                                                </p>
                                                                                                <input type="hidden" name="product_id[]" value="{{$product->id}}">
                                                                                                <input type="hidden" name="product_specification_value_id[]" value="{{$x->product_specification_value_id}}">
                                                                                                <div class="row w-100 m-0">

                                                                                                    <div class="col-md-6 p-1">
                                                                                                        <div class="">
                                                                                                            <input type="text" name="count[]" class="form-control" id="" placeholder="تعداد">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6 p-1">
                                                                                                        <select class="form-select" aria-label="Default select example" name="inventory_type_id[]">
                                                                                                            <option  value="" selected>نوع رسید</option>
                                                                                                            <option value="1">ورودی</option>
                                                                                                            <option value="2">خروجی</option>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                </div>
                                                                                            @endforeach
                                                                                        @endif
                                                                                        <button type="submit" class="btn btn-success" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" class="btn btn-space btn-info p-1 my-0 ms-0 me-1" data-toggle="modal" data-target="#myModal2{{$product->id}}">
                                                                        ویرایش قیمت
                                                                    </button>

                                                                    <div id="myModal2{{$product->id}}" class="modal">
                                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                                            <div class="modal-content border-0">
                                                                                <div class="modal-header py-2 px-4">
                                                                                <span class="close" data-dismiss="modal">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg text-dark" viewBox="0 0 16 16">
                                                                                        <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                                                                    </svg>
                                                                                </span>
                                                                                    <h2 class="m-0">
                                                                                        {{' ویرایش قیمت ' .@ $product->title}}
                                                                                    </h2>
                                                                                </div>
                                                                                <div class="modal-body p-3">
                                                                                    <form action="{{URL::action('Admin\PriceController@postPrice')}}" method="POST" enctype="multipart/form-data">
                                                                                        {{ csrf_field() }}

                                                                                        @if($product->sprcificationstock->count() == 0)
                                                                                            <input type="hidden" name="product_id[]" value="{{$product->id}}">
                                                                                            <input type="hidden" name="priceable_type" value="App\Models\Product">
                                                                                            <div class="row w-100 m-0">

                                                                                                <div class="col-md-4 p-1">
                                                                                                    <div class="">
                                                                                                        <input type="text" name="old_price[]" class="form-control" id="" placeholder="قیمت اصلی">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-4 p-1">
                                                                                                    <div class="">
                                                                                                        <input type="text" name="price[]" class="form-control" id="" placeholder="قیمت با تخفیف">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-4 p-2 form-group">
                                                                                                    <label class="col-12 col-sm-4 col-form-label text-sm-right">
                                                                                                        قیمت برای بلک فرایدی
                                                                                                    </label>
                                                                                                    <div class="col-lg-6 p-1 form-group">
                                                                                                        <div class="switch-button switch-button-yesno">
                                                                                                            <input type="checkbox" value="1" name="black_friday[]" id="black_friday">
                                                                                                            <span>
                                                                                                        <label for="black_friday"></label>
                                                                                                    </span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        @else
                                                                                            @foreach($product->sprcificationstock as $x)
                                                                                                <p style="text-align: right">
                                                                                                    {{ @$x->productSpecificationType->title}}/{{@$x->productSpecificationValue->title}} :
                                                                                                </p>
                                                                                                <input type="hidden" name="product_id[]" value="{{$product->id}}">
                                                                                                <input type="hidden" name="product_specification_value_id[]" value="{{$x->product_specification_value_id}}">
                                                                                                <input type="hidden" name="priceable_type" value="App\Models\ProductSpecification">
                                                                                                <div class="row w-100 m-0">

                                                                                                    <div class="col-md-4 p-1">
                                                                                                        <div class="">
                                                                                                            <input type="text" name="old_price[]" class="form-control" id="" placeholder="قیمت اصلی">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-4 p-1">
                                                                                                        <div class="">
                                                                                                            <input type="text" name="price[]" class="form-control" id="" placeholder="قیمت با تخفیف">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-4 p-2 form-group">
                                                                                                        <label class="col-12 col-sm-4 col-form-label text-sm-right">
                                                                                                            قیمت برای بلک فرایدی
                                                                                                        </label>
                                                                                                        <div class="col-lg-6 p-1 form-group">
                                                                                                            <div class="switch-button switch-button-yesno">
                                                                                                                <input type="checkbox" value="1" name="black_friday[]" id="black_friday">
                                                                                                                <span>
                                                                                                        <label for="black_friday"></label>
                                                                                                    </span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            @endforeach
                                                                                        @endif
                                                                                        <button type="submit" class="btn btn-success" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <a href="{{URL::action('Admin\ProductController@getEditProduct',$product->id)}}"
                                                                       type="button" target="_blank"
                                                                       class="btn btn-space btn-warning my-0 ms-0 me-1"
                                                                       data-toggle="tooltip" title="ویرایش">
                                                                        <i class="fa fa-edit "></i>
                                                                    </a>
                                                                    <button onclick="document.getElementById('id0{{$product->id}}').style.display='block'" class="w3-button w3-black">
                                                                        عملیات
                                                                    </button>
                                                                    <div id="id0{{$product->id}}" class="w3-modal w3-animate-opacity">
                                                                        <div class="w3-modal-content w3-card-4 bg-transparent shadow-none" style="min-height: calc(100% - 3.5rem);height: calc(100% - 3.5rem);display: flex;align-items: center;">
                                                                            <div class="modal-content">
                                                                                <header class="w3-container w3-teal modal-header" style="display: flex;height: 3rem;">
                                                                                    <span onclick="document.getElementById('id0{{$product->id}}').style.display='none'"  class="w3-button w3-large w3-display-topright">&times;</span>
                                                                                    {{$product->title}}
                                                                                </header>
                                                                                <div class="w3-container w-100 d-flex align-items-center justify-content-center py-5 overflow-scroll">
                                                                                    <div class="row w-100 m-0">

                                                                                        <div class="col p-1">
                                                                                            <a href="{{URL::action('Admin\ProductSpecificationPriceController@getIndex',$product->id)}}"
                                                                                               type="button" target="_blank"
                                                                                               class="btn btn-space btn-warning m-0 w-100"
                                                                                               data-toggle="tooltip"
                                                                                               title="لیست متغیر ها">
                                                                                                <i class="fa fa-clipboard-list"></i>
                                                                                            </a>
                                                                                        </div>

                                                                                        <div class="col p-1">
                                                                                            <a href="{{URL::action('Admin\ProductSpecificationController@getIndex',$product->id)}}"
                                                                                               type="button" target="_blank"
                                                                                               class="btn btn-space btn-info m-0 w-100"
                                                                                               data-toggle="tooltip"
                                                                                               title="لیست مشخصات">
                                                                                                <i class="fa fa-clipboard-list"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col p-1">
                                                                                            <a href="{{URL::action('Admin\ProductController@getImage',$product->id)}}"
                                                                                               type="button" target="_blank"
                                                                                               class="btn btn-space btn-secondary m-0 w-100"
                                                                                               data-toggle="tooltip"
                                                                                               title="تصاویر بیشتر">
                                                                                                <i class="fa fa-images"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col p-1">
                                                                                            <a href="{{URL::action('Admin\ProductController@getTimer',$product->id)}}"
                                                                                               type="button" target="_blank"
                                                                                               class="btn btn-space btn-dark m-0 w-100"
                                                                                               data-toggle="tooltip"
                                                                                               title="فروش ویژه">
                                                                                                <i class="bi bi-shop"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col p-1">
                                                                                            <a href="{{URL::action('Admin\QuestionController@get',$product->id)}}"
                                                                                               type="button" target="_blank"
                                                                                               class="btn btn-space btn-success m-0 w-100"
                                                                                               data-toggle="tooltip"
                                                                                               title="اختصاص سوالات متداول">
                                                                                                <i class="bi bi-question-circle"></i>
                                                                                                @php
                                                                                                    $faqcount =App\Models\Question::where('product_id',$product->id)->whereNull('answer')->count();
                                                                                                @endphp
                                                                                                <span class="badge badge-danger rounded-circle ms-2">
                                                                                                {{@$faqcount}}
                                                                                            </span>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col p-1">
                                                                                            <a href="{{URL::action('Admin\SloagenController@get',$product->id)}}"
                                                                                               type="button" target="_blank"
                                                                                               class="btn btn-space btn-twitter m-0 w-100"
                                                                                               data-toggle="tooltip"
                                                                                               title="اختصاص شعار">
                                                                                                <i class="bi bi-bookmark"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col p-1">
                                                                                            <a href="{{URL::action('Admin\PropertiesController@get',$product->id)}}"
                                                                                               type="button" target="_blank"
                                                                                               class="btn btn-space btn-instagram m-0 w-100"
                                                                                               data-toggle="tooltip"
                                                                                               title="اختصاص  سایر مشخصات">
                                                                                                <i class="bi bi-list-stars"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col p-1">
                                                                                            <a href="{{URL::action('Admin\BoxController@get',$product->id)}}"
                                                                                               type="button" target="_blank"
                                                                                               class="btn btn-space btn-facebook m-0 w-100"
                                                                                               data-toggle="tooltip"
                                                                                               title="اختصاص  سایر ">
                                                                                                <i class="bi-arrow-left"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col p-1">
                                                                                            <a href="{{URL::action('Admin\ProductController@getOrder',$product->id)}}"
                                                                                               type="button" target="_blank"
                                                                                               class="btn btn-space btn-light m-0 w-100"
                                                                                               data-toggle="tooltip"
                                                                                               title="سفارشات این محصول">
                                                                                                <i class="bi bi-folder2-open"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col p-1">
                                                                                            <a href="{{route('site.product.detail',['id'=>$product->id])}}"
                                                                                               target="_blank" type="button"
                                                                                               class="btn btn-space btn-primary m-0 w-100"
                                                                                               data-toggle="tooltip"
                                                                                               title="مشاهده در سایت">
                                                                                                <i class="fa fa-eye"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col p-1">
                                                                                            <a href="{{URL::action('Admin\ProductController@getDeleteProduct',$product->id)}}"
                                                                                               type="button" onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید؟');"
                                                                                               class="btn btn-space btn-danger m-0 w-100"
                                                                                               data-toggle="tooltip" title="حذف">
                                                                                                <i class="fa fa-trash"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
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
                                                    @if(count($products))
                                                        {!! $products->appends(Request::except('page'))->render() !!}
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

            {{--        temporary disable--}}
            {{--        <div class="col-lg-4">--}}
            {{--            <div id="list">--}}
            {{--                <div class="alert alert-info alert-dismissable rounded-lg" style="direction: rtl; margin: 0px auto;">--}}
            {{--                    <i class="fa fa-check"></i>--}}
            {{--                    <span style="font-size: 14px;">	با درگ کردن ترتیب مورد نظر را انتخاب نمایید.  </span>--}}
            {{--                </div>--}}
            {{--    --}}
            {{--                <div id="response"></div>--}}
            {{--                <ul>--}}
            {{--                    @foreach($categorySort as $rowSort)--}}
            {{--    --}}
            {{--                        <li class="list-unstyled  my-2 p-3 shadow-sm rounded-lg" id="arrayorder_{!! stripslashes($rowSort['id']) !!}">{!! stripslashes($rowSort['title']) !!}--}}
            {{--                            <div class="clear"></div>--}}
            {{--                        </li>--}}
            {{--    --}}
            {{--                    @endforeach--}}
            {{--                </ul>--}}
            {{--            </div>--}}
            {{--        </div>--}}
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


        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close1")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
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
