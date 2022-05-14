<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="" type="image/x-icon">
	<title>
		@yield('title','')( 💻 پنل ادمین شرکت طراحی سایت ره وب )
	</title>
	<meta name="robots" content="@yield('robots','noindex,nofollow')" />
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="{{asset('assets/admin/vendor/bootstrap/css/bootstrap.rtl.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/vendor/bootstrap/css/bootstrap.rtl.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/vendor/fonts/circular-std/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/libs/css/style.css?v0.04')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/vendor/charts/chartist-bundle/chartist.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/vendor/charts/morris-bundle/morris.css')}}">
	<link rel="stylesheet"
		href="{{asset('assets/admin/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/vendor/charts/c3charts/c3.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.0.0/cropper.min.css" />
	<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
	<link rel="stylesheet" href="{{asset('assets/admin/libs/css/w3.css?v0.01')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/date/bootstrap-datepicker.min.css?v0.0')}}">

	<style>
	.image_container {
		max-width: 100%;
		max-height: 450px;
	}
	#cropped_result img{
		width: 100%;
	}
	</style>
	<!-- Date Picker
    	<link rel="stylesheet" href="{{asset('assets/admin/plugins/datepicker/datepicker3.css')}}">

    	<link rel="stylesheet" href="{{asset('assets/admin/plugins/daterangepicker/daterangepicker-bs3.css')}}">
	-->
	<!-- JS -->
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>
{{--	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}
<!-- toast -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/toastr.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/toastr/toaster.css')}}">
    <script src="{{ asset('assets/admin/js/image-load.js')}}"></script>
    <!-- recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

@yield('css')
