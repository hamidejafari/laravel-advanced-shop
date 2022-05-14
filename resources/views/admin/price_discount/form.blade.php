@extends('layouts.admin.master')
@section('title','اضافه کردن تخفیف گروهی')
@section('content')
    <div class="container-fluid dashboard-content" id="text68">
        <div class="row w-100 m-0">
                <h3 class="bg-white py-2 px-4 rounded-lg">
                  تخفیف دهی گروهی
                </h3>
                <div class="card rounded-lg border-0 p-3">
                    <form method="post" action="{{URL::action('Admin\PriceController@postAdd')}}"
                          enctype="multipart/form-data">
{{ csrf_field() }}
<div class="row w-100 m-0">
    <div class="col-lg-6 form-group">
        <label for="type" class="col-form-label"> بر اساس برند یا دسته؟</label>
        <select class="form-control" id="type" name="type" v-model="selectedType">
            <option value="" selected>انتخاب کنید</option>
            <option value="1">برند</option>
            <option value="2">دسته</option>

        </select>
    </div>
    <div class="col-lg-6 p-2 form-group">
        <label for="percent" class="col-form-label">
            درصد تخفیف
        </label>
        <input id="percent" name="percent" type="text" class="form-control" value="@if(isset($data->percent)){{$data->percent}}@endif">
    </div>
    <div class="col-lg-6 p-2 form-group">
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
    <div class="col-lg-6 p-2 form-group" v-if="selectedType == 2">
        <div class="border p-1">
            <label for="category_id" class="col-form-label">
                انتخاب دسته :
            </label>
            <div class="bg-light p-3">
                <input type="text" v-model="catTitle" class="form-control mb-2" id="myInput" placeholder="جستجو ..">

                <div class="sd-checkbox ">
                    <ul id="myUL" class="p-0 m-0" style="list-style-type:none">
                        @foreach($category as $key=>$row2)
                        @php $cat =\App\Models\Category::find($row2['id']);
                        @endphp
                        <li>
                            <label class="custom-ch">
                                {{$row2['title']}}
                                <input type="checkbox" value="{{$row2['id']}}" @if(isset($data) and in_array($row2['id'],$cat_pro)) checked="checked" @endif
                                name="category_id[]" class="form-control" multiple  @if(@$cat->childs && count(@$cat->childs) > 0) disabled @endif>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 p-2 form-group" v-else-if="selectedType == 1">
        <div class="border p-1">
            <label for="category_id" class="col-form-label">
                انتخاب برند :
            </label>
            <div class="bg-light p-3">
                <input type="text" class="form-control mb-2" id="myInput" v-model="catTitle" placeholder="جستجو ..">
                <div class="sd-checkbox ">
                    <ul id="myUL" class="p-0 m-0" style="list-style-type:none">
                        @foreach($brands as $key=>$brand)
                            <li>
                                <label class="custom-ch">
                                    {{$brand['title']}}
                                    <input type="checkbox" value="{{$brand['id']}}"
                                    name="brand_id[]" class="form-control" multiple>
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
    <div class="col-lg-12">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success mx-0 mt-4 px-5" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">
                ذخیره
            </button>
        </div>
    </div>


    @stop
@section('js')
<script>
    var app = new Vue({
        el: '#text68',
        data: {
            selectedType: '',

            msg: 'Test',
            catTitle:''
        },
        methods:{
            myFunction(){
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
        },
        watch:{
            catTitle: function () {
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
        }
    });
</script>

<script src="{{asset('assets/admin/js/selectize.js')}}"></script>


@endsection
