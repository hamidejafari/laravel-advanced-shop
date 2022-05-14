@extends('site.panel.master')
@section('content')

    <div class="bg-one panel-head p-2">
        <h1 class="fw-bolder text-white d-flex align-items-center h4 m-0">
            <i class="bi bi-list-check me-2 d-flex h2 my-0"></i>
            مراحل سفارش
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

@stop
