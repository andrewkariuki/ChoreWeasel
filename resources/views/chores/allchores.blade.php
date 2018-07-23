@extends('layouts.usermaster')
@section('styles')
@stop
@section('content')
<div class="cw-container">
    <div class="row">
        <div class="col-sm-12">

            <ul>
                @foreach ($taskcategories as $taskcategory)
                <li><a href="{{ url('/client/assign/'.$taskcategory->id) }}">{{ $taskcategory->taskname }}</a></li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
@endsection
