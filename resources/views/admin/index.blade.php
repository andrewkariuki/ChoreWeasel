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
                        <div id="chartPreferences" class="ct-chart ct-perfect-fourth">
                            {!! $ratiochart->container() !!}
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
                        <div id="chartActivity" class="ct-chart">

                                {!! $taskcompletionrates->container() !!}
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
@section('scripts')
{!! $taskcompletionrates->script() !!}
{!! $ratiochart->script() !!}
@stop
