@extends('auth.authmaster')
@section('content')


<div class="sign-in_wrapper">
    <div class="sign-in_card">
        <div class="heading">
            <h4 style="text-align: start;">{{ _('Sign in') }}</h4>

            <div class="signup-link-container">
                <div>
                    <a href="{{ url('/account/choose') }}">{{ _('Create Account') }}</a> {{ _('instead?') }}
                </div>
            </div>
        </div>


        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                    required autofocus> @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span> @endif
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                    required> @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span> @endif
            </div>


            <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" id="remember" type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ _('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <a href="{{ route('password.request') }}">{{ _('Forgot Password?') }}</a>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    {{ __('Login') }}
                </button>
            </div>

        </form>


    </div>

</div>
@endsection
