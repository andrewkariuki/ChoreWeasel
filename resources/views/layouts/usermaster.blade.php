<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ChoreWeasel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('moment/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="{{ asset('dashboard/js/plugins/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/chartist.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('dashboard/js/light-bootstrap-dashboard.js?v=2.0.1s') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <script src="{{ asset('dashboard/js/demo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    {{--
    <script src="{{ asset('datatables/datatables.js') }}"></script> --}}




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
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/userdashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navcustom.css') }}" rel="stylesheet">
    <link href="{{ asset('datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/light-bootstrap-dashboard.css?v=2.0.1') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/demo.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('datatables/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ asset('css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css"> @yield('styles')

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light fixed-top navbar-cw">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                <span class="navbar-brand-red">Chore</span>Weasel
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                    @if(Auth::check() && Auth::user()->hasRole('client'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/client/'.Auth::user()->name.'/summary') }}">{{ __('Summary') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/client/'.Auth::user()->name.'/activity') }}">{{ __('Activity') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/client/'.Auth::user()->name.'/wallet') }}">{{ __('Wallet') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('Help') }}</a>
                    </li>
                    @elseif(Auth::check() && Auth::user()->hasRole('tasker'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/tasker/'.Auth::user()->name.'/summary') }}">{{ __('Summary') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/tasker/'.Auth::user()->name.'/activity') }}">{{ __('Activity') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/tasker/'.Auth::user()->name.'/wallet') }}">{{ __('Wallet') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('Help') }}</a>
                    </li>
                    @endif


                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    {{-- @role('client') --}} @if(Auth::check() && Auth::user()->hasRole('client')) {{-- user has client role --}} {{-- then
                    he or she is able to post a job through explore --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/client/explore/allservices') }}">{{ __('Explore') }}</a>
                    </li>

                    {{--  <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('0.00') }}</a>
                    </li>  --}}


                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <span class="dropdown-item">
                                        Signed in as
                                        <br/>
                                        {{ Auth::user()->name }}
                                    </span>
                            <div class="divider"></div>
                            {{-- <a class="dropdown-item" href="{{ url('/client/'.Auth::user()->name.'/profile') }}">
                                        {{ __('Profile Settings') }}
                                    </a> --}}
                            <a class="dropdown-item" href="{{ url('/client/'.Auth::user()->name.'/account') }}">
                                        {{ __('Account Settings') }}
                                    </a>
                        </div>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/client/messages') }}">
                                        <i class="nc-icon nc-email-85"></i>
                                        <span class="notification">5</span>
                                        <!--- <span class="">Log out</span> --->
                                    </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>


                    </li>

                    @elseif(Auth::check() && Auth::user()->hasRole('tasker'))


                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('0.00') }}</a>
                    </li>

                    <li class="nav-itemdropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <span class="dropdown-item">
                                        Signed in as
                                        <br/>
                                        {{ Auth::user()->name }}
                                    </span>
                            <div class="divider"></div>
                            <a class="dropdown-item" href="{{ url('/tasker/'.Auth::user()->name.'/profile') }}">
                                        {{ __('Profile Settings') }}
                                    </a>
                            <a class="dropdown-item" href="{{ url('/tasker/'.Auth::user()->name.'/account') }}">
                                        {{ __('Account Settings') }}
                                    </a>
                        </div>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/tasker/messages') }}">
                                        <i class="nc-icon nc-email-85"></i>
                                        <span class="notification">5</span>
                                        <!--- <span class="">Log out</span> --->
                                    </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </li>

                    @endif {{--
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('0.00') }}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <span class="dropdown-item">
                                    Signed in as
                                    <br/>
                                    {{ Auth::user()->name }}
                                </span>
                            <div class="divider"></div>
                            <a class="dropdown-item" href="{{ url('/tasker/'.Auth::user()->name.'/profile') }}">
                                    {{ __('Profile Settings') }}
                                </a>
                            <a class="dropdown-item" href="{{ url('/tasker/'.Auth::user()->name.'/account') }}">
                                    {{ __('Account Settings') }}
                                </a>
                        </div>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/tasker/messages') }}">
                                    <i class="nc-icon nc-email-85"></i>
                                    <span class="notification">5</span>
                                    <!--- <span class="">Log out</span> --->
                                </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </li> --}}

                </ul>

            </div>
        </div>
    </nav>


    <div class="container">
        @yield('content')
    </div>



    @yield('scripts')


</body>

</html>
