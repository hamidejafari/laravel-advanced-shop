<div class="border bg-light shadow-sm p-2">
	<h4 class="fw-boldeer border-bottom h5 pb-2">
		اطلاعات شخصی
	</h4>
	<ul class="p-0 m-0">
		<li class="list-unstyled py-1">
			<p class="m-0 d-flex align-items-center justify-content-between">
				نام :
				<span class="fw-bolder">
					{!! @$user->name !!}
				</span>
			</p>
		</li>
		<li class="list-unstyled py-1">
			<p class="m-0 d-flex align-items-center justify-content-between">
				نام خانوادگی :
				<span class="fw-bolder">
				{!! @$user->family !!}
				</span>
			</p>
		</li>
		<li class="list-unstyled py-1">
			<p class="m-0 d-flex align-items-center justify-content-between">
				شماره تلفن :
				<span class="fw-bolder">
					{!! @$user->mobile !!}
				</span>
			</p>
		</li>
		<li class="list-unstyled py-1">
			<p class="m-0 d-flex align-items-center justify-content-between">
				پست الکترونیک :
				<span class="fw-bolder">
				{!! @$user->email !!}
				</span>
			</p>
		</li>
		<li class="list-unstyled py-1">
			<a href="{{route('panel.edit')}}" class="btn btn-two w-100">
				ویرایش اطلاعات
			</a>
		</li>
	</ul>
</div>
