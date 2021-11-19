<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <!-- <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" /> -->

    <!--Theme Styles-->
    <link href="{{ asset('assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/light-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/header-colors.css') }}" rel="stylesheet" />


    <link rel="stylesheet" href="{{ asset('vendor/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/DataTables/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/flag-icon-css/css/flag-icon.min.css') }}">

    <style>
        body {

            font-family: Times New Roman;

        }
    </style>


    @yield('meta')


</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand">
                <div class="mobile-toggle-icon d-xl-none">
                    <i class="bi bi-list"></i>
                </div>
                <div class="top-navbar d-none d-xl-block">

                </div>
                <div class="d-xl-none ms-auto">

                </div>
                <form class=" d-none d-xl-flex ms-auto">

                </form>
                <div class="top-navbar-right ms-3">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                                <div class="user-setting d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" class="user-img" alt="">
                                    <div class="user-name d-none d-sm-block">@isset(Auth::user()->first_name){{ Auth::user()->first_name }}@endisset</div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#" style="pointer-events: none">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <h6 class="mb-0 dropdown-user-name">@isset(Auth::user()->first_name){{ Auth::user()->first_name }}@endisset</h6>
                                                <small class="mb-0 dropdown-user-designation text-secondary">Owner</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('owner/my_profile') }}">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-person-fill"></i></div>
                                            <div class="setting-text ms-3"><span>My Account</span></div>
                                        </div>
                                    </a>
                                </li>


                                <li>
                                    <a class="dropdown-item" href="{{ url('logout') }}">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-lock-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Logout</span></div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>



                    </ul>
                </div>
            </nav>
        </header>
        <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('assets/images/favicon-32x32.png') }}" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h6 class="logo-text">{{ $website_name }}</h6>
                </div>
                <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ url('owner') }}">
                        <div class="parent-icon"><i class="bi bi-house-door"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>

                <li>
                    <a href="{{ url('owner/subscriber/search') }}">
                        <div class="parent-icon"><i class="bi bi-search"></i>
                        </div>
                        <div class="menu-title">Search Bills</div>
                    </a>
                </li>

                <li>
                    <a href="{{ url('owner/billing/bill_collection') }}">
                        <div class="parent-icon"><i <i class="bi bi-list-check"></i></i>
                        </div>
                        <div class="menu-title">Bill Collection</div>
                    </a>
                </li>

                <li>
                    <a href="{{ url('owner/billing') }}">
                        <div class="parent-icon"><i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="menu-title">Bill Process</div>
                    </a>
                </li>


                <li>
                    <a href="{{ url('owner/employee-sallery') }}">
                        <div class="parent-icon"><i class="bi bi-cash-coin"></i>
                        </div>
                        <div class="menu-title">Sallery</div>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-star"></i>
                        </div>
                        <div class="menu-title">Default</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('owner/area') }}"><i class="bi bi-arrow-right-short"></i>Area</a>
                        </li>
                        <li> <a href="{{ url('owner/vicinity') }}"><i class="bi bi-arrow-right-short"></i>Vicinity</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ url('owner/subscriber') }}">
                        <div class="parent-icon"><i class="bi bi-people-fill"></i>
                        </div>
                        <div class="menu-title">Subscriber</div>
                    </a>
                </li>


                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-receipt-cutoff"></i>
                        </div>
                        <div class="menu-title">Service Cost</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('owner/memo/add') }}"><i class="bi bi-plus"></i>Add Memo</a>
                        </li>
                        <li> <a href="{{ url('owner/memo') }}"><i class="bi bi-list-check"></i>Memo List</a>
                        </li>
                        <li> <a href="{{ url('owner/memo/history') }}"><i class="bi bi-check2-circle"></i>Settled Memo</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ url('owner/employee') }}">
                        <div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
                        </div>
                        <div class="menu-title">Employee</div>
                    </a>
                </li>

                <li>
                    <a href="{{ url('owner/account_diary') }}">
                        <div class="parent-icon"><i class="bi bi-receipt"></i>
                        </div>
                        <div class="menu-title">Account Diary</div>
                    </a>
                </li>

                <li>
                    <a href="{{ url('owner/account_diary/settlements') }}">
                        <div class="parent-icon"><i class="bi bi-clock-history"></i>
                        </div>
                        <div class="menu-title">Settlement History</div>
                    </a>
                </li>


            </ul>
            <!--end navigation-->
        </aside>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">
            @yield('content')
        </main>
        <!--end page main-->

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->



    </div>
    <!--end wrapper-->


    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/easyPieChart/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>

    <!-- <script src="{{ asset('assets/js/pace.min.js') }}"></script> -->

    <!-- <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script> -->

    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/table-datatable.js') }}"></script>
    <!--app-->
    <script src="{{ asset('assets/js/app.js') }}"></script>



    <script src="{{ asset('vendor/jquery/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>


    @if ($success = Session::get('success'))
    <script>
        $(document).ready(function() {
            $.notify({
                message: "{{ $success }}"
            }, {
                type: 'success',
                timer: 400
            });
        });
    </script>
    @endif

    @if ($error = Session::get('error'))
    <script>
        $(document).ready(function() {
            $.notify({
                message: "{{ $error }}"
            }, {
                type: 'danger',
                timer: 400
            });
        });
    </script>
    @endif


    @yield('scripts')

</body>

</html>