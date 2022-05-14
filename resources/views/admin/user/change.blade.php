@extends('layouts.admin.master')
@section('title','مدیران')
@section('content')
    <div class="container-fluid dashboard-content">
        <div class="row w-100 m-0">
            <div class="col-lg-12 mx-auto py-1 px-0">
                <h3 class="bg-white py-2 px-4 rounded-lg">
                    مدیر جدید
                </h3>
                <div class="card rounded-lg border-0 p-3">
                    <form method="post" action="{{URL::action('Admin\UserController@postChangePassword')}}"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label for="title" class="col-form-label">ایمیل</label>
                                <input id="email" name="email" type="text" class="form-control"
                                       value="{{Auth::user()->email}}" placeholder="ایمیل" disabled>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label for="password" class="col-form-label">رمز عبور</label>
                                <input id="password" name="password" type="password" class="form-control"
                                       >
                            </div>
                            <div class="col-lg-6 form-group">
                                <label for="repassword" class="col-form-label">تکرار رمز عبور</label>
                                <input id="repassword" name="repassword" type="password" class="form-control"
                                >
                            </div>

                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-space btn-success m-0 px-5">ذخیره</button>
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

    <script>


        /**
         * Basic jQuery Validation Form Demo Code
         * Copyright Sam Deering 2012
         * Licence: http://www.jquery4u.com/license/
         */
        (function($,W,D)
        {
            var JQUERY4U = {};

            JQUERY4U.UTIL =
                {
                    setupFormValidation: function()
                    {
                        //form validation rules
                        $("#my_form").validate({
                            rules: {
                                password: "required",
                                agree: "required"
                            },
                            messages: {
                                password: "این فیلد الزامی است."
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

@stop
