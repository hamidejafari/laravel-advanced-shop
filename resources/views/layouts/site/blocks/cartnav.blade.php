<div class="cartnav position-absolute shadow-sm p-1" v-if="cartItems.length > 0">
	<div class="col-xl-12 px-1 py-1" v-for="cartItem in cartItems">
		<a href="">
			<div class="card border-0 bg-light rounded-0">
				<div class="row w-100 m-0">
					<div class="col-xl-3 align-self-center p-1">
						<figure>
							<div class="inn">
								<img :src="cartItem.productImage" :alt="cartItem.productTitle" class="w-100 text-center">
							</div>
						</figure>
					</div>
					<div class="col-xl-9 text-start align-self-center p-1">
						<p class="title text-start my-1">
							@{{ cartItem.productTitle }}
						</p>
						<p class="price text-start my-1">
							<span>
								تعداد : @{{ cartItem.productQuantity }}
							</span>
							<span class="text-success">
								@{{ cartItem.itemPrice }} تومان
							</span>
						</p>
					</div>
				</div>
			</div>
		</a>
	</div>

	<div class="col-xl-12 px-1 py-1">
		<a href="{{route('site.cart.checkout')}}" class="btn w-100 fw-bolder">
			<i class="bi bi-cart2 me-2"></i>
			مشاهده سبد خرید
		</a>
	</div>
</div>