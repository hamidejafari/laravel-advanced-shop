<script>

    new Vue({
        el: '#shop68',
        data: function () {
            return {
                //Cart
                cartItems: [],
                cartSumPrice: 0,
                quantity: 1,
                specificationId:'',
                countShopping: 0,
                discountCode: "",
                order : null,
                //
                products : [],
                selected2 : [],
                postalCodeForm : '',
                selected3 : [],
                selected4 : [],
                loading2 : false,
                msg:'hhhhh',
                brands : [],
                categories : [],
                brandSearch : [],
                catSearch : [],
                searchValue : '',

                // selectedPost : '',
                // selectedPost2 : '',
                available : false,
                discount : false,
                timer : false,
                cartTotal: 0,
                changePost1:'',
                countProduct:0,
                availableProduct:0,
firstAttempt :0,
                // selectedColor : '',
                selectedColor2 : '',
                sortBy: '',
                page:1,
                more:false,

                @if(@Request::segments()[0] == 'pro')
                    @php
                        $products = new \Illuminate\Database\Eloquent\Collection;

                        $products = $products->merge(@$relate);
                        $products = $products->merge(@$complement);

                    @endphp
                    @foreach($products as $row)
                    @php
                        if(\Illuminate\Support\Facades\Auth::check())
                        {
                            $likes = \App\Models\Like::where('likeable_id',$row->id)->where('user_id',\Illuminate\Support\Facades\Auth::id())->where('likeable_type','App\Models\Product')->first();
                         }
                         else
                         {
                           $ip= \request()->ip();
                           $likes = \App\Models\Like::where('likeable_id',$row->id)->whereNull('user_id')->where('ip',$ip)->where('likeable_type','App\Models\Product')->first();
                         }

                    @endphp
                    @if(isset($likes))
                like{{$row->id}}: 1,
                @else
                like{{$row->id}}: 0,
                @endif
                    @endforeach
                    @endif


                    @if(@Request::segments()[0] == 'search')
                    @php
                        $products = new \Illuminate\Database\Eloquent\Collection;

                        $products = $products->merge(@$search_products);

                    @endphp
                    @foreach($products as $row)
                    @php

                        if(\Illuminate\Support\Facades\Auth::check())
                        {
                            $likes = \App\Models\Like::where('likeable_id',$row->id)->where('user_id',\Illuminate\Support\Facades\Auth::id())->where('likeable_type','App\Models\Product')->first();
                         }
                         else
                         {
                           $ip= \request()->ip();
                           $likes = \App\Models\Like::where('likeable_id',$row->id)->whereNull('user_id')->where('ip',$ip)->where('likeable_type','App\Models\Product')->first();
                         }

                    @endphp
                    @if(isset($likes))
                like{{$row->id}}: 1,
                @else
                like{{$row->id}}: 0,
                @endif





                    @endforeach

                    @endif

                    @if(count(Request::segments()) == 0 || Request::segments()[0] == 'bestselling' || Request::segments()[0] == 'popular' || Request::segments()[0] == 'latest' || Request::segments()[0] == 'discount')
                    @php
                        $products = new \Illuminate\Database\Eloquent\Collection;



                        if(count(Request::segments()) == 0){
                        $products = $products->merge(@$new_products);
                          $products = $products->merge(@$popular_products);
                          $products = $products->merge(@$timer_products);
                      }


                        $products = $products->merge(@$most_products);
                    @endphp
                    @foreach($products as $row)
                    @php

                        if(\Illuminate\Support\Facades\Auth::check())
                        {
                            $likes = \App\Models\Like::where('likeable_id',$row->id)->where('user_id',\Illuminate\Support\Facades\Auth::id())->where('likeable_type','App\Models\Product')->first();
                         }
                         else
                         {
                           $ip= \request()->ip();
                           $likes = \App\Models\Like::where('likeable_id',$row->id)->whereNull('user_id')->where('ip',$ip)->where('likeable_type','App\Models\Product')->first();
                         }

                    @endphp
                    @if(isset($likes))
                like{{$row->id}}: 1,
                @else
                like{{$row->id}}: 0,
                @endif
                    @endforeach
                    @else
                like: 0,
                @endif







                selectedState:'',
                selectedCity: '',


                @if(isset($addresses))
                    @foreach($addresses as $row)
                    @if($row->state_id && $row->city_id)
                selectedState{{$row->id}}:{{$row->state_id}},
                selectedCity{{$row->id}}: {{$row->city_id}},
                @endif
                    @endforeach
                    @endif
                cities: [],
            }
        },
        methods: {
            hideShortDes(){
                document.getElementById('textShortDes').style.display = 'none';
                this.more = !this.more;
            },
            closeMe(){
                $('#adressModalmain').modal('hide');
            },
            plusQnty(cartItemId){
                this.cartItems.find( ({ id }) => id === cartItemId ).productQuantity =  this.cartItems.find( ({ id }) => id === cartItemId ).productQuantity+1;
            },
            minusQnty(cartItemId){
                this.cartItems.find( ({ id }) => id === cartItemId ).productQuantity =  this.cartItems.find( ({ id }) => id === cartItemId ).productQuantity-1;

            },
            changeColor:function(colorSelected,price,oldprice,realPrice){
                this.selectedColor2 = colorSelected+'|'+price+'|'+oldprice+'|'+realPrice;
            },

            changePrice:function(price){
                this.selectedPrice = price + " تومان ";
            },

            changePost:function(postPrice,payment){
                this.selectedPost = postPrice;
                this.selectedPost2 = payment;
                // this.cartPayment = this.cartPayment + this.selectedPost2;
            },
            //Address
            getCities:function ()  {
                var vm = this;


                axios.post(`{{route('panel.set-city')}}`, {
                    body: {}
                })
                    .then(response => {
                        if (response.data.success === true) {
                            vm.cities = response.data.cities;
                        }
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            setCities:function ()  {

                var vm = this;

                axios.post(`{{route('panel.set-city')}}`, {
                    body: {  state_id: this.selectedState }
                })
                    .then(response => {
                        if (response.data.success === true) {
                            vm.cities = [];
                            vm.cities = response.data.cities;
                        }
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            getEditCities:function (selectedState)  {
                var vm = this;


                axios.post(`{{route('panel.set-city-edit')}}`, {
                    body: {
                        state_id: selectedState
                    }
                })
                    .then(response => {
                        if (response.data.success === true) {
                            vm.cities = response.data.cities;
                        }
                    })
                    .catch(e => {
                        console.log(e);
                    });

            },

            //ProductList
            searchInBrands(){

                this.brandSearch =  this.brands.filter((brand) => {
                    return brand.title.toLowerCase().includes(this.searchValue.toLowerCase());
                });

            },
            searchInCats(){
                this.catSearch =  this.categories.filter((category) => {
                    return category.title.toLowerCase().includes(this.searchValue.toLowerCase());
                });

            },
            getBrands:function ()  {
                var vm = this;
                axios({
                    method: "post",
                    url: '{{route('site.getbrands')}}',
                    data: {
                        category_id: {{@$category->id ? @$category->id : '1'}},
                    }
                }).then(response => {
                    if (response.data.success === true) {
                        vm.brands = response.data.brands;
                        vm.brandSearch = response.data.brands;
                    }
                }).catch(e => {
                    console.log(e);
                });
            },
            getCats:function ()  {

                var vm = this;
                axios({
                    method: "post",
                    url: '{{route('site.getcats')}}',
                    data: {
                        brand_id: {{@$brand->id ? @$brand->id : '1'}},
                    }
                }).then(response => {
                    vm.catSearch = [];
                    vm.categories = response.data.categories;
                    vm.catSearch = response.data.categories;
                    vm.catSearch =  vm.categories;

                }).catch(e => {
                    console.log(e);
                });




            },
            productsList:function ()  {
                console.log('hiiiii');
                var vm=this;

                axios({
                    method: "post",
                    url: '{{route('vue.product-list')}}',
                    data: {
                        category_id: {{@$category->id ? @$category->id : '1'}},
                    }
                }).then(function (response) {
                    vm.products = [...vm.products, ...response.data.products];
                    vm.loading2 = false;
                    vm.countProduct = response.data.countProduct;
                    vm.availableProduct = response.data.products.length;
                });
            },
            productsList2:function ()  {
                var vm=this;

                axios({
                    method: "post",
                    url: '{{route('vue.product-list2')}}',
                    data: {
                        category_id: {{@$category->id ? @$category->id : '1'}},
                    }
                }).then(function (response) {
                    vm.products = [...vm.products, ...response.data.products];
                    vm.loading2 = false;
                    vm.countProduct = response.data.countProduct;
                });
            },
            productsDis:function ()  {
                var vm=this;

                axios({
                    method: "post",
                    url: '{{route('vue.product-dis')}}',
                    data: {
                        category_id: {{@$category->id ? @$category->id : '1'}},
                    }
                }).then(function (response) {
                    vm.products = [...vm.products, ...response.data.products];
                    vm.loading2 = false;
                    vm.countProduct = response.data.countProduct;
                });
            },
            loadingOff:function ()  {
                this.loading2 = false;
            },
            filterProducts:function ()  {
                var vm=this;
                this.loading2 = true;
                axios({
                    method: "post",
                    url: '{{route('vue.filter-product')}}',
                    data: {
                        category_id: {{@$category->id ? @$category->id : '1'}},
                        specification : this.selected2,
                        brand : this.selected3,
                        available : this.available,
                        discount : this.discount,
                        timer : this.timer,
                        sortBy : this.sortBy,
                        priceRange : document.getElementById('amount').value
                    }
                }).then(function (response) {
                    vm.products = [];

                    vm.products = response.data.products;


                    vm.loading2 = false;

                });
            },
            brandList:function ()  {

                var vm=this;
                axios({
                    method: "post",
                    url: '{{route('vue.brand-list')}}',
                    data: {
                        brand_id: {{@$brand->id ? @$brand->id : '1'}},
                    }
                }).then(function (response) {
                    vm.products = [];
                    vm.products = response.data.products;
                    vm.loading2 = false;
                });
            },
            filterBrands:function ()  {
                var vm=this;
                this.loading2 = true;
                axios({
                    method: "post",
                    url: '{{route('vue.filter-brand')}}',
                    data: {
                        brand_id: {{@$brand->id ? @$brand->id : '1'}},
                        category : this.selected4,
                        available : this.available,
                        discount : this.discount,
                        timer : this.timer,
                        sortBy : this.sortBy,
                        priceRange : document.getElementById('amount').value

                    }
                }).then(function (response) {
                    vm.products = [];

                    vm.products = response.data.products;

                    vm.loading2 = false;

                });
            },


            //Cart
            getCartItems() {
                var vm = this;
                axios({
                    method: "post",
                    url: '{{route('site.cart.content')}}',
                    data: {}
                }).then(function (response) {
                    if (response.data.success) {
                        if (response.data.success === true) {
                            vm.cartItems = [];
                            vm.cartItems = response.data.cart;

                            vm.cartSumPrice = 0;
                            vm.cartSumPrice = response.data.cartSumPrice;
                            vm.order = null;
                            vm.order = response.data.order;
                            vm.countShopping = 0;
                            vm.countShopping = response.data.countShopping;
                            vm.cartPayment = 0;
                            vm.cartPayment = response.data.cartPayment;
                            vm.cartTotal = 0;
                            vm.cartTotal = response.data.totalCount;

                        }
                    }
                });
            },
            addToCart(productId, quantity, relativeMode, specificationId) {

                var vm = this;

                axios({
                    method: "post",
                    url: '{{route('site.cart.add')}}',
                    data: {
                        // discount_code: this.discountCode,
                        productId: productId,
                        specificationId: specificationId,
                        // discountId: discountId,

                        quantity: document.getElementById("quantity").value ,


                        relativeMode: relativeMode
                    }
                }).then(function (response) {
                    if (response.data.success === true ) {
                        vm.cartItems = [];
                        vm.cartItems = response.data.cart;
                        vm.cartSumPrice = 0;
                        vm.cartSumPrice = response.data.cartSumPrice;
                        vm.countShopping = 0;
                        vm.countShopping = response.data.countShopping;
                        vm.cartPayment = 0;
                        vm.cartPayment = response.data.cartPayment;
                        vm.cartTotal = 0;
                        vm.cartTotal = response.data.totalCount;

                        swal("اضافه شد!", response.data.message, "success", {
                            buttons: {
                                continiue:{
                                    text: "تکمیل سفارش و پرداخت",
                                    color: 'red',
                                },
                                nonow: "ادامه خرید",
                            },
                        }).then((value) => {
                            switch (value) {

                                case "continiue":

                                    window.location.href = '{{url('/checkout')}}'; //Will take you to Google.
                                    break;

                                case "nonow":
                                    break;

                                default:
                                    console.log('hi');
                            }
                        });
                    }

                    if (response.data.success === false && response.data.button == true) {
                        swal(
                            {title: "خطا!",
                                text: response.data.message,
                                icon: "error",
                                button: "ثبت نام/ورود"})
                            .then(() => {
                                location.href = "{{url('panel/login?product_id='.@$product->id)}}";
                            });
                    }

                    if(response.data.success === false && response.data.button == false) {

                        swal("خطا!", response.data.message, "error");


                    }

                });
            },
            addDiscount() {
                var vm = this;

                axios({
                    method: "post",
                    url: '{{route('site.discount.add')}}',
                    data: {

                        code: this.discountCode,
                    }
                }).then(function (response) {
                    if (response.data.success === true) {
                        vm.cartItems = [];
                        vm.cartItems = response.data.cart;
                        vm.cartSumPrice = 0;
                        vm.cartSumPrice = response.data.cartSumPrice;
                        vm.countShopping = 0;
                        vm.countShopping = response.data.countShopping;
                        vm.cartPayment = 0;
                        vm.cartPayment = response.data.cartPayment;
                        swal("اضافه شد!", "محصول با موفقیت به سبد خرید اضافه شد", "success");
                    } else {
                        swal(" خطا!",response.data.message, "error");


                    }

                });
            },
            removeCart(productId) {
                var vm = this;
                axios({
                    method: "post",
                    url: '{{route('site.cart.remove')}}',
                    data: {
                        productId: productId
                    }
                }).then(function (response) {
                    if (response.data.success === true) {
                        vm.cartItems = [];
                        vm.cartItems = response.data.cart;
                        vm.cartSumPrice = 0;
                        vm.cartSumPrice = response.data.cartSumPrice;
                        vm.countShopping = 0;
                        vm.countShopping = response.data.countShopping;
                        vm.cartPayment = 0;
                        vm.cartPayment = response.data.cartPayment;
                        vm.cartTotal = 0;
                        vm.cartTotal = response.data.totalCount;

                        swal("محصول حذف شد!", "محصول از سبد خرید شما حذف شد", "success");
                    }
                });
            },
            lazyTemp() {

                var vm2= this;


                window.onscroll = () => {
                    var vm= this;

                    if(vm2.countProduct < 1){
                        axios({
                            method: "post",
                            url: '{{route('vue.product-list')}}',
                            data: {
                                category_id: {{@$category->id ? @$category->id : '1'}}
                            }
                        }).then(function (response) {
                            vm2.countProduct = response.data.countProduct;
                            let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight > document.documentElement.offsetHeight-700;
                            if (bottomOfWindow) {
                                vm.page = vm.page+1;
                                if (vm.countProduct > vm.availableProduct){
                                    axios({
                                        method: "post",
                                        url: '{{route('vue.product-list')}}',
                                        data: {
                                            category_id: {{@$category->id ? @$category->id : '1'}},
                                            page:vm.page,
                                        }
                                    }).then(function (response) {
                                        vm.products = [...vm.products,...response.data.products];
                                        // vm.products = merge(vm.products,response.data.products);
                                        vm.availableProduct = vm.availableProduct+response.data.products.length;
                                        vm.loading2 = false;
                                    });
                                }else{
                                    axios({
                                        method: "post",
                                        url: '{{route('vue.product-list2')}}',
                                        data: {
                                            category_id: {{@$category->id ? @$category->id : '1'}},
                                            page:vm.page
                                        }
                                    }).then(function (response) {
                                        vm.products = [...vm.products,...response.data.products];
                                        vm.loading2 = false;
                                    });
                                }

                            }

                        });
                    }else{
                        let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight > document.documentElement.offsetHeight-700;
                        if (bottomOfWindow) {

                            if (vm.countProduct > vm.availableProduct){
                                axios({
                                    method: "post",
                                    url: '{{route('vue.product-list')}}',
                                    data: {
                                        category_id: {{@$category->id ? @$category->id : '1'}},
                                        page:vm.page,
                                    }
                                }).then(function (response) {
                                    vm.products = [...vm.products,...response.data.products];
                                    // vm.products = merge(vm.products,response.data.products);
                                    vm.availableProduct = vm.availableProduct+response.data.products.length;

                                    vm.loading2 = false;
                                });
                            }else{
                                axios({
                                    method: "post",
                                    url: '{{route('vue.product-list2')}}',
                                    data: {
                                        category_id: {{@$category->id ? @$category->id : '1'}},
                                        page:vm.page
                                    }
                                }).then(function (response) {
                                    vm.products = [...vm.products,...response.data.products];
                                    vm.loading2 = false;
                                });
                            }

                        }
                    }




                }
            },
            lazyTempZero() {

                window.onscroll = () => {

                    let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight > document.documentElement.offsetHeight-700;
                    if (bottomOfWindow) {
                        var vm=this;
                        vm.page = vm.page+1;
                        axios({
                            method: "post",
                            url: '{{route('vue.product-list2')}}',
                            data: {
                                category_id: {{@$category->id ? @$category->id : '1'}},
                                page:vm.page
                            }
                        }).then(function (response) {
                            vm.products = [...vm.products,...response.data.products];
                            // vm.products = merge(vm.products,response.data.products);
                            vm.loading2 = false;
                        });

                    }
                }
            },
            lazyTemp2() {

                window.onscroll = () => {

                    let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight > document.documentElement.offsetHeight-1200;
                    if (bottomOfWindow) {
                        var vm=this;
                        vm.page = vm.page+1;
                        axios({
                            method: "post",
                            url: '{{route('vue.product-dis')}}',
                            data: {
                                category_id: {{@$category->id ? @$category->id : '1'}},
                                page:vm.page
                            }
                        }).then(function (response) {
                            vm.products = [...vm.products,...response.data.products];
                            // vm.products = merge(vm.products,response.data.products);
                            vm.loading2 = false;
                        });

                    }
                }
            },

            //Like
            @if(count(Request::segments()) == 0 || Request::segments()[0] == 'pro')

                @foreach($products as $row)
            getLike{{$row->id}}(like,likeable_id) {
                console.log('----------------------------');
                console.log('test');
                var vm = this;
                axios({
                    method: "post",
                    url: '{{route('pro.like')}}',
                    data: {
                        likeable_id: likeable_id,
                        like: like,
                    }
                }).then(response => {
                    vm.like{{$row->id}} = response.data.like;
                    console.log(vm.like{{$row->id}} );
                }).catch(e => {
                    console.log(e);
                });
            },
            @endforeach
                @else
            getLike(like,likeable_id) {

                var vm = this;
                axios({
                    method: "post",
                    url: '{{route('pro.like')}}',
                    data: {
                        likeable_id: likeable_id,
                        like: like,
                    }
                }).then(response => {
                    if (response.data.success === true) {
                        vm.like = response.data.like;

                    }
                }).catch(e => {
                    console.log(e);
                });
            },
            @endif

             checkForm(e){
                e.preventDefault();
                if(this.postalCodeForm.length !== 10){
                    swal("", "کد پستی حتما باید ۱۰ رقم باشد", "error");
                }else{
                    document.getElementById("myformhihi").submit()
                }
            }
        },
        computed: {


            selectedPost: function () {

                if(this.changePost1){
                    return this.changePost1.split("|")[2];
                }else{
                    return 'روش ارسال را انتخاب کنید';
                }
            },
            brandSearch2: function () {

                if(this.searchValue !== ''){

                    return this.brandSearch.filter((brand) => {
                        return brand.title.toLowerCase().includes(this.searchValue.toLowerCase());
                    });
                }else{
                    return this.brandSearch;
                }
            },
            selectedPost2: function () {
                if(this.changePost1){
                    return parseInt(this.changePost1.split("|")[1]);
                }else{
                    return 0;
                }
            },
            changePost2: function () {
                if(this.changePost1 !== ''){
                    return parseInt(this.changePost1.split("|")[0]);
                }else{
                    return null;
                }
            },

            cartPaymentTotal: function () {
                return this.cartPayment + this.selectedPost2;
            },
            selectedColor: function () {
                return this.selectedColor2.split("|")[0];
            },
            selectedPrice: function () {
                if(this.selectedColor2){
                    let myprice =  this.selectedColor2.split("|")[1];
                    var x = (parseInt(myprice)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                    return x.replace('.0','') + ' تومان ';
                }else{
                    return '{!! @$product->price_first["price"] !!}';
                }
            },
            selectedRealPrice: function () {
                if(this.selectedColor2){
                    let myprice =  this.selectedColor2.split("|")[3];
                    var x = (parseInt(myprice)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                    return x.replace('.0','') + ' تومان ';
                }else{
                    return '{!! @$product->price_first["old"] !!}';
                }
            },
            selectedStock: function () {
                if(this.selectedColor2){
                    let myprice =  this.selectedColor2.split("|")[2];
                    return myprice;
                }else{
                    return '{{@$product->stock_count}}';
                }
            },
            countShopping: function () {
                return this.cartItems.length;
            },
            sortedProducts: function() {
                if(this.sortBy == 'cheapest'){
                    return this.products.slice().sort(function(a, b){
                        return (a.price2 > b.price2) ? 1 : -1;
                    });
                }
                if(this.sortBy == 'expensive'){
                    return this.products.slice().sort(function(a, b){
                        return (a.price2 < b.price2) ? 1 : -1;
                    });
                }
                if(this.sortBy == 'like'){
                    return this.products.slice().sort(function(a, b){
                        return (a.likes < b.likes) ? 1 : -1;
                    });
                }
                if(this.sortBy == 'most'){
                    return this.products.slice().sort(function(a, b){
                        return (a.finalOrders < b.finalOrders) ? 1 : -1;
                    });
                }

                return this.products;
            }
        },
        beforeMount() {
            @if(@Request::segments()[0] == "cat")

                // this.productsList();
            @endif
                @if(@Request::segments()[0] == "discount")

                this.productsDis();
            @endif
        },
        mounted() {
            this.loading2 = true;
            this.getCartItems();
            @if(@Request::segments()[0] == "discount")
                this.lazyTemp();
                @endif

            @if(@Request::segments()[0] == "cat")
            this.lazyTemp();
            //     this.productsList();
            //     const af = document.getElementById("af")
            //
            // console.log(af)
            this.getBrands();
            @endif
                @if(@Request::segments()[0] == "brand")
                this.brandList();
            this.getCats();
            @endif
                this.getEditCities(null);
        },
        watch : {
            selectedColor2:function(val) {

                $( "#v-pills-"+val.split("|")[0]+"-tab").trigger("click");

            }
        }
    });
</script>
