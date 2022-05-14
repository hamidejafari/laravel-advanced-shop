<!-- <div class="slider-box">
	<div class="d-flex align-items-center justify-content-between">
		<small>تومان</small>
		<input type="text" id="priceRange"/>
		<small>تومان</small>
	</div>
	<div id="price-range" class="slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
		<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
		<span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span>
		<span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;"></span>
	</div>
</div>
<script id="rendered-js">
$(function() {
	$("#price-range").slider({
		step: 1,
		range: true,
		min: 0,
		max: 10000000,
		values: [0, 10000000],
		slide: function(event, ui) {
			$("#priceRange").val(ui.values[0] + " - " + ui.values[1]);
		}
	});
	$("#priceRange").val($("#price-range").slider("values", 0) + " - " + $("#price-range").slider("values",
		1));
});
</script> -->