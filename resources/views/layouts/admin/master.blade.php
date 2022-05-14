<!doctype html>
<html lang="fa">
@include('layouts.admin.blocks.head')

<body dir="rtl">
	<div class="dashboard-main-wrapper" id="a333">
		@include('layouts.admin.blocks.menu')
		@include('layouts.admin.blocks.sidebar')
		<div class="dashboard-wrapper">
			@yield('content')
		</div>
	</div>
	@include('layouts.admin.blocks.script')
    @include('layouts.admin.blocks.message')
</body>

</html>
