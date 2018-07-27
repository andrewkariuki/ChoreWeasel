<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: auto;
            margin: 0;
        }

        .full-height {
            height: 500px;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 40px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a> @else
            <a href="{{ url('/explore/allservices') }}">Explore</a>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ url('/account/choose')  }}">Register</a>
            <a href="{{ url('/account/tasker') }}">Become a Tasker</a> @endauth
        </div>
        @endif

        <div class="content">
            <div class="title mb-2">
                ChoreWeasel
            </div>
            <p style="font-size: 18px; margin-top: 20px">Consider it done</p>
            </p>

            <div class="links">
                <a href="{{ url('/explore/allservices') }}">Cleaning</a>
                <a href="{{ url('/explore/allservices') }}">Shopping + Delivery</a>
                <a href="{{ url('/explore/allservices') }}">Parties + Events</a>
                <a href="{{ url('/explore/allservices') }}">Electric & Plumbing</a>
            </div>
        </div>
    </div>

    <!-- POPULAR TASKS ON CHOREWEASEL -->
    <div class="welcome-container bg-color-greyish">
        <div class="welcome-container-content">
            <div class="popular-chores">

                <h2 class="popular-chores-title text-center">
                    Popular Chores on ChoreWeasel
                </h2>

                <div class="row text-center">
                    @if ($topcategories != null) @foreach ($topcategories as $topcategory)
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" style="height: 200px; vertical-align: middle;" src="
                            @if($topcategory->taskimage  != null)
                            {{ asset('/images/taskcategory/'.$topcategory->taskimage ) }}
                            @else
                            ../images/mounting.jpg
                            @endif" alt="$topcategory->taskname">
                            <div class="card-body">
                                <p class="card-text">
                                    <a href="{{ url('/client/assign/'.$topcategory->id) }}" class="cw-btn cw-btn-priamry" style="
                                            color: #ef5b25;
                                            font-size: 14px;
                                            font-weight: 300;
                                        ">{{ $topcategory->taskname }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach @endif
                </div>
            </div>
        </div>
    </div>

    <!-- HOW CHOREWEASEL WORKS -->
    <div class="welcome-container">
        <div class="welcome-container-content">
            <div class="home-container cw-container-hiws">
                <div class="home-container-section home-container-section_top">
                    <h2 class="text-center">How ChoreWeasel works.</h2>

                    <div class="htw-nav-container">
                        <ul class="htw-nav text-center">

                            <li class="htw-nav-item active">
                                <a href="http://" class="htw-nav-link">
                                        <span class="htw-nav-link-label">
                                            For Homeowners
                                        </span>
                                    </a>
                            </li>

                            <li class="htw-nav-item">
                                <a href="http://" class="htw-nav-link">
                                        <span class="htw-nav-link-label">
                                            For Taskers
                                        </span>
                                    </a>
                            </li>

                        </ul>
                    </div>

                </div>


                <div class="home-container-section htw-section-lower">

                    <h3 class="htw-user-title text-center">For Homeowners</h3>

                    <div class="row htw-guide text-center">

                        <!-- <h3 class="htw-user-title">For Homeowners</h3> -->

                        <div class="col-sm-4">
                            <img class="htw-top-image" src="../images/htws/contract_128x128.png" alt="">
                            <div class="htw-btm-text">
                                <h4 class="htw-btm-text-title">Describe the chore</h4>
                                <p class="htw-btm-text-desc">
                                    Choose from a variety of home services and select the day and time you'd like a qualified Tasker to show up. Give us the
                                    details and we'll find you the help.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <img class="htw-top-image" src="../images/htws/employees_128x128.png" alt="">
                            <div class="htw-btm-text">
                                <h4 class="htw-btm-text-title">Get matched</h4>
                                <p class="htw-btm-text-desc">
                                    ChoreWeasel will search for Taskers who matches your task. A list of qualified and fully vetted Taskers for the task will
                                    be displayed for you to pick from.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <img class="htw-top-image" src="../images/htws/job-search_128x128.png" alt="">
                            <div class="htw-btm-text">
                                <h4 class="htw-btm-text-title">Hire the right Tasker</h4>
                                <p class="htw-btm-text-desc">
                                    Select from a list of qualified and fully vetted Taskers for the job. Choose Taskers by their hourly rate. Just like that,
                                    the Tasker will arrive to do the task as specified.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- BOTTOM CALL TO ACTION -->
    <div class="welcome-container bg-grey">
        <div class="welcome-container-content">
            <div class="cw-cta">
                <h2 class="cw-btm-cta-title text-center">Get It Done Today, Browse Available Chores</h2>

                <div class="initial-chore-list">
                    <div class="row chore-list text-center">
                        <div class="col-sm-3">
                            <a href="{{ url('/explore/allservices') }}" class="chore-item">
                                <img class="chore-item-image" src="../images/dusting.png" alt="explore more">
                                <h4 class="chore-item-title cw-text-truncate">Shallow Cleaning</h4>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="{{ url('/explore/allservices') }}" class="chore-item">
                                <img class="chore-item-image" src="../images/room.png" alt="explore more">
                                <h4 class="chore-item-title cw-text-truncate">Deep Cleaning</h4>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="#" class="chore-item">
                                <img class="chore-item-image" src="../images/washing-machine.png" alt="explore more">
                                <h4 class="chore-item-title cw-text-truncate">Laundry</h4>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="{{ url('/explore/allservices') }}" class="chore-item">
                                <img class="chore-item-image" src="../images/carpet.png" alt="explore more">
                                <h4 class="chore-item-title cw-text-truncate">Carpet Cleaning</h4>
                            </a>
                        </div>
                    </div>


                    <div class="row chore-list text-center">
                        <div class="col-sm-3">
                            <a href="{{ url('/explore/allservices') }}" class="chore-item">
                                <img class="chore-item-image" src="../images/moving.png" alt="explore more">
                                <h4 class="chore-item-title cw-text-truncate">Moving</h4>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="#" class="chore-item">
                                <img class="chore-item-image" src="../images/shopping.png" alt="explore more">
                                <h4 class="chore-item-title cw-text-truncate">Shopping</h4>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="{{ url('/explore/allservices') }}" class="chore-item">
                                <img class="chore-item-image" src="../images/drill.png" alt="explore more">
                                <h4 class="chore-item-title cw-text-truncate">Handyman</h4>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="{{ url('/explore/allservices') }}" class="chore-item">
                                <img class="chore-item-image" src="../images/more.png" alt="explore more">
                                <h4 class="chore-item-title cw-text-truncate">Explore More</h4>
                            </a>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>


    <!-- SIGN UP CALL TO ACTION -->
    <div class="welcome-container">
        <div class="welcome-container-content cw-cta-signup">
            <h2 class="cw-btm-cta-title text-center">ChoreWeasel connect homeowners and taskers.</h2>

            <div class="row text-center">
                <div class="col-sm-6">
                    <a href="signup.html" class="tasker-signup">
                        <h4>ChoreWeasel for Taskers</h4>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="signup.html" class="homeowner-signup">
                        <h4>ChoreWeasel for Homeowners</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <footer class="main-footer bg-color-greyish">
        <div class="welcome-container-content cw-footer-content">
            <div class="row ">
                <div class="col-sm-3">
                    <h3 class="cw-footer-menu-header">
                        Company
                    </h3>

                    <ul class="cw-footer-menu">
                        <li class="cw-footer-menu-item">
                            <a href="#">Press</a>
                        </li>
                        <li class="cw-footer-menu-item">
                            <a href="#">About</a>
                        </li>
                        <li class="cw-footer-menu-item">
                            <a href="#">Careers</a>
                        </li>
                        <li class="cw-footer-menu-item">
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li class="cw-footer-menu-item">
                            <a href="#">_('Terms of Use')</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h3 class="cw-footer-menu-header">
                        For Taskers
                    </h3>

                    <ul class="cw-footer-menu">
                        <li class="cw-footer-menu-item">
                            <a href="#">Sign Up</a>
                        </li>
                        <li class="cw-footer-menu-item">
                            <a href="#">How it works</a>
                        </li>
                        <li class="cw-footer-menu-item">
                            <a href="#">Success stories</a>
                        </li>
                        <li class="cw-footer-menu-item">
                            <a href="#">ChoreWeasel Guides</a>
                        </li>
                        <li class="cw-footer-menu-item">
                            <a href="#">Post your story</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h3 class="cw-footer-menu-header">
                        For Homeowners
                    </h3>

                    <ul class="cw-footer-menu">
                        <li class="cw-footer-menu-item">
                            <a href="#">Sign Up</a>
                        </li>
                        <li class="cw-footer-menu-item">
                            <a href="#">Security</a>
                        </li>
                        <li class="cw-footer-menu-item">
                            <a href="#">Chore List</a>
                        </li>
                        <li class="cw-footer-menu-item">
                            <a href="#">How it works</a>
                        </li>
                        <li class="cw-footer-menu-item">
                            <a href="#">ChoreWeasel Guides</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h3 class="cw-footer-menu-header">
                        Support
                    </h3>
                    <ul class="cw-footer-menu">
                        <li class="cw-footer-menu-item">
                            <a href="#">Help Center</a>
                        </li>
                        <!-- <li class="cw-footer-menu-item"></li>
                                <li class="cw-footer-menu-item"></li>
                                <li class="cw-footer-menu-item"></li>
                                <li class="cw-footer-menu-item"></li> -->
                    </ul>
                </div>
            </div>

            <div class="cw-footer-image image-show">

            </div>

            <small class="cw-main-footer-cpright text-center">
                        Copyright &copy; 2018 ChoreWeasel Inc.
                    </small>
        </div>
    </footer>

</body>

</html>
