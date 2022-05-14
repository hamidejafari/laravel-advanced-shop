<h2 class="fw-bolder h4 text-dark">
	ویدئو و تیزر مربوط به
	<span>
		"{{@$product->title}}"
	</span>
</h2>
@if($videos->count() > 0)
<div class="row w-100 m-0 videos pt-3">
    @foreach($videos as $video)
	<div class="col-xl-6 p-1">
		<div class="bg-light p-2 border">
            {!! $video->link !!}
		</div>
	</div>
    @endforeach
</div>
@else
<div class="empty h-100 d-flex align-items-center justify-content-center">
	<img src="{{asset('assets/site/images/emptyvd.png')}}" alt="ویدئویی موجود نیست" class="w-50 ic">
</div>
@endif
