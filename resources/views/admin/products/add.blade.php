@extends('layouts.admin.master')
@section('title','جدید')
@section('content')
<div class="container-fluid dashboard-content" id="productform">
	<div class="row w-100 m-0">
		<div class="col-lg-12 mx-auto py-1 px-0">
			<h3 class="bg-white py-2 px-4 rounded-lg">
				اضافه کردن محصول
			</h3>
			<div class="card rounded-lg border-0 p-3">
				<form method="post" action="{{URL::action('Admin\ProductController@postAddProduct')}}"
					enctype="multipart/form-data">
					@include('admin.products.form')
				</form>
			</div>
		</div>
	</div>
</div>
<script>
    new Vue({
        el: '#productform',
        data: function () {
            return {
                oldPrice :0,
                currentPrice:  0,
                number :1,
                msg : 'hettt'
            }
        },
        methods: {
            checkPrice:function ()  {

                var yourNumber = this.oldPrice;
                var n = yourNumber.toString().split(".");
                n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                this.oldPrice = n.join(".");


                var yourNumber2 = this.currentPrice;
                var n2 = yourNumber2.toString().split(".");
                n2[0] = n2[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                this.currentPrice = n2.join(".");



                console.log(Number(yourNumber.replace(",", "")));
                var compareOldPrice = Number(yourNumber.replace(",", ""));
                var comparePrice = Number(yourNumber2.replace(",", ""));
                console.log(compareOldPrice);
                console.log(comparePrice);

                if(compareOldPrice !== 0){
                    if(compareOldPrice < comparePrice){
                        console.log('ayyyy');
                        swal("",'قیمت فعلی باید کمتر از قیمت قبل تخفیف باشد!','error');
                    }
                    if(compareOldPrice == comparePrice){
                        swal("",'قیمت فعلی باید کمتر از قیمت قبل تخفیف باشد!','error');
                    }
                }

            },
            plusMe: function(){
                this.number = this.number+1;
            }
        }
    });
</script>
@stop
@section('js')

@endsection
