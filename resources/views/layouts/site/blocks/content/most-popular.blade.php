<section id="demos">
	<div class="row">
		<div class="large-12 px-1 columns">
			<div class="owl-carousel-most owl-theme my-0">
                @foreach($most_products as $most)
                    @php
                        $in = App\Models\InventoryReceipt::where('product_id',$most->id)->orderBy('id','DESC')->In()->sum('count');
                           $out = App\Models\InventoryReceipt::where('product_id',$most->id)->orderBy('id','DESC')->Out()->sum('count');
                              $mine = intval($in-$out) > 0 ?   intval($in-$out) : '0';
                    @endphp
                    @if($mine != 0)
				<div class="item p-0">
					@include('layouts.site.blocks.product-box',['item' => $most])
				</div>
                    @endif
                @endforeach
			</div>
		</div>
	</div>
</section>
