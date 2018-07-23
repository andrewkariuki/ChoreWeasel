@extends('admin.master')
@section('styles')
<link href="{{ asset('css/admindashboard.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="dashboard-top">
    <div class="row">
        <div class="col-sm-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <i class="fa fa-users-cog fa-5x"></i>
                        </div>
                        <div class="col-sm-9 text-right">
                            <div class="large-text" style="font-size: 30px;">
                                {{ $totaltaskers }}
                            </div>
                            <div>Active Taskers</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('admin/taskers') }}">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </span>
                    </a>

                </div>
            </div>
        </div>
        <div class="col-log-3 col-sm-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <i class="fa fa-users-cog fa-5x"></i>
                        </div>
                        <div class="col-sm-9 text-right">
                            <div class="large-text" style="font-size: 30px;">
                                {{ $totalclients }}
                            </div>
                            <div>Active Clients</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('admin/clients') }}">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </span>
                    </a>

                </div>
            </div>
        </div>
        <div class="col-log-3 col-sm-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <i class="fa fa-users-cog fa-5x"></i>
                        </div>
                        <div class="col-sm-9 text-right">
                            <div class="large-text" style="font-size: 30px;">
                                {{ $totalactivetasks }}
                            </div>
                            <div>Active Tasks</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('admin/clients') }}">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-log-3 col-sm-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <i class="fa fa-users-cog fa-5x"></i>
                        </div>
                        <div class="col-sm-9 text-right">
                            <div class="large-text" style="font-size: 30px;">
                                {{ $alltimetasks }}
                            </div>
                            <div>All Time Tasks</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('admin/clients') }}">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="chart-stats">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Taskers - to - Clients Ratio
                        </h4>
                        <p class="card-category">
                            The ratio of all active clients to the taskers.
                        </p>
                    </div>
                    <div class="card-body">
                        <div id="chartPreferences" class="ct-chart ct-perfect-fourth"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-pie"
                                style="width: 100%; height: 100%;"><g class="ct-series ct-series-c"><path d="M145.5,5A117.5,117.5,0,0,0,70.287,32.227L145.5,122.5Z" class="ct-slice-pie" ct:value="11"></path></g><g class="ct-series ct-series-b"><path d="M70.603,31.965A117.5,117.5,0,0,0,123.886,237.995L145.5,122.5Z" class="ct-slice-pie" ct:value="36"></path></g><g class="ct-series ct-series-a"><path d="M123.483,237.919A117.5,117.5,0,1,0,145.5,5L145.5,122.5Z" class="ct-slice-pie" ct:value="53"></path></g><g><text dx="203.98926542043094" dy="128.02886340746272" text-anchor="middle" class="ct-label">53%</text><text dx="88.59573928369292" dy="137.11053087093524" text-anchor="middle" class="ct-label">36%</text><text dx="125.59914718558909" dy="67.22325482393927" text-anchor="middle" class="ct-label">11%</text></g></svg></div>

                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> Open
                            <i class="fa fa-circle text-danger"></i> Bounce
                            <i class="fa fa-circle text-warning"></i> Unsubscribe
                        </div>

                        <hr>

                        <div class="update">
                            <i class="fa fa-clock-o"></i> Updated with every signup
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Tasks Assigned - to - Tasks Commpleted Ratio
                        </h4>
                        <p class="card-category">
                            The ratio of all tasks assigned to the tasks completed.
                        </p>
                    </div>
                    <div class="card-body">
                        <div id="chartActivity" class="ct-chart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="245px" class="ct-chart-bar"
                                style="width: 100%; height: 245px;"><g class="ct-grids"><line y1="210" y2="210" x1="50" x2="453" class="ct-grid ct-vertical"></line><line y1="188.33333333333334" y2="188.33333333333334" x1="50" x2="453" class="ct-grid ct-vertical"></line><line y1="166.66666666666666" y2="166.66666666666666" x1="50" x2="453" class="ct-grid ct-vertical"></line><line y1="145" y2="145" x1="50" x2="453" class="ct-grid ct-vertical"></line><line y1="123.33333333333333" y2="123.33333333333333" x1="50" x2="453" class="ct-grid ct-vertical"></line><line y1="101.66666666666667" y2="101.66666666666667" x1="50" x2="453" class="ct-grid ct-vertical"></line><line y1="80" y2="80" x1="50" x2="453" class="ct-grid ct-vertical"></line><line y1="58.33333333333334" y2="58.33333333333334" x1="50" x2="453" class="ct-grid ct-vertical"></line><line y1="36.66666666666666" y2="36.66666666666666" x1="50" x2="453" class="ct-grid ct-vertical"></line><line y1="15" y2="15" x1="50" x2="453" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><line x1="61.79166666666667" x2="61.79166666666667" y1="210" y2="92.56666666666666" class="ct-bar" ct:value="542"></line><line x1="95.37500000000001" x2="95.37500000000001" y1="210" y2="114.01666666666667" class="ct-bar" ct:value="443"></line><line x1="128.95833333333334" x2="128.95833333333334" y1="210" y2="140.66666666666669" class="ct-bar" ct:value="320"></line><line x1="162.54166666666666" x2="162.54166666666666" y1="210" y2="41" class="ct-bar" ct:value="780"></line><line x1="196.125" x2="196.125" y1="210" y2="90.18333333333334" class="ct-bar" ct:value="553"></line><line x1="229.70833333333334" x2="229.70833333333334" y1="210" y2="111.85" class="ct-bar" ct:value="453"></line><line x1="263.2916666666667" x2="263.2916666666667" y1="210" y2="139.36666666666667" class="ct-bar" ct:value="326"></line><line x1="296.87500000000006" x2="296.87500000000006" y1="210" y2="115.96666666666667" class="ct-bar" ct:value="434"></line><line x1="330.45833333333337" x2="330.45833333333337" y1="210" y2="86.93333333333334" class="ct-bar" ct:value="568"></line><line x1="364.0416666666667" x2="364.0416666666667" y1="210" y2="77.83333333333334" class="ct-bar" ct:value="610"></line><line x1="397.62500000000006" x2="397.62500000000006" y1="210" y2="46.19999999999999" class="ct-bar" ct:value="756"></line><line x1="431.20833333333337" x2="431.20833333333337" y1="210" y2="16.083333333333343" class="ct-bar" ct:value="895"></line></g><g class="ct-series ct-series-b"><line x1="71.79166666666667" x2="71.79166666666667" y1="210" y2="120.73333333333333" class="ct-bar" ct:value="412"></line><line x1="105.37500000000001" x2="105.37500000000001" y1="210" y2="157.35" class="ct-bar" ct:value="243"></line><line x1="138.95833333333334" x2="138.95833333333334" y1="210" y2="149.33333333333334" class="ct-bar" ct:value="280"></line><line x1="172.54166666666666" x2="172.54166666666666" y1="210" y2="84.33333333333333" class="ct-bar" ct:value="580"></line><line x1="206.125" x2="206.125" y1="210" y2="111.85" class="ct-bar" ct:value="453"></line><line x1="239.70833333333334" x2="239.70833333333334" y1="210" y2="133.51666666666665" class="ct-bar" ct:value="353"></line><line x1="273.2916666666667" x2="273.2916666666667" y1="210" y2="145" class="ct-bar" ct:value="300"></line><line x1="306.87500000000006" x2="306.87500000000006" y1="210" y2="131.13333333333333" class="ct-bar" ct:value="364"></line><line x1="340.45833333333337" x2="340.45833333333337" y1="210" y2="130.26666666666665" class="ct-bar" ct:value="368"></line><line x1="374.0416666666667" x2="374.0416666666667" y1="210" y2="121.16666666666667" class="ct-bar" ct:value="410"></line><line x1="407.62500000000006" x2="407.62500000000006" y1="210" y2="72.19999999999999" class="ct-bar" ct:value="636"></line><line x1="441.20833333333337" x2="441.20833333333337" y1="210" y2="59.41666666666666" class="ct-bar" ct:value="695"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="50" y="215" width="33.583333333333336" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Jan</span></foreignObject><foreignObject style="overflow: visible;" x="83.58333333333334" y="215" width="33.583333333333336" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Feb</span></foreignObject><foreignObject style="overflow: visible;" x="117.16666666666667" y="215" width="33.58333333333333" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Mar</span></foreignObject><foreignObject style="overflow: visible;" x="150.75" y="215" width="33.58333333333334" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Apr</span></foreignObject><foreignObject style="overflow: visible;" x="184.33333333333334" y="215" width="33.58333333333334" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Mai</span></foreignObject><foreignObject style="overflow: visible;" x="217.91666666666669" y="215" width="33.583333333333314" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Jun</span></foreignObject><foreignObject style="overflow: visible;" x="251.5" y="215" width="33.58333333333334" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Jul</span></foreignObject><foreignObject style="overflow: visible;" x="285.08333333333337" y="215" width="33.58333333333334" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Aug</span></foreignObject><foreignObject style="overflow: visible;" x="318.6666666666667" y="215" width="33.583333333333314" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Sep</span></foreignObject><foreignObject style="overflow: visible;" x="352.25" y="215" width="33.58333333333337" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Oct</span></foreignObject><foreignObject style="overflow: visible;" x="385.83333333333337" y="215" width="33.583333333333314" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Nov</span></foreignObject><foreignObject style="overflow: visible;" x="419.4166666666667" y="215" width="33.583333333333314" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Dec</span></foreignObject><foreignObject style="overflow: visible;" y="188.33333333333334" x="10" height="21.666666666666668" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">0</span></foreignObject><foreignObject style="overflow: visible;" y="166.66666666666669" x="10" height="21.666666666666668" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">100</span></foreignObject><foreignObject style="overflow: visible;" y="145" x="10" height="21.666666666666664" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">200</span></foreignObject><foreignObject style="overflow: visible;" y="123.33333333333333" x="10" height="21.66666666666667" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">300</span></foreignObject><foreignObject style="overflow: visible;" y="101.66666666666667" x="10" height="21.666666666666657" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">400</span></foreignObject><foreignObject style="overflow: visible;" y="80" x="10" height="21.66666666666667" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">500</span></foreignObject><foreignObject style="overflow: visible;" y="58.33333333333334" x="10" height="21.666666666666657" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">600</span></foreignObject><foreignObject style="overflow: visible;" y="36.66666666666666" x="10" height="21.666666666666686" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">700</span></foreignObject><foreignObject style="overflow: visible;" y="15" x="10" height="21.666666666666657" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">800</span></foreignObject><foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" style="height: 30px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">900</span></foreignObject></g></svg></div>

                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> Open
                            <i class="fa fa-circle text-danger"></i> Bounce
                            <i class="fa fa-circle text-warning"></i> Unsubscribe
                        </div>

                        <hr>

                        <div class="update">
                            <i class="fa fa-clock-o"></i> Updated with every task assignment and completion
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-2 text-stats">
                <div class="text-stats_header text-center text-danger" style="margin-bottom: 20px; font-size: 16px; line-height: 20px: font-weight:600; ">
                    {{ __('Activities of the day') }}
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib">
                                <i class="ti-money text-success border-success">
                            </i></div>
                            <div class="stat-content dib">
                                <div class="stat-digit text-center">{{ $tatolaclientsignup }}</div>
                                <div class="stat-text">Client Signups</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib">
                                <i class="ti-money text-success border-success">
                            </i></div>
                            <div class="stat-content dib">
                                <div class="stat-digit text-center">{{ $tatolataskersignup }}</div>
                                <div class="stat-text">Tasker Signups</div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib">
                                <i class="ti-money text-success border-success">
                            </i></div>
                            <div class="stat-content dib">
                                <div class="stat-digit text-center">{{ $tasksAssignedToday }}</div>
                                <div class="stat-text">Tasks Assigned</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib">
                                <i class="ti-money text-success border-success">
                            </i></div>
                            <div class="stat-content dib">
                                <div class="stat-digit text-center">1,012</div>
                                <div class="stat-text">Tasks Spent</div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>


    <div class="admin-activities-section">

    </div>
</div>
@endsection
