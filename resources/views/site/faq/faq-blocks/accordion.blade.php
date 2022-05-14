<div class="accordion" id="accordionExample">
    @foreach($questions as $key => $row)
	<div class="accordion-item border bg-light mb-2">
		<h2 class="accordion-header" id="headingOne{{$row->id}}">
			<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$row->id}}"
				aria-expanded="true" aria-controls="collapseOne{{$row->id}}">
				<div class="row w-100 m-0">
					<div class="col-sm-12 p-1">
						<h5 class="fw-bolder text-secondary">
							<img src="{{asset('assets/site/images/kaj/user.png')}}" width="30"
								class="border p-1">
							نام و نام خانوادگی
						</h5>
					</div>
					<div class="col-sm-12 p-1">
						<div class="text-justify">
							<h4 class="fw-bolder text-dark">
{{--								عنوان سوال آزمایشی یک--}}
							</h4>
							<p class="m-0">
                                {{$row->question}}
							</p>
						</div>
					</div>
				</div>
			</button>
		</h2>
		<div id="collapseOne{{$row->id}}" class="accordion-collapse collapse @if($key == 0) show @endif" aria-labelledby="headingOne{{$row->id}}"
			data-bs-parent="#accordionExample">
			<div class="accordion-body">
				<h5 class="text-one fw-bolder">
					پاسخ :
				</h5>
				<div class="">
					<p class="m-0">
                        {{$row->answer}}
					</p>
				</div>
			</div>
		</div>
	</div>
    @endforeach
</div>
