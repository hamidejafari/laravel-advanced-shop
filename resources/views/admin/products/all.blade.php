@extends('layouts.admin.master')
@section('title','عملیات گروهی')
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
            <div class="row w-100 m-0">
                <div class="col-sm-12 col-md-6 px-0">

                    <button id="myBtn" class="btn-primary btn mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-search me-2" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                        جستجو
                    </button>

                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                            <div class="modal-content border-0" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);">
                                <div class="modal-header py-2 px-4">
								<span class="close">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-x-lg text-dark" viewBox="0 0 16 16">
										<path
                                            d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z" />
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
                                            <div class="col-lg-3 p-1">
                                                <button type="submit" class="btn btn-success w-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                         height="16" fill="currentColor"
                                                         class="bi bi-search me-2" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
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

            <div class="tabset">
                <!-- Tab 1 -->
                <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked>
                <label for="tab1" class="m-0">
                    تغییر قیمت گروهی
                </label>
                <!-- Tab 2 -->
                <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
                <label for="tab2" class="m-0">
                    تغییر موجودی گروهی
                </label>

                <div class="tab-panels">
                    <!-- Tab 1 -->
                    <section id="marzen" class="tab-panel">
                        <div class="card col-lg-12">

                            <div class="px-2 py-3">
                                <form method="post"
                                      action="{{URL::action('Admin\ProductController@postPriceProduct')}}">
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


                                    <div class="row w-100 m-0">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="card">
                                                <div class="card-body px-1">
                                                    <div class="table-responsive">
                                                        <div id="DataTables_Table_0_wrapper"
                                                             class="dataTables_wrapper dt-bootstrap4">

                                                            <div class="col-lg-12 p-2 form-group">
                                                                <div class="border p-1">
                                                                    <label for="category_id" class="col-form-label">
                                                                        انتخاب محصول :
                                                                    </label>
                                                                    <div class="bg-light p-3">
                                                                        <input type="text" class="form-control mb-2" id="myInput" onkeyup="myFunction()" placeholder="جستجو ..">
                                                                        <div class="sd-checkbox ">
                                                                            <ul id="myUL" class="p-0 m-0" style="list-style-type:none">
                                                                                @foreach($products as $key=>$row2)

                                                                                    <li>
                                                                                        <label class="custom-ch">
                                                                                            {{$row2['title']}}

                                                                                            <input type="checkbox" value="{{$row2['id']}}"
                                                                                                   name="product_id[]" class="form-control" multiple>
                                                                                            <span class="checkmark"></span>
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
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
                    </section>
                    <!-- Tab 1 -->
                    <section id="rauchbier" class="tab-panel">
                        <div class="card col-lg-12">

                            <div class="px-2 py-3">
                                <form method="post"
                                      action="{{URL::action('Admin\ProductController@postInevtoryProduct')}}">
                                    {{ csrf_field() }}
                                    <div class="row w-100 m-0 bg-light p-2">

                                        <div class="col-lg-6 p-1 form-group">
                                            <label for="title_en" class="col-form-label">
                                                موجودی انبار
                                            </label>
                                            <input id="count" name="count" type="text" class="form-control">
                                        </div>
                                        <div class="py-1 px-1">
                                            <button type="submit"
                                                    onclick="return confirm('آیا از تغییر اطلاعات مطمئن هستید؟');"
                                                    data-toggle="tooltip" data-original-title="تغییر گروهی موجودی"
                                                    class="btn btn-space btn-secondary">

                                                تغییر گروهی موجودی
                                            </button>
                                        </div>
                                    </div>



                                    <div class="col-lg-12 p-2 form-group">
                                        <div class="border p-1">
                                            <label for="category_id" class="col-form-label">
                                                انتخاب محصول :
                                            </label>
                                            <div class="bg-light p-3">
                                                <input type="text" class="form-control mb-2" id="myInput2" onkeyup="myFunction2()" placeholder="جستجو ..">
                                                <div class="sd-checkbox ">
                                                    <ul id="myUL2" class="p-0 m-0" style="list-style-type:none">
                                                        @foreach($products2 as $key=>
                                                $row3)

                                                            <li>
                                                                <label class="custom-ch">
                                                                    {{$row3['title']}}


                                                                    <input type="checkbox" value="{{$row3['id']}}"
                                                                           name="product_id2[]" class="form-control" multiple>
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
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
    </section>
    </div>

    </div>
    </div>

@stop
@section('css')
    <style>
        .tabset>input[type="radio"] {
            position: absolute;
            left: -200vw;
        }

        .tabset .tab-panel {
            display: none;
        }

        .tabset>input:first-child:checked~.tab-panels>.tab-panel:first-child,
        .tabset>input:nth-child(3):checked~.tab-panels>.tab-panel:nth-child(2),
        .tabset>input:nth-child(5):checked~.tab-panels>.tab-panel:nth-child(3),
        .tabset>input:nth-child(7):checked~.tab-panels>.tab-panel:nth-child(4),
        .tabset>input:nth-child(9):checked~.tab-panels>.tab-panel:nth-child(5),
        .tabset>input:nth-child(11):checked~.tab-panels>.tab-panel:nth-child(6) {
            display: block;
        }

        .tabset>label {
            position: relative;
            display: inline-block;
            padding: 15px 15px 25px;
            border: 1px solid transparent;
            border-bottom: 0;
            cursor: pointer;
            font-weight: 600;
        }


        .tabset>label:hover,
        .tabset>input:focus+label {
            color: #06c;
        }

        .tabset>label:hover::after,
        .tabset>input:focus+label::after,
        .tabset>input:checked+label::after {
            background: #06c;
        }

        .tabset>input:checked+label {
            border-color: #ccc;
            border-bottom: 1px solid #fff;
            margin-bottom: -1px;
            color: red;
            background:#fff;

        }

        .tab-panel {
            padding: 30px 0;
            border-top: 1px solid #ccc;
        }

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
    <script>
        $(document).ready(function() {
            $('#check-all2').change(function() {
                $(".delete-all2").prop('checked', $(this).prop('checked'));
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
    <script type="text/javascript">
        function myFunction() {

            var input, filter, ul, li, la, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");


            for (i = 0; i < li.length; i++) {
                la = li[i].getElementsByTagName("label")[0];
                txtValue = la.textContent || la.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
    <script type="text/javascript">
        function myFunction2() {

            var input, filter, ul, li, la, i, txtValue;
            input = document.getElementById("myInput2");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL2");
            li = ul.getElementsByTagName("li");


            for (i = 0; i < li.length; i++) {
                la = li[i].getElementsByTagName("label")[0];
                txtValue = la.textContent || la.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
    <script type="text/javascript">
        $(function() {
            var opts = $('#optlist option').map(function(){
                return [[this.value, $(this).text()]];
            });

            $('#someinput').keyup(function(){
                var rxp = new RegExp($('#someinput').val(), 'i');
                var optlist = $('#optlist').empty();
                opts.each(function(){
                    if (rxp.test(this[1])) {
                        optlist.append($('<option/>').attr('value', this[0]).text(this[1]));
                    }
                });
            });
        });
    </script>


@stop



