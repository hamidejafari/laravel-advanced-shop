<h2 class="fw-bolder h5 px-2 text-dark">
	توضیحات
	<span>
		"{{@$product->title}}"
	</span>
</h2>
@if($product->description != null)
<div class="card border-0 des redmoresd px-2">
	<div id="textShortDes" class="text-justify oldmore">
		{!! strip_tags(\Illuminate\Support\Str::limit(@$product->description,310)) !!}
	</div>
	<div class="btnmore pb-3">
		<div class="collapse" id="collapseExample">
			<div class="card card-body px-0 border-0">
				<div class="text-justify">
					{!! @$product->description !!}
				</div>
			</div>
		</div>
		<a  @click="hideShortDes()" class="btn btn-more w-100" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
			@{{ more ? '  مشاهده کمتر'  : ' مشاهده بیشتر'}}
		</a>
	</div>
</div>
@else
<div class="empty h-100 d-flex align-items-center justify-content-center">
	<img src="{{asset('assets/site/images/emptyds.png')}}" alt="توضیحی وجود ندارد" class="w-50 ic">
</div>
@endif
@if($tags->count() > 0)
<div class="tags border-top pt-3">
	<h4>
		برچسب ها :
	</h4>
	<ul class="p-0 m-0">
		@foreach($tags as $tag)
		<li>
			<a href="{{ url('tag/'.$tag->title) }}">
				{{@$tag->title}}
			</a>
		</li>
		@endforeach
	</ul>
</div>
@endif
