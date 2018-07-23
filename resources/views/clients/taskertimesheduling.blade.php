@extends('layouts.usermaster')
@section('styles')
<link href="{{ asset('css/taskertimesheduling.css') }}" rel="stylesheet">
@stop
@section('content')

<div class="cw-container">
    <div class="row">
        <div class="col-sm-12">
            <div class="task-time-tasker_wrapper">


                <div class="task-time-tasker-header">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="task-time-tasker-header-main">Pick A Tasker</div>
                            <div class="task-time-tasker-header-sub">You can Chat with the tasker to explain more about the task</div>
                        </div>
                    </div>
                </div>


                <div class="tasks-time-tasker_content">
                    <div class="row">
                        {{--
                        <div class="col-sm-4">
                            <div class="time-sheduling">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="sort-by">
                                            <div class="sort-by_header">Sort by:</div>
                                            <div class="sort-by-action">
                                                <div class="form-group">
                                                    <select class="form-control" name="sort_by" id="sort_by">
                                                        <option value="0">Recommended</option>
                                                        <option value="1">Highest Price</option>
                                                        <option value="0">Lowest Price</option>
                                                        <option value="0">Highest Ratings</option>
                                                        <option value="0">Most task Complete</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="task-date-time">
                                            <div class="task-date-time_header">
                                                Task Date & Time
                                            </div>
                                            <div class="task-date-time_body">
                                                <div class="form-group">
                                                    <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="datetimepicker7" />
                                                        <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-sm-8 m-auto">
                            {{--
                            <form action="" method="post">
                                @csrf
                                <input type="text" name="" id="" value="{{{ $task_category_id }}}">
                                <input type="text" name="" id="" value="{{ $taskdatetime }}">
                                <input type="text" name="" id="" value="{{ $task_requirements }}">
                                <input type="text" name="" id="" value="{{ $apt_unit_no }}">
                                <input type="text" name="" id="" value="{{ $apartment_unit }}">
                                <input type="text" name="" id="" value="{{ $locality_street }}">
                                <input type="text" name="" id="" value="{{ $city_town }}">
                                <input type="text" name="" id="" value="{{ $task_size }}">
                                <input type="text" name="" id="" value="{{ $task_description }}">
                            </form> --}}
                            <div class="available-takers">

                                @foreach ($taskers as $tasker)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tasker-details">
                                            <div class="row">
                                                <div class="col-sm-4 text-center">
                                                    <div class="tasker-secondary-attributes ">
                                                        <div class="tasker-image">
                                                            <img class="rounded img-responsive " style="width:200px; height:200px;" src="{{ asset('/images/test/andy.jpg') }}" alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="preview-tasker">
                                                            <a href="#">Profile and Review</a>
                                                        </div>

                                                        <form action="{{ url('/client/assign/'.$task_category_id.'/to/'.$tasker->id) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="task_category_id" id="" value="{{{ $task_category_id }}}">
                                                            <input type="hidden" name="task_date_time" id="task_date_time" value="{{ $taskdatetime }}">
                                                            <input type="hidden" name="task_requirements" id="task_requirements" value="{{ $task_requirements }}">
                                                            <input type="hidden" name="apt_unit_no" id="apt_unit_no" value="{{ $apt_unit_no }}">
                                                            <input type="hidden" name="apartment_unit" id="apartment_unit" value="{{ $apartment_unit }}">
                                                            <input type="hidden" name="locality_street" id="" value="{{ $locality_street }}">
                                                            <input type="hidden" name="city_town" id="city_town" value="{{ $city_town }}">
                                                            <input type="hidden" name="task_size" id="task_size" value="{{ $task_size }}">
                                                            <input type="hidden" name="task_description" id="task_description" value="{{ $task_description }}">
                                                            <input type="hidden" name="assigned_to" id="assigned_to" value="{{ $tasker->id }}">
                                                            <input type="hidden" name="assigned_by" id="assigned_by" value="{{ Auth::user()->id }}">
                                                            <input type="hidden" name="rates" id="rates" value="{{ $tasker->profile->rates }}">

                                                            <div class="select-tasker">
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary">Assign Task</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="tasker-primary-attributes">
                                                        <div class="name-rates">
                                                            {{ $tasker->firstname }} {{ $tasker->secondname }}
                                                            <span class="pull-right">${{ $tasker->profile->rates }}/hr</span>
                                                        </div>
                                                        <div class="success-rates">
                                                            <div class="tasks-complete">
                                                                <p>Has completed 9 Waiting in line Tasks</p>
                                                            </div>
                                                            <div class="tasks-complete">
                                                                <p>Has 9 Reviews on Waiting in line tasks</p>
                                                            </div>
                                                        </div>

                                                        <div class="tasker-pitch">
                                                            <div class="tasker-pitch-header">
                                                                How I can Help
                                                            </div>
                                                            <div class="tasker-pitch-body">
                                                                {{ $tasker->profile->pitch }}
                                                            </div>
                                                        </div>

                                                        <div class="tasker-top-review">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="reviewer-image"></div>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="review">
                                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit molestias eos dolorem provident deleniti unde deserunt temporibus
                                                                        sint cumque! Magnam fuga nostrum rerum perspiciatis
                                                                        saepe at blanditiis. Molestiae, magnam aspernatur.
                                                                    </div>
                                                                    <div class="reviewer-name">
                                                                        John Man - <span class="review-date">30-10-2018</span>
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

                                @endforeach




                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {
        $('#datetimepicker7').datetimepicker();

    });

</script>























































@stop
