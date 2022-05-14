
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta id="vp" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/site/css/factor.css?V0.02')}}">
</head>

<body>
<div class="page">
    <table class="header-table" style="width: 100%">
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
                                روش ارسال :         @if($order->post_type == 1) پیشتاز @endif
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
                                گیرنده :      @if($order->user->gender == 0) خانم @else آقای @endif{{@$order->user->name . ' ' . @$order->user->family}}
                            </td>
                            <td
                                style="border: 1px solid #ddd; padding:5px;width: 7cm;font-size: 1rem;text-align: center;">
                                اردبیل - خیابان آذربایجان - پلاک ۵
                            </td>
                        </tr>
                        <tr
                            style="display: flex;align-items: center;justify-content: space-between;">
                            <td style="padding:5px;width: max-content;font-size: 1rem">
                                آدرس:{{@$order->city->state->name}} {{@$order->city->name}} {{@$order->address->location}}
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

</div>

<script>
    var printButton = document.getElementById('print-button');
    printButton.addEventListener('click', function() {
        window.print();
    })
    window.onload = function() {
        try {
            // var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
            //
            // if(!isSafari) {
            //     return;
            // }

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
