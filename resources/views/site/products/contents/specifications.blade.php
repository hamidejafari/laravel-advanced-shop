<h2 class="fw-bolder h4 text-dark">
    مشخصات
    <span>
		"{{@$product->title}}"
	</span>
</h2>
@if($specifications->count() > 0 || $bottom_properties->count() > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tbody>
            @if($specifications->count() > 0)
                @foreach($specifications as $specs)
                    @php  $check_spf =  \App\Models\ProductSpecification::where('product_specification_value_id',@$specs[0]->id)->where('product_id',$product->id)->first();
                    @endphp

                    @if(@$specs[0]->parent->id !== 1 && $check_spf && count($check_spf->prices) == 0)
                        <tr>
                            <th scope="row" style="width: 19rem;">
                                {{@$specs[0]->parent->title}}
                            </th>
                            <td>
                                <ul class="px-3 py-0 m-0">
                                    @foreach($specs as $spf)
                                        <li class="text-one">
                                <span class="text-dark">

                                    {{@$spf->title}}
                                    @if($spf->pivot->description != '')
                                        ( {{$spf->pivot->description}} )
                                    @endif

                                </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endif
            @if($bottom_properties->count() > 0)
                <tr>
                    <th scope="row">
                        سایر مشخصات
                    </th>
                    <td>
                        <ul class="px-3 py-0 m-0">
                            @foreach($bottom_properties as $bottom_prop)
                                <li class="text-one">
							<span class="text-dark">
								{!! @$bottom_prop->description !!}
							</span>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@else
    <div class="empty h-100 d-flex align-items-center justify-content-center">
        <img src="{{asset('assets/site/images/emptyds.png')}}" alt="توضیحی وجود ندارد" class="w-50 ic">
    </div>
@endif
