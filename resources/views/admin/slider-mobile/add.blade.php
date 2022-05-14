@extends('layouts.admin.master')
@section('title','جدید')
@section('content')

<div class="container-fluid dashboard-content">
	<div class="row w-100 m-0">
		<div class="col-lg-12 mx-auto py-1 px-0">
			<h3 class="bg-white py-2 px-4 rounded-lg">
				اضافه کردن اسلایدر
			</h3>
			<div class="card rounded-lg border-0 p-3">
				<form method="post" action="{{URL::action('Admin\SliderController@postAddMobile')}}"
					enctype="multipart/form-data">
					@include('admin.slider-mobile.form')
				</form>
			</div>
		</div>
	</div>
</div>

@stop
@section('js')
    <script src="{{ asset('assets/admin/js/image-load.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {


            $("#imgInp1").change(function () {
                readURL(this, 'blah1');
            });
            $("#imgInp2").change(function () {
                readURL(this, 'blah2');
            });



        });

    </script>
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
                                agree: "required"
                            },
                            messages: {
                                title: "این فیلد الزامی است."
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
