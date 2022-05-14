@foreach($data as $row2)
    @if($row2->taggable_type == "App\Models\Category")
        @php  $cats = \App\Models\Category::where('id',$row2->taggable_id)->get();
        @endphp
@foreach($cats as $cat)
<div class="col-xxl-2 p-1">
	<div class="product-cat">
		<div class="card border-0 rounded-0 p-1">
			<a href="https://www.kaajshop.com/cat/63">
				<div class="position-relative">
					<img src="https://www.kaajshop.com/assets/uploads/content/cat/154soorat.jpg" alt="صورت"
						class="w-100 h-auto">
					<div class="over">
						صورت
					</div>
				</div>
			</a>
		</div>
	</div>
</div>
@endforeach
    @endif
@endforeach
