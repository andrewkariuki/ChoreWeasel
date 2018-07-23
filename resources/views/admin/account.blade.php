@extends('admin.master')

@section('content')

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
                            <div class="email-field">
                                <span class="span-heading">Email</span>
                                <span class="details">andrewkariuki@gmail.com</span>
                                <span class="edit-button"><i class="nc-icon nc-ruler-pencil"></i></span>
                            </div>
                            <div class="phone-field">
                                <span class="span-heading">Phone</span>
                                <span class="details">0701553184</span>
                                <span class="edit-button"><i class="nc-icon nc-ruler-pencil"></i></span>
                            </div>
                            <div class="id-field">
                                <span class="span-heading">National ID</span>
                                <span class="details">12345678</span>
                                <span class="edit-button"><i class="nc-icon nc-ruler-pencil"></i></span>
                            </div>
                            <div class="city-field">
                                <span class="span-heading">City or Town</span>
                                <span class="details">Mombasa</span>
                                <span class="edit-button"><i class="nc-icon nc-ruler-pencil"></i></span>
                            </div>
                            <div class="loacality">
                                <span class="span-heading">Locality</span>
                                <span class="details">Likoni</span>
                                <span class="edit-button"><i class="nc-icon nc-ruler-pencil"></i></span>
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
                            <div class="password-field">
                                <div class="details-container"></div>
                                <span class="details">Change Password</span>
                                <span class="edit-button"><i class="nc-icon nc-ruler-pencil"></i></span>
                                <div class="changes-container">
                                    <form action="">
                                        <!---user password input --->
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter New Password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <!---user password Confirmation input --->
                                        <div class="form-group">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm New Password" required>
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
                                <span class="details">Client or Tasker</span>
                                <span class="edit-button"><i class="nc-icon nc-ruler-pencil"></i></span>
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
                                    <button class="btn btn-primary">
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
@endsection
