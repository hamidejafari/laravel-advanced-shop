<!-- start desktop -->
@foreach($banners['above'] as $baner)
<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-3 d-md-block d-sm-none d-xs-none px-1 pt-1 pb-0">
	<a @if(@$baner->link != null) href= "{{@$baner['link']}}" rel="noopener noreferrer nofollow" @else
		href="{{route('site.banner.detail',['id'=>@$baner['id']])}}" @endif>
		<img srcset="{{asset('assets/uploads/content/sli/'.@$baner['image'])}} 2x, {{asset('assets/uploads/content/sli/'.@$baner['image'])}} 1x"
			src="{{asset('assets/uploads/content/sli/'.@$baner['image'])}}" alt="{{@$baner['title']}}"
			class="w-100 bg-light text-secondary text-center">
	</a>
</div>
@endforeach
<!-- end desktop -->
<!-- start mobile -->
{{--<div class="col-sm-12 p-1 d-md-none d-sm-block d-xs-block">
	<div class="scrollmenu">
		@foreach($banners['above'] as $baner)
		<a @if(@$baner->link != null) href= "{{@$baner['link']}}" rel="noopener noreferrer nofollow" @else href="{{route('site.banner.detail',['id'=>@$baner['id']])}}" @endif>
			<img srcset="{{asset('assets/uploads/content/sli/'.@$baner['image'])}} 2x, {{asset('assets/uploads/content/sli/'.@$baner['image'])}} 1x"
			src="{{asset('assets/uploads/content/sli/'.@$baner['image'])}}" alt="{{@$baner['title']}}" class="w-100">
		</a>
		@endforeach
	</div>
</div>--}}
<!-- end mobile -->
