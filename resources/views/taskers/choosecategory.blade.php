@extends('layouts.profilemaster')
@section('styles')
<link href="{{ asset('css/createprofile.css') }}" rel="stylesheet">
<link href="{{ asset('css/summary.css') }}" rel="stylesheet">
@stop
@section('content')

<div class="cw-container">
    <div class="cw-container-createprofile text-center" style="font-size: 32px;">
       {{-- Choose Task Category --}}
    </div>


    <div class="row" style="margin-top: 60px;">
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
            <h2 class="mb-2 text-center" style="color:black; font-size:20px;">Pick A Category That matches your skill set and Set your Rates</h2>
            <div class="task_category-container">
                <div class="row">
                    <div class="col-sm-12">

                        @if (count($tasks) != 0)
                        <div id="accordion" role="tablist" aria-multiselectable="true">
                            @foreach ($tasks as $task)
                            <div class="card">
                                <div class="card-header" role="tab" id="heading{{ $task->id }}">
                                    <div class="mb-0">
                                        <div class="task-description">
                                            <div class="task-list-top">
                                                <div class="task-name">
                                                    {{ $task->taskname }}
                                                </div>
                                                <div class="task-description">
                                                    {{ $task->taskdescription }}
                                                </div>
                                            </div>
                                        </div>
                                        <a class="dropIcon" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $task->id }}" aria-expanded="false"
                                            aria-controls="collapse{{ $task->id }}" class="collapsed">
                                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                                </a>
                                    </div>
                                </div>

                                <div id="collapse{{ $task->id }}" class="collapse" role="tabpanel" aria-labelledby="heading{{ $task->id }}" aria-expanded="false"
                                    style="">
                                    <div class="card-block">

                                        <div class="task-list-body">
                                            <div class="task-list-expections">
                                                <div class="skills-head">
                                                    Skills Expectations
                                                </div>
                                                <div class="skills">
                                                    <ul class="skill-listing">
                                                        <li class="skill-list">
                                                            The client will specify what he or she expects
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="user-aggreement">
                                                    By submiting you agree to meet these expectations
                                                </div>
                                            </div>

                                            <form action="{{ url('/tasker/'.Auth::user()->name.'/profile/addcategory/'.$task->id) }}" method="post">
                                                @csrf @method('put')
                                                <div class="set-hourly-rates">
                                                    <div class="set-hourly-rates-heading">
                                                        Set your Hourly rates
                                                    </div>


                                                    <input type="hidden" value="{{ $task->id }}" name="task_category_id">

                                                    <div class="set-hourly-rates-container">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <div class="dollar-sign">
                                                                    $
                                                                </div>
                                                                <div class="amount">
                                                                    <input type="text" class="form-control" name="rates">
                                                                </div>
                                                                <div class="per-hour">
                                                                    /hr
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                Choosing a favorable rate means you have higher chances of getting hired
                                                            </div>
                                                            <div class="col-sm-4"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <textarea style="height: 100px; resize:none;" class="form-control" name="pitch" id="pitch" placeholder="Your Pitch" required></textarea>
                                                    </div>

                                                </div>


                                                <div class="submit text-center">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
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
@endsection
