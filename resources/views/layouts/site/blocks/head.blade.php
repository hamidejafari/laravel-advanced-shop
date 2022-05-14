<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#f4b19f"/>
	<link rel="shortcut icon" href="{{asset('assets/uploads/content/set/'.@$setting_header->favicon)}}" type="image/x-icon">
	<title>
		@yield('title',@$setting_header->title)
	</title>
	<meta name="robots" content="@yield('robots','index ,follow')" />
	<meta name="description" content="@yield('description',@$setting_header->description_seo)" />
	<link rel="canonical" href="{{url()->current()}}" />
	<meta property="og:site_name" content="@yield('title',@$setting_header->title)" />
	<meta property="og:title" content="@yield('title',@$setting_header->title)">
	<meta property="og:description" content="@yield('description',@$setting_header->description_seo)" />
	<meta property="og:locale" content="fa_ir" />
	<meta property="og:url" content="{{url()->current()}}" />
	<meta property="og:image" content="@yield('image_seo',asset('assets/uploads/content/set/'.@$setting_header->logo))" />
	<meta property="og:type" content="article" />
	<meta property="og:type" content="website" />
	<meta name="title" content="@yield('title',@$setting_header->title)">

	<!-- Bootstrap Rtl, Kaj, CSS -->
	<link rel="preload" href="{{asset('assets/site/css/bootstrap.rtl.min.css?V0.0')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<link rel="preload" href="{{asset('assets/site/css/mix.min.css?V0.01')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{asset('assets/site/css/kaj.css?V0.0.05')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{asset('assets/site/css/style.css?V0.06')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<link rel="preload" href="{{asset('assets/site/css/persian.datepicker.min.css?V0.01')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">

	<noscript>
		<link rel="stylesheet" href="{{asset('assets/site/css/bootstrap.rtl.min.css?V0.0')}}"/>
		<link rel="stylesheet" href="{{asset('assets/site/css/mix.min.css?V0.01')}}"/>
		<link rel="stylesheet" href="{{asset('assets/site/css/kaj.css?V0.0.05')}}"/>
		<link rel="stylesheet" href="{{asset('assets/site/css/persian.datepicker.min.css?V0.01')}}"/>
	</noscript>
	<!-- Jquery JS -->
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{asset('assets/site/js/vue.js')}}" ></script>
{{--    <script src="https://unpkg.com/vue-observe-visibility/dist/vue-observe-visibility.min.js"></script>--}}
    <script src="{{asset('assets/site/js/axios.min.js')}}"></script>
	<script src="{{asset('assets/site/js/sweetalert.min.js')}}"></script>
	<script src="{{asset('assets/site/js/persian.date.min.js')}}" async></script>
	<script src="{{asset('assets/site/js/persian.datepicker.min.js')}}" async></script>
</head>
