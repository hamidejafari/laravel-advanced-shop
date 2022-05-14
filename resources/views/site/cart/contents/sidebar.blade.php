<div class="position-sticky sticky-cart">
    <div class="card p-1 border-0 rounded-0 mb-2">
        <ul class="p-0 m-0">
            <li class="list-unstyled p-1">
                @include('site.cart.contents.addresses')
            </li>
        </ul>
    </div>
    @if(\Illuminate\Support\Facades\Auth::check())

    @if(@$currentOrder->address_id !== null)
        <div class="card p-3 border-0 rounded-0 mb-2" v-if ="order.city_id !== 246">
            <select v-model="changePost1" class="form-select" aria-label="انتخاب روش ارسال"  required  oninvalid='swal("", "انتخاب نوع روش ارسال اجباری است", "error")'>
                <option value="" selected>
                    انتخاب روش ارسال
                </option>
                <option value="1|20000|20,000 تومان" >
                    پیشتاز
                </option>
                <option v-if ="order.city_id !== 452 && order.city_id !== 449 && order.city_id !== 320" value="2|0|پرداخت در مقصد طبق تعرفه تیپاکس" >
                    تیپاکس
                </option>


                <option v-if="order.city_id == 158"  value="3|25000|25,000 تومان" >
                    هوایی
                </option>
            </select>
            <p v-if="'3|25000|25,000 تومان'== changePost1">
                محدوده تحویل فقط شمال غرب-غرب و مرکز می باشد. در صورتی که خارج از محدوده باشید ممکن هست تا ۸۰ هزار از شما هزینه اضافی اخذ گردد.
            </p>
        </div>


        <div class="card p-3 border-0 rounded-0 mb-2" v-else>
            <select  v-model="changePost1" class="form-select" name="post_type" aria-label="انتخاب روش ارسال" required  oninvalid='swal("", "انتخاب نوع روش ارسال اجباری است", "error")'>
                <option value="" selected>
                    انتخاب روش ارسال

                </option>

                <option    v-if ="cartPayment > 1000000" selected  value="4|0|0" >
                    پیک
                </option>

                <option  v-else selected value="4|10000|10,000 تومان" >
                    پیک
                </option>

            </select>
        </div>
        <input name="post_type" type="hidden" :value="changePost2" />

    @endif

    @endif
    <div class="card p-2 border-0 rounded-0">
        <ul class="p-0 m-0">
            <li class="list-unstyled p-1">
                <div class="m-0 d-flex align-items-center justify-content-between text-secondary">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-tag d-flex me-2"></i>
                        قیمت محصولات (تعداد: @{{ cartTotal }})
                    </div>
                    <span>
						@{{ cartSumPrice }} تومان
					</span>
                </div>
            </li>
            {{--			<li class="list-unstyled p-1">--}}
            {{--				<div class="m-0 d-flex align-items-center justify-content-between text-secondary">--}}
            {{--					<div class="d-flex align-items-center">--}}
            {{--						<i class="bi bi-percent d-flex me-2"></i>--}}
            {{--						تخفیف کالا ها--}}
            {{--					</div>--}}
            {{--					<span class="text-danger">--}}
            {{--						۱۵۰،۰۰۰ تومان (۱۳٪)--}}
            {{--					</span>--}}
            {{--				</div>--}}
            {{--			</li>--}}
            <li class="list-unstyled p-1">
                <div class="m-0 d-flex align-items-center justify-content-between text-secondary">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-truck d-flex me-2"></i>
                        هزینه ارسال
                    </div>
                    <span>
					@{{ selectedPost }}
					</span>
                    <input type="hidden" name="post_price" :value="selectedPost2">

                </div>
            </li>
            <li class="list-unstyled px-1 py-3">
                <div class="row w-100 m-0 border">
                    <div class="col-lg-8 col-md-12 col-sm-9 col-xs-9 p-0">
                        <input name="code" v-model="discountCode" placeholder="کد تخفیف  خود را وارد کنید...."
                               class="p-1 form-control rounded-0 border-0 h-100" />
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-3 col-xs-3 p-0">
                        <button @click="addDiscount" type="button" class="btn btn-shop w-100 rounded-0">
                            اعمال کد
                        </button>
                    </div>
                </div>
            </li>
            <hr class="my-1">
            <li class="list-unstyled p-1">
                <div class="m-0 text-dark fw-bolder">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-tag d-flex me-2"></i>
                            مبلغ قابل پرداخت
                        </div>
                        <p class="m-0">
                            @{{ cartPayment + selectedPost2 }} تومان

                        </p>
                    </div>
                    {{--					<p class="mt-2 mb-0 text-center text-danger fw-lighter">--}}
                    {{--						({{'با احتساب '.$setting_header->tax.' درصد مالیات با ارزش افزوده'}})--}}
                    {{--					</p>--}}
                </div>
            </li>
        </ul>
        <button type="submit" class="btn btn-success btn-lg mt-2 d-md-block d-sm-none d-xs-none">
            ادامه فرایند خرید
        </button>
        <div class="d-md-none d-sm-block d-xs-block position-fixed end-0 start-0 py-2 px-4 bg-white shadow" style="bottom:4rem;z-index:9999;">
            <button type="submit" class="btn btn-success btn-lg m-0 w-100" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">
                ادامه فرایند خرید
            </button>
        </div>
    </div>
</div>
