@foreach($data as $row)
    @if($row->taggable_type == "App\Models\Product")
        @php  $products = \App\Models\Product::where('id',$row->taggable_id)->get();
        @endphp
        @foreach($products as $pro)
<div class="col-xxl-2 col-xs-6 p-1">
    @include('layouts.site.blocks.product-box',['item' => $pro])
</div>
        @endforeach
    @endif
@endforeach
