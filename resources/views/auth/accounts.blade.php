@extends('auth.authmaster')

@section('content')
    <div class="accounts_wrapper">

        <div class="top-header text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Sign up to ChoreWeasel</h3>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-6">
                <div class="for-taskers">
                    <h3>I want to work and provide services</h3>
                    <p>Respond to client request, provide servicess, get paid.</p>
                    <a class="btn btn-primary btn-block" href="{{ url('account/tasker') }}">Sign Up as a tasker</a>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="for-clients">
                    <h3>I want to hire skilled taskers</h3>
                    <p>Get matched with the right tasker for any of your chore</p>
                    <a class="btn btn-primary btn-block" href="{{ url('account/client') }}">
                       Sign up as a client
                    </a>
                </div>

            </div>

        </div>
    </div>

    <div class="have-account text-center">
        <h3>Already have an account</h3>
        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
    </div>
@endsection
