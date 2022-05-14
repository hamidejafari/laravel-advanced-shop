<div class="row w-100 m-0 filter-top">
	<div class="col-xl col-lg-3 col-md-3 col-sm-6 col-xs-6 p-list-custom">
		<div class="card border-0 rounded-0">
			<div class="form-check form-switch">
				<label class="form-check-label fw-bolder" for="Switch1">
					کالاهای موجود
				</label>
				<input class="form-check-input input-filter m-0" type="checkbox" id="Switch1" @change="filterProducts()" v-model = "available">
			</div>
		</div>
	</div>
{{--	<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-list-custom">--}}
{{--		<div class="card border-0 rounded-0">--}}
{{--			<div class="form-check form-switch">--}}
{{--				<label class="form-check-label fw-bolder" for="Switch2">--}}
{{--					تخفیف دارها--}}
{{--				</label>--}}
{{--				<input class="form-check-input m-0" type="checkbox" id="Switch2" @change="filterProducts()" v-model = "discount">--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
    <div class="col-xl col-lg-3 col-md-3 col-sm-6 col-xs-6 p-list-custom">
        <div class="card border-0 rounded-0">
            <div class="form-check form-switch">
                <label class="form-check-label fw-bolder" for="Switch3">
                    شگفت انگیزها
                </label>
                <input class="form-check-input input-filter m-0" type="checkbox" id="Switch3" @change="filterProducts()" v-model = "timer">
            </div>
        </div>
    </div>
    <div class="col-xl col-lg-3 col-md-3 col-sm-6 col-xs-6 p-list-custom">
        <div class="card border-0 rounded-0">
            <div class="form-check form-switch">
                <label class="form-check-label fw-bolder" for="Switch4">
                    پرفروشترین
                </label>
                <input class="form-check-input m-0" value="most" type="radio" name="Switch4"  id="Switch4" @change="filterProducts()" v-model = "sortBy">
            </div>
        </div>
    </div>
    <div class="col-xl col-lg-3 col-md-3 col-sm-6 col-xs-6 p-list-custom">
        <div class="card border-0 rounded-0">
            <div class="form-check form-switch">
                <label class="form-check-label fw-bolder" for="Switch4">
                    ارزانترین
                </label>
                <input class="form-check-input m-0" value="cheapest" type="radio" name="Switch4"  id="Switch5" @change="filterProducts()" v-model = "sortBy">
            </div>
        </div>
    </div>
    <div class="col-xl col-lg-3 col-md-3 col-sm-6 col-xs-6 p-list-custom">
        <div class="card border-0 rounded-0">
            <div class="form-check form-switch">
                <label class="form-check-label fw-bolder" for="Switch4">
                    گرانترین
                </label>

                <input class="form-check-input m-0" value="expensive" type="radio" name="Switch4"  id="Switch6" @change="filterProducts()" v-model = "sortBy">
            </div>
        </div>
    </div>
    <div class="col-xl col-lg-3 col-md-3 col-sm-6 col-xs-6 p-list-custom">
        <div class="card border-0 rounded-0">
            <div class="form-check form-switch">
                <label class="form-check-label fw-bolder" for="Switch4">
                    محبوبترین
                </label>
                <input class="form-check-input m-0" value="like" type="radio" name="Switch4" id="Switch7" @change="filterProducts()" v-model = "sortBy">
            </div>
        </div>
    </div>
</div>
