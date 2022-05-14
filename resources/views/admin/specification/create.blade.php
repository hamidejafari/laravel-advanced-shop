@extends('layouts.admin.master')
@section('title','جدید')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform" tabindex="-1">
                <h3 class="section-title">اضافه کردن</h3>
            </div>
            <div class="card">
                <h5 class="card-header">مشخصه</h5>
                <div class="card-body">
                            <form method="POST"  action="{{route('admin.specification-type.post-add')}}" enctype="multipart/form-data" id="rahweb_form" >
                                {{ csrf_field() }}
                                @include('admin.specification._form')
                            </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        (function($,W,D)
        {
            var JQUERY4U = {};

            JQUERY4U.UTIL =
                {
                    setupFormValidation: function()
                    {
                        //form validation rules
                        $("#rahweb_form").validate({
                            rules: {
                                title: "required",
                                image: "required",
                                description: "required"
                            },
                            messages: {
                                title: "این فیلد الزامی است.",
                                image: "این فیلد الزامی است.",
                                description: "این فیلد الزامی است."
                            },
                            submitHandler: function(form) {
                                form.submit();
                            }
                        });
                    }
                }

            //when the dom has loaded setup form validation rules
            $(D).ready(function($) {
                JQUERY4U.UTIL.setupFormValidation();
            });

        })(jQuery, window, document);
    </script>
@endsection

