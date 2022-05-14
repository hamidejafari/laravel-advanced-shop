@foreach($data as $row4)
    @if($row4->taggable_type == "App\Models\Content")
        @php  $blogs = \App\Models\Content::where('id',$row4->taggable_id)->get();
        @endphp
        @foreach($blogs as $blog)
<div class="col-xxl-3 p-1">
	<a href="{{route('site.blog.detail',['id'=>$blog->id])}}">
		<div class="card rounded-0">
			<div class="imgbox">
				<img srcset=" {{asset('assets/uploads/content/art/medium/'.@$blog->image)}} 2x, {{asset('assets/uploads/content/art/medium/'.@$blog->image)}} 1x"
					src="{{asset('assets/uploads/content/art/medium/'.@$blog->image)}}"
					alt="{{$blog->title}}">
			</div>
			<h4>
                {{$blog->title}}
			</h4>
			<div class="caption">
				<p>
                    {!! strip_tags(\Illuminate\Support\Str::limit($blog->description,200)) !!}
				</p>
			</div>
			<div class="ic mt-2">
				<ul class="p-0 m-0">
					<li class="float-end list-unstyled ms-4">
						<p class="m-0 d-flex align-items-center text-secondary">
                            {{$blog->view}}
							<i class="bi bi-eye text-one d-flex ms-2"></i>
						</p>
					</li>
				</ul>
			</div>
		</div>
	</a>
</div>
        @endforeach
    @endif
@endforeach
