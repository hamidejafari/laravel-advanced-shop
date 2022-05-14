<div class="border bg-light shadow-sm p-2">
    <h4 class="fw-boldeer border-bottom h5 pb-2">
      وضعیت سفارش مورد نظر شما
        <span class="text-danger">
               {{@$order->orderstatus->title}}
        </span>
        می باشد
    </h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-secondary">
            <tr>
                <th class="text-center" scope="col">
                    #
                </th>
                <th class="text-center" scope="col">
                    شماره سفارش
                </th>
                <th class="text-center" scope="col">
                    تاریخ ثبت سفارش
                </th>
                <th class="text-center" scope="col">
                    مبلغ قابل پرداخت
                </th>
                <th class="text-center" scope="col">
                    مبلغ کل
                </th>
                <th class="text-center" scope="col">
                    عملیات پرداخت
                </th>
                <th class="text-center" scope="col">
                    جزییات
                </th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <th class="text-center text-secondary" scope="row">
                        1
                    </th>
                    <td class="text-center text-secondary">
                        {{@$order->id}}
                    </td>
                    <td class="text-center text-secondary">
                        {!! $order->order_date !!}
                    </td>
                    <td class="text-center text-secondary">
                        {{number_format(@$order->payment)}}
                    </td>
                    <td class="text-center text-secondary">
                        {{number_format(@$order->total_prices)}}
                    </td>
                    <td class="text-center text-secondary">
                        {{@$order->orderstatus->title}}
                    </td>
                    <td class="text-center text-secondary">
                        <a href="{{route('panel.order.details',['id'=>$order->id])}}"
                           class="btn btn-outline-secondary max-content mx-auto rounded-0 d-flex align-items-center justify-content-center">
                            <i class="bi bi-eye-fill d-flex"></i>
                        </a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
