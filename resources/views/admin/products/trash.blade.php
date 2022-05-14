@extends('layouts.admin.master')
@section('title',' سطل زباله')
@section('content')
    <div class="container-fluid dashboard-content">
        <div class="row w-100 m-0">
            <div class="col-xl-12 col-lg-8 col-md-12 col-sm-12 col-12 px-0">
                <div class="page-header">
                    <h3 class="bg-white py-2 px-4 rounded-lg">
                        سطل زباله
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card col-lg-12">

                <div class="px-2 py-3">

                <div class="row w-100 m-0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body px-1">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">

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


                                                                <a href="{{URL::action('Admin\ProductController@getDeleteProduct',$product->id)}}"
                                                                   type="button" onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید؟');"
                                                                   class="btn btn-space btn-danger m-0 w-100"
                                                                   data-toggle="tooltip" title="حذف">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>


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
