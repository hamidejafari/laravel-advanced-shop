<script src="{{asset('assets/site/js/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/site/js/owlcarousel/highlight.min.js')}}"></script>
<script src="{{asset('assets/site/js/owlcarousel/app.min.js')}}"></script>
<script src="{{asset('assets/site/js/zoomplus/magiczoomplus.min.js')}}"></script>
<script src="{{asset('assets/site/js/zoomplus/prettify.min.js')}}"></script>
<script src="{{asset('assets/site/js/zoomplus/zoom.min.js')}}"></script>
<script src="{{asset('assets/site/js/popper.min.js')}}"></script>
<script src="{{asset('assets/site/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/site/js/kaj.js?v0.22')}}"></script>
<script src="{{asset('assets/site/js/jquery-ui.min.js')}}"></script>
<script>
var mzOptions = {
	textExpandHint: "برای بزرگنمایی کلیک کنید",
	zoomMode: "magnifier",
	zoomWidth: 450,
	zoomHeight: 450,
	transitionEffect: false,
};
$(function() {
	console.log('hiiiieeee');

	$("#slider-range").slider({
		range: true,
		min: 0,
		max: 1000000,
		values: [0, 1000000],
		slide: function(event, ui) {
			$("#amount").val(ui.values[0] + "  -  " + ui.values[1]);
		}
	});

	$("#amount").val($("#slider-range").slider("values", 0) + " - " + $("#slider-range").slider("values", 1));
});
$(function() {
	console.log('hiiiieeee');

	$("#slider-range-xs").slider({
		range: true,
		min: 0,
		max: 1000000,
		values: [0, 1000000],
		slide: function(event, ui) {
			$("#amountxs").val(ui.values[0] + "  -  " + ui.values[1]);
		}
	});

	$("#amountxs").val($("#slider-range-xs").slider("values", 0) + " - " + $("#slider-range-xs").slider("values", 1));
});
</script>

@yield('js')
@include('layouts.site.blocks.vue')