@extends('layouts.usermaster')

@section('styles')
@stop

@section('content')

<div class="cw-container-index">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="section-header text-uppercase">
                    <div class="section-header_container">
                        Summary
                        <span class="small_header">As Tasker</span>
                    </div>
                </h3>
                <div class="work-stat">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="statistics text-uppercase">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="thin value">
                                            0
                                        </div>
                                        <div class="small value_label">
                                            Future Tasks
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="thin value">
                                            0
                                        </div>
                                        <div class="small value_label">
                                            Tasks Completed
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="thin value">
                                            $0.00
                                        </div>
                                        <div class="small value_label">
                                            Total Amount
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="task_assigned-section">
                                <div class="task_assigned-stats text-uppercase">
                                    <div class="thin value">
                                        0
                                    </div>
                                    <div class="tiny label">
                                        Tasks Assigned
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="summary-container">
            <div class="summary-content">

                <!--- Incase there is no tasks assigned to or by the user -->
                <!--
                <div class="if-no-tasks text-center">
                    <div class="if-no-tasks_icon">
                        <i class="nc-icon nc-puzzle-10"></i>
                    </div>
                    <h2 class="if-no-tasks-header text-uppercase">You have not been assigned any tasks yet</h2>
                    <p>This is where you will be able to track your summarized activity</p>
                </div> -->

                <div id="accordion">
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <div class="mb-0">
                                <div class="work-title">
                                    <h4>Waiting in line</h4>
                                    <P>Waiting in line</P>

                                    <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        open
                                    </button>
                                </div>


                            </div>
                          </div>

                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                              <div class="task-details">
                                  <div class="tak-users">
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

                                  <div class="task-description">
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

                                  <div class="task-actions">
                                        <button type="button" class="btn btn-primary btn-sm">Pending</button>
                                        <button type="button" class="btn btn-primary btn-sm">Mark As Complete</button>
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
