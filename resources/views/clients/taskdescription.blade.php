@extends('layouts.usermaster')
@section('styles')
<link href="{{ asset('css/taskdescription.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="cw-container">
    <div class="row">
        <div class="col-sm-12">


            <div class="task-description_wrapper">
                <div class="desc-header">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="desc-header-main">Describe This Task</div>
                            <div class="desc-header-sub">These Details will be used to match you with the right taskers</div>
                        </div>
                    </div>
                </div>

                <div class="desc-fill-out_form">
                    <form action="{{ url('/client/assign/'.$taskcategory->id.'/to') }}" method="post">
                        @csrf
                        <input type="hidden" name="task_category_id" value="{{ $taskcategory->id }}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="taskdate-tasktime">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="taskdate-tasktime-header text-uppercase">TASK date and time</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-4 m-auto">

                                                    <div class="form-group text-center">
                                                        <div class='input-group date' id='taskedate'>
                                                            <input type='text' class="form-control" />
                                                            <span class="input-group-addon" style="padding: 5px; background:darkgray; ">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="location-appartment">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="location-appartment-header text-uppercase">TASK Location</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="custom-label" for="city_town">City or Town</label>
                                                        <input class="form-control" type="text" name="city_town" id="city_town" placeholder="i.e Voi, Meru, Kakamega" value=" ">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="custom-label" for="locality_street">Locality or Street</label>
                                                        <input class="form-control" type="text" name="locality_street" id="loaclity_street" placeholder="i.e Kahawa Wendani, Likoni">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="custom-label" for="apartment_unit">Unit or Apt. Name</label>
                                                        <input class="form-control" type="text" name="apartment_unit" id="apartment_unit" placeholder="i.e Mongoose, Vescon">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="custom-label" for="apt_unit_no">Apt. or Unit Number</label>
                                                        <input class="form-control" type="text" name="apt_unit_no" id="apt_unit_no" placeholder="i.e B 14, Court 55">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="task-size time-estimate">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="task-size-header text-uppercase">TASK SIZE</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="task-size-radios">
                                                <h3 class="task-size-header">Estimate the task size</h3>
                                                <div class="task-size-radios_content">

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="task_size" id="task_size" value="small">
                                                        <label class="form-check-label" for="task_size">Small Task about 1hr tops</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="task_size" id="task_size" value="medium">
                                                        <label class="form-check-label" for="task_size">Medium Task - 2-3hrs tops</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="task_size" id="task_size" value="large">
                                                        <label class="form-check-label" for="task_size">Large task - 4hrs+</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="task-requirements">
                                                <h3 class="task-requirements-header">Task Requirement</h3>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="task_requirements" id="task_requirements" cols="20" rows="10" placeholder="i.e a car, truck"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="more-details">
                                    <di class="card">
                                        <div class="card-header">
                                            <div class="more-details-header text-uppercase">TASK DESCRIPTION</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <textarea class="form-control" name="task_description" id="task_description" cols="20" rows="10" placeholder="Describe the task to help the tasker understand it better"></textarea>
                                            </div>
                                            <div class="form-group text-center">
                                                <button class="btn btn-primary" type="submit">Continue</button>
                                            </div>
                                        </div>
                                    </di>
                                </div>
                            </div>
                        </div>

                    </form>

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
        $(function () {
            $('#taskedate').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                minDate: new Date()
            });
        });

    });
</script>

@stop


{{--
<div data-notify="container" class="col-11 col-sm-4 alert alert-warning alert-with-icon" role="alert" data-notify-position="top-center"
    style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; top: 20px; right: 20px;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1033;"><i class="nc-icon nc-simple-remove"></i></button>
    <span
        data-notify="icon" class="nc-icon nc-app"></span> <span data-notify="title"></span> <span data-notify="message">Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer.</span>
        <a
            href="#" target="_blank" data-notify="url"></a>
</div> --}}
