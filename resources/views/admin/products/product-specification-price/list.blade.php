@extends('layouts.admin.master')
@section('title','متغیر ها')
@section('content')
    <div class="container-fluid dashboard-content" role="main" id="feature " >
        <div class="row w-100 m-0" id="3434w5e4w">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0" id="productform">
                <div class="section-block" id="basicform" tabindex="-1">
                    <div class="page-header">
                        <h3 class="bg-white py-2 px-4 rounded-lg">
                           مدیریت  متغیر ها


                        </h3>
                    </div>
                </div>
                <form method="post"
                      action="{{URL::action('Admin\ProductSpecificationPriceController@postAddGroup',$product_id)}}"
                      enctype="multipart/form-data" id="rahweb_form">

                    {{ csrf_field() }}
                    <div class="row w-100 m-0 bg-light p-2">
                        <div class="col-lg-6 p-1 form-group">
                            <label for="old_price" class="col-form-label">
                                قیمت اصلی   :
                            </label>
                            <input id="old_price" name="old_price" type="text" class="form-control channels">

                        </div>

                        <div class="col-lg-6 p-1 form-group">
                            <label for="max" class="col-form-label">
                                قیمت با تخفیف    :
                            </label>
                            <input id="price" name="price" type="text" class="form-control channels">
                        </div>

                        <div class="col-lg-12 p-1 form-group">
                            <label class="col-12 col-sm-4 col-form-label text-sm-right">
                                قیمت برای بلک فرایدی
                            </label>
                            <div class="col-lg-6 p-1 form-group">
                                <div class="switch-button switch-button-yesno">
                                    <input type="checkbox" value="1" name="black_friday" id="black_friday">
                                    <span>
                    <label for="black_friday"></label>
                </span>
                                </div>
                            </div>
                        </div>

                        <div class="py-1 px-1">
                            <button type="submit"
                                    onclick="return confirm('آیا از تغییر اطلاعات مطمئن هستید؟');"
                                    data-toggle="tooltip" data-original-title="تغییر قیمت گروهی"
                                    class="btn btn-space btn-secondary">

                                تغییر قیمت گروهی
                            </button>
                        </div>
                    </div>

                </form>
                <form method="post"
                      action="{{URL::action('Admin\ProductSpecificationPriceController@postAddCommon',$product_id)}}"
                      enctype="multipart/form-data" id="rahweb_form">

                    {{ csrf_field() }}
                    <div class="row w-100 m-0 bg-light p-2">
                        <div class="col-lg-6 p-1 form-group">
                            <label for="old_price" class="col-form-label">
                                تصویر مشترک   :
                            </label>
                            <input type="file" name="pic" class="form-control">

                        </div>

                        <div class="py-1 px-1">
                            <button type="submit"
                                    onclick="return confirm('آیا از تغییر اطلاعات مطمئن هستید؟');"
                                    data-toggle="tooltip" data-original-title="تغییر قیمت گروهی"
                                    class="btn btn-space btn-secondary">

                                ثبت
                            </button>
                        </div>
                    </div>

                </form>
                <div class="card">
                    <div class="card-body" id="price68">
                        <form method="post"
                              action="{{URL::action('Admin\ProductSpecificationPriceController@postAdd',$product_id)}}"
                              enctype="multipart/form-data" id="rahweb_form">

                            {{ csrf_field() }}
                            <div class="box-body" >
                                <div class="form-group">
{{--                                    <div class="row w-100 m-0">--}}
{{--                                        <div class="col-xl-5 col-sm-12 col-xs-12 p-2" style="margin: auto;">--}}
{{--                                            <input style="font-size: 21px;text-align: center" class="form-control" id="title_main" name="type_spf" v-model="typeSpf" placeholder=" نام متغیر " />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <hr>
                                    <div class="col-sm-12 col-xs-12 p-2" style="text-align: center;">
{{--                                        <label for="title" class="col-form-label py-0" style="font-size: 16px;text-align: center">--}}
{{--                                            مقادیر متغیر @{{ typeSpf }}--}}
{{--                                        </label>--}}
{{--                                        <br>--}}
                                        <button @click="plusCounter()" type="button" class="btn btn-success px-5">
                                            اضافه کردن متغیر بعدی
                                            <span class="fa fa-plus"></span>
                                        </button>
                                    </div>

                                    <div v-for="item in counter">
                                        <div  class="row w-100 m-0" style="background: #0f0c2936;border-radius: 11px;padding: 13px;margin-bottom: 11px !important;">
                                            <input name="spf_id[]" value="" type="hidden" />
                                            <div class="col-lg-3 col-sm-6 col-xs-12 p-2">

                                                <div class="input-group shadow-sm sd">
                                                    <label class="input-group-text border py-0" for="inputGroupFile01">
                                                        عنوان مقدار
                                                    </label>
                                                    <input type="text" name="title[]" id="title" class="form-control channels"  placeholder="عنوان مقدار را وارد کنید" />
                                                </div>

                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-xs-12 p-2">
                                                <div class="input-group shadow-sm sd">
                                                    <label class="input-group-text border py-0" for="inputGroupFile01">
                                                        بارکد
                                                    </label>
                                                    <input type="text" name="barcode[]" id="barcode" class="form-control"  placeholder="بارکد را وارد کنید" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-xs-12 p-2">
                                                <div class="input-group shadow-sm sd">
                                                    <label class="input-group-text border py-0" for="inputGroupFile01">
                                                        تصویر اصلی
                                                    </label>
                                                    <input type="file" name="image[]"  class="form-control shadow-none border" >
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-xs-12 p-2">
                                                <div class="input-group shadow-sm sd">
                                                    <label class="input-group-text border py-0" for="inputGroupFile01">
                                                        تصاویر بیشتر
                                                    </label>
                                                    <input type="file" name="images[]" multiple  class="form-control shadow-none border" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-xs-12 p-2">
                                                <div class="input-group shadow-sm sd">
                                                    <label class="input-group-text border py-0" for="inputGroupFile01">
                                                        قیمت اصلی
                                                    </label>
                                                    <input type="text" value="{{@$product->price_admin['old'] ? @$product->price_admin['old'] : @$product->price_admin['price']}}" name="old_price[]" id="old_price" class="form-control channels"  placeholder=" قیمت اصلی را وارد کنید" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-xs-12 p-2">
                                                <div class="input-group shadow-sm sd">
                                                    <label class="input-group-text border py-0" for="inputGroupFile01">
                                                        قیمت با تخفیف
                                                    </label>
                                                    <input type="text" value="{{@$product->price_admin['price'] && (@$product->price_second['old'] > 0) ? @$product->price_admin['price'] : ''}}" name="price[]" id="price" class="form-control channels"    placeholder="  قیمت با تخفیف را وارد کنید" />

                                                </div>
                                            </div>



                                            <div class="col-lg-2 col-sm-6 col-xs-12 p-2">
                                                <div class="input-group shadow-sm sd">
                                                    <label class="input-group-text border py-0" for="inputGroupFile01">
                                                          قیمت بلک فرایدی
                                                    </label>
                                                    <div class="switch-button switch-button-yesno">
                                                        <input type="checkbox" value="1" checked="checked" name="black_friday[]" id="black_friday">
                                                        <span>
                    <label for="black_friday"></label>
                </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-xs-12 p-2">
                                                <div class="input-group shadow-sm sd">
                                                    <label class="input-group-text border py-0" for="inputGroupFile01">
                                                        موجودی انبار
                                                    </label>
                                                    <input type="text" name="count[]" id="count" class="form-control channels"  placeholder="موجودی انبار را وارد کنید" />

                                                </div>


                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-xs-12 p-2">

                                                <div class="input-group shadow-sm sd" style="height: 100%;">
                                                    <label class="input-group-text border py-0" for="inputGroupFile01">
                                                        انتخاب رنگ
                                                    </label>
                                                    <input type="color" name="color[]" id="count" class="form-control h-100"  placeholder="رنگ را وارد کنید" />

                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                    @foreach($product_specification_price as $row)
                                        <div>

                                            <div  class="row w-100 m-0" style="background: #0f0c2936;border-radius: 11px;padding: 13px;margin-bottom: 11px !important;">
                                                <div class="col-lg-1 col-sm-6 col-xs-12 p-2">
                                                    <img src="{{@$row->sp_images[0]->pro_image}}" style="width: 100%" alt="{{@$row->title}}"/>
{{--                                                    @if($row->image )--}}
{{--                                                        <img src="{{asset('assets/uploads/content/pro/big/'.$row->image)}}" style="margin-top: -56%;width: 32px;" alt="{{@$row->title}}"/>--}}
{{--                                                    @endif--}}


                                                </div>
                                                <div class="col-lg-11 col-sm-6 col-xs-12 p-2">
                                                    <div  class="row w-100 m-0">
                                                        <input name="spf_id[{{$row->id}}]" value="{{$row->id.'-old'}}" type="hidden" />
                                                        <div class="col-lg-3 col-sm-6 col-xs-12 p-2">
                                                            <div class="input-group shadow-sm sd">
                                                                <label class="input-group-text border py-0" for="inputGroupFile01">
                                                                    عنوان مقدار
                                                                </label>
                                                                <input type="text" value="{{@$row->productSpecificationValue->title}}" name="title[{{$row->id}}]" id="title" class="form-control channels"  placeholder="عنوان مقدار را وارد کنید" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6 col-xs-12 p-2">
                                                            <div class="input-group shadow-sm sd">
                                                                <label class="input-group-text border py-0" for="inputGroupFile01">
                                                                    بارکد
                                                                </label>
                                                                <input type="text" value="{{@$row->barcode}}" name="barcode[{{$row->id}}]" id="barcode" class="form-control"  placeholder="بارکد را وارد کنید" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-sm-6 col-xs-12 p-2">
                                                            <div class="input-group shadow-sm sd">
                                                                <label class="input-group-text border py-0" for="inputGroupFile01">
                                                                    تصویر اصلی
                                                                </label>
                                                                <input type="file" name="image[{{$row->id}}]"  class="form-control shadow-none border" >
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6 col-xs-12 p-2">
                                                            <div class="input-group shadow-sm sd">
                                                                <label class="input-group-text border py-0" for="inputGroupFile01">
                                                                    تصاویر بیشتر
                                                                </label>
                                                                <input type="file" name="images[{{$row->id}}][]" multiple  class="form-control shadow-none border" />
                                                            </div>


                                                                <div class="row w-100">
                                                                    @foreach(@$row->sp_images as $key=>$row2)
                                                                        @if($key !== 0)
                                                                   <div class="col-md-2">
                                                                       <img src="{{@$row2->pro_image}}" style="width: 100%;height: 70px" alt="{{@$row->title}}"/>
                                                                       <a href="{{url('/admin/product-specification-price/delete-image/'.$row2->id)}}" style="float: left;
padding: 0px !important;
height: 22px;
width: 100%;
margin-bottom: 6px;" class="btn btn-danger px-5">
                                                                           <i class="fa fa-trash"></i>
                                                                       </a>
                                                                   </div>
                                                                    @endif
                                                                    @endforeach
                                                                </div>

                                                        </div>
                                                        <div class="col-lg-3 col-sm-6 col-xs-12 p-2">
                                                            <div class="input-group shadow-sm sd">
                                                                <label class="input-group-text border py-0" for="inputGroupFile01">
                                                                    قیمت اصلی
                                                                </label>
                                                                <input type="text" value="{{@$row->pricesAdmin[0]->old_price ? @$row->pricesAdmin[0]->old_price : @$row->pricesAdmin[0]->price}}" name="old_price[{{$row->id}}]" id="old_price" class="form-control channels"  placeholder=" قیمت اصلی را وارد کنید" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6 col-xs-12 p-2">
                                                            <div class="input-group shadow-sm sd">
                                                                <label class="input-group-text border py-0" for="inputGroupFile01">
                                                                    قیمت با تخفیف
                                                                </label>
                                                                <input type="text" value="{{@$row->pricesAdmin[0]->old_price ? @$row->pricesAdmin[0]->price : ''}}" name="price[{{$row->id}}]" id="price" class="form-control channels"    placeholder="  قیمت با تخفیف را وارد کنید" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-sm-6 col-xs-12 p-2">
                                                            <div class="input-group shadow-sm sd">
                                                                <label class="input-group-text border py-0" for="inputGroupFile01">
                                                                     بلک فرایدی
                                                                </label>
                                                                <div>
                                                                    <input type="checkbox" value="1" checked="checked" name="black_friday[{{$row->id}}]" id="black_friday">
                                                                    <span>
                                                                        <label for="black_friday"></label>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-2 col-sm-6 col-xs-12 p-2">
                                                            <div class="input-group shadow-sm sd">
                                                                <label class="input-group-text border py-0" for="inputGroupFile01">
                                                                    موجودی انبار
                                                                </label>
                                                                <input type="text" value="{{$row->stock_count}}" name="count[{{$row->id}}]" id="count" class="form-control channels"  placeholder="موجودی انبار را وارد کنید" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-sm-6 col-xs-12 p-2">

                                                            <div class="input-group shadow-sm sd" style="height: 100%;">
                                                                <label class="input-group-text border py-0" for="inputGroupFile01">
                                                                    انتخاب رنگ
                                                                </label>
                                                                <input type="color" value="{{$row->color}}" name="color[{{$row->id}}]" id="count" class="form-control h-100"  placeholder="رنگ را وارد کنید" />

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-12 col-xs-12 p-2" style="margin-top: -15px;">
                                                    <a   onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید.');"  href="{{url('/admin/product-specification-price/delete/'.$row->id)}}" style="float: left" class="btn btn-danger px-5">
                                                        حذف
                                                    </a>
                                                </div>

                                            </div>
                                            <hr>
                                        </div>
                                    @endforeach




                                    <div class="col-sm-12 col-xs-12 p-2">
                                        <button type="submit" class="btn btn-success px-5" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">
                                            ذخیره
                                        </button>
                                    </div>
                                </div>
                            </div>





                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row w-100 m-0">
            <div id="list">
                <div class="alert alert-info alert-dismissable rounded-lg" style="direction: rtl; margin: 0px auto;">
                    <i class="fa fa-check"></i>
                    <span style="font-size: 14px;">	با درگ کردن ترتیب مورد نظر را انتخاب نمایید.  </span>
                </div>

                <div id="response"></div>
                <ul>
                    <hr>


                    @foreach($product_specification_price as $rowSort)
                        <li class="list-unstyled  my-2 p-3 shadow-sm rounded-lg" id="arrayorder_{!! stripslashes($rowSort['id']) !!}"  style="background-color: #333" >{!! stripslashes($rowSort->productSpecificationValue['title']) !!}
                            <div class="clear"></div>
                        </li>

                    @endforeach
                    <hr>
                </ul>
            </div>


        </div>

    </div>


    <script>
        new Vue({
            el: '#productform',
            data: function () {
                return {
                    msg : 'hettt',
                    typeSpf:'',
                    counter:{{count($product_specification_price) == 0  ? '1' : '0'}}
                }
            },
            methods: {
                plusCounter(){
                    this.counter= this.counter+1;
                }
            }
        });
    </script>



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
            background-color: #3d3f5d;
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
                        $.post("{!!URL::action('Admin\ProductSpecificationPriceController@postSort')!!} ", order, function (theResponse) {
                            $("#response").html(theResponse);
                            $("#response").slideDown('slow');
                            slideout();
                        });

                    }
                });
            });

        });
    </script>
    <script>

        function ReplaceNumberWithCommas(yourNumber) {
            //Seperates the components of the number
            var n = yourNumber.toString().split(".");
            //Comma-fies the first part
            n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            //Combines the two sections
            return n.join(".");
        }

        $(".channels").change(function () {
            $(this).val(ReplaceNumberWithCommas($(this).val().replace(/,/g, '')));
            totalPriceCalculate();
        })

        $(".channels").keyup(function () {
            $(this).val(ReplaceNumberWithCommas($(this).val().replace(/,/g, '')));
            totalPriceCalculate();
        })

        $("#rahweb_form").submit(function () {
            $(".channels").each(function () {
                $(this).val($(this).val().replace(/,/g, ''));
            });
        });
    </script>
@endsection
