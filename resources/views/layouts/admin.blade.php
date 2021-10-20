<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/img/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/img/favicon.ico') }}">

    @yield('meta')

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/semantic-ui/semantic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/DataTables/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


    @yield('styles')

</head>

<body>

    <div class="wrapper">

        <nav id="sidebar" class="active">

            <ul class="list-unstyled components">
                <li class="">
                    <h4 class="text-info text-center">{{ __('DINGEDAH  NETWORK') }}</h4>
                </li>
                <hr>
            </ul>

            <ul class="list-unstyled components">
                <!-- <li class="">
                    <a href="{{ url('admin') }}">
                        <i class="ui icon home"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li> -->

                <li class="">
                    <a href="{{ url('admin/billing/billcollection') }}">
                    <i class="calendar outline icon"></i>
                        <p>{{ __('Bill Collection') }}</p>
                    </a>
                </li>

                <!-- <li class="">
                    <a href="{{ url('admin/area') }}">
                        <i class="ui building icon"></i>
                        <p>{{ __('Area & Vicinity') }}</p>
                    </a>
                </li> -->

                <li class="">
                    <a href="{{ url('admin/subscriber') }}">
                        <i class="ui address book icon"></i>
                        <p>{{ __('Customer list') }}</p>
                    </a>
                </li>

                <li class="">
                    <a href="{{ url('admin/billing') }}">
                        <i class="dollar sign icon"></i>
                        <p>{{ __('Dish Billing') }}</p>
                    </a>
                </li>


                <li class="">
                    <a href="{{ url('admin/memo') }}">
                        <i class="shopping basket icon"></i>
                        <p>{{ __('shopping') }}</p>
                    </a>
                </li>

                <li class="">
                    <a href="{{ url('admin/account') }}">
                        <i class="ui calculator icon"></i>
                        <p>{{ __('Account') }}</p>
                    </a>
                </li>

                <li class="">
                    <a href="{{ url('admin/users') }}">
                        <i class="users icon"></i>
                        <p>{{ __('Users') }}</p>
                    </a>
                </li>

                <!-- <li class="">
                    <a href="{{ url('admin/report_view') }}">
                        <i class="ui chart bar icon"></i>
                        <p>{{ __('রিপোর্ট') }}</p>
                    </a>
                </li> -->

                <li class="">
                    <a href="{{ url('admin/settings') }}">
                        <i class="ui cogs icon"></i>
                        <p>{{ __('Settings') }}</p>
                    </a>
                </li>

            </ul>
        </nav>

        <div id="body" class="active">
            <nav class="navbar navbar-expand-lg navbar-light bg-lightblue">
                <div class="container-fluid">

                    <button id="slidesidebar" class="ui icon button btn-light-outline">
                        <i class="ui icon bars"></i> <span class="toggle-sidebar-menu">{{ __('Menu') }}</span>
                    </button>

                    <button onclick="location.href='/'" class="ui icon button btn-light-outline">
                        <i class="ui icon home"></i> <span class="toggle-sidebar-menu">{{ __('Dashboard') }}</span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto navmenu">

                            <li class="nav-item">
                                <div class="ui pointing link item">
                                    <a href="{{ url('admin/notification') }}" class="ui circular basic icon  tiny "> <i class="tasks icon"></i> 5</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <div class="ui pointing link dropdown item" tabindex="0">
                                    <i class="linkify icon"></i> <span class="navmenutext">Manage</span>
                                    <i class="dropdown icon"></i>
                                    <div class="menu" tabindex="-1">

                                        <a href="{{ url('admin/users') }}" class="item"><i class="ui icon users"></i>{{ __('Operator') }}</a>
                                        <a href="{{ url('admin/fare') }}" class="item"><i class="money bill alternate outline icon"></i>{{ __('Fare') }}</a>

                                    </div>
                                </div>
                            </li>

                            <li class="nav-item">
                                <div class="ui pointing link dropdown item" tabindex="0">
                                    <i class="ui icon user outline"></i> <span class="navmenutext">@isset(Auth::user()->first_name){{ Auth::user()->first_name }}@endisset</span>
                                    <i class="dropdown icon"></i>
                                    <div class="menu" tabindex="-1">
                                        <a href="{{ url('admin/profile') }}" class="item"><i class="address book icon"></i>{{ __('My Profile') }}</a>
                                        <a href="{{ url('admin/account') }}" class="item"><i class="ui icon user"></i>{{ __('My Account') }}</a>
                                        <div class="divider"></div>
                                        <a href="{{ route('logout') }}" class="item"><i class="ui icon power"></i>{{ __('Logout') }}</a>

                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content">
                @yield('content')
            </div>

            <input type="hidden" id="_url" value="{{url('/')}}">
            <script>
                var y = '@isset($var){{$var}}@endisset';
            </script>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/semantic-ui/semantic.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script src="{{ asset('vendor/DataTables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/DataTables/jszip.min.js') }}"></script>
    <script src="{{ asset('vendor/DataTables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/DataTables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendor/DataTables/buttons.html5.min.js') }}"></script>


    @if ($success = Session::get('success'))
    <script>
        $(document).ready(function() {
            $.notify({
                icon: 'ui icon check',
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
                icon: 'ui icon times',
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