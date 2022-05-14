<!DOCTYPE html>
<html lang="fa">
@if ($setting_header->disable == 0)
@include('layouts.site.blocks.head')
<div  id="shop68" v-cloak>
<body>
	@include('layouts.site.blocks.off')
	@include('layouts.site.blocks.menu')

	<section class="content paneluser bg-two py-3">
		<div class="container px-0 px-md-3">
			<div class="row w-100 m-0">
				<div class="col-xl-3 col-lg-4 col-md-5 col-sm-12 d-md-block d-sm-none d-xs-none p-2">
					@include('site.panel.content.sidenav')
				</div>
				<div class="col-xl-3 col-lg-4 col-md-5 col-sm-12 d-md-none d-sm-block d-xs-block p-2">
					@include('site.panel.content.sidenav-xs')
				</div>
				<div class="col-xl-9 col-lg-8 col-md-7 col-sm-12 p-2">
					<div class="card h-100 rounded-0 border-0 shadow-sm p-2">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
	</section>

	@include('layouts.site.blocks.cat-modal')
	@include('layouts.site.blocks.footer')
	@include('layouts.site.blocks.script')
	@include('layouts.message-swal')
</body>
</div>
@else
    @include('comingsoon')
@endif
</html>
