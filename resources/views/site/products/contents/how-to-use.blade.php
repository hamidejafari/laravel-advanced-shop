<h2 class="fw-bolder h4 text-dark">
	طرز استفاده از
	<span>
		"{{@$product->title}}"
	</span>
</h2>
@if($product->how_to_use != null)
<div class="text-justify des">
{!! @$product->how_to_use !!}
</div>
@else
<div class="empty h-100 d-flex align-items-center justify-content-center">
	<img src="{{asset('assets/site/images/emptyds.png')}}" alt="توضیحی وجود ندارد" class="w-50 ic">
</div>
@endif
