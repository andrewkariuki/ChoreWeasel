@extends('admin.master')
@section('styles')
@stop
@section('content')
<div class="row">
    <div class="col-sm-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Disputes Database</h4>
            </div>
            <div class="card-body">

                <div class="diputes">
                    <div class="disputer">
                        <h4 class="disputedtask-header">Disputer</h4>
                        <P>{{ $dispute->disputer->firstname }} {{ $dispute->disputer->secondname }}</P>
                    </div>
                    <div class="disputedtask">
                        <h4 class="disputedtask-header">Disputed Task</h4>
                        <P>{{ $dispute->subject }}</P>
                    </div>
                    <div class="subject">
                        <h4 class="subject-header">Subject</h4>
                        <P>{{ $dispute->subject }}</P>
                    </div>
                </div>

                <div class="complaint">
                    <h4 class="complaint-header">Complaint</h4>
                    <p>{{ $dispute->complaint }}</p>

                </div>

            </div>
            <div class="card-footer">
                <div class="pull-right">
                    @if ($dispute->solved == true)
                        Already Solved
                    @else
                    <form action="{{ url('/admin/dispute/'.$dispute->id) }}" method="post">
                        @csrf
                        @method('put')
                        <button class="btn btn-primary" type="submit">Mark As Solved</button>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
