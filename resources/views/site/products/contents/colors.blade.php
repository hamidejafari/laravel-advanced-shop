@php
    $c=@$product->category[0]->specification_title;
@endphp
<h4 class="text-dark h5 fw-bolder my-3">
    انتخاب @if($product->specification_title != null)
        {{$product->specification_title}}
    @else
        {{@$c}}
    @endif محصول :
</h4>
<div class="nav nav-pills itemcolors" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    @foreach($product->colors as $color)
        @if(@$color->stock_count != 0)

            @if($color->color != null)
                <button @if($color->image == null)
                        style="background:{{@$color->color}};"
                        @endif
                        class="nav-link rounded-0 border p-0 m-0 position-relative
                    @if($loop->first)
                            active
@endif"
                        id="v-pills-{{$color->id}}-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#v-pills-{{$color->id}}"
                        type="button"
                        role="tab"
                        aria-controls="v-pills-{{$color->id}}"
                        aria-selected="true"
                        @click="changeColor('{{@$color->id}}','{{@$color->prices[0]->price}}','{{@$color->stock_count}}','{{@$color->prices[0]->old_price}}')">

                    <span class="bg-color d-flex" style="background:{{@$color->color}};"></span>
                </button>
            @else
                <button @if($color->image == null)
                        style="background:{{@$color->color}};"
                        @endif
                        class="nav-link rounded-0 border p-0 m-0 position-relative
                    @if($loop->first)
                            active
@endif"
                        id="v-pills-{{$color->id}}-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#v-pills-{{$color->id}}"
                        type="button"
                        role="tab"
                        aria-controls="v-pills-{{$color->id}}"
                        aria-selected="true"
                        @click="changeColor('{{@$color->id}}','{{@$color->prices[0]->price}}','{{@$color->stock_count}}','{{@$color->prices[0]->old_price}}')">
                    @if($color->product_specification_type_id == 2)
                        {!! $color->productSpecificationValue->title !!}
                    @else
                        <img src="{{asset('assets/uploads/content/pro/big/'.@$color->image)}}"/>
                    @endif


                </button>
            @endif
        @else
            @if($color->color != null)
                <button class="nav-link notal rounded-0 border p-0 m-0 position-relative"
                        style="background:{{@$color->color}};"
                        id="v-pills{{$color->id}}tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{$color->id}}"
                        type="button"
                        role="tab" aria-controls="v-pills-{{$color->id}}" aria-selected="true"
                        @click="changeColor('{{@$color->id}}','{{@$color->prices[0]->price}}','{{@$color->stock_count}}','{{@$color->prices[0]->old_price}}')">
                <span class="bg-color d-flex align-items-center justify-content-center"
                      style="background:{{@$color->color}};">
                    <i class="bi bi-x-lg d-flex text-white" style="font-size: 2rem;"></i>
                </span>
                    <div class="position-absolute al py-1 px-3 bg-dark">
                        نا موجود
                    </div>
                </button>
            @else
                <button class="nav-link notal rounded-0 border p-0 m-0 position-relative" id="v-pills{{$color->id}}tab"
                        data-bs-toggle="pill" data-bs-target="#v-pills-{{$color->id}}" type="button" role="tab"
                        aria-controls="v-pills-{{$color->id}}" aria-selected="true"
                        @click="changeColor('{{@$color->id}}','{{@$color->prices[0]->price}}','{{@$color->stock_count}}','{{@$color->prices[0]->old_price}}')">
                    <div class="position-relative">
                        @if($color->product_specification_type_id == 2)
                            {!! $color->productSpecificationValue->title !!}
                        @else
                            <img src="{{asset('assets/uploads/content/pro/big/'.@$color->image)}}"/>
                        @endif
                        <i class="bi bi-x-lg d-flex position-absolute top-0 bottom-0 end-0 start-0"
                           style="font-size: 2rem;color:rgb(151, 151, 151)"></i>
                    </div>
                    <div class="position-absolute al py-1 px-3 bg-dark">
                        نا موجود
                    </div>
                </button>
            @endif
        @endif
    @endforeach
</div>
