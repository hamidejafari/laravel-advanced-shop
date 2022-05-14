<div class="px-md-2">
    <div id="carouselExampleControls" class="carousel slide carousel-fade d-md-none d-sm-block d-xs-block" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($mobiles['below'] as $key =>  $row)
            <div class="carousel-item @if($key == 0)active @endif">
                <a @if(@$row['link'] != null) href= "{{@$row['link']}}" rel="noopener
                                                noreferrer nofollow" @else href="{{route('site.banner.detail',['id'=>@$row['id']])}}"
                    @endif>
                    <img src="{{asset('assets/uploads/content/sli/'.@$row['image'])}}"
                        class="d-block w-100" alt="{!! @$row['title'] !!}">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
