<div class="col-sm-12 p-1">
	<div class="bg-light side-list p-0">
		<ul class="p-0 m-0">
			<li class="side-item @if($seg[1] == 'dashboard' ) active @endif">
				<a href="{{route('panel.dashboard')}}" class="side-link">
					<div class="d-flex align-items-center">
						<i class="bi bi-speedometer2 me-2 d-flex"></i>
						داشبورد
					</div>
					<i class="bi bi-arrow-left d-flex"></i>
				</a>
			</li>
			<li class="side-item @if($seg[1] == 'edit-info' ) active @endif">
				<a href="{{route('panel.edit')}}" class="side-link">
					<div class="d-flex align-items-center">
						<i class="bi bi-pen me-2 d-flex"></i>
						ویرایش اطلاعات
					</div>
					<i class="bi bi-arrow-left d-flex"></i>
				</a>
			</li>
			<li class="side-item @if($seg[1] == 'reset-password' ) active @endif">
				<a href="{{route('panel.pass')}}" class="side-link">
					<div class="d-flex align-items-center">
						<i class="bi bi-key me-2 d-flex"></i>
						تغییر رمز ورود
					</div>
					<i class="bi bi-arrow-left d-flex"></i>
				</a>
			</li>
			<li class="side-item @if($seg[1] == 'favorites' ) active @endif">
				<a href="{{route('panel.favorites')}}" class="side-link">
					<div class="d-flex align-items-center">
						<i class="bi bi-suit-heart me-2 d-flex"></i>
						علاقه مندی ها
					</div>
					<i class="bi bi-arrow-left d-flex"></i>
				</a>
			</li>
			<li class="side-item @if($seg[1] == 'orders' ) active @endif">
				<a href="{{route('panel.orders')}}" class="side-link">
					<div class="d-flex align-items-center">
						<i class="bi bi-bag me-2 d-flex"></i>
						سفارشات من
					</div>
					<i class="bi bi-arrow-left d-flex"></i>
				</a>
			</li>
			<li class="side-item @if($seg[1] == 'tickets' ) active @endif">
                @php $tickcount =App\Models\Ticket::where('user_id',auth()->user()->id)->whereNull('order_item_id')->whereStatus(1)->count();
                @endphp
				<a href="{{route('panel.tickets')}}" class="side-link">
					<div class="d-flex align-items-center">
						<i class="bi bi-envelope me-2 d-flex"></i>
						تیکت ها
						<span class="badge bg-one ms-2 rounded-circle">{{$tickcount}}</span>
					</div>
					<i class="bi bi-arrow-left d-flex"></i>
				</a>
			</li>
			<!--<li class="side-item @if($seg[1] == 'tracking' ) active @endif">-->
			<!--	<a href="{{route('panel.tracking')}}" class="side-link">-->
			<!--		<div class="d-flex align-items-center">-->
			<!--			<i class="bi bi-view-list me-2 d-flex"></i>-->
			<!--			پیگیری سفارش-->
			<!--		</div>-->
			<!--		<i class="bi bi-arrow-left d-flex"></i>-->
			<!--	</a>-->
			<!--</li>-->
			<li class="side-item @if($seg[1] == 'discounts' ) active @endif">
				<a href="{{route('panel.discounts')}}" class="side-link">
					<div class="d-flex align-items-center">
						<i class="bi bi-percent me-2 d-flex"></i>
						لیست تخفیف های من
					</div>
					<i class="bi bi-arrow-left d-flex"></i>
				</a>
			</li>
			<li class="side-item @if($seg[1] == 'addresses' ) active @endif">
				<a href="{{ route('panel.address') }}" class="side-link">
					<div class="d-flex align-items-center">
						<i class="bi bi-geo-alt me-2 d-flex"></i>
						آدرس های من
					</div>
					<i class="bi bi-arrow-left d-flex"></i>
				</a>
			</li>
			<li class="side-item">
				<a href="{{ route('panel.logout') }}" class="side-link">
					<div class="d-flex align-items-center">
						<i class="bi bi-power me-2 d-flex"></i>
						خروج
					</div>
				</a>
			</li>
		</ul>
	</div>
</div>
