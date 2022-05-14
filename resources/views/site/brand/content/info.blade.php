<div class="">
	<div class="row w-100 m-0">
		<div class="col-xxl-3 col-lg-3 col-md-4 col-sm-4 col-xs-12 p-0">
			<div class="row w-100 m-0">
				<div class="col-sm-12 d-md-block d-sm-none d-xs-none p-1">
					<div class="figure">
						<div class="card rounded-0 border-0 p-1">
							<img src="{{$brand->brand_image}}" alt="{{@$brand->title}}" class="text-secondary">
						</div>
					</div>
				</div>
				<div class="col-sm-12 p-0 d-md-block d-sm-none d-xs-none">
					@include('site.brand.content.filter')
				</div>
			</div>
		</div>
		<div class="col-xxl-9 col-lg-9 col-md-8 col-sm-8 col-xs-12 p-0">
			<div class="row w-100 m-0">
                <div class="col-sm-12 p-1">
                    <div class="card rounded-0 border-0 p-3 ">
                        <div class="row w-100 m-0">
                            <div class="col-md-12 col-sm-8 col-xs-8 align-self-center">
                                <h1 class="ismb text-one h2 mt-2 mb-0">
                                    {{@$brand->title}}
                                </h1>
                            </div>
                            <div class="col-sm-4 col-xs-4 align-self-center">
                                <div class="d-md-none d-sm-block d-xs-block">
                                    <img src="{{asset('assets/site/images/arcancil.png')}}" class="w-100 br-xs">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				@if(@$brand->description != null)
					<div class="col-sm-12 p-1">
						<div class="card rounded-0 border-0 p-3 figure-sc ">
							<div class="text-justify desc">
								{!! @$brand->description !!}
							</div>
						</div>
					</div>
				@endif
				<div class="col-sm-6 d-md-none d-sm-block d-xs-block col-xs-6 p-1">
					<!-- Button trigger modal -->
					<button type="button"
						class="btn btn-light rounded-0 shadow-sm d-flex align-items-center justify-content-between w-100"
						data-bs-toggle="modal" data-bs-target="#filterbrModal">
						<i class="bi bi-funnel d-flex"></i>
						فیلتر برندها
					</button>

					<!-- Modal -->
					<div class="modal fade" id="filterbrModal" tabindex="-1" aria-labelledby="filterbrModalLabel"
						aria-hidden="true">
						<div class="modal-dialog modal-fullscreen">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="filterbrModalLabel">فیلتر برندها</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body bg-light">
									@include('site.brand.content.filterxs')
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 d-md-none d-sm-block d-xs-block col-xs-6 p-1">
					<!-- Button trigger modal -->
					<button type="button"
						class="btn btn-light rounded-0 shadow-sm d-flex align-items-center justify-content-between w-100"
						data-bs-toggle="modal" data-bs-target="#filterbrsModal">
						<i class="bi bi-sort-down-alt d-flex"></i>
						مشاهده بر اساس
					</button>

					<!-- Modal -->
					<div class="modal fade" id="filterbrsModal" tabindex="-1" aria-labelledby="filterbrsModalLabel"
						aria-hidden="true">
						<div class="modal-dialog modal-fullscreen">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="filterbrsModalLabel">Modal title</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body bg-light">
									<div class="row w-100 m-0 filter-top">
										<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
											<div class="card border-0 rounded-0">
												<div
													class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
													<label class="form-check-label fw-bolder"
														for="Switch1">
														کالاهای موجود
													</label>
													<input class="form-check-input m-0" type="checkbox"
														id="Switch1" @change="filterBrands()"
														v-model="available">
												</div>
											</div>
										</div>
										<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
											<div class="card border-0 rounded-0">
												<div
													class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
													<label class="form-check-label fw-bolder"
														for="Switch3">
														شگفت انگیزها
													</label>
													<input class="form-check-input m-0" type="checkbox"
														id="Switch3" @change="filterBrands()"
														v-model="timer">
												</div>
											</div>
										</div>
										<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
											<div class="card border-0 rounded-0">
												<div
													class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
													<label class="form-check-label fw-bolder"
														for="Switch4">
														پرفروشترین
													</label>
													<input class="form-check-input m-0" value="most"
														type="radio" name="Switch4" id="Switch4"
														@change="filterBrands()" v-model="sortBy">
												</div>
											</div>
										</div>
										<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
											<div class="card border-0 rounded-0">
												<div
													class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
													<label class="form-check-label fw-bolder"
														for="Switch4">
														ارزانترین
													</label>
													<input class="form-check-input m-0" value="cheapest"
														type="radio" name="Switch4" id="Switch5"
														@change="filterBrands()" v-model="sortBy">
												</div>
											</div>
										</div>
										<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
											<div class="card border-0 rounded-0">
												<div
													class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
													<label class="form-check-label fw-bolder"
														for="Switch4">
														گرانترین
													</label>
													<input class="form-check-input m-0" value="expensive"
														type="radio" name="Switch4" id="Switch6"
														@change="filterBrands()" v-model="sortBy">
												</div>
											</div>
										</div>
										<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
											<div class="card border-0 rounded-0">
												<div
													class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
													<label class="form-check-label fw-bolder"
														for="Switch4">
														محبوبترین
													</label>
													<input class="form-check-input m-0" value="like"
														type="radio" name="Switch4" id="Switch7"
														@change="filterBrands()" v-model="sortBy">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 d-md-block d-sm-none d-xs-none p-0">
					<div class="row w-100 m-0 filter-top">
						<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
							<div class="card border-0 rounded-0">
								<div
									class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
									<label class="form-check-label fw-bolder" for="Switch1">
										کالاهای موجود
									</label>
									<input class="form-check-input m-0" type="checkbox" id="Switch1"
										@change="filterBrands()" v-model="available">
								</div>
							</div>
						</div>
						<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
							<div class="card border-0 rounded-0">
								<div
									class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
									<label class="form-check-label fw-bolder" for="Switch3">
										شگفت انگیزها
									</label>
									<input class="form-check-input m-0" type="checkbox" id="Switch3"
										@change="filterBrands()" v-model="timer">
								</div>
							</div>
						</div>
						<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
							<div class="card border-0 rounded-0">
								<div
									class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
									<label class="form-check-label fw-bolder" for="Switch4">
										پرفروشترین
									</label>
									<input class="form-check-input m-0" value="most" type="radio"
										name="Switch4" id="Switch4" @change="filterBrands()" v-model="sortBy">
								</div>
							</div>
						</div>
						<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
							<div class="card border-0 rounded-0">
								<div
									class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
									<label class="form-check-label fw-bolder" for="Switch4">
										ارزانترین
									</label>
									<input class="form-check-input m-0" value="cheapest" type="radio"
										name="Switch4" id="Switch5" @change="filterBrands()" v-model="sortBy">
								</div>
							</div>
						</div>
						<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
							<div class="card border-0 rounded-0">
								<div
									class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
									<label class="form-check-label fw-bolder" for="Switch4">
										گرانترین
									</label>
									<input class="form-check-input m-0" value="expensive" type="radio"
										name="Switch4" id="Switch6" @change="filterBrands()" v-model="sortBy">
								</div>
							</div>
						</div>
						<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
							<div class="card border-0 rounded-0">
								<div
									class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
									<label class="form-check-label fw-bolder" for="Switch4">
										محبوبترین
									</label>
									<input class="form-check-input m-0" value="like" type="radio"
										name="Switch4" id="Switch7" @change="filterBrands()" v-model="sortBy">
								</div>
							</div>
						</div>
					</div>
				</div>
				@include('site.products.contents.products')
			</div>
		</div>
	</div>
</div>
