@if(count($main_mobile['main']) > 0)
<div class="bg-one">
    <div class="py-2">
        <h4 class="fw-bolder text-center m-0 py-1">
            مشاوره زیبایی
        </h4>
        <p class="text-center m-0 py-1 h6">
            ساده ترین راه برای یافتن محصولات برای شما
        </p>
    </div>
    <div class="row w-100 m-0">
        @foreach($main_mobile['main'] as $key => $row2)
        <div class="col-sm-6 col-xs-6 text-center p-0">
            <a @if(@$row2['link'] !=null) href="{{@$row2['link']}}" rel="noopener noreferrer nofollow" @else href="{{route('site.banner.detail',['id'=>@$row2['id']])}}" @endif class="d-flex align-items-center justifu-content-center">
                <div class="w-100 text-center">
                    <img src="{{asset('assets/uploads/content/sli/'.@$row2['image'])}}" alt="{!! @$row2['title'] !!}" class="w-100">
                    <!--<p class="my-2 text-dark fw-bolder h6">-->
                    <!--    {!! @$row2['title'] !!}-->
                    <!--</p>-->
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endif
