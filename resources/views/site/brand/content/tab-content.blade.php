<div class="tab-pane fade @if($key == 0) show active @endif " id="pills-{{$letter['title']}}" role="tabpanel" aria-labelledby="pills-{{$letter['title']}}-tab">
    @php
    $splitName = explode('|', $letter['letters']);
    @endphp
	<div class="py-4 px-md-2">
        @foreach($splitName as $row)
		<div class="row w-100 m-0 py-2">
			<div class="col-sm-12 p-1">
				<p class="h1 fw-bolder m-0">
					<i class="bi bi-caret-right text-one h4"></i>
					{!! @$row['title'] !!}
				</p>
			</div>
            @if(@$brands[$row])

                @foreach(array_chunk(@$brands[$row] , 5) as $chunk)
			<div class="col-lg-3 col-md-4 col-sm-6 p-1">
				<ul class="p-0 m-0">

                        @foreach($chunk  as $brand )
                        <li class="list-unstyled">
                            <a href="{{route('site.brand.detail',['id'=>$brand['id']])}}" class="text-dark">
                                {!! $brand['title'] !!}
                            </a>
                        </li>
                        @endforeach


				</ul>
			</div>
                @endforeach
            @endif

		</div>
        @endforeach
	</div>
</div>

