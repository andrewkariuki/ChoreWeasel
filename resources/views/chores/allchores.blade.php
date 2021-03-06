@extends('layouts.usermaster')
@section('styles')
<link href="{{ asset('dashboard/css/light-bootstrap-dashboard.css?v=2.0.1') }}" rel="stylesheet">
<link href="{{ asset('dashboard/css/demo.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="cw-container">
    <div class="row">
        <div class="col-sm-12 m-auto">
            <div class="all-tasks-container">
                <div class="row">
                    @if($taskcategorygroups != null) @foreach($taskcategorygroups as $taskcategorygroup)
                    <div class="col-sm-4">
                        <div class="card">
                            <img class="card-img-top" style="height: 200px; vertical-align: middle;" src="{{ $taskcategorygroup->goupimage }}" alt="{{ $taskcategorygroup->groupname }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $taskcategorygroup->groupname }}</h4>
                                @if($taskcategorygroup->taskcategories != null) @foreach ($taskcategorygroup->taskcategories as $taskcategory)
                                <p class="card-text">
                                    <a href="{{ url('/client/assign/'.$taskcategory->id) }}" class="cw-btn cw-btn-priamry" style="
                                        color: #ef5b25;
                                        font-size: 14px;
                                        font-weight: 300;
                                  ">{{ $taskcategory->taskname }}</a>
                                </p>
                                @endforeach @endif
                            </div>
                        </div>
                    </div>
                    @endforeach @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
