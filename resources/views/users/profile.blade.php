@extends('layouts.usermaster')

@section('styles')
<link href="{{ asset('css/reviews.css') }}" rel="stylesheet">
@stop
@section('content')

<div class="cw-container">
    <div class="row">
        <div class="col-sm-12">
            <div class="profile-details">

                <div class="main-attributes">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="avatar-details">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="avatar-container">

                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="user-details">
                                            <h3 class="user-fullname">User Full Name <small>Kahawa Wendani</small></h3>
                                            <h4 class="badge badge-success task-category">Task Category</h4>
                                            <span>Country</span>

                                            <hr style="margin: 8px auto;"/>
                                            <span>Since: Date Created</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="rate-reviews">
                                <div class="rate">
                                    <span class="rates">$10.00</span>
                                    <span class="rate-desc">hourly rates</span>
                                </div>
                                <div class="total-reviews">
                                    <span class="review-stars">5 stars</span>
                                    <span class="review-desc">Total Rating</span>
                                </div>

                            </div>
                            <div class="edit">
                                <span class="edit-icon">
                                    <i class="nc-icon nc-ruler-pencil"></i>
                                </span>
                                <span class="edit-desc">Edit</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="secondary-attributes">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="user-pitch">
                                <span class="user-pitch_header">How I can help</span>
                                <p class="user-pitch_pitch">Wake up by a rooster call because we dont have alarms there.
                                        Collect firewood to cook breakfast as there is no concept of hobs or gas there.
                                        Go to work on a donkey or camel as we have no cars there.
                                        Herd the sheep (as Pakistan isnt commercial and is a dead place).
                                        Chill in a cave and have a bonfire with the cavemen.
                                        Eat kebabs (cooked in a hole underground).
                                        Feed your camel/donkey kebabs.
                                        Go home into your cave house.
                                        Gaze in the stars because gazing into the TV is out of question (cant do stuff with no electricity boi).
                                        For entertainment we meet in a big cave and fire Kalashnikov AK-47s! </p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="user-stats">
                                <span class="user-stats_header">
                                    Stats
                                </span>
                                <div class="user-stats_container text-center text-uppercase">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span class="user-stats_numbers">0</span>
                                            <span class="user-stats_desc">jobs completed</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="user-stats_numbers">0</span>
                                            <span class="user-stats_desc">hours worked</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="user-stats_numbers">0</span>
                                            <span class="user-stats_desc">active jobs</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="top-ratings">
                                <span class="top-ratings_header">Ratings</span>
                                <div class="top-ratings_contianer">

                                        <div class="review-block">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="review-block-reviewer">
                                                              <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                                                              <!-- <div class="review-block-reviewer-name">
                                                                  Andrew Kariuki
                                                              </div>   -->
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                      <div class="review-block-body">
                                                              <div class="review-block-rate">
                                                                  <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                  </button>
                                                                  <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                  </button>
                                                                  <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                  </button>
                                                                  <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                  </button>
                                                                  <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                  </button>
                                                              </div>

                                                              <div class="review-block-review">
                                                                      this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy
                                                              </div>
                                                              <div class="review-block-reviewer-name">
                                                                  Andrew Kariuki  - <span class="review-time">8 hours ago</span>
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
            </div>

        </div>
    </div>
</div>

@endsection
