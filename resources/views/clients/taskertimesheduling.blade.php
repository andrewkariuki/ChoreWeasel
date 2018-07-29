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


                {{--
                <div class="sort-by">
                    <div class="row">
                        <div class="col-sm-4 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">

                                        <label for="sortby text-center">Sort by:</label>
                                        <select name="sortby" id="sortby" class="form-control">
                                                <option value="0">Recomended</option>
                                                <option value="1">Highest Prices</option>
                                                <option value="2">Lowest Prices</option>
                                                <option value="4">Highest Ratings</option>
                                                <option value="5">Lowest Ratings</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}


                <div class="tasks-time-tasker_content">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            @if ($taskers == null)
                            <div class="card" style="height: 500px;">
                                <div class="card-body justify-content-center">
                                    <h4 class="text-bold">Sorry there seem to be not taskers in this Task Category.</h4>
                                    <p>You can pick another! Sorry for the inconviniency.</p>
                                </div>
                            </div>
                            @else
                            <div class="available-takers">

                                @foreach ($taskers as $tasker)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tasker-details">
                                            <div class="row">
                                                <div class="col-sm-4 text-center">
                                                    <div class="tasker-secondary-attributes ">
                                                        <div class="tasker-image">
                                                            @if($tasker->avatar_status == true)
                                                            <img src="{{ $tasker->avatar }}" alt="{{ $tasker->user->firstname }}-{{ $tasker->user->secondname }}-profile-image">                                                            @else
                                                            <img height="200px" width="200px" src="{{ $user->profile->avatar }}" alt="{{ $tasker->user->firstname }}-{{ $tasker->user->secondname }}-profile-image">                                                            @endif
                                                        </div>
                                                        <div class="preview-tasker">
                                                            <a href="#">Profile and Review</a>
                                                        </div>

                                                        <form action="{{ url('/client/assign/'.$task_category_id.'/to/'.$tasker->user->id) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="tasker_profile_id" id="" value="{{{ $tasker->id }}}">
                                                            <input type="hidden" name="task_category_id" id="" value="{{{ $task_category_id }}}">
                                                            <input type="hidden" name="task_date_time" id="task_date_time" value="{{ $taskdatetime }}">
                                                            <input type="hidden" name="task_requirements" id="task_requirements" value="{{ $task_requirements }}">
                                                            <input type="hidden" name="apt_unit_no" id="apt_unit_no" value="{{ $apt_unit_no }}">
                                                            <input type="hidden" name="apartment_unit" id="apartment_unit" value="{{ $apartment_unit }}">
                                                            <input type="hidden" name="locality_street" id="" value="{{ $locality_street }}">
                                                            <input type="hidden" name="city_town" id="city_town" value="{{ $city_town }}">
                                                            <input type="hidden" name="task_size" id="task_size" value="{{ $task_size }}">
                                                            <input type="hidden" name="task_description" id="task_description" value="{{ $task_description }}">
                                                            <input type="hidden" name="assigned_to" id="assigned_to" value="{{ $tasker->user->id }}">
                                                            <input type="hidden" name="assigned_by" id="assigned_by" value="{{ Auth::user()->id }}">
                                                            <input type="hidden" name="rates" id="rates" value="{{ $tasker->rates }}">

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
                                                        <div class="name-rates text-capitalize">
                                                            {{ $tasker->user->firstname }} {{ $tasker->user->secondname }}
                                                            <span class="pull-right">${{ $tasker->rates }}/hr</span>
                                                        </div>
                                                        <div class="success-rates">
                                                            {{-- <div class="tasks-complete">
                                                                <p>Has completed 9 Waiting in line Tasks</p>
                                                            </div> --}}
                                                            <div class="tasks-complete">
                                                                <p>{{ $tasker->ratings->count() }} Reviews on {{ $tasker->taskcategory->taskname }} Tasks</p>
                                                            </div>
                                                        </div>

                                                        <div class="tasker-pitch">
                                                            <div class="tasker-pitch-header">
                                                                How I can Help
                                                            </div>
                                                            <div class="tasker-pitch-body">
                                                                {{ $tasker->pitch }}
                                                            </div>
                                                        </div>

                                                        <div class="tasker-top-review">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="reviewer-image"></div>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    @if($tasker->ratings->first())
                                                                    <div class="review">
                                                                        {{ $tasker->ratings }}
                                                                    </div>
                                                                    <div class="reviewer-name">
                                                                        John Man - <span class="review-date">{{ $tasker->ratings->comment }}</span>
                                                                    </div>

                                                                    @else {{-- @if($tasker->user->ratingstome->first) --}}
                                                                    <div class="review">
                                                                        {{-- {{ $tasker->user->ratingstome()->comment }} --}}
                                                                        Not yet review - you can review this tasker after assigning tasks to improve their chances of being assign in the future.
                                                                    </div>

                                                                    {{-- @endif --}} @endif
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
                            @endif




                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- 2018-07-29 15:42:13 --}}
@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {
        $('#datetimepicker7').datetimepicker({

            minDate: new Date()
            format : "YYYY-MM-DD HH:mm"

        });

    });

</script>

























































@stop
