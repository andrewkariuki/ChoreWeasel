@extends('admin.master')

@section('styles')
<link href="{{ asset('css/accounts.css') }}" rel="stylesheet">
@stop

@section('content')

    <div class="add_admins">
        <div class="row">
            <div class="col-sm-12 sign-up_wrapper">

                    <div class="heading" style="margin-bottom: 20px;">
                            <h4>Create Admin Account</h4>
                        </div>

                        <form method="POST" action="{{ url('admin/addadmins/add') }}" aria-label="{{ __('Register') }}">
                            @csrf

                            <div class="form-group">
                                <div class="form-row">

                                    <!---user first name input --->
                                    <div class="col">
                                        <label for="firstname">First Name</label>
                                        <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                        @if ($errors->has('firstname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <!---user second name input --->
                                    <div class="col">
                                        <label for="secondname">Second Name</label>
                                        <input id="secondname" type="text" class="form-control{{ $errors->has('secondname') ? ' is-invalid' : '' }}" name="secondname" value="{{ old('secondname') }}" required autofocus>

                                        @if ($errors->has('secondname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('secondname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!---user user unique username input --->
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <!---user email input --->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!---user national id input --->


                            <!-- user password row -->
                            <div class="form-row">

                                <div class="col">
                                    <!---user password input --->
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col">
                                    <!---user password Confirmation input --->
                                    <div class="form-group">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>

                            <div class="text-center">
                                By signing up you are agreeng to ChoreWeasel
                                <a href="#">Terms</a> and
                                <a href="#">Privacy Policy</a>
                             </div>


                        </form>


            </div>
        </div>
    </div>
@endsection
