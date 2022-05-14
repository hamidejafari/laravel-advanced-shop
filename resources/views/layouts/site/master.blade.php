<!DOCTYPE html>
<html lang="fa">
@if ($setting_header->disable == 0)
@include('layouts.site.blocks.head')

<body>

	<div id="shop68" v-cloak>

        @include('layouts.site.blocks.off')

        @include('layouts.site.blocks.menu')

        @yield('content')
        <a href="#" id="scroll" style="display: none;">
            <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                <i class="bi bi-arrow-up"></i>
            </div>
        </a>
        @include('layouts.site.blocks.cat-modal')
        @include('layouts.site.blocks.footer')

    </div>
    @include('layouts.site.blocks.script')

</body>
@else
    @include('comingsoon')
@endif
@include('layouts.message-swal')
</html>
