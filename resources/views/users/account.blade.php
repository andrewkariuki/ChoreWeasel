@extends('layouts.usermaster')
@section('content')
<div class="cw-container">

    <div class="row">
        <div class="col-sm-12">
            <div class="account-details">
                <div class="basic-info">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="basic-info_head">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>BASIC INFO</p>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="user-identity">

                                <div class="user-dentity-heading">
                                    <h3>
                                        Your Basic info.
                                        <span class="edit-basic-info pull-right">
                                            <a href="#">Edit</a>
                                        </span>
                                    </h3>
                                </div>
                                <div class="email-field">
                                    <span class="span-heading">Email</span>
                                    <span class="details">
                                        {{ $user->email}}
                                    </span>

                                </div>

                                <div class="username-field">
                                    <span class="span-heading">Username</span>
                                    <span class="details">
                                        {{ $user->name}}
                                    </span>

                                </div>

                                <div class="name-fields">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="firstname-field">
                                                <span class="span-heading">First Name</span>
                                                <span class="details">
                                                    {{ $user->firstname}}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="secondname-field">
                                                <span class="span-heading">Second Name</span>
                                                <span class="details">
                                                    {{ $user->secondname}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="id-field">
                                    <span class="span-heading">National ID</span>
                                    <span class="details">{{ $user->profile->nationalid }}</span>
                                </div>
                            </div>


                            <div class="user-billing-address">

                                <div class="user-billing-address-heading">
                                    <h3>
                                        Your Address
                                        <span class="edit-billing-address pull-right">
                                            <a href="#">Edit</a>
                                        </span>
                                    </h3>
                                </div>

                                <div class="area-of-residence">
                                    <div class="col-sm-6">
                                        <div class="city-field">
                                            <span class="span-heading">City or Town</span> @if ($user->profile->city)
                                            <span class="details">
                                                {{ $user->profile->city }}
                                            </span> @else
                                            <span class="details">
                                                No city specified
                                            </span> @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="locality-field">
                                            <span class="span-heading">Locality</span> @if ($user->profile->locality)
                                            <span class="details">
                                                {{ $user->profile->locality }}
                                            </span> @else
                                            <span class="details">
                                                No city specified
                                            </span> @endif
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="password-change">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="password-change_head">
                                <i class="nc-icon nc-key-25"></i>
                                <p>Password</p>
                            </div>

                        </div>
                        <div class="col-sm-6">

                            <div class="change-password">
                                <div class="change-password-header">
                                    <h3>Change Password
                                        <span class="change-password pull-right">
                                                <a href="#">Edit</a>
                                            </span>
                                    </h3>
                                </div>

                                <div class="changes-container" style="display: none">
                                    <div>
                                        <form action="">

                                            <!---user password input --->
                                            <div class="form-group">
                                                <input id="currentpassword" type="password" class="form-control{{ $errors->has('currentpassword') ? ' is-invalid' : '' }}"
                                                    name="currentpassword" placeholder="Enter Current Password" required>                                                @if ($errors->has('currentpassword'))
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('currentpassword') }}</strong>
                                                    </span> @endif
                                            </div>

                                            <!---user password input --->
                                            <div class="form-group">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                                    placeholder="Enter New Password" required>                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span> @endif
                                            </div>

                                            <!---user password Confirmation input --->
                                            <div class="form-group">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm New Password"
                                                    required>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Change password') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


                <div class="system-type">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="system-type_head">
                                <i class="nc-icon nc-settings-gear-64"></i>
                                <p>System Usage</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="system-type-field">
                                <span class="details">
                                    @role('admin')
                                    Administrater
                                    @endrole
                                    @role('client')
                                    Client
                                    @endrole
                                    @role('tasker')
                                    Tasker
                                    @endrole
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="delete-account">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="delete-account_head">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>Delete Account</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="email-field">
                                <form action="">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteAccount">
                                        DELETE
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    @include('modals.deleteaccount')

</div>
@endsection
