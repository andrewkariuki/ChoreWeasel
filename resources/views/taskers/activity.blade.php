@extends('layouts.usermaster')
@section('styles')
<link href="{{ asset('css/summary.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard/css/light-bootstrap-dashboard.css?v=2.0.1') }}" rel="stylesheet">
<link href="{{ asset('dashboard/css/demo.css') }}" rel="stylesheet">
@stop
@section('content')

<div class="cw-container-index">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="section-header text-uppercase">
                <div class="section-header_container">
                    Activities
                    <span class="small_header">as a Tasker</span>
                </div>
            </h3>
            <div class="work-stat">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="statistics text-uppercase">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="thin value">
                                            {{ $futuretasks }}
                                    </div>
                                    <div class="small value_label">
                                        Future Tasks
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="thin value">

                                        {{  $completedtaks }}
                                    </div>
                                    <div class="small value_label">
                                        Tasks Completed
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="thin value">
                                        ${{ $accountbalance->balance }}.00
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

                                    {{ $totaltaskstome }}

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


            @if (count($assignedtasks) != 0)
                {{--  in case there are tasks assigned to this user or tasker the show the first 10 tasks  --}}

                <div id="accordion" role="tablist" aria-multiselectable="true">

                    @foreach ($assignedtasks as $assignedtask)
                    <div class="card">
                        <div class="card-header" role="tab" id="heading{{ $assignedtask->id }}">
                            <div class="mb-0">
                                {{--  the task description  --}}
                                <div class="task-description">
                                    <h3>{{ $assignedtask->taskcategory->taskname }}

                                        {{--  date of the task  --}}
                                        <span class="date">
                                            <small class="small_insight">
                                                on
                                            </small>
                                            {{ \Carbon\Carbon::parse($assignedtask->task_date_time)->format('d/m/Y') }}
                                        </span>
                                        <span class="rates pull-right">
                                            <small class="small_insights">for</small>
                                            {{--  ${{ $assignedtask->rates }}/hr  --}}
                                        </span>
                                    </h3>
                                    <p>
                                        {{--  the client's name  --}}
                                        <span class="assigned_by">
                                            <small class="small_insights">client</small>
                                                {{ $assignedtask->assigner->firstname }} {{ $assignedtask->assigner->secondname }}
                                        </span>
                                        {{--  the task location  --}}
                                        <span class="location">
                                            <small class="small_insights">in</small>
                                                {{ $assignedtask->locality_street}}
                                        </span>
                                        {{--  the task time  --}}
                                        <span class="time">
                                            <small class="small_insights">at</small>
                                                {{ \Carbon\Carbon::parse($assignedtask->task_date_time)->format('H:i') }}
                                        </span>

                                    </p>
                                </div>
                                <a class="dropIcon" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $assignedtask->id }}" aria-expanded="false" aria-controls="collapse{{ $assignedtask->id }}" class="collapsed">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>

                        <div id="collapse{{ $assignedtask->id }}" class="collapse" role="tabpanel" aria-labelledby="heading{{ $assignedtask->id }}"
                            aria-expanded="false" style="">
                            <div class="card-block">
                                <div class="assogned-task_info">

                                    <div class="task-info-header text-uppercase">
                                        Task details
                                    </div>

                                    <div class="involved-parties">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="assigner-identity text-capitalize">
                                                    <p>{{ $assignedtask->assigner->firstname }} {{ $assignedtask->assigner->secondname
                                                        }}
                                                    </p>
                                                    <p>
                                                        {{ $assignedtask->apartment_unit }}, House No. {{ $assignedtask->apt_unit_no }}
                                                    </p>
                                                    <p>
                                                        {{ $assignedtask->locality_street }}, {{ $assignedtask->city_town }}
                                                    </p>
                                                    <p>

                                                    </p>
                                                </div>

                                                <div class="assignee-identity text-capitalize">
                                                    <p>{{ $assignedtask->assignee->firstname }} {{ $assignedtask->assignee->secondname
                                                        }}
                                                    </p>
                                                    <p>
                                                        {{ $user->profile->locality }}, {{ $user->profile->city }}, {{ $user->profile->county }}.
                                                    </p>
                                                    <p>

                                                    </p>
                                                    <p>

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="choreweasel-logo">
                                                    <span class="choreweasel-logo_start">Chore</span>Weasel
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="task-full-description">
                                        <table class="table table-custom">
                                            <tbody>
                                                <tr>
                                                    <th scope="col">Task</th>
                                                    <th scope="col">Task Description</th>
                                                    <th scope="col">Rate/hr</th>
                                                    <th scope="col">Hours Worked</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                                <tr class="task-row">
                                                    <td scope="row">Task Name</td>
                                                    <td>Waiting in line at restaurants and stores</td>
                                                    <td class="rates">$67</td>
                                                    <td class="rates">

                                                        @if ($assignedtask->completed == 0)
                                                            {{--  if the task is not yet completed then we show a not applicable  --}}
                                                            N/A
                                                        @else
                                                             {{--  if the task is not yet completed then we show the total time worked  --}}
                                                            1hr
                                                        @endif
                                                    </td>
                                                    <td class="rates">
                                                        @if ($assignedtask->completed == 0)
                                                            {{--  if the task is not yet completed then we show a not applicable  --}}
                                                            N/A
                                                         @else
                                                            {{--  if the task is commplete then we calculate the subtotal  --}}
                                                            $67

                                                         @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="action-buttons pull-right">
                                        @if ($assignedtask->completed == 0)
                                            <button type="button" class="btn btn-default btn-sm awaiting-completion" disabled>
                                                Awaiting Completion
                                            </button>
                                            {{--  Mark a task as completed  --}}
                                            <form action="" method="post">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="" value="{{ \Carbon\Carbon::now() }}">
                                                <button type="submit" class="btn btn-primary btn-sm task-completed">
                                                    Mark As Completed
                                                </button>
                                            </form>

                                        @elseif($assignedtask->completed == 1 && $assignedtask->paid == 0)
                                            <button disabled="disabled" class="btn btn-default btn-sm awaiting-payment">
                                                Awaiting Payment
                                            </button>
                                        @elseif($assignedtask->completed == 1 && $assignedtask->paid == 1)
                                            <button disabled="disabled" class="btn btn-default btn-sm task-settled">
                                                Settled
                                            </button>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach



                </div>


            @else
                {{--  incase there are no tasks assigned to this tasker then just show a blank page  --}}
                <div class="if-no-tasks_container">
                    <div class="if-no-tasks text-center">
                        <div class="if-no-tasks_icon">
                            <i class="nc-icon nc-puzzle-10"></i>
                        </div>
                        <h2 class="if-no-tasks-header text-uppercase">You have not been assigned any tasks yet</h2>
                        <p>This is where you will be able to track your activities</p>
                    </div>
                </div>

            @endif


        </div>
    </div>





</div>
@endsection
