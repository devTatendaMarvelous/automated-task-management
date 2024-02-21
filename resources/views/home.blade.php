<x-dashboard>

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Safety Driving School</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Safety Driving School</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid dashboard-2">
            <div class="row">
                <div class="col-xl- col-md-12 ">
                    <div class="row">
                        @if(Auth::user()->role=='Admin' || Auth::user()->role=='Branch_Admin' )
                            <div class="col-lg-3 col-md-6 box-col-3">
                                <div class="card profit-card">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1">
                                                <p class="square-after f-w-600 header-text-primary">Revenue</p>
                                                <h4></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="profit-wrapper header-text-primary icon-bg-primary"></div>
                                                <h6 class="header-text-primary">$0</h6>

                                            </div>
                                        </div>
                                        <div class="right-side icon-right-primary">
                                            <div class="shap-block">
                                                <div class="rounded-shap animate-bg-primary"><i></i><i></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 box-col-3">
                                <div class="card visitor-card">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1">
                                                <p class="square-after f-w-600 header-text-info">Cars</p>
                                                <h4></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="profit-wrapper header-text-info icon-bg-info"></div>
                                                <h6 class="header-text-info">0</h6>
                                            </div>
                                        </div>
                                        <div class="right-side icon-right-info">
                                            <div class="shap-block">
                                                <div class="rounded-shap animate-bg-primary"><i></i><i></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 box-col-3">
                                <div class="card sell-card">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1">
                                                <p class="square-after f-w-600 header-text-success">Students</p>
                                                <h4></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="profit-wrapper header-text-success icon-bg-success"></div>
                                                <h6 class="header-text-success">0</h6>

                                            </div>
                                        </div>
                                        <div class="right-side icon-right-success">
                                            <div class="shap-block">
                                                <div class="rounded-shap animate-bg-secondary"><i></i><i></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 box-col-3">
                                <div class="card sell-card">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1">
                                                <p class="square-after f-w-600 header-text-primary">Instructors</p>
                                                <h4></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="profit-wrapper header-text-primary icon-bg-primary"></div>
                                                <h6 class="header-text-primary">0</h6>

                                            </div>
                                        </div>
                                        <div class="right-side icon-right-primary">
                                            <div class="shap-block">
                                                <div class="rounded-shap animate-bg-primary"><i></i><i></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
                {{-- <div class="col-xl-3 col-lg-5 col-md-6 box-col-30 xl-30">
                    <div class="card product">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="square-after f-w-600">Selling Product<i class="fa fa-circle"> </i></p>
                                    <h4>Product</h4>
                                </div>
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-light"><i class="icon-layout-grid2"></i></div>
                                        </li>
                                        <li><i class="view-html fa fa-code font-white"></i></li>
                                        <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                                        <li><i class="icofont icofont-error close-card font-white"> </i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                        src="{{ asset('assets/images/dashboard-2/product/1.png') }}"
                                                        alt="">
                                                    <div class="flex-grow-1"><span> <a href="product.html">Nike
                                                                Shoes</a></span>
                                                        <p class="mb-0">451 item</p>
                                                    </div>
                                                    <div class="active-status active-online"></div>
                                                </div>
                                            </td>
                                            <td>-05%</td>
                                            <td><span>$49.00</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                        src="{{ asset('assets/images/dashboard-2/product/2.png') }}"
                                                        alt="">
                                                    <div class="flex-grow-1"><span> <a
                                                                href="product.html">Headphone</a></span>
                                                        <p class="mb-0">1657 item</p>
                                                    </div>
                                                    <div class="active-status active-online"></div>
                                                </div>
                                            </td>
                                            <td>-20%</td>
                                            <td><span>$28.00</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                        src="{{ asset('assets/images/dashboard-2/product/3.png') }}"
                                                        alt="">
                                                    <div class="flex-grow-1"><span> <a href="product.html">Tree
                                                                Pot</a></span>
                                                        <p class="mb-0">32 item</p>
                                                    </div>
                                                    <div class="active-status active-online"></div>
                                                </div>
                                            </td>
                                            <td>-12%</td>
                                            <td><span>$30.00</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                        src="{{ asset('assets/images/dashboard-2/product/4.png') }}"
                                                        alt="">
                                                    <div class="flex-grow-1"><span> <a
                                                                href="product.html">Black Purse</a></span>
                                                        <p class="mb-0">663 item</p>
                                                    </div>
                                                    <div class="active-status active-online"></div>
                                                </div>
                                            </td>
                                            <td>-16%</td>
                                            <td><span>$22.00</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                        src="{{ asset('assets/images/dashboard-2/product/5.png') }}"
                                                        alt="">
                                                    <div class="flex-grow-1"><span> <a href="product.html">Ck
                                                                Watch</a></span>
                                                        <p class="mb-0">4785 item</p>
                                                    </div>
                                                    <div class="active-status active-online"></div>
                                                </div>
                                            </td>
                                            <td>-50%</td>
                                            <td><span>$48.00</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                        src="{{ asset('assets/images/dashboard-2/product/6.png') }}"
                                                        alt="">
                                                    <div class="flex-grow-1"><span> <a href="product.html">New
                                                                T-shirt</a></span>
                                                        <p class="mb-0">9 item</p>
                                                    </div>
                                                    <div class="active-status active-online"></div>
                                                </div>
                                            </td>
                                            <td>-20%</td>
                                            <td><span>$69.00</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                        src="{{ asset('assets/images/dashboard-2/product/7.png') }}"
                                                        alt="">
                                                    <div class="flex-grow-1"><span> <a
                                                                href="product.html">Jewellery</a></span>
                                                        <p class="mb-0">7878 item</p>
                                                    </div>
                                                    <div class="active-status active-online"></div>
                                                </div>
                                            </td>
                                            <td>-10%</td>
                                            <td><span>$78.00</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                        src="{{ asset('assets/images/dashboard-2/product/8.png') }}"
                                                        alt="">
                                                    <div class="flex-grow-1"><span> <a href="product.html">Smart
                                                                Phone</a></span>
                                                        <p class="mb-0">987 item</p>
                                                    </div>
                                                    <div class="active-status active-online"></div>
                                                </div>
                                            </td>
                                            <td>-30%</td>
                                            <td><span>$36.00</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard"
                                    data-clipboard-target="#sell-product"><i
                                        class="icofont icofont-copy-alt"></i></button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-7 col-md-6 box-col-38 xl-38">
                    <div class="card goal-view">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="square-after f-w-600">Our Goal Overview<i class="fa fa-circle"> </i></p>
                                    <h4>Goal Overview</h4>
                                </div>
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-light"><i class="icon-layout-grid2"></i></div>
                                        </li>
                                        <li><i class="view-html fa fa-code font-white"></i></li>
                                        <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                                        <li><i class="icofont icofont-error close-card font-white"> </i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="goal-chart">
                                <div class="shap-block">
                                    <div class="rounded-shap animate-bg-secondary"><i></i><i></i><i></i></div>
                                </div>
                                <div id="goal"></div>
                            </div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard"
                                    data-clipboard-target="#goal-overview"><i
                                        class="icofont icofont-copy-alt"></i></button>

                            </div>
                        </div>
                        <div class="card-footer">
                            <ul>
                                <li>
                                    <h4 class="f-w-700">$8,54,159</h4><span class="f-w-500">Completed</span>
                                </li>
                                <li>
                                    <h4 class="f-w-700">$9,85,000</h4><span class="f-w-500">Our Goal</span>
                                </li>
                                <li>
                                    <h4 class="f-w-700">$66,264</h4><span class="f-w-500">In Progress</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 box-col-33">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="square-after f-w-600">Recent Activity<i class="fa fa-circle"> </i></p>
                                    <h4>New & Update</h4>
                                </div>
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-light"><i class="icon-layout-grid2"></i></div>
                                        </li>
                                        <li><i class="view-html fa fa-code font-white"></i></li>
                                        <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                                        <li><i class="icofont icofont-error close-card font-white"> </i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="activity-timeline">
                                <div class="d-flex align-items-start">
                                    <div class="activity-line"></div>
                                    <div class="activity-dot-secondary"></div>
                                    <div class="flex-grow-1">
                                        <p class="mt-0 todo-font"><span class="font-primary">20-04-2022 </span>Today
                                        </p><span class="f-w-700">Updated Product</span>
                                        <p class="mb-0">I like to be real. I don't like things to be staged or fussy.
                                        </p>
                                    </div><i class="fa fa-circle circle-dot-secondary pull-right"></i>
                                </div>
                                <div class="d-flex align-items-start">
                                    <div class="activity-dot-primary"></div>
                                    <div class="flex-grow-1">
                                        <p class="mt-0 todo-font"><span class="font-primary">20-04-2022
                                            </span>Today<span class="badge badge-primary ms-2">New</span></p><span
                                            class="f-w-700">James just like your product</span>
                                        <p>Design and style should work toward making look good.</p>
                                        <ul class="img-wrapper">
                                            <li> <img class="img-fluid"
                                                    src="{{ asset('assets/images/dashboard-2/product/shoes1.png') }}"
                                                    alt=""></li>
                                            <li><img class="img-fluid"
                                                    src="{{ asset('assets/images/dashboard-2/product/shoes2.png') }}"
                                                    alt=""></li>
                                        </ul>
                                    </div><i class="fa fa-circle circle-dot-primary pull-right"></i>
                                </div>
                                <div class="d-flex align-items-start">
                                    <div class="activity-dot-secondary"></div>
                                    <div class="flex-grow-1">
                                        <p class="mt-0 todo-font"><span class="font-primary">20-04-2022 </span>Today
                                        </p><span class="f-w-700">Jihan Doe just like your product</span>
                                        <p class="mb-0">If you have it, you can make anything look good.</p>
                                    </div><i class="fa fa-circle circle-dot-secondary pull-right"></i>
                                </div>
                            </div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#activity1"><i
                                        class="icofont icofont-copy-alt"></i></button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 box-col-28 xl-28">
                    <div class="card static-card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="square-after f-w-600">Order Statics<i class="fa fa-circle"> </i></p>
                                    <h4>6,65,484 Order</h4>
                                </div>
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-light"><i class="icon-layout-grid2"></i></div>
                                        </li>
                                        <li><i class="view-html fa fa-code font-white"></i></li>
                                        <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                                        <li><i class="icofont icofont-error close-card font-white"> </i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 pt-0">
                            <div class="order-static">
                                <div id="order-chart"></div>
                            </div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard"
                                    data-clipboard-target="#order-static"><i
                                        class="icofont icofont-copy-alt"></i></button>

                            </div>
                        </div>
                        <div class="card-footer">
                            <ul class="d-xxl-flex d-block order-bottom">
                                <li class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div><i class="fa fa-arrow-up"></i></div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6>84,315 order</h6>
                                        <p class="f-w-500">Last two month order....</p>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div><i class="fa fa-arrow-up"></i></div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6>61,481 order</h6>
                                        <p class="f-w-500">Last two Days order....</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 box-col-40">
                    <div class="card product-slider">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="square-after f-w-600">Latest Offer Product<i class="fa fa-circle"> </i>
                                    </p>
                                    <h4>-60% Offer</h4>
                                </div>
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-light"><i class="icon-layout-grid2"></i></div>
                                        </li>
                                        <li><i class="view-html fa fa-code font-white"></i></li>
                                        <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                                        <li><i class="icofont icofont-error close-card font-white"> </i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="owl-carousel owl-theme" id="owl-carousel-1">
                                <div class="item"><img class="img-fluid"
                                        src="{{ asset('assets/images/dashboard-2/1.png') }}" alt="">
                                    <div class="product-content">
                                        <div class="badge badge-primary">New</div>
                                        <h4> <a href="product.html">Black Apple Airpod</a><i
                                                class="fa fa-check-circle"></i></h4>
                                        <h5 class="f-16">$120.00</h5>
                                    </div>
                                </div>
                                <div class="item"><img class="img-fluid"
                                        src="{{ asset('assets/images/dashboard-2/2.png') }}" alt="">
                                    <div class="product-content">
                                        <div class="badge badge-primary">New</div>
                                        <h4> <a href="product.html">Red Hova Sport Shoes</a><i
                                                class="fa fa-check-circle"></i></h4>
                                        <h5 class="f-16">$120.00</h5>
                                    </div>
                                </div>
                                <div class="item"><img class="img-fluid"
                                        src="{{ asset('assets/images/dashboard-2/3.png') }}" alt="">
                                    <div class="product-content">
                                        <div class="badge badge-primary">New</div>
                                        <h4> <a href="product.html">Blue Mens Watch</a><i
                                                class="fa fa-check-circle"></i></h4>
                                        <h5 class="f-16">$120.00</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#product"><i
                                        class="icofont icofont-copy-alt"></i></button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6 col-md-12 box-col-7">
                    <div class="card order-card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="flex-grow-1">
                                    <p class="square-after f-w-600">Our Total Sold<i class="fa fa-circle"></i></p>
                                </div>
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-light"><i class="icon-layout-grid2"></i></div>
                                        </li>
                                        <li><i class="view-html fa fa-code font-white"></i></li>
                                        <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                                        <li><i class="icofont icofont-error close-card font-white"> </i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive theme-scrollbar">
                                <table class="table table-bordernone">
                                    <thead>
                                        <tr>
                                            <th class="f-26">Order List</th>
                                            <th>Status</th>
                                            <th>Operator</th>
                                            <th>Delivery Date</th>
                                            <th>Delivery Address</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="number-dot"><span class="f-w-700">1</span></div>
                                                    <div class="flex-grow-1"><span class="f-14 f-w-600">#456861</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> <span>Moving</span></td>
                                            <td>Ossim Keter</td>
                                            <td>16 August</td>
                                            <td>Green Bay, Wisconsin, London</td>
                                            <td>$450.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="number-dot"><span class="f-w-700">2</span></div>
                                                    <div class="flex-grow-1"><span class="f-14 f-w-600">#846953</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> <span>Moving</span></td>
                                            <td>Venter Loren</td>
                                            <td>21 September</td>
                                            <td>Summerlin, Nevada, United kingdom</td>
                                            <td>$136.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="number-dot"><span class="f-w-700">3</span></div>
                                                    <div class="flex-grow-1"><span class="f-14 f-w-600">#197568</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> <span>Cancel</span></td>
                                            <td>Fran Loain</td>
                                            <td>06 March</td>
                                            <td>Atlantic City, New Jersey, UK</td>
                                            <td>$624.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="number-dot"><span class="f-w-700">4</span></div>
                                                    <div class="flex-grow-1"><span class="f-14 f-w-600">#647953</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> <span>Pending</span></td>
                                            <td>Loften Horen</td>
                                            <td>12 February</td>
                                            <td>Fort Worth, Soun Di, Texas, USA</td>
                                            <td>$48.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="number-dot"><span class="f-w-700">5</span></div>
                                                    <div class="flex-grow-1"><span class="f-14 f-w-600">#447495</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> <span>Moving</span></td>
                                            <td>Loie Fenter</td>
                                            <td>12 February</td>
                                            <td>Green Bay, Wisconsin, London</td>
                                            <td>$258.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard"
                                    data-clipboard-target="#total-sold"><i
                                        class="icofont icofont-copy-alt"></i></button>

                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>

</x-dashboard>
