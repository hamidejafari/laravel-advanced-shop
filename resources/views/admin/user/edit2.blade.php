@extends('layouts.admin.master')
@section('title','ویرایش')
@section('content')
<div class="container-fluid dashboard-content">
	<div class="row w-100 m-0">
		<div class="col-lg-12 mx-auto py-1 px-0">
			<h3 class="bg-white py-2 px-4 rounded-lg">
            ویرایش
			</h3>
			<div class="card rounded-lg border-0 p-3">
                <form method="post" action="{{URL::action('Admin\UserController@postEdit2',$data->id)}}"
                    enctype="multipart/form-data">
                    @include('admin.user.form2')
                </form>
			</div>
		</div>
	</div>
</div>
@stop
@section('css')
    <link href="{{ asset('assets/admin/css/bootstrap-select.min.css')}}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ asset('assets/admin/js/bootstrap-select.min.js')}}"></script>
    <script>
        (function($, W, D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    //form validation rules
                    $("#rahweb_form").validate({
                        rules: {
                            name: "required",
                            // family: "required",
                            username: "required",
                            phone: "required",
                            // email: {
                            //     required: true,
                            //     email: true
                            // },
                            agree: "required"
                        },
                        messages: {
                            name: "این فیلد الزامی است.",
                            // family: "این فیلد الزامی است.",
                            username: "این فیلد الزامی است.",
                            phone: "این فیلد الزامی است.",
                            // email: "لطفا یک آدرس ایمیل معتبر وارد کنید."
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
