<div class="card side-panel rounded-0 border-0 shadow-sm p-2">
	<div class="row w-100 m-0">
		<div class="col-sm-12 p-1">
			<div class="row w-100 m-0">
				<div class="col-md-3 col-sm-2 col-xs-3 align-self-center p-2">
					@if(isset($user->avatar))
					<img src="{{asset('assets/uploads/content/users/'. $user->avatar)}}"
						class="w-100 bg-two p-2 shadow-sm border">
					@else
					<img src="{{asset('assets/site/images/kaj/user.png')}}"
						class="w-100 bg-two p-2 shadow-sm border">
					@endif
				</div>
				<div class="col-md-9 col-sm-10 col-xs-9 align-self-center p-2">
					<div class="">
						<h2 class="text-one fw-bolder my-1 h5">
							{{@$user->name.' '.@$user->family}}
						</h2>
						<h4 class="text-secondary d-flex align-items-center my-1 h6">
							<i class="bi bi-phone-vibrate h5 my-0 me-2"></i>
							{!! @$user->mobile !!}
						</h4>
						<h4 class="text-secondary d-flex align-items-center my-1 h6">
							<i class="bi bi-clock h5 my-0 me-2"></i>
							{{jdate('Y/m/d H:i',@$user->last_login->timestamp)}}
						</h4>
					</div>
				</div>
			</div>
		</div>
		@include('site.panel.content.list')
	</div>
</div>