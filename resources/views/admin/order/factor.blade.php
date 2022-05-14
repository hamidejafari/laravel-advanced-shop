<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta id="vp" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/site/css/factor.css?V0.3')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128&display=swap" rel="stylesheet">
</head>

<body>
<button class="print-button" id="print-button">
    چاپ فاکتور
</button>
<div class="page">
    <table class="header-table tableyek" style="width: 100%">
        <tbody>
        <tr>
            <!-- <td style="width: 1.8cm; height: 2.5cm;vertical-align: middle;padding-bottom: 4px;">
                <div class="header-item-wrapper">
                    <div class="portait" style="margin:5px">حق‌العمل کار</div>
                </div>
            </td> -->
            <td style="padding: 0 0 5px;">
                <div class="bordered grow header-item-data">
                    <table class="grow centered">
                        <tbody>
                        <tr
                            style="display: flex;align-items: center;justify-content: space-between;">
                            <td
                                style="border: 1px solid #ddd; padding:5px;width: 5cm;font-size: 1rem;text-align: center;">
                                شماره فاکتور : {{@$order->id}}
                            </td>
                            <td
                                style="padding:5px;width: 7cm;font-size: 1rem;font-weight: bolder;text-decoration: underline;text-align: center;">
                                فرستنده : فروشگاه کاج
                            </td>
                        </tr>
                        <tr
                            style="display: flex;align-items: center;justify-content: space-between;">
                            <td
                                style="border: 1px solid #ddd;padding:5px;width: 5cm;font-size: 1rem;text-align: center;">
                                روش ارسال : @if($order->post_type == 1) پیشتاز @endif
                                @if($order->post_type == 4) پیک @endif
                                @if($order->post_type == 2) تیپاکس @endif
                                @if($order->post_type == 3) هوایی @endif
                            </td>
                            <td
                                style="border: 1px solid #ddd; padding:5px;width: 7cm;font-size: 1rem;text-align: center;">
                                صاپست : ۰۴۵۱۰۲۰
                            </td>
                        </tr>
                        <tr
                            style="display: flex;align-items: center;justify-content: space-between;">
                            <td style="padding:5px;width: max-content;font-size: 1rem">

                                گیرنده :
                                @if(@$order->address->transferee_name != null &&
                                @$order->address->transferee_family != null)
                                    {{@$order->address->transferee_name . ' ' . @$order->address->transferee_family}}
                                @else
                                    @if($order->user->gender == 0) خانم @else آقای
                                    @endif{{@$order->user->name . ' ' . @$order->user->family}}
                                @endif

                            </td>
                            <td
                                style="border: 1px solid #ddd; padding:5px;width: 7cm;font-size: 1rem;text-align: center;">
                                اردبیل - خیابان آذربایجان - پلاک ۵
                            </td>
                        </tr>
                        <tr
                            style="display: flex;align-items: center;justify-content: space-between;">
                            <td style="padding:10px 5px;width: 50%;font-size: 1rem">
                                آدرس:{{@$order->city->state->name}} {{@$order->city->name}}
                                {{@$order->address->location}}
                            </td>
                        </tr>
                        <tr style="display: flex;align-items: center;justify-content: start;">
                            <td style="padding:5px;width: max-content;font-size: 1rem;">
                                تلفن : <span
                                    style="border: 1px solid #ddd;padding: 3px 30px 0;">{{@$order->user->mobile}}</span>
                            </td>
                            <td style="padding:5px;width: max-content;font-size: 1rem;">
                                کد پستی : <span
                                    style="border: 1px solid #ddd;padding: 3px 30px 0;">{{@$order->address->postal_code}}</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
            <!-- <td style="width: 7cm; height: 2cm; padding: 0 4px 4px 0;">
                <div class="bordered" style="text-align: center; height: 100%; padding: 0.4cm 0.2cm;">
                    <div class="flex">
                        <div class="font-small">شماره فاکتور:</div>
                        <div class="flex-grow" style="text-align: left">۱۶۷۱۷۷۱۷</div>
                    </div>
                    <div class="flex">
                        <div>تاریخ:</div>
                        <div class="flex-grow" style="text-align: left">۱۴۰۰/۰۷/۳۰</div>
                    </div>
                    <div class="flex" style="margin-bottom: 4px;">
                        <div>پیگیری:</div>
                        <div class="flex-grow font-medium" style="text-align: left">۱۳۱۱۱۴۳۸۱</div>
                    </div>
                </div>
            </td> -->
        </tr>
        <!-- <tr>
            <td style="width: 1.8cm; height: 2cm;vertical-align: center; padding: 0 0 4px">
                <div class="header-item-wrapper">
                    <div class="portait" style="margin: 20px">خریدار</div>
                </div>
            </td>
            <td style="height: 2cm;vertical-align: center; padding: 0 4px 4px">
                <div class="bordered header-item-data">
                    <table style="height: 100%" class="centered">
                        <tbody>
                            <tr>
                                <td style="width: 6.7cm">
                                    <span class="label">خریدار:</span> hosein saeidi
                                </td>
                                <td style="width: 6.7cm">
                                    <span class="label">شماره‌اقتصادی / شماره‌ملی:</span> ۰۰۱۲۹۸۴۹۳۰
                                </td>
                                <td>
                                    <span class="label">شناسه ملی:</span> ۰۰۱۲۹۸۴۹۳۰
                                </td>
                                <td>
                                    <span class="label">شماره ثبت:</span> -
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <span class="label">نشانی:</span> همدانک شهرک شهید جعفری کوچه سرو
                                    دو شرقی, پلاک ۳۱, واحد ۹
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="label">شماره تماس:</span>
                                </td>
                                <td colspan="2">
                                    <span class="label">کد پستی:</span> ۳۷۶۷۳۸۹۷۱۷
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </td>
            <td style="width: 7cm;padding: 0 4px 4px 0;">
                <div class="bordered" style="text-align: center; height: 100%;">
                    <div class="flex" style="margin-bottom: 4px;">
                        <div>شماره مالیاتی:</div>
                        <div class="flex-grow font-medium" style="text-align: left">KGWNG۰۴۹EAFF۱۷۹۵۳۶
                        </div>
                    </div>
                    <div class="flex" style="margin-bottom: 4px;">
                        <div>سریال حافظه مالیاتی:</div>
                        <div class="flex-grow font-medium" style="text-align: left">S۰۵۴۰۰۱۰۰۰۰۰۰۱۰۰
                        </div>
                    </div>
                    <div class="flex" style="margin-bottom: 4px;">
                        <div>سریال پایانه فروشگاهی:</div>
                        <div class="flex-grow font-medium" style="text-align: left">A۰۵۴۰۰۱۰۰۰۰۰۰۱۹۰
                        </div>
                    </div>
                </div>
            </td>
        </tr> -->
        </tbody>
    </table>
    <table class="content-table tabledo" style="margin-bottom:0.25rem">
        <thead>
        <tr>
            <th class="yek"></th>
            <th class="do">
                نام خریدار : {{@$order->user->name . ' ' . @$order->user->family}}
            </th>
            <th class="se">
                تاریخ خرید : {{jdate(' H:s Y/m/d ',@$order->created_at->timestamp)}}
            </th>
            <th class="chehar">
                تعداد اقلام : {{$order->orderItems->count()}}
            </th>
            <th class="pang">
                روش ارسال : @if($order->post_type == 1) پیشتاز @endif
                @if($order->post_type == 4) پیک @endif
                @if($order->post_type == 2) تیپاکس @endif
                @if($order->post_type == 3) هوایی @endif
            </th>
            <th class="shesh">
                تعداد صفحه : ۱
            </th>
        </tr>
        </thead>
    </table>
    <table class="content-table tablese">
        <thead>
        <tr>
            <th class="yek">
                ردیف
            </th>
            <th class="do">
                عکس محصول
            </th>
            <th class="se">
                نام محصول
            </th>
            <th class="chehar">
                بارکد
            </th>
            <th class="pang">
                تعداد
            </th>
            <th class="shesh">
                قیمت اصلی (تومان)
            </th>
            <th class="haft">
                تخفیف (تومان)
            </th>
            <th class="hasht">
                مبلغ کل (تومان)
            </th>
        </tr>
        </thead>
        <tbody>
        @php $discount = 0 @endphp
        @foreach($order->orderItems as $key=> $item)
            @if($item->quantity > 0)
                @if($item->created_at > "2021-12-18 09:46:00")
                    <tr>
                        <td>
                            {{$key+1}}
                        </td>
                        <td>
                            @if(@$item->productspecification !== null)
                                <img src="{{@$item->productspecification->pro_image}}" height="50" width="50">
                            @else
                                <img src="{{asset('assets/uploads/content/pro/big/'.@$item->product->image[0]->file)}}" height="50" width="50">
                            @endif
                        </td>
                        <td>
                            <div class="title">
                                {{@$item->product->title . ' | '.@$item->productSpecificationValue->title . ' | '.@$item->product->title_en}}
                            </div>
                        </td>
                        <td class="py-2">
    						<span class="ltr bar">
    							{{@$item->productSpecification->barcode }}
    						</span>
                            <span class="ltr nobar">
    							{{@$item->productSpecification->barcode }}
    						</span>
                            <span class="ltr bar">
    							{{@$item->product->barcode }}
    						</span>
                            <span class="ltr nobar">
    							{{@$item->product->barcode }}
    						</span>
                        </td>
                        <td>
    						<span class="ltr">
    							{{$item->quantity}}
    						</span>
                        </td>
                        <td>
                                    <span class="ltr">



                                            {{@$item->old_price > 2 ? number_format(@$item->old_price) : number_format(@$item->price) }}


    						</span>
                        </td>
                        <td>

                            	<span class="ltr">

    	                        	    @php
                                            $mines =@$item->old_price > 2 ? @$item->old_price - @$item->price : 0;
                                        @endphp

                                    @if(@$item->old_price != null && @$item->old_price > 1)

                                        {{number_format(@$mines)}}

                                    @else

                                        0
                                    @endif
    	                            </span>

                        </td>
                        <td>

               			<span class="ltr">
    					{{number_format(@$item->quantity * @$item->price)}}
    				</span>
                        </td>
                    </tr>

                @else

                    <tr>
                        <td>
                            {{$key+1}}
                        </td>
                        <td>
                            @if(@$item->productspecification !== null)
                                <img src="{{@$item->productspecification->pro_image}}" height="50" width="50">
                            @else
                                <img src="{{asset('assets/uploads/content/pro/big/'.@$item->product->image[0]->file)}}" height="50" width="50">
                            @endif
                        </td>
                        <td>
                            <div class="title">
                                {{@$item->product->title . ' | '.@$item->productSpecificationValue->title . ' | '.@$item->product->title_en}}
                            </div>
                        </td>
                        <td class="py-2">
    						<span class="ltr bar">
    							{{@$item->productSpecification->barcode }}
    						</span>
                            <span class="ltr nobar">
    							{{@$item->productSpecification->barcode }}
    						</span>
                            <span class="ltr bar">
    							{{@$item->product->barcode }}
    						</span>
                            <span class="ltr nobar">
    							{{@$item->product->barcode }}
    						</span>
                        </td>
                        <td>
    						<span class="ltr">
    							{{$item->quantity}}
    						</span>
                        </td>
                        <td>
                            @php
                                if ($item->product_specification_id != null){
                                          $blackfriday_price =
                                          \App\Models\Price::where('priceable_id',$item->product_specification_id)->where('priceable_type','App\Models\ProductSpecification')
                                          ->withTrashed()->where('created_at','<',$item->updated_at)->orderby('id','desc')->first();

                                      }
                                      if ($item->product_specification_id == null){
                                          $blackfriday_price =
                                          \App\Models\Price::where('priceable_id',$item->product_id)->where('priceable_type','App\Models\Product')
                                          ->withTrashed()->where('created_at','<',$item->updated_at)->orderby('id','desc')->first();


                                      }
                            @endphp
                            <span class="ltr">



                                            {{@$blackfriday_price->old_price == 0 ?  number_format(@$blackfriday_price->price) : number_format(@$blackfriday_price->old_price) }}


    						</span>
                        </td>
                        <td>

                            	<span class="ltr">

    	                        	    @php
                                            $mines = @$blackfriday_price->old_price - @$blackfriday_price->price;
                                        @endphp

                                    @if(@$blackfriday_price->old_price != null && @$blackfriday_price->old_price > 1)

                                        {{number_format(@$mines)}}

                                    @else

                                        0
                                    @endif
    	                            </span>

                        </td>
                        <td>
               			<span class="ltr">
    					{{number_format(@$item->quantity * @$blackfriday_price->price)}}
    				</span>
                        </td>
                    </tr>

                @endif


            @endif
            @if(@$mines > 0)
                @php $discount = @$discount + @$mines @endphp

            @endif

        @endforeach


        </tbody>
        <tfoot>
        <tr>
            <td colspan="3"></td>
            <td>
                ــــ
            </td>
            <td class="font-small">
						<span class="ltr">
							تعداد کل :@ {{$order->orderItems->sum('quantity')}}
						</span>
            </td>
            <td>
						<span class="ltr">
						    @if($discount > 0)
                                جمع تخفیف : {{number_format(@$discount)}}
                            @else
                                جمع تخفیف : 0
                            @endif
						</span>
            </td>
            <td>
                ــــ
            </td>
            <td>
						<span class="ltr">
							قیمت کل : {{number_format(@$order->total_prices)}}
						</span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
						<span class="ltr">
							شماره فاکتور : {{$order->id}}
						</span>
            </td>
            <td colspan="2">
						<span class="ltr">
							شماره پیگیری بانک :
							{{@$order->tracking_code}}

						</span>
            </td>
            <td colspan="2">
						<span class="ltr">
							هزینه پست : {{number_format(@$order->post_price)}}
						</span>
            </td>
            <td colspan="2">
						<span class="ltr">
							جمع کل پرداختی : {{number_format(@$order->payment)}}
						</span>
            </td>
        </tr>
        </tfoot>
    </table>
</div>

<script>
    var printButton = document.getElementById('print-button');
    printButton.addEventListener('click', function() {
        window.print();
    })
    window.onload = function() {
        try {
            if (screen.width >= 300 && screen.width < 500) {
                var mvp = document.getElementById('vp');
                mvp.setAttribute('content', 'initial-scale=0.35,width=device-width');
            } else if (screen.width > 500 && screen.width < 600) {
                var mvp = document.getElementById('vp');
                mvp.setAttribute('content', 'initial-scale=0.6,width=device-width');
            } else if (screen.width > 600 && screen.width < 700) {
                var mvp = document.getElementById('vp');
                mvp.setAttribute('content', 'initial-scale=0.7,width=device-width');
            }

        } catch (e) {

        }
    }
</script>
</body>

</html>
