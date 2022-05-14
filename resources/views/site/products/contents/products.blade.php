<div class="col-xxl-12 p-1 p-list-custom">
	<div class="card border-0 p-2 rounded-0">
		<div class="row w-100 m-0">
			<template v-if="loading2 === true">
				<div class="d-flex justify-content-center py-5 my-5">
					<div class="spinner-border" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
				</div>
			</template>
			<template v-if="loading2 === false">
				<div class="proli-col p-1 pros-col" v-for="(product,index) in sortedProducts">
					<div class="card card-pro"  >

						<div class="overlay-top">
							<ul class="p-0 m-0">
								{{--							<li class="float-start list-unstyled">--}}
								{{--                                <!-- Dislike 👎 -->--}}
								{{--                                    <button class="btn" v-if="product.like == true" @click="getLike(false,product.id)">--}}
								{{--                                        <i class="bi bi-heart-fill text-danger"></i>--}}
								{{--                                    </button>--}}
								{{--                                <!-- Like 👍 -->--}}
								{{--                                    <button class="btn" v-else @click="getLike(true,product.id)">--}}
								{{--                                        <i class="bi bi-heart"></i>--}}
								{{--                                    </button>--}}
								{{--							</li>--}}
							</ul>
							<div class="sp-discount" v-if="product.old_price !== '0 تومان ' && product.stock !== 0">
								<p class="m-0">
									تخفیف ویژه
								</p>
							</div>
						</div>
						<a :href="product.url">
							<div class="bxs">
								<figure class="m-0">
									<div class="figure-inn">
										<img :data-src="product.image" :src="product.image" class="swiper-lazy" loading="lazy" :alt="product.title"/>
									</div>
								</figure>
								<h4 class="text-dark">
									@{{ product.title }}
								</h4>
								<div class="price">
									<div v-if="product.old_price !== '0 تومان ' && product.stock !== 0" class="old text-secondary">
										<del>
											@{{ product.old_price }}
										</del>
									</div>
									<div class="off" v-if="product.calcute > 0 && product.stock !== 0">
										<span class="badge bg-one text-dark fw-bolder">
											@{{ product.calcute }}%
										</span>
									</div>
								</div>
								<p class="prc fw-bolder" v-if="product.stock == 0">
									ناموجود
								</p>
								<p class="prc fw-bolder" v-else>
									@{{ product.price }}
								</p>
								<div class="colors" v-if="product.colorcount > 0 && product.stock !== 0">
									<p class="m-0">
										در @{{ product.colorcount }} @{{ product.type }}
									</p>
									<ul class="p-0 m-0">
										<li class="list-unstyled float-end dot-color" v-for="color in product.colors">
											<span :style="color.color"></span>
										</li>
									</ul>
								</div>
							</div>
						</a>
					</div>
				</div>
{{--                <div  v-observe-visibility="lazyTemp()"></div>--}}
                <div id="af"></div>
			</template>

            <template v-if="countProduct < sortedProducts.length ">
                <div class="d-flex justify-content-center py-5 my-5">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </template>


		</div>
	</div>
</div>
