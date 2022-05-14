<div class="border bg-light shadow-sm p-2">
    <h4 class="fw-boldeer border-bottom h5 pb-2">
        لیست سفارشات اخیر
    </h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-secondary">
            <tr>
                <th class="text-center" scope="col">
                    #
                </th>
                <th class="text-center" scope="col">
                    اختصاص به
                </th>
                <th class="text-center" scope="col">
                    نوع
                </th>
                <th class="text-center" scope="col">
                    مبلغ
                </th>
                <th class="text-center" scope="col">
                    کد تخفیف
                </th>
                <th class="text-center" scope="col">
                    تاریخ شروع اعتبار
                </th>
                <th class="text-center" scope="col">
                    تاریخ پایان اعتبار
                </th>
                <th class="text-center" scope="col">
                    جزییات
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($discounts as $key => $discount)
                <tr>
                    <th class="text-center text-secondary" scope="row">
                        {{$key+1}}
                    </th>
                    <td class="text-center text-secondary">
                     @if($discount->product_id != null){{@$discount->product->title}}
                        @elseif($discount->category_id != null){{@$discount->category->title}}
                        @else
                        تمامی محصولات
                        @endif
                    </td>
                    <td class="text-center text-secondary">
                        @if($discount->kind == 1)
                            یکبار مصرف
                        @elseif($discount->kind == 2)
                            مناسبتی
                        @endif
                    </td>
                    <td class="text-center text-secondary">
                        @if($discount->type == 1)
                            {{number_format(@$discount->amount)}} درصد
                        @elseif($discount->type == 2)
                            {{number_format(@$discount->amount)}} تومان
                        @endif
                    </td>
                    <td class="text-center text-secondary">
                        {{$discount->code}}
                    </td>
                    <td class="text-center text-secondary">
                        {{  jdate("d F Y", strtotime($discount->from_date)) }}
                    </td>
                    <td class="text-center text-secondary">
                        {{  jdate("d F Y", strtotime($discount->to_date)) }}
                    </td>
                    <td class="text-center text-secondary">
                        {{$discount->used ? 'استفاده شده' : 'استفاده نشده '}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
