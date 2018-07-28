<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ChoreWeasel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('jquery/jquery-3.3.1.min.js') }}"></script> --}}



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
    <link rel="stylesheet" href="{{ asset('css/simple-line-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jqc-1.12.4/jszip-2.5.0/dt-1.10.18/af-2.3.0/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.css"/>
    <link href="{{ asset('datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    @yield('styles')

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


<script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ asset('dashboard/js/plugins/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/chartist.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('dashboard/js/light-bootstrap-dashboard.js?v=2.0.1s') }}"></script>
    <script src="{{ asset('dashboard/js/demo.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jqc-1.12.4/jszip-2.5.0/dt-1.10.18/af-2.3.0/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>
<script src="{{ asset('moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('dashboard/js/plugins/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>


    @yield('scripts')

<script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js charset=utf-8></script>
<script src=//cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js charset=utf-8></script>
<script src=//cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js charset=utf-8></script>
<script src=//cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>


</body>

</html>
