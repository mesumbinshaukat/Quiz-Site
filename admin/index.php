<?php
session_start();

include("./connection/connection.php");

if (!isset($_COOKIE["email"]) && !isset($_COOKIE["login"])) {
    header("Location: ./verify-access/admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="assets/vendor/perfect-scrollbar.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="assets/css/app.rtl.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="assets/css/vendor-material-icons.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="assets/css/vendor-fontawesome-free.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133433427-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-133433427-1');
    </script>

    <!-- Flatpickr -->
    <link type="text/css" href="assets/css/vendor-flatpickr.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr.rtl.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr-airbnb.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr-airbnb.rtl.css" rel="stylesheet">

    <!-- Vector Maps -->
    <link type="text/css" href="assets/vendor/jqvmap/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body class="layebardefault">

    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <?php include("./partials/header.php"); ?>

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">

                    <div class="container-fluid page__heading-container">
                        <div class="page__heading d-flex align-items-end">
                            <div class="flex">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Dashboard</h1>
                            </div>
                            <div class="flatpickr-wrapper ml-3">
                                <div id="recent_orders_date" data-toggle="flatpickr" data-flatpickr-wrap="true" data-flatpickr-mode="range" data-flatpickr-alt-format="d/m/Y" data-flatpickr-date-format="d/m/Y">
                                    <a href="javascript:void(0)" class="link-date" data-toggle>13/03/2018 to
                                        20/03/2018</a>
                                    <input class="flatpickr-hidden-input" type="hidden" value="13/03/2018 to 20/03/2018" data-input>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid page__container">

                        <div class="row card-group-row">
                            <div class="col-lg-4 col-md-6 card-group-row__col">
                                <div class="card card-group-row__card">
                                    <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                                        <div class="flex">
                                            <div class="card-header__title mb-2">Total sales</div>
                                            <div class="text-amount">&dollar;82,99</div>
                                        </div>
                                        <div class="ml-3 d-flex flex-column align-items-end text-right">
                                            <a href="" class="mb-2">View</a>
                                            <div class="text-stats text-success">2.6% <i class="material-icons">arrow_upward</i></div>
                                        </div>
                                    </div>
                                    <div class="card-body flex-0">
                                        <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                            <span class="flex text-body">Online Store</span>
                                            <span class="mx-3">&dollar;50.99</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">arrow_upward</i>
                                                3.2%</span>
                                        </small>
                                        <small class="d-flex align-items-center font-weight-bold text-muted">
                                            <span class="flex text-body">Facebook</span>
                                            <span class="mx-3">&dollar;32.00</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-danger icon-16pt mr-1">arrow_downward</i>
                                                7.0%</span>
                                        </small>
                                    </div>
                                    <div class="card-body text-muted flex d-flex align-items-center">
                                        <div class="chart w-100" style="height: 200px;">
                                            <canvas id="totalSalesChart">
                                                <span style="font-size: 1rem;"><strong>Total Sales</strong> chart goes
                                                    here.</span>
                                            </canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 card-group-row__col">
                                <div class="card card-group-row__card">
                                    <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                                        <div class="flex">
                                            <div class="card-header__title mb-2">Total visitors</div>
                                            <div class="text-amount">452</div>
                                        </div>
                                        <div class="ml-3 d-flex flex-column align-items-end text-right">
                                            <a href="" class="mb-2">View</a>
                                            <div class="text-stats text-danger">9.6% <i class="material-icons">arrow_downward</i></div>
                                        </div>
                                    </div>
                                    <div class="card-body text-muted flex d-flex align-items-center">
                                        <div class="chart w-100" style="height: 250px;">
                                            <canvas id="totalVisitorsChart">
                                                <span style="font-size: 1rem;"><strong>Total Visitors</strong> chart
                                                    goes here.</span>
                                            </canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 card-group-row__col">
                                <div class="card card-group-row__card">
                                    <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                                        <div class="flex">
                                            <div class="card-header__title mb-2">Repeat customer</div>
                                            <div class="text-amount">5.43%</div>
                                        </div>
                                        <div class="ml-3 d-flex flex-column align-items-end text-right">
                                            <a href="" class="mb-2">View</a>
                                            <div class="text-stats text-success">2.6% <i class="material-icons">arrow_upward</i></div>
                                        </div>
                                    </div>
                                    <div class="card-body text-muted flex d-flex align-items-center">
                                        <div class="chart w-100" style="height: 250px;">
                                            <canvas id="repeatCustomerRateChart">
                                                <span style="font-size: 1rem;"><strong>Repeat Customer Rate</strong>
                                                    chart goes here.</span>
                                            </canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8">

                                <div class="card">
                                    <div class="card-header bg-white d-flex align-items-center">
                                        <h4 class="card-header__title flex m-0">Current Sales</h4>
                                        <div data-toggle="flatpickr" data-flatpickr-wrap="true" data-flatpickr-static="true" data-flatpickr-mode="range" data-flatpickr-alt-format="d/m/Y" data-flatpickr-date-format="d/m/Y">
                                            <a href="javascript:void(0)" class="link-date" data-toggle>13/03/2018 <span class="text-muted mx-1">to</span> 20/03/2018</a>
                                            <input class="flatpickr-hidden-input" type="hidden" value="13/03/2018 to 20/03/2018" data-input>
                                        </div>
                                    </div>
                                    <div class="card-body text-muted">
                                        <div class="chart" style="height: calc(248px);">
                                            <canvas id="earningsTrafficChart">
                                                <span style="font-size: 1rem;"><strong>Website Traffic /
                                                        Earnings</strong> area chart goes here.</span>
                                            </canvas>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4">

                                <div class="card">
                                    <div class="card-header bg-white">
                                        <h4 class="card-header__title m-0">History</h4>
                                    </div>
                                    <div class="card-body py-4">

                                        <div class="d-flex justify-content-between pb-1">
                                            <span>January</span>
                                            <div>
                                                <strong>$10,000</strong> <span class="text-muted">/ $20,000</span>
                                            </div>
                                        </div>
                                        <div class="progress mb-3" style="height: 8px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 52%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                        <div class="d-flex justify-content-between pb-1">
                                            <span>February</span>
                                            <div>
                                                <strong>$8,250</strong> <span class="text-muted">/ $5,230</span>
                                            </div>
                                        </div>
                                        <div class="progress mb-3" style="height: 8px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                        <div class="d-flex justify-content-between pb-1">
                                            <span>March</span>
                                            <div>
                                                <strong>$1,150</strong> <span class="text-muted">/ $8,120</span>
                                            </div>
                                        </div>
                                        <div class="progress mb-3" style="height: 8px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 22%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                        <div class="d-flex justify-content-between pb-1">
                                            <span>April</span>
                                            <div>
                                                <strong>$4,625</strong> <span class="text-muted">/ $11,450</span>
                                            </div>
                                        </div>
                                        <div class="progress mb-3" style="height: 8px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                        <div class="d-flex justify-content-between pb-1">
                                            <span>May</span>
                                            <div>
                                                <strong>$5,875</strong> <span class="text-muted">/ $12,600</span>
                                            </div>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row card-group-row">
                            <div class="col-lg-4 col-md-6 card-group-row__col">
                                <div class="card card-group-row__card">
                                    <div class="card-body d-flex flex-row align-items-center flex-0">
                                        <div class="flex">
                                            <div class="card-header__title mb-2">Total orders</div>
                                            <div class="text-amount">4</div>
                                        </div>
                                        <div class="ml-3 d-flex flex-column align-items-end text-right">
                                            <a href="" class="mb-2">View</a>
                                            <div class="text-stats text-success">92% <i class="material-icons">arrow_upward</i></div>
                                        </div>
                                    </div>
                                    <div class="card-body text-muted flex d-flex align-items-center">
                                        <div class="chart w-100" style="height: 200px;">
                                            <canvas id="totalOrdersChart">
                                                <span style="font-size: 1rem;"><strong>Total Orders</strong> chart goes
                                                    here.</span>
                                            </canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 card-group-row__col">
                                <div class="card card-group-row__card">
                                    <div class="card-body d-flex flex-row align-items-center flex-0">
                                        <div class="flex">
                                            <div class="card-header__title mb-2">Conversion rate</div>
                                            <div class="text-amount">5.63%</div>
                                        </div>
                                        <div class="ml-3 d-flex flex-column align-items-end text-right">
                                            <a href="" class="mb-2">View</a>
                                            <div class="text-stats text-success">3.6% <i class="material-icons">arrow_upward</i></div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <small class="text-muted text-uppercase mb-3 d-block font-weight-bold">Conversion
                                            Funnel</small>
                                        <small class="d-flex align-items-start font-weight-bold text-muted mb-2">
                                            <span class="flex d-flex flex-column">
                                                <span class="text-body">Added to cart</span>
                                                5 visits
                                            </span>
                                            <span class="mx-3">7.04%</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">arrow_upward</i>
                                                4.0%</span>
                                        </small>
                                        <small class="d-flex align-items-start font-weight-bold text-muted mb-2">
                                            <span class="flex d-flex flex-column">
                                                <span class="text-body">Reached checkout</span>
                                                5 visits
                                            </span>
                                            <span class="mx-3">7.04%</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">arrow_upward</i>
                                                2.0%</span>
                                        </small>
                                        <small class="d-flex align-items-start font-weight-bold text-muted">
                                            <span class="flex d-flex flex-column">
                                                <span class="text-body">Purchased</span>
                                                4 orders
                                            </span>
                                            <span class="mx-3">5.63%</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">arrow_upward</i>
                                                1.4%</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 card-group-row__col">
                                <div class="card card-group-row__card">
                                    <div class="card-body d-flex flex-row align-items-center flex-0">
                                        <div class="flex">
                                            <div class="card-header__title mb-2">Average order value</div>
                                            <div class="text-amount">&dollar;36.23</div>
                                        </div>
                                        <div class="ml-3 d-flex flex-column align-items-end text-right">
                                            <a href="" class="mb-2">View</a>
                                            <div class="text-stats text-success">6.7% <i class="material-icons">arrow_upward</i></div>
                                        </div>
                                    </div>
                                    <div class="card-body text-muted flex d-flex align-items-center">
                                        <div class="chart w-100" style="height: 200px;">
                                            <canvas id="averageOrderValueChart">
                                                <span style="font-size: 1rem;"><strong>Average Order Value</strong>
                                                    chart goes here.</span>
                                            </canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-7">

                                <div class="card card-tasks">
                                    <div class="card-header bg-white">
                                        <div class="row">
                                            <div class="col-md-4 text-md-left align-self-center">
                                                <h4 class="card-header__title m-0">Tasks</h4>
                                            </div>
                                            <div class="col-md-8 d-flex justify-content-md-end">
                                                <button class="btn btn-secondary btn-sm mr-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">filter_list</i>
                                                    <span>Filter</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <h6 class="dropdown-header">Sort By</h6>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <i class="material-icons icon-16pt text-success mr-2">check_circle</i>
                                                        <span>Complete</span>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <i class="material-icons icon-16pt text-danger mr-2">warning</i>
                                                        <span>Incomplete</span>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <i class="material-icons icon-16pt mr-2">date_range</i>
                                                        <span>Date</span>
                                                    </a>
                                                </div>
                                                <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#newTaskModal">
                                                    <i class="material-icons md-18">add</i>
                                                    Add Task
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">

                                        <li class="list-group-item list-group-item-action py-2">
                                            <div class="row align-items-center">
                                                <div class="col-lg-auto">
                                                    <i class="material-icons md-18 text-muted align-middle mr-1">check_circle</i>
                                                    <span>Add content on lessons</span>
                                                </div>
                                                <div class="col-lg d-flex align-items-center text-md-right">
                                                    <span class="ml-auto badge badge-outline-info">Request</span>
                                                    <span class="ml-2">20 Jul</span>
                                                    <span class="avatar avatar-xs ml-2">
                                                        <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" class="avatar-img rounded-circle" alt="">
                                                    </span>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-group-item list-group-item-action py-2">
                                            <div class="row align-items-center">
                                                <div class="col-lg-auto">
                                                    <i class="material-icons md-18 text-muted align-middle mr-1">check_circle</i>
                                                    <span>Fix dropdowns in navbars</span>
                                                </div>
                                                <div class="col-lg d-flex align-items-center text-md-right">
                                                    <span class="ml-auto badge badge-outline-danger">Bug</span>
                                                    <span class="ml-2">8 Oct</span>
                                                    <span class="avatar avatar-xs ml-2">
                                                        <img src="assets/images/256_michael-dam-258165-unsplash.jpg" class="avatar-img rounded-circle" alt="">
                                                    </span>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-group-item list-group-item-action py-2">
                                            <div class="row align-items-center">
                                                <div class="col-lg-auto">
                                                    <i class="material-icons md-18 text-muted align-middle mr-1">check_circle</i>
                                                    <span>Add new sidebar to the right</span>
                                                </div>
                                                <div class="col-lg d-flex align-items-center text-md-right">
                                                    <span class="ml-auto badge badge-outline-info">Request</span>
                                                    <span class="ml-2">11 Oct</span>
                                                    <span class="avatar avatar-xs ml-2">
                                                        <img src="assets/images/256_luke-porter-261779-unsplash.jpg" class="avatar-img rounded-circle" alt="">
                                                    </span>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-group-item list-group-item-action py-2">
                                            <div class="row align-items-center">
                                                <div class="col-lg-auto">
                                                    <i class="material-icons md-18 text-muted align-middle mr-1">check_circle</i>
                                                    <span>Create Dashboard for administrative tasks</span>
                                                </div>
                                                <div class="col-lg d-flex align-items-center text-md-right">
                                                    <span class="ml-auto badge badge-outline-primary">feature</span>
                                                    <span class="ml-2">20 Oct</span>
                                                    <span class="avatar avatar-xs ml-2">
                                                        <img src="assets/images/avatar/demi.png" class="avatar-img rounded-circle" alt="">
                                                    </span>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                            </div>
                            <div class="col-lg-5">

                                <div class="card">
                                    <div class="card-header bg-white d-flex align-items-center">
                                        <h4 class="card-header__title flex m-0">Stats by Location</h4>
                                        <i class="material-icons icon-muted ml-3">expand_more</i>
                                    </div>
                                    <div class="card-header card-header-tabs-basic nav justify-content-center" role="tablist">
                                        <div data-toggle="chart" data-target="#locationDoughnutChart" data-update='{"data":{
              "labels": ["United States", "United Kingdom", "Germany", "India"], 
              "datasets": [{"label": "Traffic", "data":[25,25,15,35]}]
            }}'>
                                            <a href="#" class="active" data-toggle="tab" role="tab" aria-selected="true">
                                                Traffic
                                            </a>
                                        </div>
                                        <div data-toggle="chart" data-target="#locationDoughnutChart" data-update='{"data":{
              "labels": ["United States", "United Kingdom", "Germany", "India"], 
              "datasets": [{"label": "Purchases", "data":[15,17,25,43]}]
            }}'>
                                            <a href="#" data-toggle="tab" role="tab" aria-selected="false">
                                                Purchases
                                            </a>
                                        </div>
                                        <div data-toggle="chart" data-target="#locationDoughnutChart" data-update='{"data":{
              "labels": ["United States", "United Kingdom", "Germany", "India"], 
              "datasets": [{"label": "Quotes", "data":[53,17,25,5]}]
            }}'>
                                            <a href="#" data-toggle="tab" role="tab" aria-selected="false">
                                                Quotes
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="chart" style="height: 145px;">
                                                    <canvas id="locationDoughnutChart" data-chart-legend="#locationDoughnutChartLegend">
                                                        <span style="font-size: 1rem;" class="text-muted"><strong>Location</strong> doughnut chart
                                                            goes here.</span>
                                                    </canvas>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div id="locationDoughnutChartLegend" class="chart-legend chart-legend--vertical"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row card-group-row">
                            <div class="col-lg-4 col-md-6 card-group-row__col">
                                <div class="card card-group-row__card">
                                    <div class="card-body d-flex flex-row align-items-start flex-0 border-bottom">
                                        <div class="flex">
                                            <div class="card-header__title mb-2">Top products by units</div>
                                            <div class="text-amount">2.3k units</div>
                                        </div>
                                        <div class="ml-3 d-flex flex-column align-items-end text-right">
                                            <a href="">View</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <small class="text-muted text-uppercase mb-2 d-block font-weight-bold">Most sold
                                            items</small>
                                        <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                            <span class="flex text-body">Wool shirt heavy</span>
                                            <span class="mx-3">643</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">arrow_upward</i>
                                                5.00%</span>
                                        </small>
                                        <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                            <span class="flex text-body">Wool shirt light</span>
                                            <span class="mx-3">322</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">arrow_upward</i>
                                                4.70%</span>
                                        </small>
                                        <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                            <span class="flex text-body">Wool long sleve</span>
                                            <span class="mx-3">234</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">arrow_upward</i>
                                                60.6%</span>
                                        </small>
                                        <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                            <span class="flex text-body">Wool shorts</span>
                                            <span class="mx-3">78</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">arrow_upward</i>
                                                11.1%</span>
                                        </small>
                                        <small class="d-flex align-items-center font-weight-bold text-muted">
                                            <span class="flex text-body">Wool socks</span>
                                            <span class="mx-3">45</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">arrow_upward</i>
                                                15.8%</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 card-group-row__col">
                                <div class="card card-group-row__card">
                                    <div class="card-body d-flex flex-row align-items-start flex-0 border-bottom">
                                        <div class="flex">
                                            <div class="card-header__title mb-2">Visits by location</div>
                                            <div class="text-amount">17 countries</div>
                                        </div>
                                        <div class="ml-3 d-flex flex-column align-items-end text-right">
                                            <a href="">View</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <small class="text-muted text-uppercase mb-2 d-block font-weight-bold">Top
                                            countries</small>
                                        <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                            <span class="flex text-body">USA</span>
                                            <span class="mx-3">1.438</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">arrow_upward</i>
                                                5.8%</span>
                                        </small>
                                        <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                            <span class="flex text-body">Canada</span>
                                            <span class="mx-3">928</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-danger icon-16pt mr-1">arrow_downward</i>
                                                3.2%</span>
                                        </small>
                                        <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                            <span class="flex text-body">Germany</span>
                                            <span class="mx-3">674</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">arrow_upward</i>
                                                2.1%</span>
                                        </small>
                                        <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                            <span class="flex text-body">Mexico</span>
                                            <span class="mx-3">258</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-danger icon-16pt mr-1">arrow_downward</i>
                                                4.8%</span>
                                        </small>
                                        <small class="d-flex align-items-center font-weight-bold text-muted">
                                            <span class="flex text-body">France</span>
                                            <span class="mx-3">90</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">arrow_upward</i>
                                                9.8%</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 card-group-row__col">
                                <div class="card card-group-row__card">
                                    <div class="card-body d-flex flex-row align-items-start flex-0">
                                        <div class="flex">
                                            <div class="card-header__title">Visits by device</div>
                                        </div>
                                        <div class="ml-3 d-flex flex-column align-items-end text-right">
                                            <a href="">View</a>
                                        </div>
                                    </div>
                                    <div class="card-body text-muted flex d-flex align-items-center">
                                        <div class="chart w-100" style="height: 150px;">
                                            <div class="position-relative">
                                                <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                                                    <h3 class="mb-0">59%</h3>
                                                    <small class="text-uppercase">Desktop</small>
                                                </div>
                                                <canvas id="visitsByDeviceChart">
                                                    <span style="font-size: 1rem;"><strong>Visits by Device</strong>
                                                        chart goes here.</span>
                                                </canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body flex-0">
                                        <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                            <span class="flex text-body">Desktop</span>
                                            <span class="mx-3">267</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">arrow_upward</i>
                                                2.1%</span>
                                        </small>
                                        <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                            <span class="flex text-body">Mobile</span>
                                            <span class="mx-3">184</span>
                                            <span class="d-flex align-items-center"><i class="material-icons text-danger icon-16pt mr-1">arrow_downward</i>
                                                4.8%</span>
                                        </small>
                                        <small class="d-flex align-items-center font-weight-bold text-muted">
                                            <span class="flex text-body">Tablet</span>
                                            <span class="mx-3">0</span>
                                            <span>&mdash;</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="card card-social card-facebook">
                                    <div class="card-body">
                                        <a href="#">
                                            <svg viewBox="0 0 16 16" width="30%" style="fill: currentColor;" xmlns="http://www.w3.org/2000/svg" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
                                                <path d="M15.117 0H.883C.395 0 0 .395 0 .883v14.234c0 .488.395.883.883.883h7.663V9.804H6.46V7.39h2.086V5.607c0-2.066 1.262-3.19 3.106-3.19.883 0 1.642.064 1.863.094v2.16h-1.28c-1 0-1.195.48-1.195 1.18v1.54h2.39l-.31 2.42h-2.08V16h4.077c.488 0 .883-.395.883-.883V.883C16 .395 15.605 0 15.117 0" />
                                            </svg>
                                            <span class="mt-1 d-block">
                                                45k
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-social card-twitter">
                                    <div class="card-body">
                                        <a href="#">
                                            <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" width="30%" style="fill: currentColor;" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
                                                <path d="M16 3.038c-.59.26-1.22.437-1.885.517.677-.407 1.198-1.05 1.443-1.816-.634.37-1.337.64-2.085.79-.598-.64-1.45-1.04-2.396-1.04-1.812 0-3.282 1.47-3.282 3.28 0 .26.03.51.085.75-2.728-.13-5.147-1.44-6.766-3.42C.83 2.58.67 3.14.67 3.75c0 1.14.58 2.143 1.46 2.732-.538-.017-1.045-.165-1.487-.41v.04c0 1.59 1.13 2.918 2.633 3.22-.276.074-.566.114-.865.114-.21 0-.41-.02-.61-.058.42 1.304 1.63 2.253 3.07 2.28-1.12.88-2.54 1.404-4.07 1.404-.26 0-.52-.015-.78-.045 1.46.93 3.18 1.474 5.04 1.474 6.04 0 9.34-5 9.34-9.33 0-.14 0-.28-.01-.42.64-.46 1.2-1.04 1.64-1.7z" />
                                            </svg>
                                            <span class="mt-1 d-block">
                                                10k
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-social card-instagram">
                                    <div class="card-body">
                                        <a href="#">
                                            <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" width="30%" style="fill: currentColor;" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
                                                <path d="M8 0C5.827 0 5.555.01 4.702.048 3.85.088 3.27.222 2.76.42c-.526.204-.973.478-1.417.923-.445.444-.72.89-.923 1.417-.198.51-.333 1.09-.372 1.942C.008 5.555 0 5.827 0 8s.01 2.445.048 3.298c.04.852.174 1.433.372 1.942.204.526.478.973.923 1.417.444.445.89.72 1.417.923.51.198 1.09.333 1.942.372.853.04 1.125.048 3.298.048s2.445-.01 3.298-.048c.852-.04 1.433-.174 1.942-.372.526-.204.973-.478 1.417-.923.445-.444.72-.89.923-1.417.198-.51.333-1.09.372-1.942.04-.853.048-1.125.048-3.298s-.01-2.445-.048-3.298c-.04-.852-.174-1.433-.372-1.942-.204-.526-.478-.973-.923-1.417-.444-.445-.89-.72-1.417-.923-.51-.198-1.09-.333-1.942-.372C10.445.008 10.173 0 8 0zm0 1.44c2.136 0 2.39.01 3.233.048.78.036 1.203.166 1.485.276.374.145.64.318.92.598.28.28.453.546.598.92.11.282.24.705.276 1.485.038.844.047 1.097.047 3.233s-.01 2.39-.05 3.233c-.04.78-.17 1.203-.28 1.485-.15.374-.32.64-.6.92-.28.28-.55.453-.92.598-.28.11-.71.24-1.49.276-.85.038-1.1.047-3.24.047s-2.39-.01-3.24-.05c-.78-.04-1.21-.17-1.49-.28-.38-.15-.64-.32-.92-.6-.28-.28-.46-.55-.6-.92-.11-.28-.24-.71-.28-1.49-.03-.84-.04-1.1-.04-3.23s.01-2.39.04-3.24c.04-.78.17-1.21.28-1.49.14-.38.32-.64.6-.92.28-.28.54-.46.92-.6.28-.11.7-.24 1.48-.28.85-.03 1.1-.04 3.24-.04zm0 2.452c-2.27 0-4.108 1.84-4.108 4.108 0 2.27 1.84 4.108 4.108 4.108 2.27 0 4.108-1.84 4.108-4.108 0-2.27-1.84-4.108-4.108-4.108zm0 6.775c-1.473 0-2.667-1.194-2.667-2.667 0-1.473 1.194-2.667 2.667-2.667 1.473 0 2.667 1.194 2.667 2.667 0 1.473-1.194 2.667-2.667 2.667zm5.23-6.937c0 .53-.43.96-.96.96s-.96-.43-.96-.96.43-.96.96-.96.96.43.96.96z" />
                                            </svg>
                                            <span class="mt-1 d-block">
                                                19,5k
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-social card-dribbble">
                                    <div class="card-body">
                                        <a href="#">
                                            <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" width="30%" style="fill:currentColor;" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
                                                <path d="M8 16c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm6.747-6.905c-.234-.074-2.115-.635-4.257-.292.894 2.456 1.258 4.456 1.328 4.872 1.533-1.037 2.624-2.68 2.93-4.58zM10.67 14.3c-.102-.6-.5-2.688-1.46-5.18l-.044.014C5.312 10.477 3.93 13.15 3.806 13.4c1.158.905 2.614 1.444 4.194 1.444.947 0 1.85-.194 2.67-.543zm-7.747-1.72c.155-.266 2.03-3.37 5.555-4.51.09-.03.18-.056.27-.08-.173-.39-.36-.778-.555-1.16-3.413 1.02-6.723.977-7.023.97l-.003.208c0 1.755.665 3.358 1.756 4.57zM1.31 6.61c.307.005 3.122.017 6.318-.832-1.132-2.012-2.353-3.705-2.533-3.952-1.912.902-3.34 2.664-3.784 4.785zM6.4 1.368c.188.253 1.43 1.943 2.548 4 2.43-.91 3.46-2.293 3.582-2.468C11.323 1.827 9.736 1.176 8 1.176c-.55 0-1.087.066-1.6.19zm6.89 2.322c-.145.194-1.29 1.662-3.816 2.694.16.325.31.656.453.99.05.117.1.235.147.352 2.274-.286 4.533.172 4.758.22-.015-1.613-.59-3.094-1.543-4.257z" />
                                            </svg>
                                            <span class="mt-1 d-block">
                                                21,3k
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-white d-flex align-items-center justify-content-between">
                                <h4 class="card-header__title mb-0">Latest Blog Posts</h4>
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" data-caret="false" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons icon-16pt">settings</i></a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <i class="material-icons icon-16pt mr-2">settings</i>
                                            <span>Blog settings</span>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <i class="material-icons icon-16pt mr-2">list</i>
                                            <span>List view</span>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <i class="material-icons icon-16pt mr-2">grid_on</i>
                                            <span>Grid view</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body py-2">
                                <div class="row">

                                    <div class="col-lg-6 py-2">
                                        <div class="d-flex flex-column flex-xl-row align-items-center text-center text-xl-left align-items-xl-start">
                                            <a href=""><img class="img-fluid img-lg-150 img-xl-200 rounded mr-xl-3 mb-3 mb-xl-0" src="assets/images/posts/fabian-irsara-92113.jpg" alt="Blog post image"></a>
                                            <div class="flex">
                                                <h5 class="card-title mb-1"><a href="" class="headings-color">Mobile
                                                        UI</a></h5>
                                                <p class="text-muted mb-2">
                                                    <small class="mr-1"><a href="" class="text-muted">Steven
                                                            Doe</a></small>
                                                    <small>3 hrs ago</small>
                                                </p>
                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                    elit...</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 py-2">
                                        <div class="d-flex flex-column flex-xl-row align-items-center text-center text-xl-left align-items-xl-start">
                                            <a href=""><img class="img-fluid img-lg-150 img-xl-200 rounded mr-xl-3 mb-3 mb-xl-0" src="assets/images/posts/luke-chesser-2347.jpg" alt="Blog post image"></a>
                                            <div class="flex">
                                                <h5 class="card-title mb-1"><a href="" class="headings-color">DevOps
                                                        Basics</a></h5>
                                                <p class="text-muted mb-2">
                                                    <small class="mr-1"><a href="" class="text-muted">Kevin
                                                            Short</a></small>
                                                    <small>15 hrs ago</small>
                                                </p>
                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                    elit...</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 py-2">
                                        <div class="d-flex flex-column flex-xl-row align-items-center text-center text-xl-left align-items-xl-start">
                                            <a href=""><img class="img-fluid img-lg-150 img-xl-200 rounded mr-xl-3 mb-3 mb-xl-0" src="assets/images/posts/thought-catalog-214785.jpg" alt="Blog post image"></a>
                                            <div class="flex">
                                                <h5 class="card-title mb-1"><a href="" class="headings-color">New VueJS
                                                        Launch</a></h5>
                                                <p class="text-muted mb-2">
                                                    <small class="mr-1"><a href="" class="text-muted">Andrew
                                                            Robles</a></small>
                                                    <small>22 hrs ago</small>
                                                </p>
                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                    elit...</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 py-2">
                                        <div class="d-flex flex-column flex-xl-row align-items-center text-center text-xl-left align-items-xl-start">
                                            <a href=""><img class="img-fluid img-lg-150 img-xl-200 rounded mr-xl-3 mb-3 mb-xl-0" src="assets/images/posts/linkedin-sales-navigator-402873.jpg" alt="Blog post image"></a>
                                            <div class="flex">
                                                <h5 class="card-title mb-1"><a href="" class="headings-color">E-Commerce
                                                        Analytics</a></h5>
                                                <p class="text-muted mb-2">
                                                    <small class="mr-1"><a href="" class="text-muted">Tara
                                                            Smith</a></small>
                                                    <small>1 day ago</small>
                                                </p>
                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                    elit...</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-header bg-white">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-header__title mb-0">Users Traffic</h4>
                                            <div class="badge badge-outline-warning">+48,6%</div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div style="height: 185px; width: 100%;">
                                            <canvas id="trafficBarChart"></canvas>
                                        </div>
                                    </div>
                                    <div class="card-footer p-0">
                                        <div class="row no-gutter">
                                            <div class="col text-center">
                                                <div class="card-body">
                                                    <h3 class="mb-0">419</h3>
                                                    <div class="text-muted">REGISTRATIONS</div>
                                                </div>
                                            </div>
                                            <div class="col border-left text-center">
                                                <div class="card-body">
                                                    <h3 class="mb-0">$19,091</h3>
                                                    <div class="text-muted">SALES</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">

                                <div class="card">
                                    <div class="card-header bg-white">
                                        <h4 class="card-header__title mb-0">Statistics</h4>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item py-2 d-flex align-items-center justify-content-end pr-0">
                                            <div class="mr-auto">Total Visitors</div>
                                            <div>
                                                <span class="badge badge-outline-primary mr-3">1.3k</span>
                                            </div>
                                            <div style="width:100px; height: 50px; margin-top: -10px; position: relative;">
                                                <canvas class="stats-chart"></canvas>
                                            </div>
                                        </li>
                                        <li class="list-group-item py-2 d-flex align-items-center justify-content-end pr-0">
                                            <div class="mr-auto">Total Page Views</div>
                                            <div>
                                                <span class="badge badge-outline-primary mr-3">240,000</span>
                                            </div>
                                            <div style="width:100px; height: 50px; margin-top: -10px; position: relative;">
                                                <canvas class="stats-chart"></canvas>
                                            </div>
                                        </li>
                                        <li class="list-group-item py-2 d-flex align-items-center justify-content-end pr-0">
                                            <div class="mr-auto">Total Revenue</div>
                                            <div>
                                                <span class="badge badge-outline-success mr-3">$1.5k</span>
                                            </div>
                                            <div style="width:100px; height: 50px; margin-top: -10px; position: relative;">
                                                <canvas class="stats-chart"></canvas>
                                            </div>
                                        </li>
                                        <li class="list-group-item py-2 d-flex align-items-center justify-content-end pr-0">
                                            <div class="mr-auto">Conversion Rate</div>
                                            <div>
                                                <span class="badge badge-outline-success mr-3">5%</span>
                                            </div>
                                            <div style="width:100px; height: 50px; margin-top: -10px; position: relative;">
                                                <canvas class="stats-chart"></canvas>
                                            </div>
                                        </li>
                                        <li class="list-group-item py-2 d-flex align-items-center justify-content-end pr-0">
                                            <div class="mr-auto">Registrations</div>
                                            <div>
                                                <span class="badge badge-outline-success mr-3">419</span>
                                            </div>
                                            <div style="width:100px; height: 50px; margin-top: -10px; position: relative;">
                                                <canvas class="stats-chart"></canvas>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <div class="card-deck card-margin">
                            <div class="card">
                                <img src="assets/images/posts/thought-catalog-214785.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="assets/images/avatars/andrew-robles-300868.jpg" class="avatar-img rounded-circle" alt="">
                                        </div>
                                        <div class="author-info">
                                            <a href="" class="text-body">Adrian Demian</a>
                                            <p class="text-muted mb-0">Senior Front-End Developer</p>
                                        </div>
                                    </div>
                                    <h5 class="card-title"><a href="" class="headings-color">UI Design &amp; Code</a>
                                    </h5>
                                    <p class="card-text">I want to talk about two things that are quite important to me.
                                        These are love and one my personal inadequacies. The thing is that I’m quite
                                        fond of love...</p>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <a href="#" class="text-social text-facebook">
                                        <svg viewBox="0 0 16 16" width="20%" xmlns="http://www.w3.org/2000/svg" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
                                            <path d="M15.117 0H.883C.395 0 0 .395 0 .883v14.234c0 .488.395.883.883.883h7.663V9.804H6.46V7.39h2.086V5.607c0-2.066 1.262-3.19 3.106-3.19.883 0 1.642.064 1.863.094v2.16h-1.28c-1 0-1.195.48-1.195 1.18v1.54h2.39l-.31 2.42h-2.08V16h4.077c.488 0 .883-.395.883-.883V.883C16 .395 15.605 0 15.117 0" />
                                        </svg>
                                    </a>
                                    <a href="#" class="text-social text-twitter">
                                        <svg viewBox="0 0 16 16" width="20%" xmlns="http://www.w3.org/2000/svg" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
                                            <path d="M16 3.038c-.59.26-1.22.437-1.885.517.677-.407 1.198-1.05 1.443-1.816-.634.37-1.337.64-2.085.79-.598-.64-1.45-1.04-2.396-1.04-1.812 0-3.282 1.47-3.282 3.28 0 .26.03.51.085.75-2.728-.13-5.147-1.44-6.766-3.42C.83 2.58.67 3.14.67 3.75c0 1.14.58 2.143 1.46 2.732-.538-.017-1.045-.165-1.487-.41v.04c0 1.59 1.13 2.918 2.633 3.22-.276.074-.566.114-.865.114-.21 0-.41-.02-.61-.058.42 1.304 1.63 2.253 3.07 2.28-1.12.88-2.54 1.404-4.07 1.404-.26 0-.52-.015-.78-.045 1.46.93 3.18 1.474 5.04 1.474 6.04 0 9.34-5 9.34-9.33 0-.14 0-.28-.01-.42.64-.46 1.2-1.04 1.64-1.7z" />
                                        </svg>
                                    </a>
                                    <a href="#" class="text-social text-instagram">
                                        <svg viewBox="0 0 16 16" width="20%" xmlns="http://www.w3.org/2000/svg" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
                                            <path d="M8 0C5.827 0 5.555.01 4.702.048 3.85.088 3.27.222 2.76.42c-.526.204-.973.478-1.417.923-.445.444-.72.89-.923 1.417-.198.51-.333 1.09-.372 1.942C.008 5.555 0 5.827 0 8s.01 2.445.048 3.298c.04.852.174 1.433.372 1.942.204.526.478.973.923 1.417.444.445.89.72 1.417.923.51.198 1.09.333 1.942.372.853.04 1.125.048 3.298.048s2.445-.01 3.298-.048c.852-.04 1.433-.174 1.942-.372.526-.204.973-.478 1.417-.923.445-.444.72-.89.923-1.417.198-.51.333-1.09.372-1.942.04-.853.048-1.125.048-3.298s-.01-2.445-.048-3.298c-.04-.852-.174-1.433-.372-1.942-.204-.526-.478-.973-.923-1.417-.444-.445-.89-.72-1.417-.923-.51-.198-1.09-.333-1.942-.372C10.445.008 10.173 0 8 0zm0 1.44c2.136 0 2.39.01 3.233.048.78.036 1.203.166 1.485.276.374.145.64.318.92.598.28.28.453.546.598.92.11.282.24.705.276 1.485.038.844.047 1.097.047 3.233s-.01 2.39-.05 3.233c-.04.78-.17 1.203-.28 1.485-.15.374-.32.64-.6.92-.28.28-.55.453-.92.598-.28.11-.71.24-1.49.276-.85.038-1.1.047-3.24.047s-2.39-.01-3.24-.05c-.78-.04-1.21-.17-1.49-.28-.38-.15-.64-.32-.92-.6-.28-.28-.46-.55-.6-.92-.11-.28-.24-.71-.28-1.49-.03-.84-.04-1.1-.04-3.23s.01-2.39.04-3.24c.04-.78.17-1.21.28-1.49.14-.38.32-.64.6-.92.28-.28.54-.46.92-.6.28-.11.7-.24 1.48-.28.85-.03 1.1-.04 3.24-.04zm0 2.452c-2.27 0-4.108 1.84-4.108 4.108 0 2.27 1.84 4.108 4.108 4.108 2.27 0 4.108-1.84 4.108-4.108 0-2.27-1.84-4.108-4.108-4.108zm0 6.775c-1.473 0-2.667-1.194-2.667-2.667 0-1.473 1.194-2.667 2.667-2.667 1.473 0 2.667 1.194 2.667 2.667 0 1.473-1.194 2.667-2.667 2.667zm5.23-6.937c0 .53-.43.96-.96.96s-.96-.43-.96-.96.43-.96.96-.96.96.43.96.96z" />
                                        </svg>
                                    </a>
                                    <a href="#" class="text-social text-dribbble">
                                        <svg viewBox="0 0 16 16" width="20%" xmlns="http://www.w3.org/2000/svg" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
                                            <path d="M8 16c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm6.747-6.905c-.234-.074-2.115-.635-4.257-.292.894 2.456 1.258 4.456 1.328 4.872 1.533-1.037 2.624-2.68 2.93-4.58zM10.67 14.3c-.102-.6-.5-2.688-1.46-5.18l-.044.014C5.312 10.477 3.93 13.15 3.806 13.4c1.158.905 2.614 1.444 4.194 1.444.947 0 1.85-.194 2.67-.543zm-7.747-1.72c.155-.266 2.03-3.37 5.555-4.51.09-.03.18-.056.27-.08-.173-.39-.36-.778-.555-1.16-3.413 1.02-6.723.977-7.023.97l-.003.208c0 1.755.665 3.358 1.756 4.57zM1.31 6.61c.307.005 3.122.017 6.318-.832-1.132-2.012-2.353-3.705-2.533-3.952-1.912.902-3.34 2.664-3.784 4.785zM6.4 1.368c.188.253 1.43 1.943 2.548 4 2.43-.91 3.46-2.293 3.582-2.468C11.323 1.827 9.736 1.176 8 1.176c-.55 0-1.087.066-1.6.19zm6.89 2.322c-.145.194-1.29 1.662-3.816 2.694.16.325.31.656.453.99.05.117.1.235.147.352 2.274-.286 4.533.172 4.758.22-.015-1.613-.59-3.094-1.543-4.257z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <div class="card dashboard-chat">
                                <div class="card-header bg-white">
                                    <h4 class="card-header__title mb-0">Chat</h4>
                                </div>
                                <div class="d-flex dashboard-chat__head">
                                    <div class="avatar avatar-sm mr-3">
                                        <img src="assets/images/avatars/lucas-sankey-378674.jpg" class="avatar-img rounded-circle" alt="">
                                    </div>
                                    <div class="flex">
                                        <a href="" class="text-body">Steven Short</a>
                                        <p class="text-muted mb-0">Active Now</p>
                                    </div>
                                    <a class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="bottom" title="Call">
                                        <i class="material-icons icon-16pt text-success">phone</i>
                                    </a>
                                    <a class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="bottom" title="View profile">
                                        <i class="material-icons icon-16pt text-muted">account_circle</i>
                                    </a>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle btn btn-white btn-sm text-muted" href="#" id="chatSettings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-caret="false">
                                            <i class="material-icons icon-16pt">settings</i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="chatSettings">
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <i class="material-icons icon-16pt mr-2">settings</i>
                                                <span>Settings</span>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <i class="material-icons icon-16pt mr-2">delete</i>
                                                <span>Delete conversation</span>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <i class="material-icons icon-16pt text-danger mr-2">block</i>
                                                <span>Block user</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <div class="text-center text-muted mb-3">Fri, 20 Oct</div>
                                    <div class="media align-items-center mb-3">
                                        <img src="assets/images/avatars/lucas-sankey-378674.jpg" class="img-fluid rounded-circle mr-2" width="35" alt="">
                                        <div class="media-body">
                                            <div class="dashboard-chat__message dashboard-chat__message-in">
                                                Hey Adrian! How are you doing?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media align-items-center mb-3">
                                        <div class="media-body">
                                            <div class="text-right">
                                                <div class="dashboard-chat__message dashboard-chat__message-out">
                                                    Hi there! I'm fine...just getting some work done. How about you?
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media align-items-center mb-3">
                                        <img src="assets/images/avatars/lucas-sankey-378674.jpg" class="img-fluid rounded-circle mr-2" width="35" alt="">
                                        <div class="media-body">
                                            <div class="dashboard-chat__message dashboard-chat__message-in">
                                                Awesome! Just got back from my 2 weeks vacation and I had such a great
                                                time.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media align-items-center mb-1">
                                        <div class="media-body">
                                            <div class="text-right">
                                                <div class="dashboard-chat__message dashboard-chat__message-out">
                                                    That's great, I'm glad. I have a suprise for you when you'll get
                                                    back to the office.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media align-items-center mb-1">
                                        <div class="media-body">
                                            <div class="text-right">
                                                <div class="dashboard-chat__message dashboard-chat__message-out">
                                                    It's about a new project that I started.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media align-items-center mb-3">
                                        <div class="media-body">
                                            <div class="text-right">
                                                <div class="dashboard-chat__message dashboard-chat__message-out">
                                                    Hope you'll like it.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media align-items-center mb-1">
                                        <img src="assets/images/avatars/lucas-sankey-378674.jpg" class="img-fluid rounded-circle mr-2" width="35" alt="">
                                        <div class="media-body">
                                            <div class="dashboard-chat__message dashboard-chat__message-in">
                                                That's great news!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media align-items-center mb-3">
                                        <img src="assets/images/avatars/lucas-sankey-378674.jpg" class="img-fluid rounded-circle mr-2" width="35" alt="">
                                        <div class="media-body">
                                            <div class="dashboard-chat__message dashboard-chat__message-in">
                                                See you soon
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group input-group-merge mt-auto">
                                        <input type="text" class="form-control form-control-prepended" name="chat-message" placeholder="Type a message...">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="material-icons icon-16pt">comment</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- // END drawer-layout__content -->

                <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
                    <?php include("./partials/sidebar.php") ?>
                </div>
            </div>
            <!-- // END drawer-layout -->

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->

    <!-- App Settings FAB -->
    <div id="app-settings">
        <app-settings layout-active="default" :layout-location="{
      'default': 'index.html',
      'fixed': 'fixed-dashboard.html',
      'fluid': 'fluid-dashboard.html',
      'mini': 'mini-dashboard.html'
    }"></app-settings>
    </div>

    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- DOM Factory -->
    <script src="assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="assets/vendor/material-design-kit.js"></script>

    <!-- App -->
    <script src="assets/js/toggle-check-all.js"></script>
    <script src="assets/js/check-selected-row.js"></script>
    <script src="assets/js/dropdown.js"></script>
    <script src="assets/js/sidebar-mini.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>

    <!-- Flatpickr -->
    <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="assets/js/flatpickr.js"></script>

    <!-- Global Settings -->
    <script src="assets/js/settings.js"></script>

    <!-- Moment.js -->
    <script src="assets/vendor/moment.min.js"></script>
    <script src="assets/vendor/moment-range.js"></script>

    <!-- Chart.js -->
    <script src="assets/vendor/Chart.min.js"></script>

    <!-- App Charts JS -->
    <script src="assets/js/charts.js"></script>
    <script src="assets/js/chartjs-rounded-bar.js"></script>

    <!-- Chart Samples -->
    <script src="assets/js/page.dashboard.js"></script>
    <script src="assets/js/progress-charts.js"></script>

    <!-- Vector Maps -->
    <script src="assets/vendor/jqvmap/jquery.vmap.min.js"></script>
    <script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
    <script src="assets/js/vector-maps.js"></script>


    <?php
    if (isset($_SESSION["login_bool"])) {
        echo "<script>toastr.success('Login Successful');</script>";
    }

    if (session_unset()) {

        $_SESSION['previous_url'] = $_SERVER['REQUEST_URI'];
    }
    ?>
</body>

</html>