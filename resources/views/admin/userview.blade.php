@extends('admin.master')
@section('styles')
<link href="{{ asset('css/userview.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-inline-block">
                    <h4 class="card-title">{{ $user->firstname }} {{ $user->secondname }}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="basic-details" style="width: 900px; margin:0 auto;">
                    <div class="basic-details_header">
                        Basic details
                    </div>
                    <div class="basic-details_body">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="row">


                                    <div class="col-sm-6">
                                        <div class="user-full-name">
                                            <label for="">Full name</label>
                                            <div class="fullname">
                                                {{ $user->firstname }} {{ $user->secondname }}
                                            </div>
                                        </div>

                                        <div class="user-email">
                                            <label for="">Email</label>
                                            <div class="email">
                                                {{ $user->email }}
                                            </div>
                                        </div>

                                        <div class="user-full-name">
                                            <label for="">Username</label>
                                            <div class="username">
                                                {{ $user->name }}
                                            </div>
                                        </div>

                                        <div class="user-phone-number">
                                            <label for="">Username</label>
                                            <div class="userphonenumber">
                                                +254{{ $user->profile->phonenumber }}
                                            </div>
                                        </div>

                                        <div class="user-nationalid">
                                            <label for="">Username</label>
                                            <div class="usernationalid">
                                                {{ $user->profile->nationalid }}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">


                                        <div class="user-task">
                                            <label for="">Task</label>
                                            <div class="usertask badge-orange">
                                                {{ $usertask->taskname }}
                                            </div>
                                        </div>

                                        <div class="total-tasks">
                                            <label for="">Total Tasks</label> 22
                                        </div>
                                        <div class="total-tasks-completed">
                                            <label for="">Total Completed</label> 22
                                        </div>
                                        <div class="total-ratings">
                                            <label for="">Total Ratings</label> 22
                                        </div>
                                    </div>



                                </div>

                                <div class="account-statuses">
                                    <div class="verification-status"></div>
                                    <div class="ban-status"></div>
                                </div>

                                <div class="location-details">
                                    <div class="location-details_header">
                                        Location and addresses
                                    </div>
                                    <div class="location-details_body">

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="user-county">
                                                    <label for="">County</label>
                                                    <div class="usercounty">
                                                        {{ $user->profile->county }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="user-city">
                                                    <label for="">City/Town</label>
                                                    <div class="usercity">
                                                        {{ $user->profile->city}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="user-locality">
                                                    <label for="">Locality</label>
                                                    <div class="userlocality">
                                                        {{ $user->profile->locality}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="user-postal">
                                            <label for="">Postal</label>
                                            <div class="userpoastal">
                                                {{ $user->profile->postaladdress}} - {{ $user->profile->postalcode}}, {{ $user->profile->city}}
                                            </div>
                                        </div>



                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="adminactions">
                    <div class="adminactions_header">
                        You can perform any action
                    </div>
                    <div class="adminactions_body"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
