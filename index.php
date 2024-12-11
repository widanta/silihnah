<?php
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['level'] == "Administrator") {
        header("Location: views/admin/dashboard.php");
    } else {
        header("Location: views/siswa/dashboard.php");
    }
} else {
    header("Location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>Silihnah - Dashboard</title>

    <link rel="stylesheet" href="assets/css/vendors/simplebar.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/examples.css">
    <link rel="stylesheet" href="assets/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="assets/vendors/@coreui/chartjs/css/coreui-chartjs.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-118965717-3');
        gtag('config', 'UA-118965717-5');
    </script>
</head>

<body>
    <!-- sidebar -->
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="assets/img/coreui.svg#full"></use>
            </svg>
            <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="assets/img/coreui.svg#signet"></use>
            </svg>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item">
                <a class="nav-link" href="">
                    <svg class="nav-icon">
                        <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                    </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <svg class="nav-icon">
                        <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                    </svg> User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <svg class="nav-icon">
                        <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                    </svg> Role
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <svg class="nav-icon">
                        <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                    </svg> Permission
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <svg class="nav-icon">
                        <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                    </svg> Blog
                </a>
            </li>
        </ul>


    </div>
    <!-- end sidebar -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <!-- navbar -->
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button><a class="header-brand d-md-none" href="#">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use xlink:href="assets/brand/coreui.svg#full"></use>
                    </svg></a>
                <ul class="header-nav ms-3">
                    <li class="nav-item">
                        <a class="nav-link">
                            {{ Auth::user()->name }}
                        </a>
                    </li>

                    <li class=" nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/team-4.jpg" alt="user@email.com"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Settings</div>
                            </div><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                </svg> Profile</a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="">
                                <a class="dropdown-item" href="" onclick="event.preventDefault();
                    this.closest('form').submit();">
                                    <svg class="icon me-2">
                                        <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                    </svg> Keluar</a>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="header-divider"></div>
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-0 ms-2">
                        <li class="breadcrumb-item">
                            <span>Home</span>
                        </li>
                        <li class="breadcrumb-item active">
                            <span>Dashboard</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </header>
        <!-- end navbar -->
        <div class="body flex-grow-1 px-3">
            <!-- content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-primary">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
                                            <svg class="icon">
                                                <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                                            </svg>)</span></div>
                                    <div>Users</div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg class="icon">
                                            <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                                </div>
                            </div>
                            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                <canvas class="chart" id="card-chart1" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-info">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fs-4 fw-semibold">$6.200 <span class="fs-6 fw-normal">(40.9%
                                            <svg class="icon">
                                                <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                                            </svg>)</span></div>
                                    <div>Income</div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg class="icon">
                                            <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                                </div>
                            </div>
                            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                <canvas class="chart" id="card-chart2" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-warning">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fs-4 fw-semibold">2.49% <span class="fs-6 fw-normal">(84.7%
                                            <svg class="icon">
                                                <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                                            </svg>)</span></div>
                                    <div>Conversion Rate</div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg class="icon">
                                            <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                                </div>
                            </div>
                            <div class="c-chart-wrapper mt-3" style="height:70px;">
                                <canvas class="chart" id="card-chart3" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-danger">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fs-4 fw-semibold">44K <span class="fs-6 fw-normal">(-23.6%
                                            <svg class="icon">
                                                <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                                            </svg>)</span></div>
                                    <div>Sessions</div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg class="icon">
                                            <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                                </div>
                            </div>
                            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                <canvas class="chart" id="card-chart4" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
            </div>
            <!-- end content -->
        </div>

        <footer class="footer">
            <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> © 2022 creativeLabs.</div>
            <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
        </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="assets/vendors/simplebar/js/simplebar.min.js"></script>
    <script src="assets/vendors/chart.js/js/chart.min.js"></script>
    <script src="assets/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="assets/vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>