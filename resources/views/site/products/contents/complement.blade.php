<div class="complement py-3">
    <div class="container">
        <div class="p-2 px-xs-0 px-sm-1 pros">
            <div class="bartitle max-content mx-auto position-relative">
            <!--<img src="{{asset('assets/site/images/kaj/end-title.png')}}" alt="" class="end">-->
                <h2 class="fw-bolder">
                    محصولات مکمل
                </h2>
            <!--<img src="{{asset('assets/site/images/kaj/start-title.png')}}" alt="" class="start">-->
            </div>
            <div class="products-home p-2">
                <section id="demos">
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="owl-carousel owl-theme my-0">
                                @foreach($complement as $row)
                                    <div class="item">
                                        @include('layouts.site.blocks.product-box',['item' => $row])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="over"></div>
        </div>
    </div>
</div>
