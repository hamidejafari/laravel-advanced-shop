<!DOCTYPE html>
<html lang="fa">
@if ($setting_header->disable == 0)

@include('layouts.site.blocks.head')

<body>
	@yield('content')

	@include('layouts.site.blocks.script')
	@include('layouts.message-swal')
</body>
@else
    @include('comingsoon')
@endif
</html>
