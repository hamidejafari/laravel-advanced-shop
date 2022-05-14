<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title fw-bolder">
                        داشبورد کاج شاپ
                    </h2>
                    <!-- <p class="pageheader-text">
                        Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.
                    </p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#" class="breadcrumb-link">
                                        Dashboard
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard Template</li>
                            </ol>
                        </nav>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="ecommerce-widget">

            <div class="row">
                @if(Auth::user()->hasPermission('products'))
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <a href="{{URL::action('Admin\ProductController@getProduct')}}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body d-flex">
                                <div class="metric-value d-inline-block w-100">
                                    <h2 class="m-0 d-flex align-items-center justify-content-between">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                             fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                            <path
                                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                        </svg>
                                        <span>
											محصولات
										</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                    @if(Auth::user()->hasPermission('category'))
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <a href="{{URL::action('Admin\CategoryController@getCategory')}}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body d-flex">
                                <div class="metric-value d-inline-block w-100">
                                    <h2 class="m-0 d-flex align-items-center justify-content-between">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                             fill="currentColor" class="bi bi-folder2-open"
                                             viewBox="0 0 16 16">
                                            <path
                                                d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14V3.5zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5V6zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7H1.633z" />
                                        </svg>
                                        <span>
											دسته بندی محصولات
										</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                    @endif
                    @if(Auth::user()->hasPermission('brands'))
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <a href="{{URL::action('Admin\BrandController@getBrand')}}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body d-flex">
                                <div class="metric-value d-inline-block w-100">
                                    <h2 class="m-0 d-flex align-items-center justify-content-between">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-collection" viewBox="0 0 16 16">
                                            <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"/>
                                        </svg>
                                        <span>
											برندها
										</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                    @endif
                    @if(Auth::user()->hasPermission('articles'))
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <a href="{{URL::action('Admin\ArticleController@getArticle')}}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body d-flex">
                                <div class="metric-value d-inline-block w-100">
                                    <h2 class="m-0 d-flex align-items-center justify-content-between">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
                                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                        </svg>
                                        <span>
									مقالات
										</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                    @endif
                    @if(Auth::user()->hasPermission('article-cat'))
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <a href="{{URL::action('Admin\ArticleController@getArticleCat')}}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body d-flex">
                                <div class="metric-value d-inline-block w-100">
                                    <h2 class="m-0 d-flex align-items-center justify-content-between">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                                            <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/>
                                            <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z"/>
                                        </svg>
                                        <span>
											 دسته بندی مقالات
										</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                    @endif
                    @if(Auth::user()->hasPermission('slider'))
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                            <a href="{{URL::action('Admin\SliderController@getSlider')}}" class="text-decoration-none">
                                <div class="card">
                                    <div class="card-body d-flex">
                                        <div class="metric-value d-inline-block w-100">
                                            <h2 class="m-0 d-flex align-items-center justify-content-between">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                    <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                                </svg>
                                                <span>
											اسلایدر
										</span>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if(Auth::user()->hasPermission('order'))
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                        <a href="{{URL::action('Admin\OrderController@getIndex')}}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body d-flex">
                                    <div class="metric-value d-inline-block w-100">
                                        <h2 class="m-0 d-flex align-items-center justify-content-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                                                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                                <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
                                            </svg>
                                            <span>
											فاکتورها
										</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @if(Auth::user()->hasPermission('inventory-receipt'))
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                        <a href="{{URL::action('Admin\InventoryController@getReceipt')}}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body d-flex">
                                    <div class="metric-value d-inline-block w-100">
                                        <h2 class="m-0 d-flex align-items-center justify-content-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                                                <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"/>
                                            </svg>
                                            <span>
											رسید انبار
										</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @if(Auth::user()->hasPermission('redirect'))
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                            <a href="{{URL::action('Admin\RedirectController@getRedirect')}}" class="text-decoration-none">
                                <div class="card">
                                    <div class="card-body d-flex">
                                        <div class="metric-value d-inline-block w-100">
                                            <h2 class="m-0 d-flex align-items-center justify-content-between">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                                    <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                                    <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                                                </svg>
                                                <span>
											ریدایرکت
										</span>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                    @if(Auth::user()->hasPermission('setting'))
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                        <a href="{{URL::action('Admin\SettingController@getEditSetting')}}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body d-flex">
                                    <div class="metric-value d-inline-block w-100">
                                        <h2 class="m-0 d-flex align-items-center justify-content-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                 fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                                <path
                                                    d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                            </svg>
                                            <span>
											تنظیمات
										</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
            </div>
            <div class="row">
                <!-- ============================================================== -->

                <!-- ============================================================== -->

                <!-- recent orders  -->
                <!-- ============================================================== -->
                <!-- <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Recent Orders</h5>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">#</th>
                                        <th class="border-0">Image</th>
                                        <th class="border-0">Product Name</th>
                                        <th class="border-0">Product Id</th>
                                        <th class="border-0">Quantity</th>
                                        <th class="border-0">Price</th>
                                        <th class="border-0">Order Time</th>
                                        <th class="border-0">Customer</th>
                                        <th class="border-0">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="m-r-10"><img src="assets/images/product-pic.jpg" alt="user" class="rounded" width="45"></div>
                                        </td>
                                        <td>Product #1 </td>
                                        <td>id000001 </td>
                                        <td>20</td>
                                        <td>$80.00</td>
                                        <td>27-08-2018 01:22:12</td>
                                        <td>Patricia J. King </td>
                                        <td><span class="badge-dot badge-brand mr-1"></span>InTransit </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <div class="m-r-10"><img src="assets/images/product-pic-2.jpg" alt="user" class="rounded" width="45"></div>
                                        </td>
                                        <td>Product #2 </td>
                                        <td>id000002 </td>
                                        <td>12</td>
                                        <td>$180.00</td>
                                        <td>25-08-2018 21:12:56</td>
                                        <td>Rachel J. Wicker </td>
                                        <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <div class="m-r-10"><img src="assets/images/product-pic-3.jpg" alt="user" class="rounded" width="45"></div>
                                        </td>
                                        <td>Product #3 </td>
                                        <td>id000003 </td>
                                        <td>23</td>
                                        <td>$820.00</td>
                                        <td>24-08-2018 14:12:77</td>
                                        <td>Michael K. Ledford </td>
                                        <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <div class="m-r-10"><img src="assets/images/product-pic-4.jpg" alt="user" class="rounded" width="45"></div>
                                        </td>
                                        <td>Product #4 </td>
                                        <td>id000004 </td>
                                        <td>34</td>
                                        <td>$340.00</td>
                                        <td>23-08-2018 09:12:35</td>
                                        <td>Michael K. Ledford </td>
                                        <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                    </tr>
                                    <tr>
                                        <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- ============================================================== -->
                <!-- end recent orders  -->

            </div>

        </div>
    </div>
</div>
