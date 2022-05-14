<div class="row w-100 m-0 slogans">
    @foreach($sloagens as $slo)
	<div class="col-xl-2 col-lg-2 p-1">
		<p class="d-flex align-items-center m-0 bg-light rounded-3 overflow-hidden">
			<img src="{{ @$slo->image ? asset('assets/uploads/content/sloagen/'.$slo->image) : asset('assets/site/images/notfound.png')}}" class="p-1">
			{{@$slo->title}}
		</p>
	</div>
    @endforeach
</div>
