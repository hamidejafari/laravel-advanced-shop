<h2 class="fw-bolder h4 text-dark">
	ترکیبات
	<span>
		"{{@$product->title}}"
	</span>
</h2>
@if($product->ingredients != null)
<div class="text-justify des">
    {!! @$product->ingredients !!}
{{--	<ul class="px-3">--}}
{{--		<li class="text-one py-1" style="list-style: arabic-indic;">--}}
{{--			<p class="m-0 text-dark">--}}
{{--				PHENOXYETHANOL--}}
{{--			</p>--}}
{{--		</li>--}}
{{--		<li class="text-one py-1" style="list-style: arabic-indic;">--}}
{{--			<p class="m-0 text-dark">--}}
{{--				ALCOHOL--}}
{{--			</p>--}}
{{--		</li>--}}
{{--		<li class="text-one py-1" style="list-style: arabic-indic;">--}}
{{--			<p class="m-0 text-dark">--}}
{{--				BEHENETH--}}
{{--			</p>--}}
{{--		</li>--}}
{{--		<li class="text-one py-1" style="list-style: arabic-indic;">--}}
{{--			<p class="m-0 text-dark">--}}
{{--				ACRYLATES/ETHYLHEXYL ACRYLATE COPOLYMER--}}
{{--			</p>--}}
{{--		</li>--}}
{{--		<li class="text-one py-1" style="list-style: arabic-indic;">--}}
{{--			<p class="m-0 text-dark">--}}
{{--				CI 77266/BLACK 2 [NANO]--}}
{{--			</p>--}}
{{--		</li>--}}
{{--		<li class="text-one py-1" style="list-style: arabic-indic;">--}}
{{--			<p class="m-0 text-dark">--}}
{{--				BUTYLENE GLYCOL--}}
{{--			</p>--}}
{{--		</li>--}}
{{--		<li class="text-one py-1" style="list-style: arabic-indic;">--}}
{{--			<p class="m-0 text-dark">--}}
{{--				AQUA/WATER/EAU--}}
{{--			</p>--}}
{{--		</li>--}}
{{--		<li class="text-one py-1" style="list-style: arabic-indic;">--}}
{{--			<p class="m-0 text-dark">--}}
{{--				AMINOMETHYL PROPANOL [MS3071A1/01]--}}
{{--			</p>--}}
{{--		</li>--}}
{{--		<li class="text-one py-1" style="list-style: arabic-indic;">--}}
{{--			<p class="m-0 text-dark">--}}
{{--				LAURETH-21--}}
{{--			</p>--}}
{{--		</li>--}}
{{--		<li class="text-one py-1" style="list-style: arabic-indic;">--}}
{{--			<p class="m-0 text-dark">--}}
{{--				SODIUM DEHYDROACETATE--}}
{{--			</p>--}}
{{--		</li>--}}
{{--	</ul>--}}
</div>
@else
<!-- empty -->
<div class="empty h-100 d-flex align-items-center justify-content-center">
	<img src="{{asset('assets/site/images/emptyds.png')}}" alt="توضیحی وجود ندارد" class="w-50 ic">
</div>
@endif
