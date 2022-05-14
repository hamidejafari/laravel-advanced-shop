<div class="price h-100 p-md-3">
    <div class="row w-100 m-0">

        <div class="col-sm-9 col-xs-9 align-self-end text-end px-0 py-2">
            @if($product->stock_count == 0)
                <form method="post" action="{{URL::action('Site\HomeController@postBell')}}"
                      enctype="multipart/form-data" class="m-0" v-if="selectedStock == 0">
                    {{ csrf_field() }}
                    <input type="hidden" name="reminder_id" value="{{$product->id}}">
                    <button class="btn btn-light d-flex align-items-center">
                        <!-- Slash -->
                        <!-- <i class="bi bi-bell-slash d-flex me-sm-2 m-xs-0"></i>
                            <span class="d-sm-block d-xs-none">
                                به من از طریق پیامک اطلاع نده
                            </span> -->

                        <!-- No slash -->
                        <i class="bi bi-bell d-flex me-sm-2 m-xs-0"></i>
                        <span class="d-sm-block d-xs-none">
						به من از طریق پیامک اطلاع بده
					</span>
                    </button>
                </form>
            @else
                <form method="post" action="{{URL::action('Site\HomeController@postBell')}}"
                      enctype="multipart/form-data" class="m-0" v-if="selectedStock == 0">
                    {{ csrf_field() }}
                    <input type="hidden" name="reminder_id" value="{{$product->id}}">
                    <button class="btn btn-light d-flex align-items-center">
                        <!-- Slash -->
                        <!-- <i class="bi bi-bell-slash d-flex me-sm-2 m-xs-0"></i>
                            <span class="d-sm-block d-xs-none">
                                به من از طریق پیامک اطلاع نده
                            </span> -->

                        <!-- No slash -->
                        <i class="bi bi-bell d-flex me-sm-2 m-xs-0"></i>
                        <span class="d-sm-block d-xs-none">
						به من از طریق پیامک اطلاع بده
					</span>
                    </button>
                </form>
            @endif
        </div>

        <div class="col-sm-3 col-xs-3 align-self-end px-0 py-1">
            <a href="{{route('site.brand.detail',['id'=>@$product->brands->id])}}" class="border d-flex p-2">
                <img src="{{asset('assets/uploads/content/brand/medium/'.@$product->brands->image)}}"
                     alt="{{@$product->brands->title}}" class="w-100 text-center text-secondary">
            </a>
        </div>
    </div>
    <div class="price-box bg-light rounded-custom">
        <div class="d-md-block d-sm-none d-xs-none">
            <h2 class=" px-2">
                @if($product->stock_count == 0)
                    <span>
					ناموجود
				</span>

                @else
                    <span v-if="selectedStock == 0">
                        ناموجود
                    </span>

                    <div v-else>
                         <span>
                        @{{ selectedPrice }}
                    </span>


                        <del class="text-secondary" v-if="selectedRealPrice !== '0 تومان ' && selectedRealPrice !== 'NaN تومان '">

                            @{{selectedRealPrice}}
                        </del>

                    </div>
                @endif

            </h2>
        </div>
        <ul class="p-2 my-0 mx-auto w-100">
            <li class="list-unstyled d-flex align-items-center">
                <i class="bi bi-patch-check d-flex me-1 text-success"></i>
                برند {{@$product->brands->title}}
            </li>
            @if($boxes->count() > 0)
                @foreach($boxes as $box)
                <li class="list-unstyled d-flex align-items-center">
                    <i class="bi bi-patch-check d-flex me-1 text-success"></i>
                 {!! @$box->description !!}

                </li>
                @endforeach
                @else
            <li class="list-unstyled d-flex align-items-center">
                <i class="bi bi-patch-check d-flex me-1 text-success"></i>
                ضمانت اصالت کالا

            </li>
            <li class="list-unstyled d-flex align-items-center">
                <i class="bi bi-patch-check d-flex me-1 text-success"></i>
                ارسال سریع

            </li>
            <li class="list-unstyled d-flex align-items-center">
                <i class="bi bi-patch-check d-flex me-1 text-success"></i>
                تضمین سلامت فیزیکی
            </li>
            @endif
        </ul>
        @if($product->stock_count !== 0)

            <template v-if="selectedStock == 0">
                <div class="d-md-block d-sm-none d-xs-none" >
                    @include('site.products.contents.select')
                </div>
            </template>

            <template v-else>
                <div class="d-md-block d-sm-none d-xs-none" >
                    @include('site.products.contents.select')
                </div>
                <div class="w-100 d-md-block d-sm-none d-xs-none" >
                    <button type="button"
                            class="btn btn-lg btn-addcard w-100 mx-auto d-flex align-items-center justify-content-center"
                            @click="addToCart({{$product->id}},quantity,true,selectedColor)">
                        <i class="bi bi-cart4 d-flex me-2"></i>
                        افزودن به سبد خرید
                    </button>
                </div>
            </template>



        @endif
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.count').prop('disabled', true);
        $(document).on('click', '.plus', function() {
            $('.count').val(parseInt($('.count').val()) + 1);
        });
        $(document).on('click', '.minus', function() {
            $('.count').val(parseInt($('.count').val()) - 1);
            if ($('.count').val() == 0) {
                $('.count').val(1);
            }
        });
    });
</script>
