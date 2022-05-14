<div class="nav-left-sidebar sidebar-dark">
	<div class="menu-list">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="d-xl-none d-lg-none" href="#">
				Dashboard
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav flex-column">
					<li class="nav-divider">
						پنل مدیریت
						<a href="{{url('/')}}" target="_blank" rel="noopener noreferrer" class="text-white">
							کاج شاپ
						</a>
					</li>

                    <a class="nav-link active" href="{{url('/admin')}}">
                        <i class="fa fa-fw fa-user-circle"></i>
                        داشبورد
                    </a>
					<li class="nav-item ">

{{--						<div id="submenu-1" class="collapse submenu" style="">--}}
{{--							<ul class="nav flex-column">--}}
{{--								<li class="nav-item">--}}
{{--									<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"--}}
{{--										data-target="#submenu-1-2" aria-controls="submenu-1-2">E-Commerce</a>--}}
{{--									<div id="submenu-1-2" class="collapse submenu" style="">--}}
{{--										<ul class="nav flex-column">--}}
{{--											<li class="nav-item">--}}
{{--												<a class="nav-link" href="index.html">E Commerce--}}
{{--													Dashboard</a>--}}
{{--											</li>--}}
{{--											<li class="nav-item">--}}
{{--												<a class="nav-link" href="ecommerce-product.html">Product--}}
{{--													List</a>--}}
{{--											</li>--}}
{{--											<li class="nav-item">--}}
{{--												<a class="nav-link"--}}
{{--													href="ecommerce-product-single.html">Product Single</a>--}}
{{--											</li>--}}
{{--											<li class="nav-item">--}}
{{--												<a class="nav-link"--}}
{{--													href="ecommerce-product-checkout.html">Product--}}
{{--													Checkout</a>--}}
{{--											</li>--}}
{{--										</ul>--}}
{{--									</div>--}}
{{--								</li>--}}
{{--								<li class="nav-item">--}}
{{--									<a class="nav-link" href="dashboard-finance.html">Finance</a>--}}
{{--								</li>--}}
{{--								<li class="nav-item">--}}
{{--									<a class="nav-link" href="dashboard-sales.html">Sales</a>--}}
{{--								</li>--}}
{{--								<li class="nav-item">--}}
{{--									<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"--}}
{{--										data-target="#submenu-1-1" aria-controls="submenu-1-1">Infulencer</a>--}}
{{--									<div id="submenu-1-1" class="collapse submenu" style="">--}}
{{--										<ul class="nav flex-column">--}}
{{--											<li class="nav-item">--}}
{{--												<a class="nav-link"--}}
{{--													href="dashboard-influencer.html">Influencer</a>--}}
{{--											</li>--}}
{{--											<li class="nav-item">--}}
{{--												<a class="nav-link" href="influencer-finder.html">Influencer--}}
{{--													Finder</a>--}}
{{--											</li>--}}
{{--											<li class="nav-item">--}}
{{--												<a class="nav-link"--}}
{{--													href="influencer-profile.html">Influencer Profile</a>--}}
{{--											</li>--}}
{{--										</ul>--}}
{{--									</div>--}}
{{--								</li>--}}
{{--							</ul>--}}
{{--						</div>--}}
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
							data-target="#submenu-2" aria-controls="submenu-2"><i
								class="fa fa-fw fa-rocket"></i>محصولات</a>
						<div id="submenu-2" class="collapse submenu" style="">
							<ul class="nav flex-column">
                                @if(Auth::user()->hasPermission('category'))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{URL::action('Admin\CategoryController@getCategory')}}">دسته
                                            بندی محصولات</a>
                                    </li>
                                @endif
								@if(Auth::user()->hasPermission('products'))
								<li class="nav-item">
									<a class="nav-link"
										href="{{URL::action('Admin\ProductController@getProduct')}}">
										محصولات
									</a>
								</li>
								@endif
								@if(Auth::user()->hasPermission('product-specification-type'))
								<li class="nav-item">
									<a class="nav-link"
										href="{{URL::action('Admin\ProductSpecificationTypeController@getList')}}">مشخصات</a>
								</li>
								@endif
								@if(Auth::user()->hasPermission('brands'))
								<li class="nav-item">
									<a class="nav-link"
										href="{{URL::action('Admin\BrandController@getBrand')}}">برندها</a>
								</li>
								@endif

                                        <li class="nav-item">
                                            <a class="nav-link"
                                               href="{{URL::action('Admin\PriceController@get')}}">تخفیف دهی گروهی</a>
                                        </li>
                                    @if(Auth::user()->hasPermission('allproducts'))
                                        <li class="nav-item">
                                            <a class="nav-link"
                                               href="{{URL::action('Admin\ProductController@getAllProduct')}}">عملیات گروهی</a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->hasPermission('discounts'))
                                        <li class="nav-item">
                                            <a class="nav-link"
                                               href="{{URL::action('Admin\DiscountController@getIndex')}}">تخفیف ها</a>
                                        </li>
                                    @endif

							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
							data-target="#submenu-3" aria-controls="submenu-3"><i
								class="fas fa-fw fa-chart-pie"></i>محتوا</a>
						<div id="submenu-3" class="collapse submenu" style="">
							<ul class="nav flex-column">
                                @if(Auth::user()->hasPermission('article-cat'))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{URL::action('Admin\ArticleController@getArticleCat')}}">
                                            دسته بندی مقالات</a>
                                    </li>
                                @endif
								@if(Auth::user()->hasPermission('articles'))
								<li class="nav-item">
									<a class="nav-link"
										href="{{URL::action('Admin\ArticleController@getArticle')}}">
										مقالات</a>
								</li>
								@endif
								@if(Auth::user()->hasPermission('slider'))
								<li class="nav-item">
									<a class="nav-link"
										href="{{URL::action('Admin\SliderController@getSlider')}}">اسلایدر</a>
								</li>
								@endif
                                    @if(Auth::user()->hasPermission('mobile-slider'))
                                        <li class="nav-item">
                                            <a class="nav-link"
                                               href="{{URL::action('Admin\SliderController@getMobile')}}">بنر موبایل</a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->hasPermission('questions'))
                                        @php $comcount =App\Models\Question::whereNull('product_id')->count();
                                        @endphp
                                        <li class="nav-item">
                                            <a class="nav-link"
                                               href="{{URL::action('Admin\QuestionController@getFaq')}}">
                                                سوالات متداول سایت</a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->hasPermission('faq'))
                                        @php $faqcount =App\Models\Question::whereNotNull('product_id')->whereNull('answer')->count();
                                        @endphp
                                        <li class="nav-item">
                                            <a class="nav-link"
                                               href="{{URL::action('Admin\QuestionController@getQa')}}">
                                                سوالات متداول کاربران
                                                <span class="badge badge-danger rounded-circle ms-2">
									{{@$faqcount}}
								</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->hasPermission('tags'))
                                        <li class="nav-item">
                                            <a class="nav-link"
                                               href="{{URL::action('Admin\TagController@get')}}">تگ ها
                                            </a>
                                        </li>
                                    @endif


							</ul>
						</div>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
							data-target="#submenu-4" aria-controls="submenu-4"><i
								class="fab fa-fw fa-wpforms"></i>مدیران</a>
						<div id="submenu-4" class="collapse submenu" style="">

							<ul class="nav flex-column">
                                @if(Auth::user()->hasPermission('users'))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{URL::action('Admin\UserController@getIndex2')}}">
                                              کاربران سایت
                                        </a>
                                    </li>
                                @endif
                                @if(Auth::user()->hasPermission('user'))
								<li class="nav-item">
									<a class="nav-link"
										href="{{URL::action('Admin\UserController@getIndex')}}">
										مدیریت مدیران
									</a>
								</li>

								<li class="nav-item">
									<a class="nav-link"
										href="{{URL::action('Admin\UserController@getGroup')}}">
										مدیریت سطح دسترسی
									</a>
								</li>
                                @endif
                                @if(Auth::user()->hasPermission('departments'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{URL::action('Admin\DepartmentController@get')}}">دپارتمان ها</a>
                                    </li>
                                @endif
							</ul>

						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
							data-target="#submenu-5" aria-controls="submenu-5"><i
								class="fas fa-fw fa-inbox"></i>پیام ها</a>
						<div id="submenu-5" class="collapse submenu" style="">
							<ul class="nav flex-column">
								@if(Auth::user()->hasPermission('comment'))
								@php $comcount =App\Models\Comment::where('status','
								<>','1')->count();
										 @endphp
                                <li class="nav-item">
							<a class="nav-link position-relative" href="{{URL::action('Admin\CommentController@getIndex')}}">
							 	کامنت ها
								 <span class="badge badge-danger rounded-circle ms-2">
									{{@$comcount}}
								</span>
							</a>
                                </li>
                                @endif
                                    @if(Auth::user()->hasPermission('tickets'))
                                        @php $tickcount =App\Models\Ticket::whereNull('parent_id')->whereStatus(0)->count();
										@endphp
                                <li class="nav-item">
                                    <a class="nav-link position-relative" href="{{URL::action('Admin\TicketController@ticketsList')}}">
								درخواست ها
								<span class="badge badge-danger rounded-circle ms-2">
									{{@$tickcount}}
								</span>
							</a>
                                </li>
                                    @endif
                                    @if(Auth::user()->hasPermission('contact'))
                                        @php $concount =App\Models\Contact::where('readat','0')->count();
                                        @endphp
                                        <li class="nav-item">
                                            <a class="nav-link position-relative" href="{{URL::action('Admin\ContactController@getIndex')}}">
                                                پیام ها
                                                <span class="badge badge-danger rounded-circle ms-2">
									{{@$concount}}
								</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->hasPermission('notification'))
                                        @php $bellcount =App\Models\Bell::where('status','0')->count();
                                        @endphp
                                        <li class="nav-item">
                                            <a class="nav-link position-relative" href="{{URL::action('Admin\BellController@get')}}">
                                              به من اطلاع بده
                                                <span class="badge badge-danger rounded-circle ms-2">
									{{@$bellcount}}
								</span>
                                            </a>
                                        </li>
                                    @endif
							</ul>
						</div>
					</li>
					<li class="nav-divider">
						Features
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> سئو </a>
						<div id="submenu-6" class="collapse submenu" style="">
							<ul class="nav flex-column">
                                @if(Auth::user()->hasPermission('redirect'))
							<li class="nav-item">
								<a class="nav-link" href="{{URL::action('Admin\RedirectController@getRedirect')}}">ریدایرکت</a>
							</li>
                                @endif
                                    @if(Auth::user()->hasPermission('uploader'))
							<li class="nav-item">
								<a class="nav-link" href="{{URL::action('Admin\ContentController@getUploader')}}">آپلودر</a>
							</li>
                                    @endif

							</ul>
						</div>
					</li>
					                                   @if(Auth::user()->hasPermission('order'))
 @php $ordercount =App\Models\Order::where('order_status_id','3')->count();
                                    @endphp
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-table"></i>
                          فاکتورها  <span class="badge badge-danger rounded-circle ms-2">{{@$ordercount}}</span> </a>
                        <div id="submenu-7" class="collapse submenu" style="">
                            <ul class="nav flex-column">

                                    <li class="nav-item">
                                        <a class="nav-link position-relative" href="{{URL::action('Admin\OrderController@getIndex')}}">
                                            همه فاکتورها

                                        </a>
                                    </li>
                                @endif
                                    @if(Auth::user()->hasPermission('status'))
                                        <li class="nav-item">
                                                <a class="nav-link" href="{{URL::action('Admin\StatusController@get')}}">وضعیت ها </a>
                                        </li>

                            </ul>
                        </div>
                    </li>
                                                        @endif

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-fw fa-briefcase"></i> انبار </a>
                        <div id="submenu-8" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                @if(Auth::user()->hasPermission('inventory'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{URL::action('Admin\InventoryController@get')}}">همه انبارها</a>
                                    </li>
                                @endif
                                    @if(Auth::user()->hasPermission('inventory-receipt'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::action('Admin\InventoryController@getReceipt')}}">رسید انبار</a>
                                        </li>
                                    @endif

                            </ul>
                        </div>
                    </li>
                    <li class="nav-divider">
                    تنظیمات
                    </li>
                    <li class="nav-item">

                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                            </svg>
                                 تنظیمات
                        </a>
                        <div id="submenu-9" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                @if(Auth::user()->hasPermission('setting'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{URL::action('Admin\SettingController@getEditSetting')}}">تنظیمات</a>
                                    </li>
                                @endif
                                @if(Auth::user()->hasPermission('social'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{URL::action('Admin\SocialController@get')}}">تنظیمات سوشیال</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>

				</ul>
			</div>
		</nav>
	</div>
</div>
