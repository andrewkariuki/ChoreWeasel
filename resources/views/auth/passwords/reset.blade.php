@extends('auth.authmaster')

@section('content')

<div class="forgot-password_wrapper">
    <div class="forgot-password_card">
        <div class="heading">
            <h4 class="text-center">
                {{ _('Reset Password') }}
            </h4>

            <p class="message">
                {{ _('Reset your password and got straigt ahead and login.') }}
            </p>
        </div>

        <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

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
                <label for="password">
                    {{ _('New Password') }}
                </label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password-confirm">
                    {{ _('Confirm New Password') }}
                </label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    {{ __('Reset Password') }}
                </button>
            </div>

        </form>


    </div>
</div>


@endsection
