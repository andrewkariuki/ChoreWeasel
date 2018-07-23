@extends('layouts.usermaster')
@section('styles')
@stop
@section('content')
<div class="cw-container">
    <div class="row">

        @foreach ($assignabletasks as $assignabletask)

        <div class="col-sm-4">
            <div class="card">
                <img class="card-img-top" src=".../100px180/" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $assignabletask->groupname }}</h5>

                    @foreach ($assignabletask->taskcategories as $taskcategory)
                    <p class="card-text">{{ $taskcategory->taskname }}</p>
                    @endforeach


                </div>
            </div>
        </div>

        @endforeach

    </div>
</div>
@endsection
