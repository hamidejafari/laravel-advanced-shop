<div class="accordion" id="accordionExample">
	<div class="accordion-item bg-white">
		<h2 class="accordion-header" id="headingTwo">
			<button class="accordion-button sidebtn py-1 ps-1 pe-3 collapsed" type="button" data-bs-toggle="collapse"
				data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				<div class="row w-100 m-0">
					<div class="col-md-2 col-sm-2 col-xs-3 align-self-center p-1">
						@if(isset($user->avatar))
						<img src="{{asset('assets/uploads/content/users/'. $user->avatar)}}" alt=""
							class="w-100 bg-two p-2 shadow-sm border">
						@else
						<img src="{{asset('assets/site/images/kaj/user.png')}}" alt=""
							class="w-100 bg-two p-2 shadow-sm border">
						@endif
					</div>
					<div class="col-md-10 col-sm-10 col-xs-9 align-self-center p-1">
						<div class="">
							<h2 class="text-one fw-bolder my-1 h6">
								{{@$user->name.' '.@$user->family}}
							</h2>
							<h4 class="text-secondary d-flex align-items-center my-1 h6">
								<i class="bi bi-phone-vibrate h5 my-0 me-2"></i>
								{!! @$user->mobile !!}
							</h4>
							<h4 class="text-secondary d-flex align-items-center my-1 h6">
								<i class="bi bi-calendar-event h5 my-0 me-2"></i>

								{{jdate('Y/m/d H:i',@$user->last_login->timestamp)}}
							</h4>
						</div>
					</div>
				</div>
			</button>
		</h2>
		<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
			data-bs-parent="#accordionExample">
			<div class="accordion-body p-0">
				@include('site.panel.content.list')
			</div>
		</div>
	</div>
</div>