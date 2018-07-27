<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/chartist.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('dashboard/js/light-bootstrap-dashboard.js?v=2.0.1s') }}"></script>
    <script src="{{ asset('dashboard/js/demo.js') }}"></script>
    <script src="{{ asset('datatables/datatables.js') }}"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Open+Sans|Roboto" rel="stylesheet">

    <!--- ICons --->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/accounts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/commons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navcustom.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/light-bootstrap-dashboard.css?v=2.0.1') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/demo.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('datatables/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ asset('css/simple-line-icons.css') }}"> @yield('styles')

</head>

<body>


    <div class="wrapper">

        <div class="sidebar" style="background-color: #ef5b25; " data-image="{{ asset('dashboard/img/sidebar-5.jpg') }}">
            <!--Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
                    Tip 2: you can also add an image using data-image tag
                -->

            <div class="sidebar-wrapper">

                <div class="logo">
                    <a href="{{ url('/admin') }}" class="simple-text">
                            ChoreWeasel
                        </a>
                </div>

                <ul class="nav">

                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/admin') }}">
                                <i class="nc-icon nc-chart-pie-35"></i>
                                <p>Dashboard</p>
                            </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{ url('/admin/taskers') }}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>Taskers</p>
                            </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{ url('/admin/clients') }}">
                                <i class="nc-icon nc-notes"></i>
                                <p>Clients</p>
                            </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/admin/taskcategories') }}">
                                <i class="nc-icon nc-puzzle-10"></i>
                                <p>Task Categories</p>
                            </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/admin/clients') }}">
                                    <i class="nc-icon nc-settings-90"></i>
                                    <p>Assigned Tasks</p>
                                </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/admin/admins') }}">
                                <i class="nc-icon nc-badge"></i>
                                <p>Admins</p>
                            </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">
                                <i class="nc-icon nc-circle"></i>
                                <p>Disputes</p>
                            </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">
                                <i class="nc-icon nc-bell-55"></i>
                                <p>Notifications</p>
                            </a>
                    </li>

                    <li class="nav-item active active-pro">
                        <a class="nav-link active" href="{{ url('/admin/addadmins') }}">
                                <i class="nc-icon nc-badge"></i>
                                <p>ADD ADMIN</p>
                            </a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="main-panel">

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand" href="#pablo"> Dashboard </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar burger-lines"></span>
                            <span class="navbar-toggler-bar burger-lines"></span>
                            <span class="navbar-toggler-bar burger-lines"></span>
                        </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                        <i class="nc-icon nc-palette"></i>
                                        <span class="d-lg-none">Dashboard</span>
                                    </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                        <i class="nc-icon nc-planet"></i>
                                        <span class="notification">5</span>
                                        <span class="d-lg-none">Notification</span>
                                    </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">
                                            Notification 1
                                        </a>
                                    <a class="dropdown-item" href="#">
                                            Notification 2
                                        </a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Another notification</a>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                        <i class="nc-icon nc-zoom-split"></i>
                                        <span class="d-lg-block">&nbsp;Search</span>
                                    </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <!--- <li class="nav-item">
                                    <a class="nav-link" href="#pablo">
                                        <span class="no-icon">Account</span>
                                    </a>
                                </li> --->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/messages') }}">
                                        <i class="nc-icon nc-email-85"></i>
                                        <span class="notification">5</span>
                                        <!--- <span class="">Log out</span> --->
                                    </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                        <span class="no-icon">{{ Auth::user()->name }}</span>
                                    </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <span class="dropdown-item">
                                            Signed in as:
                                            <br/>
                                            {{ Auth::user()->name }}
                                        </span>

                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="{{ url('/admin/'.Auth::user()->name.'/account') }}">Account Settings</a>

                                    <!--- <div class="divider"></div>
                                        <a class="dropdown-item" href="{{ url('/admin/logout') }}">
                                            <span class="no-icon">Log out</span>
                                        </a> --->
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/logout') }}">
                                        <span class="no-icon">Log out</span>
                                    </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->



            <div class="content">
                <div class="container-fluid">

                    @yield('content')

                </div>
            </div>


            <footer class="footer">
                <div class="container">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                        Dashboard
                                    </a>
                            </li>
                            <li>
                                <a href="#">
                                        Privacy Policy
                                    </a>
                            </li>
                            <li>
                                <a href="#">
                                        {{ _('Terms of User') }}
                                    </a>
                            </li>
                            <li>
                                <a href="#">
                                        Overview
                                    </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="#">ChoreWeasel</a>, All Rights Reserved.
                        </p>
                    </nav>
                </div>
            </footer>

        </div>

    </div>


    @yield('scripts')

<script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js charset=utf-8></script>
{!! $chart->script() !!}
</body>

</html>
