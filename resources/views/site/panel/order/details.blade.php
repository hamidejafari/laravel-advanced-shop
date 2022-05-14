@extends('site.panel.master')
@section('content')
    <div class="bg-one panel-head p-2">
        <h1 class="fw-bolder text-white d-flex align-items-center h4 m-0">
            <i class="bi bi-list-check me-2 d-flex h2 my-0"></i>
  سفارش شما
        </h1>
    </div>

    <div class="favorit order-tab h-100 py-1">
        <div class="row w-100 h-100 m-0">
            <div class="col-sm-12 h-100 p-2">

                @if($order->order_status_id == 6)
                    <div class=" text-center">
                        <div class="steps-container">
                            <div class="steps">
                                <div class="steps__item_close z7 ">
                                    ثبت شده
                                </div>
                                <div class="steps__item_close z6">
                                    پرداخت شده
                                </div>
                                <div class="steps__item_close z5 ">
                                    تایید شده و درحال بسته بندی
                                </div>
                                <div class="steps__item_close z4">
                                    ارسال شده
                                </div>
                                <div class="steps__item_close z3">
                                    مسترد شده
                                </div>

                            </div>
                        </div>
                    </div>
                @else
                    <div class=" text-center">
                        <div class="steps-container">
                            <div class="steps">
                                <div class="steps__item z7 @if($order->order_status_id == 2) steps__item--active @endif">
                                    ثبت شده
                                </div>
                                <div class="steps__item z6 @if($order->order_status_id == 3) steps__item--active @endif">
                                    پرداخت شده
                                </div>
                                <div class="steps__item z5 @if($order->order_status_id == 4) steps__item--active @endif">
                                    تایید شده و درحال بسته بندی
                                </div>
                                <div class="steps__item z4 @if($order->order_status_id == 5) steps__item--active @endif">
                                    ارسال شده
                                </div>
                                @if($order->order_status_id == 10)
                                    <div class="steps__item z3 @if($order->order_status_id == 10) steps__item--active @endif">
                                        لغو شده
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-5 col-sm-12 p-2">
            <div class="border bg-light shadow-sm p-2">
                <h4 class="fw-boldeer border-bottom h5 pb-2">
                    اطلاعات شخصی
                </h4>
                <ul class="p-0 m-0">
                    <li class="list-unstyled py-1">
                        <p class="m-0 d-flex align-items-center justify-content-between">
                            نام :
                            <span class="fw-bolder">
							{!! @$user->name !!}
						</span>
                        </p>
                    </li>
                    <li class="list-unstyled py-1">
                        <p class="m-0 d-flex align-items-center justify-content-between">
                            نام خانوادگی :
                            <span class="fw-bolder">
							{!! @$user->family !!}
						</span>
                        </p>
                    </li>
                    <li class="list-unstyled py-1">
                        <p class="m-0 d-flex align-items-center justify-content-between">
                            شماره تلفن :
                            <span class="fw-bolder">
							{!! @$user->mobile !!}
						</span>
                        </p>
                    </li>
                    <li class="list-unstyled py-1">
                        <p class="m-0 d-flex align-items-center justify-content-between">
                            پست الکترونیک :
                            <span class="fw-bolder">
							{!! @$user->email !!}
						</span>
                        </p>
                    </li>
                    {{--            <li class="list-unstyled py-1">--}}
                    {{--                <a href="{{route('panel.edit')}}" class="btn btn-two w-100">--}}
                    {{--                    ویرایش اطلاعات--}}
                    {{--                </a>--}}
                    {{--            </li>--}}
                </ul>
            </div>
        </div>
        <div class="col-xl-7 col-sm-12 p-2">
            <div class="border bg-light shadow-sm p-2">
                <h4 class="fw-boldeer border-bottom h5 pb-2">
                    جزییات فاکتور
                </h4>
                <ul class="p-0 m-0">
                    <li class="list-unstyled py-1">
                        <p class="m-0 d-flex align-items-center justify-content-between">
                            وضعیت فاکتور :
                            <span class="fw-bolder">
							{{ @$order->orderStatus->title }}
						</span>
                        </p>
                    </li>
                    <li class="list-unstyled py-1">
                        <p class="m-0 d-flex align-items-center justify-content-between">
                            تعداد کل اقلام :
                            <span class="fw-bolder">
							{{ @$order->orderItems->sum('quantity') }} عدد
						</span>
                        </p>
                    </li>
                    <li class="list-unstyled py-1">
                        <p class="m-0 d-flex align-items-center justify-content-between">
                            مبلغ کل اقلام :
                            <span class="fw-bolder">
							{{number_format(@$order->total_prices)}}تومان
						</span>
                        </p>
                    </li>
                    <li class="list-unstyled py-1">
                        <p class="m-0 d-flex align-items-center justify-content-between">
                            مبلغ پرداختی :
                            <span class="fw-bolder">
							{{number_format(@$order->payment)}}تومان
						</span>
                        </p>
                    </li>
                    <li class="list-unstyled py-1">
                        <p class="m-0 d-flex align-items-center justify-content-between">
                            آدرس مقصد :
                            <span class="fw-bolder">
							{{ @$order->address->state->name }}
                                {{ @$order->address->city->name }}
                                {{ @$order->address->location }}
						</span>
                        </p>
                    </li>
                    <li class="list-unstyled py-1">
                        <p class="m-0 d-flex align-items-center justify-content-between">
                            شماره پیگیری از سایت و فروشگاه :
                            <span class="fw-bolder">
							{{ @$order->id }}
						</span>
                        </p>
                    </li>
                    <li class="list-unstyled py-1">
                        <p class="m-0 d-flex align-items-center justify-content-between">
                            شماره پیگیری از بانک :
                        </p>
                        <p class="m-0 d-flex align-items-center justify-content-between">
						<span class="fw-bolder" style="font-size: 0.7rem;">
							{{ @$order->tracking_code }}
						</span>
                        </p>
                    </li>
                    @if($order->post_tracking != null)
                    <li class="list-unstyled py-1">
                        <p class="m-0 d-flex align-items-center justify-content-between">
                            کد پیگیری پست :
                        </p>
                        <p class="m-0 d-flex align-items-center justify-content-between">
						<span class="fw-bolder">
							{{ @$order->post_tracking }}
						</span>
                        </p>
                    </li>
                    @endif
                    {{--            <li class="list-unstyled py-1">--}}
                    {{--                <a href="{{route('panel.edit')}}" class="btn btn-two w-100">--}}
                    {{--                    ویرایش اطلاعات--}}
                    {{--                </a>--}}
                    {{--            </li>--}}
                </ul>
            </div>
        </div>
    </div>
    <div class="border bg-light shadow-sm p-2">
        <h4 class="fw-boldeer border-bottom h5 pb-2">
            اقلام فاکتور :
        </h4>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-secondary">
                <tr>
                    <th class="text-center" scope="col">
                        #
                    </th>
                    <th class="text-center" scope="col">
                        نام محصول
                    </th>
                    <th class="text-center" scope="col">
                        تصویر محصول
                    </th>
                    <th class="text-center" scope="col">
                        قیمت محصول
                    </th>
                    <th class="text-center" scope="col">
                        تعداد
                    </th>
                    <th class="text-center" scope="col">
                        مبلغ کل
                    </th>
                    <th class="text-center" scope="col">
                        وضعیت سفارش
                    </th>
{{--                    <th class="text-center" scope="col">--}}
{{--                        اعلام مرجوعی--}}
{{--                    </th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($order->orderItems as $key => $row2)
                    <tr>
                        <th class="text-center text-secondary" scope="row">
                            {{$key+1}}
                        </th>
                        <td class="text-center text-secondary">
                            <a href="{{url('pro/'.$row2->product_id)}}">{{@$row2->product->title . ' | '. @$row2->productSpecificationValue->title}}</a>
                        </td>
                        <td class="text-center text-secondary">

{{--                            @if($row2->productspecification_id != null)--}}

{{--                                    <img src="{{@$row2->product->specification[0]->file}}" style="width: 100px;" alt="{{@$row2->product->title}}" />--}}

{{--                            @else--}}
{{--                                <img src="{{asset('assets/uploads/content/pro/big/'.@$row2->product->image[0]->file)}}"--}}
{{--                                     alt=" {{@$row2->product->title}}" style="width: 100px;" />--}}
{{--                            @endif--}}




                                @if($row2->productspecification != null)
                                    <img src="{{@$row2->productspecification->pro_image}}" style="width: 100px;" alt="{{@$row2->product->title}}" />

                                @else
                                    <img src="{{asset('assets/uploads/content/pro/big/'.@$row2->product->image[0]->file)}}"
                                         alt=" {{@$row2->product->title}}" style="width: 100px;" />
                                @endif
                        </td>
                        <td class="text-center text-secondary">
                            {{number_format(@$row2->price)}} تومان
                        </td>
                        <td class="text-center text-secondary">
                            {{@$row2->quantity}}
                        </td>
                        <td class="text-center text-secondary">
                            {{number_format(@$row2->quantity * @$row2->price)}} تومان
                        </td>
                        <td class="text-center text-secondary">
                            @if($row2->order_item_status_id == 5)
                                مرجوع شد
                            @else
                                {{ $order->OrderStatus->title}}
                            @endif

                        </td>
{{--                        <td class="text-center text-secondary">--}}
{{--                            @if($row2->order_item_status_id == 5)--}}
{{--                                مرجوع شد--}}
{{--                            @else--}}
{{--                                <a href="{{route('panel.new-return',['id'=>$row2->id])}}"--}}
{{--                                   class="btn btn-outline-secondary max-content mx-auto rounded-0 d-flex align-items-center justify-content-center">--}}
{{--                                    <i class="bi bi-speaker d-flex"></i>--}}
{{--                                </a>--}}
{{--                            @endif--}}
{{--                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop
