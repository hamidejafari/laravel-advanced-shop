<div class="col-sm-12 p-0">
    <div class="d-flex align-items-center justify-content-center my-2 df rounded-0">
        @if($product->colors->count() != 0)

            <div class="colors-s mx-auto w-70 pe-1">
                <select name="specification_id" v-model="selectedColor2" class="form-select h-100 border rounded-0"
                        id="floatingSelect" aria-label="مشخصه">
                    <option value="">انتخاب {{@$product->specification_title ? $product->specification_title : @$product->category[0]->specification_title}}</option>
                    @foreach($product->colors as $sp)
                        <option  value="{{$sp->id.'|'.$sp->prices[0]->price.'|'.$sp->stock_count.'|'.$sp->prices[0]->old_price}}">
                            {{@$sp->productSpecificationValue->title}}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="input-number-box w-30 ps-1">
            <div class="qty d-flex align-items-center rounded-0 border">
				<span class="minus rounded-0 text-dark bg-one h-100">
					<i class="bi bi-dash"></i>
				</span>
                <input type="number" class="count form-control rounded-0 text-center mx-auto" id="quantity"
                       name="quantity" v-model="quantity" min="1">
                <span class="plus rounded-0 text-dark bg-one h-100">
					<i class="bi bi-plus"></i>
				</span>
            </div>
        </div>
    </div>
</div>
