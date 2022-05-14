<h2 class="fw-bolder h4 text-dark">
	توضیحات
	<span>
		"{{@$product->title}}"
	</span>
</h2>
@if($product->description != null)
<div class="text-justify des">
	{!! @$product->description !!}
</div>
@else
<div class="empty h-100 d-flex align-items-center justify-content-center">
	<img src="{{asset('assets/site/images/emptyds.png')}}" alt="توضیحی وجود ندارد" class="w-50 ic">
</div>
@endif
@if($tags->count() > 0)
<div class="tags">
	<h4>
		برچسب ها :
	</h4>
	<ul class="p-0 m-0">
		@foreach($tags as $tag)
		<li>
			<a href="{{url('/tag/'.str_replace(' ', '-',$tag->title))}}">
				{{@$tag->title}}
			</a>
		</li>
		@endforeach

	</ul>
</div>
@endif
