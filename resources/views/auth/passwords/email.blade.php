@extends('auth.authmaster')

@section('content')

<div class="forgot-password_wrapper">
        <div class="forgot-password_card">
            <div class="heading">
                <h4 class="text-center">Forgot Password</h4>

                <p class="message">
                    {{ _("Don't worry, we've got your back! Just enter your email address and we'll send you a link with which you can reset your password.") }}
                </p>
            </div>


            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>


            </form>

        </div>
    </div>

@endsection
