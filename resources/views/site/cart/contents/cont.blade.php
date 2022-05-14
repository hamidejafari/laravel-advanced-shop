<div class="card p-2 border-0 rounded-0">
	<div class="row w-100 m-0" v-if="cartItems.length > 0">
		<div class="col-xl-6 p-1" v-for="cartItem in cartItems">
			<div class="card rounded-0 p-2">
				<a @click="removeCart(cartItem.productId)" class="btn btn-link text-decoration-none btn-trash p-0">
					<i class="bi bi-trash"></i>
                    حذف
				</a>
                <a class="btn btn-link btn-fav">
                    <i class="bi bi-suit-heart-fill"></i>
                </a>
				{{--				<button @click="removeCart(cartItem.productId)" class="btn btn-link btn-trash">--}}
				{{--					<i class="bi bi-trash"></i>--}}
				{{--				</button>--}}
				<div class="row w-100 m-0">
					<div class="col-xl-3 col-md-2 col-sm-2 col-xs-3 p-1">
					  <a :href="cartItem.productUrl">
						<img :src="cartItem.productImage" style="background-color:#fc8e6d"
							:alt="cartItem.productTitle" class="w-100 text-center">
                        </a>
					</div>
					<div class="col-xl-12 p-1">
						<ul class="p-0 m-0">
							<li class="list-unstyled">
								<h5 class="fw-bolder my-1">
									@{{ cartItem.productTitle }}
								</h5>
								<h6 class="fw-bolder my-1">
									@{{ cartItem.productTitleEn }}
								</h6>
							</li>
							<li class="list-unstyled">
								<p class="m-0 d-flex align-items-center text-secondary">
									<i class="bi bi-tag d-flex me-2"></i>
									قیمت : @{{ cartItem.itemPrice }} تومان
								</p>
							</li>
							<li class="list-unstyled">
								<p class="m-0 d-flex align-items-center text-secondary">
									<i class="bi bi-shield-check d-flex me-2"></i>
									گارانتی اصالت و سلامت فیزیکی کالا
								</p>
							</li>
						</ul>
					</div>
					<div class="input-number-box col-xxl-9 col-xl-10 col-lg-11 col-md-12 col-sm-10 px-0 pt-3">
						<div class="row qty w-100 m-0 rounded-0">
							<div class="col-sm-2 col-xs-2 p-0 rounded-0">
								<span @click="minusQnty(cartItem.id)" class="d-flex align-items-center justify-content-center rounded-0 text-dark h-100" style="cursor: pointer;">
									<i class="bi bi-dash h3 d-flex m-0"></i>
								</span>
							</div>
							<div class="col-sm-4 col-xs-4 p-0 rounded-0">
								<input type="number" class="count form-control rounded-0 text-center mx-auto"
								id="quantity" name="quantity" v-model="cartItem.productQuantity" min="1" />
							</div>
							<div class="col-sm-2 col-xs-2 p-0 rounded-0">
								<span @click="plusQnty(cartItem.id)" class="d-flex align-items-center justify-content-center rounded-0 text-dark h-100" style="cursor: pointer;">
								<i class="bi bi-plus h3 d-flex m-0"></i>
							</span>
							</div>
							<div class="col-sm-4 col-xs-4 p-0 rounded-0">
								<button v-if="specificationId !== null"
									@click="addToCart(cartItem.productId,cartItem.productQuantity,false,cartItem.specificationId)"
									type="button" class="h-100 btn btn-sm btn-shop w-100 rounded-0">
									اعمال
								</button>
								<button v-else
									@click="addToCart(cartItem.productId,cartItem.productQuantity,false,cartItem.specificationId)"
									type="button" class="h-100 btn btn-sm btn-shop w-100 rounded-0">
									اعمال
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="row w-100 m-0 py-5" v-else>
		@include('site.panel.content.empty')
	</div>
</div>
<script>
$(document).ready(function() {
	$('.count').prop('disabled', true);
	$(document).on('click', '.plus', function() {
		$('.count').val(parseInt($('.count').val()) + 1);
	});
	$(document).on('click', '.minus', function() {
		$('.count').val(parseInt($('.count').val()) - 1);
		if ($('.count').val() == 0) {
			$('.count').val(1);
		}
	});
});
</script>
