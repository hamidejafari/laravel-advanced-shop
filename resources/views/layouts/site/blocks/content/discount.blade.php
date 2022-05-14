@if($timer_products->count() > 0)
    <style>
        .disc{
            @if($setting_header->sale_background != null)
            background-image: url("{{asset('assets/uploads/content/set/' . $setting_header->sale_background)}}");
            @else
            background-image: url("{{asset('assets/site/images/prl.jpg')}}");
            @endif
            padding: 6rem 0;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <div class="py-5 py-xs-2 px-md-2 disc px-xs-0 px-sm-1 counter-box">
        <div class="products-home pro-home p-0">
            <div class="container">
                <div class="row w-100 m-0">
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-xs-12 p-0">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <div class="row w-100 m-0">
                                <div class="col-sm-12 col-xs-6 text-center align-self-center px-1 py-2">
                                    <p dir="ltr" class="h1 m-0 ismb text-white text-shadow d-sm-block d-xs-none">
                                        %OFF
                                    </p>
                                    <p class="h1 m-0 ismb text-center text-white text-shadow d-sm-none d-xs-block">
                                        فروش ویژه
                                    </p>
                                </div>
                                <div class="col-sm-12 col-xs-6 text-center align-self-center px-1 py-2">
                                    <p dir="ltr" class="h1 m-0 ismb text-white text-shadow d-sm-none d-xs-block">
                                        %OFF
                                    </p>
                                    <p class="h1 m-0 ismb text-center text-white text-shadow d-sm-block d-xs-none">
                                        فروش ویژه
                                    </p>
                                </div>
                                <div class="col-sm-12  d-xs-none text-center px-1 py-4">
                                    <a href="{{route('site.timer')}}" class="btn btn-outline-white d-flex align-items-center justify-content-center max-content mx-auto">
                                        مشاهده همه
                                        <i class="bi bi-chevron-left d-flex ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-9 col-md-8 col-sm-8 col-xs-12 p-0">
                        <section id="demos">
                            <div class="row">
                                <div class="large-12 columns">
                                    <div class="owl-carousel-off owl-theme my-0">
                                        @foreach($timer_products as $key => $timer)
                                            <div class="item p-0">
                                                <div class="card card-pro">
                                                    @if($timer->calcute > 0)
                                                        <div class="offer">
                                                            {{round($timer->calcute)}}%
                                                        </div>
                                                    @endif
                                                    <div class="overlay-top">
                                                        <ul class="p-0 m-0">
                                                            <li class="float-start list-unstyled">
                                                                <button v-if="like{{$timer->id}} == 0" class="btn" @click="getLike{{$timer->id}}(1,{{$timer->id}})">
                                                                    <i class="bi bi-heart"></i>
                                                                </button>
                                                                <button v-else class="btn" @click="getLike{{$timer->id}}(0,{{$timer->id}})">
                                                                    <i class="bi bi-heart-fill text-danger"></i>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a href="{{route('site.product.detail',['id'=>$timer->id])}}">
                                                        <div class="bxs">
                                                            <figure class="mx-0 my-2">
                                                                <div class="figure-inn">
                                                                    <img src="{{$timer->pro_image}}" class="swiper-lazy" alt="{!! $timer->title !!}">
                                                                </div>
                                                            </figure>
                                                            <h4 class="text-dark fw-bolder">
                                                                {!! $timer->title !!}
                                                            </h4>
                                                            <div class="price pb-3">
                                                                @if($timer->stock_count == 0)
                                                                    <p class="m-0 off">
                                                                        ناموجود
                                                                    </p>
                                                                @else
                                                                    <p class="m-0 off text-dark">
                                                                        {!! $timer->price_first['price'] !!}
                                                                    </p>
                                                                @endif
                                                                @if($timer->calcute > 0)
                                                                    <p class="m-0 old text-secondary">
                                                                        <del>
                                                                            {!! $timer->price_first['old'] !!}
                                                                        </del>
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div dir="ltr" class="w-100 pb-3">
                                                            <div class="row w-100 m-0">
                                                                <div class="col-sm-12 p-0">
                                                                    <div class="timer position-relative d-flex align-items-center justify-content-center">

                                                                        <div class="d-flex align-items-center justify-content-center">
                                                                            <span class="days bg-light d-flex py-1 px-2 shadow-sm text-secondary" id="days{{$timer->id}}"></span>
                                                                            <div class="smalltext mx-1"></div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center justify-content-center">
                                                                            <span class="hours bg-light d-flex py-1 px-2 shadow-sm text-secondary" id="hours{{$timer->id}}"></span>
                                                                            <div class="smalltext mx-1">:</div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center justify-content-center">
                                                                            <span class="minutes bg-light d-flex py-1 px-2 shadow-sm text-secondary" id="minutes{{$timer->id}}"></span>
                                                                            <div class="smalltext mx-1">:</div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center justify-content-center">
                                                                            <span class="seconds bg-light d-flex py-1 px-2 shadow-sm text-secondary" id="seconds{{$timer->id}}"></span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-xs-12 p-0">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <div class="row w-100 m-0">
                                <div class="col-sm-12 d-sm-none d-xs-block text-center px-1 pb-0 pt-3">
                                    <a href="{{route('site.timer')}}"
                                       class="btn btn-outline-white d-flex align-items-center justify-content-center max-content mx-auto">
                                        مشاهده همه
                                        <i class="bi bi-chevron-left d-flex ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<script>
    @foreach($timer_products as $key => $timer)
    const second{{$timer->id}} = 1000,
        minute{{$timer->id}} = second{{$timer->id}} * 60,
        hour{{$timer->id}} = minute{{$timer->id}} * 60,
        day{{$timer->id}} = hour{{$timer->id}} * 24;
    let countDown{{$timer->id}} = new Date({{explode('-',$timer->end_date)[0]}}, {{explode('-',$timer->end_date)[1]}}, {{\Carbon\Carbon::parse($timer->end_date)->day}}, 0, 0, 0, 0).getTime(),
        x{{$timer->id}} = setInterval(function() {
            let now{{$timer->id}} = new Date().getTime(),
                distance{{$timer->id}} = countDown{{$timer->id}} - now{{$timer->id}};

            // console.log('----time----');
            // console.log(countDown{{$timer->id}});
            //             console.log(now{{$timer->id}});
            //                         console.log('----time----');



            document.getElementById("days{{$timer->id}}").innerText = Math.floor(distance{{$timer->id}} / (day{{$timer->id}})) - 30;
            document.getElementById("hours{{$timer->id}}").innerText = Math.floor((distance{{$timer->id}} % (day{{$timer->id}})) / (hour{{$timer->id}}));
            document.getElementById("minutes{{$timer->id}}").innerText = Math.floor((distance{{$timer->id}} % (hour{{$timer->id}})) / (minute{{$timer->id}}));
            document.getElementById("seconds{{$timer->id}}").innerText = Math.floor((distance{{$timer->id}} % (minute{{$timer->id}})) / second{{$timer->id}});

        }, 0)
    @endforeach
</script>
