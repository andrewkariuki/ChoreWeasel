@extends('layouts.usermaster')


@section('styles')
<link href="{{ asset('css/createprofile.css') }}" rel="stylesheet">
@stop

@section('content')

<div class="cw-container">
    <div class="cw-container-createprofile">

    </div>


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
                <div class="task_category-container">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="task-listing">
                                    <li class="task-list">
                                        <div class="task-list-top">
                                            <div class="task-name">
                                                {{ $tasks->taskname }}
                                            </div>
                                            <div class="task-description">
                                                {{ $tasks->taskdescription }}
                                            </div>
                                        </div>

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


                                            <div class="set-hourly-rates">
                                                <div class="set-hourly-rates-heading">
                                                    Set your Hourly rates
                                                </div>
                                                <form action="{{ url('/tasker/'.Auth::user()->name.'/profile/addcategory') }}" method="post">
                                                    @csrf
                                                    @method('put')

                                                    <input type="hidden" value="{{ $tasks->id }}" name="task_category_id">
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
                                                        <textarea class="form-control" name="pitch" id="pitch" placeholder="Your Pitch"></textarea>
                                                    </div>

                                                </div>


                                                <div class="submit text-center">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>

@endsection
