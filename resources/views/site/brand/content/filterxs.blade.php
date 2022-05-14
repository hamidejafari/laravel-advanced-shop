<div class="product-list">
	<div class="sidebar">
		<div class="accordion" id="accordionFilter">
			<div class="row w-100 m-0">
                <div class="col-sm-12 p-list-custom">
                    <div class="accordion-item bg-white">
                        <h2 class="accordion-header" id="heading1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                فیلتر بر اساس قیمت
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1"
                             data-bs-parent="#accordionFilter">
                            <div class="accordion-body">
                                <div class="range-box">
                                    <p class="d-flex align-items-center justify-content-between">
                                        <small class="text-end">
                                            تومان
                                        </small>
                                        <input dir="ltr" type="text" id="amountxs" class="form-control border-0 p-0 text-center w-50">
                                        <small class="text-start">
                                            تومان
                                        </small>
                                    </p>
                                    <div id="slider-range-xs"></div>
                                    <div class="d-flex align-items-center justify-content-between pt-4">
                                        <button @click="filterBrands()" type="button" class="btn btn-success w-100" data-bs-dismiss="modal" aria-label="Close">
                                            اعمال فیلتر قیمت
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

				<div class="col-sm-12 p-list-custom">
					<div class="accordion-item bg-white">
						<h2 class="accordion-header" id="heading3">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
								data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                فیلتر بر اساس دسته بندی
							</button>
						</h2>
						<div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
							data-bs-parent="#accordionFilter">
							<div class="accordion-body">

                                <input type="search" name="" v-on:keyup="searchInCats" id="" class="form-control mb-2"
                                       placeholder="جستجوی دسته، مثلا : سرم" v-model="searchValue">


								<div class="py-0">

                                        <div class="form-check" v-for="item2 in catSearch">
                                            <input class="form-check-input" type="checkbox" :value="item2.id"  @change="filterBrands()" v-model="selected4">
                                            <label class="form-check-label ms-1" >
                                                @{{ item2.title }}
                                            </label>
                                        </div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
