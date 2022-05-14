@foreach($data as $row3)
    @if($row3->taggable_type == "App\Models\Brand")
        @php  $brands = \App\Models\Brand::where('id',$row3->taggable_id)->get();
        @endphp
@foreach($brands as $brand)
<div class="col-xxl-2 p-1">
	<div class="item">
		<a href="{{route('site.brand.detail',['id'=>$brand->id])}}">
			<img srcset="{{$brand->brand_image}} 2x, {{$brand->brand_image}} 1x"
				src="{{$brand->brand_image}}" alt="{{$brand->title}}" />
		</a>
	</div>
</div>
@endforeach
    @endif
@endforeach
