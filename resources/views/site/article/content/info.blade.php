<div class="card rounded-0 border-0 p-3">
	<h1 class="fw-bolder text-center ismb h2">
		{{@$blog->title}}
	</h1>
	<div class="col-xxl-7 col-xl-8 col-lg-9 col-sm-10 col-xs-12 mx-auto px-0 pb-3">
		<img src="{{asset('assets/uploads/content/art/big/'.$blog->image)}}" alt="{{@$blog->title}}" class="w-100">
	</div>
	<div class="col-sm-12 p-0">
		<div class="description text-justify">
			<p>
				{!! $blog->description !!}
			</p>
		</div>
	</div>
</div>