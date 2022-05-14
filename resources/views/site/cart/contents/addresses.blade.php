<div class="card p-0 border-0 rounded-0">
	<p class="fw-bolder h6 m-0 p-0 d-flex align-items-center justify-content-between">
        @if(\Illuminate\Support\Facades\Auth::check())
            <button type="button" class="btn btn-shop fw-bolder w-100" data-bs-toggle="modal" data-bs-target="#adressModalmain" style="font-size: 2.5vh;">
                <i class="bi bi-geo-alt-fill me-2"></i>
                 انتخاب آدرس
            </button>
        @else
            <a href="{{url('/panel/login?address=order')}}" class="btn btn-shop fw-bolder w-100" style="font-size: 2.5vh;">
                <i class="bi bi-geo-alt-fill me-2"></i>
                انتخاب آدرس
            </a>
        @endif
    </p>
    @if($default_address !== null)
	<div class="row w-100 m-0">
		<div class="col-xl-12 p-1">
			<div class="card bg-light rounded-0 shadow-sm p-2">
				<ul class="p-0 m-0">
					<li class="list-unstyled">
						<p class="fw-bolder">
							{{@$default_address->location}}
						</p>
					</li>
					<li class="list-unstyled">
						<p class="m-0 text-secondary">
							<i class="bi bi-envelope"></i>
							کد پستی : {{@$default_address->postal_code}}
						</p>
					</li>
					<li class="list-unstyled">
						<p class="m-0 text-secondary">
							<i class="bi bi-telephone"></i>
							شماره تماس : {{@$default_address->transferee_mobile}}
						</p>
					</li>
					<li class="list-unstyled">
						<p class="m-0 text-secondary">
							<i class="bi bi-person"></i>
							{{@$default_address->transferee_name.' '.@$default_address->transferee_family}}
						</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
    @endif
</div>
