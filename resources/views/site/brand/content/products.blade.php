<div class="col-xxl-12 p-1 p-list-custom">
    <div class="card border-0 p-2 rounded-0">
        <div class="row w-100 m-0">
            <template v-if="loading2 === true">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </template>
            <template v-if="loading2 === false">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 p-1 pros-col" v-for="product in sortedProducts">
                    <div class="card card-pro">
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
                            <div class="sp-discount" v-if="product.old_price !== '0 تومان '">
                                <p class="m-0">
                                    تخفیف ویژه
                                </p>
                            </div>
                        </div>
                        <a :href="product.url">
                            <div class="bxs">
                                <img :src="product.image" class="mx-auto w-100 swiper-lazy"
                                     :alt="product.title">
                                <h4 class="text-dark">
                                    @{{ product.title }}
                                </h4>
                                <div class="price">
                                    <div v-if="product.old_price !== '0 تومان '" class="old text-secondary">
                                        <del>
                                            @{{ product.old_price }}
                                        </del>
                                    </div>
                                    <div class="off" v-if="product.calcute > 0">
										<span class="badge bg-one text-dark fw-bolder">
											@{{ product.calcute }}%
										</span>
                                    </div>
                                </div>
                                <p class="prc fw-bolder">
                                    @{{ product.price }}
                                </p>
                                <div class="colors" v-if="product.colorcount > 0">
                                    <p class="m-0">
                                        در @{{ product.colorcount }} رنگ
                                    </p>
                                    <ul class="p-0 m-0">
                                        <li class="list-unstyled float-end dot-color"
                                            v-for="color in product.colors">
                                            <span :style="color.color"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
