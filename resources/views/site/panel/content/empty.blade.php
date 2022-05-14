<div class="empty">
	<div class="col-xl-4 text-center mx-auto">
		<div class="text-center w-100">
			<img src="{{asset('assets/site/images/empty.png')}}" alt="صفحه خالی است" class="w-75 ic">
		</div>
        @if($seg[0] == 'checkout')
		<p class="ismb fw-bolder text-secondary my-4 h2" style="opacity:0.6;letter-spacing: 5px;">
            سبد خرید شما خالی است !
		</p>
{{--            @if(!\Auth::check())--}}
{{--                <a href="{{route('panel.log')}}" class="ismb text-one border p-2">--}}
{{--                    ورود به حساب کاربری--}}
{{--                </a>--}}
{{--            @endif--}}
        @endif
        @if($seg[0] == 'search')
            <p class="ismb fw-bolder text-secondary my-4 h2" style="opacity:0.6;letter-spacing: 5px;">
              موردی با این نام پیدا نشد
            </p>
        @endif

        @if(count($seg) >= 2)
        @if($seg[1] == 'favorites')
            <p class="ismb fw-bolder text-secondary my-4 h2" style="opacity:0.6;letter-spacing: 5px;">
                لیست علاقه مندی شما خالی است !
            </p>
            @elseif($seg[1] == 'tickets')
                <p class="ismb fw-bolder text-secondary my-4 h2" style="opacity:0.6;letter-spacing: 5px;">
                    لیست تیکت شما خالی است !
                </p>
        @elseif($seg[1] == 'discounts')
            <p class="ismb fw-bolder text-secondary my-4 h2" style="opacity:0.6;letter-spacing: 5px;">
                لیست تخفیف شما خالی است !
            </p>
        @elseif($seg[1] == 'orders')
            <p class="ismb fw-bolder text-secondary my-4 h2" style="opacity:0.6;letter-spacing: 5px;">
                لیست سفارشات شما خالی است !
            </p>
        @endif


        @endif
	</div>
</div>
