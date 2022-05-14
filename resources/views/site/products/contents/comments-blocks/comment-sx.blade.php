<!DOCTYPE html>
<html lang="fa">
@include('layouts.site.blocks.head')

<body>
	<div id="shop68" v-cloak>
		<div class="px-2 py-4">
			@include('site.products.contents.usercomments')
		</div>
		@include('layouts.site.blocks.script')
		@include('layouts.message-swal')
	</div>
</body>

</html>