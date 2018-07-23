@extends('layouts.usermaster')
@section('styles')
<link href="{{ asset('css/rating.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="container">
    <div class="cw-container">
        <div class="row">

            <div class="col-sm-9 m-auto">
                <div class="card">
                    <div class="card-body">
                            <div class="rating-container">
                                    <div class="rating-content">

                                        <div class="rating-container_head">
                                            <div class="rating-heading">
                                                Taker Rating and Task Review {{ $tasktorate->id }}
                                            </div>
                                            <div class="rating-description">
                                                You are reviewing <span class="rating-description_task d-inline-block text-capitalize">
                                                    {{ $tasktorate->taskcategory->taskname }} - {{ $tasktorate->task_description }}
                                                </span> and rating <span class="rating-description_tasker d-inline-block text-capitalize">
                                                    {{ $tasktorate->assignee->firstname }} {{ $tasktorate->assignee->secondname }}
                                                </span>
                                            </div>
                                        </div>

                                            <form action=" {{ url('/client/'.$user->name.'/rate/'.$tasktorate->assignee->id.'/on/'.$tasktorate->id) }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="rating">Give a rating</label>
                                                    <select name="rating" id="rating" class="form-control" required>
                                                        <option value="0">Please select a Rating</option>
                                                        <option value="1">1 Star Rating</option>
                                                        <option value="2">2 Star Rating</option>
                                                        <option value="3">3 Star Rating</option>
                                                        <option value="4">4 Star Rating</option>
                                                        <option value="5">5 Star Rating</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="comment">Give a comment</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" name="comment" id="comment" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn btn-primary">Send Rating and Review</button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
