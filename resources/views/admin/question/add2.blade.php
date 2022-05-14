@extends('layouts.admin.master')
@section('title','جدید')
@section('content')
    <div class="container-fluid dashboard-content" id="app34534567">
        <div class="row w-100 m-0">
            <div class="col-lg-6 mx-auto py-1 px-0">
                <h3 class="bg-white py-2 px-4 rounded-lg">
                    اضافه کردن
                </h3>
                <div class="card rounded-lg border-0 p-3">
                    <form method="post" action="{{URL::action('Admin\QuestionController@postAdd')}}"
                          enctype="multipart/form-data">
                        <div class="card rounded-lg border-0 p-3 m-0">
                            <div class="row w-100 m-0">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" value="">
                                <div class="row w-100 m-0 p-2 border"  v-for="me in number" >
                                    <div class="col-lg-12 p-2 form-group m-0">
                                        <label for="question" class="col-form-label">سوال</label>
                                        <textarea class="form-control" type="text" id="question" name="question[]" >@if(isset($data->question)){{$data->question}}@endif</textarea>
                                    </div>
                                    <div class="col-lg-12 p-2 form-group m-0">
                                        <label for="question" class="col-form-label">پاسخ</label>
                                        <textarea class="form-control" type="text" id="answer" name="answer[]" >@if(isset($data->answer)){{$data->answer}}@endif</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 px-0 pt-3">
                                    <div class="form-group m-0">
                                        <button type="submit" class="btn btn-success" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-end px-0 pt-3">
                                    <a @click="plusMe()" class="btn btn-default btn-primary">
                                        <span class="fa fa-plus">اضافه کردن چندتایی</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')

    <script src="{{asset('asset/site/js/lodash.min.js')}}"></script>
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <script src="https://unpkg.com/element-ui/lib/umd/locale/fa.js"></script>
    <script>
        var app = new Vue({
            el: '#app34534567',
            data:{
                number :1
            },
            methods: {
                plusMe: function(){
                    this.number = this.number+1;
                }
            }
        })
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
@endsection
