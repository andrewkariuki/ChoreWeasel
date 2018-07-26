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
                                            <a href="#" id="editbasicinfo">Edit</a>
                                            <a href="#" id="canceleditbasicinfo" style="display:none">Cancel</a>
                                        </span>
                                    </h3>
                                </div>

                                <div id="basic-info">
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
                                </div>


                                <div id="change-basic-info" style="display:none">
                                    <form action="" method="post">
                                        @csrf @method('put')
                                        <div class="email-field">
                                            <span class="span-heading">Email</span>
                                            <span class="details">
                                                    <input type="text" class="form-control" name="email" value=" {{ $user->email}}">
                                                </span>
                                        </div>

                                        <div class="username-field">
                                            <span class="span-heading">Username</span>
                                            <span class="details">
                                                        <input type="text" class="form-control" name="username" value="{{ $user->name}}"/>
                                                    </span>

                                        </div>

                                        <div class="name-fields">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="firstname-field">
                                                        <span class="span-heading">First Name</span>
                                                        <span class="details">
                                                                <input type="text" class="form-control" name="firstname" value="{{ $user->firstname}}"/>
                                                            </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="secondname-field">
                                                        <span class="span-heading">Second Name</span>
                                                        <span class="details">
                                                                    <input type="text" class="form-control" name="firstname" value="{{ $user->secondname}}"/>

                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-top: 10px;">
                                            <button type="submit" class="btn btn-primary btn-block">Change Primary Details</button>
                                        </div>
                                    </form>
                                </div>

                                @if($user->profile != null)

                                <div class="id-field">
                                    <span class="span-heading">National ID</span>
                                    <span class="details">{{ $user->profile->nationalid }}</span>
                                </div>
                                @endif
                            </div>

                            @if($user->profile != null)
                            <div class="user-billing-address">

                                <div class="user-billing-address-heading">
                                    <h3>
                                        Your Address
                                        <span class="edit-billing-address pull-right">
                                            <a href="#" id="editaddress">Edit</a>
                                            <a href="#" id="canceleditaddress" style="display: none">Cancel</a>
                                        </span>
                                    </h3>
                                </div>

                                <div id="address">
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


                                <div id="edit-address" style="display:none">
                                    <div class="area-of-residence">
                                        <div class="col-sm-6">
                                            <div class="city-field">
                                                <span class="span-heading">City or Town</span>
                                                <span class="details">
                                                    <input type="text" name="city" value="@if($user->profile->city){{ $user->profile->city}}@endif" class="form-control">

                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="locality-field">
                                                <span class="span-heading">Locality</span>
                                                <span class="details">
                                                    <input type="text" value="@if($user->profile->locality){{ $user->profile->locality}}@endif" class="form-control"></span>
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-top: 10px;">
                                            <button type="submit" class="btn btn-primary">Change Address Details</button>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            @endif

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
                                                <a id="edit" href="#">Edit</a>
                                                <a id="cancel" href="#" style="display: none">Cancel</a>
                                        </span>
                                    </h3>
                                </div>

                                <div class="changes-container" style="display: none" id="change-password">
                                    <div>
                                        <form action="{{ url('/'.$user->name.'/changepassword/'.$user->id) }}" method="post">
                                            @csrf @method('put')
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
@section('scripts')

    <script type="text/javascript">
        $( "#edit" ).click(function() {
        $('#change-password').show();
        $('#cancel').show();
        $('#edit').hide();
    });
    $( "#cancel" ).click(function() {
        $('#change-password').hide();
        $('#cancel').hide();
        $('#edit').show();
    });


    $( "#editbasicinfo" ).click(function() {
        $('#change-basic-info').show();
        $('#canceleditbasicinfo').show();
        $('#editbasicinfo').hide();
        $('#basic-info').hide();
    });

    $( "#canceleditbasicinfo" ).click(function() {
        $('#basic-info').show();
        $('#change-basic-info').hide();
        $('#canceleditbasicinfo').hide();
        $('#editbasicinfo').show();
    });
    </script>




@stop

</div>
@endsection
