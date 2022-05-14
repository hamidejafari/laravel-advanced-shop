<h1 class="d-md-block d-sm-none d-xs-none mb-0">
    {{@$product->title}}
    <br>
</h1>
<h5 class="d-md-block d-sm-none d-xs-none text-secondary">
    {{@$product->title_en}}
</h5>
<div class="d-md-block d-sm-none d-xs-none">
    <div class="d-flex align-items-center rate-comm bell py-2">
        @include('site.products.contents.rate-comm')
    </div>
</div>
<div class="attributes">
    @if(count($top_properties) > 0)
        <h4 class="text-one fw-bolder m-0">
            ویژگی های محصول
        </h4>
    @endif
    <div class='limit-items'>
        <input type='checkbox' id='show-all'>
        <label for='show-all' class='text-show'>بیشتر بخوانید </label>
        <label for='show-all' class='text-hide'>بستن</label>
        <div class='items'>
            <ul class="m-0 px-3 py-1 ">

                @foreach($top_properties as $top_prop)
                    @if(strlen($top_prop->description) > 2)
                        <li class="text-one py-1">
                            <p class="m-0 text-dark">
                                {!! $top_prop->description !!}
                            </p>
                        </li>
                    @endif
                @endforeach


            </ul>

        </div>
    </div>
</div>
