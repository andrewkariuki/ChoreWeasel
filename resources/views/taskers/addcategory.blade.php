@extends('layouts.usermaster')
@section('styles')
<link href="{{ asset('css/createprofile.css') }}" rel="stylesheet">
@stop
@section('content')
    <div class="cw-container">
        <div class="row">

            <div class="col-sm-4">
                <div class="create-profile-side-container">
                    <div class="create-profile-side-content">
                        <div class="user-hints">
                            <div class="user-hints-header">
                                Flow of Events
                            </div>
                            <div class="user-hits_body">
                                <ul>
                                    <li>Create Profile</li>
                                    <li>Background Check</li>
                                    <li>Activation</li>
                                    <li>Start Working</li>
                                    <li>Constant Reviewing</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="create-profile-container">
                    <div class="create-profile-content">

                        <div id="accordion" role="tablist" aria-multiselectable="true">

                                <div class="card">
                                        <div class="card-header" role="tab" id="headingOne">
                                            <div class="mb-0">
                                                <div class="task-description">
                                                    <h3>
                                                        Waiting in line
                                                    </h3>
                                                    <p>
                                                        Waiting in line at restaurants, bookstores, ticket counters etc.
                                                    </p>
                                                </div>
                                                <a class="dropIcon" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
                                            <div class="card-block">
                                                <div class="assogned-task_info">
                                                        <div class="task-users">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="assigned-by">
                                                                        <h3>Assigned By:</h3>
                                                                        <span>User Full Name</span>
                                                                        <span>Locality, City</span>
                                                                        <span>House Number</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="assigned-to">
                                                                        <h3>Assigned To:</h3>
                                                                        <span>User Full Name</span>
                                                                        <span>Locality, City</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="task-full-description">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Task</th>
                                                                        <th scope="col">Task Description</th>
                                                                        <th scope="col">Rate/hr</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">Task Name</th>
                                                                        <td>Waiting in line at restaurants and stores</td>
                                                                        <td>$67</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>


                                                    <div class="action-buttons pull-right">
                                                        <button disabled="disabled" class="btn btn-light">
                                                            Pending Payment
                                                        </button>
                                                        <button disabled="disabled" class="btn btn-light">
                                                            Mark as Complete
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
