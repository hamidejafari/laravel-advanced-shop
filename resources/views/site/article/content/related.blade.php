<div class="side rel sticky position-sticky">
	<div class="row w-100 m-0">
		<div class="col-sm-12 p-1">
			<div class="card rounded-0 border-0 py-1 px-2">
				<p class="m-0 h4">
					مقالات مرتبط
				</p>
			</div>
		</div>
		@foreach($blogs as $relate)
		<div class="col-lg-12 col-md-6 p-1">
			<a href="{{route('site.blog.detail',['id'=>$relate->id])}}">
				<div class="card rounded-0 border-0 p-1">
					<div class="row w-100 m-0">
						<div class="col-sm-3 col-xs-3 align-self-center p-1">
							<img @if(file_exists('assets/uploads/content/art/big/'.$relate->image)) src="{{asset('assets/uploads/content/art/big/'.$relate->image)}}" alt="{{@$relate->title}}" @else src="{{asset('assets/site/images/notfound.png')}}" @endif class="w-100" />
						</div>
						<div class="col-sm-9 col-xs-9 align-self-center p-1">
							<p class="text-dark justify-content-center h6 my-0">
								{{@$relate->title}}
							</p>
						</div>
					</div>
				</div>
			</a>
		</div>
		@endforeach
	</div>
</div>
