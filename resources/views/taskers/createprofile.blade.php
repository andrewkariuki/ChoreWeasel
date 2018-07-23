@extends('layouts.usermaster')
@section('styles')
<link href="{{ asset('css/createprofile.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="cw-container">
    <div class="cw-container-createprofile">

    </div>
    <div class="row">

        <div class="col-sm-4">
            <div class="create-profile-side-container">
                <div class="create-profile-side-content">
                    <div class="user-hints">
                        <div class="user-hints-header">
                            Flow of Events
                        </div>
                        <div class="user-hits_body">
                            <ul>
                                <li>Create Profile</li>
                                <li>Background Check</li>
                                <li>Activation</li>
                                <li>Start Working</li>
                                <li>Constant Reviewing</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ url('/tasker/'.Auth::user()->name.'/createprofile') }}" method="POST">
            @csrf @method('put')

            <div class="col-sm-8">
                <div class="create-profile-container">
                    <div class="create-profile-content">

                        <div class="personal_details">

                            <div class="personal_deatails-header">
                                Personal Details
                            </div>

                            <div class="identity-container">
                                <div class="identity-header">
                                    Identity
                                </div>

                                <div class="identity_body">
                                    <div class="form-row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="nationalid">National ID Number</label>
                                                <input id="nationalid" type="text" class="form-control{{ $errors->has('nationalid') ? ' is-invalid' : '' }}" name="nationalid"
                                                    value="{{ old('nationalid') }}" required autofocus>                                                @if ($errors->has('nationalid'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('nationalid') }}</strong>
                                                        </span> @endif

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="dateofbirth">Date of Birth</label>
                                                <input id="dateofbirth" type="text" class="form-control{{ $errors->has('dateofbirth') ? ' is-invalid' : '' }}" name="dateofbirth"
                                                    value="{{ old('dateofbirth') }}" required autofocus>                                                @if ($errors->has('dateofbirth'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('dateofbirth') }}</strong>
                                                        </span> @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bottom-notice">
                                    For prooving you are who you say your are.
                                </div>
                            </div>

                            <div class="mobile-no-container">
                                <div class="mobile-no_header">
                                    Your Phone Number
                                </div>
                                <div class="mobile-no_body">
                                    <div class="form-row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="phonenumber">Phone Number</label>
                                                <input id="phonenumber" type="text" class="form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }}" name="phonenumber"
                                                    value="{{ old('phonenumber') }}" required autofocus>                                                @if ($errors->has('phonenumber'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('phonenumber') }}</strong>
                                                        </span> @endif

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="phonenumber_confirmation">Confirm Phone Number</label>
                                                <input id="phonenumber_confirmation" type="text" class="form-control" name="phonenumber_confirmation" value="{{ old('phonenumber_confirmation') }}"
                                                    required autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bottom-notice">
                                    This will be used to contact you when need be.
                                </div>
                            </div>

                            <div class="mailing-adress">
                                <div class="mailing-adress_header">
                                    Your Address
                                </div>

                                <div class="mailing-adress_body">
                                    <div class="form-row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="city">City or Town</label>
                                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}"
                                                    required autofocus> @if ($errors->has('city'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('city') }}</strong>
                                                        </span> @endif

                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="postalcode">Locality</label>
                                                <input id="locality" type="text" class="form-control{{ $errors->has('locality') ? ' is-invalid' : '' }}" name="locality"
                                                    value="{{ old('locality') }}" required autofocus>                                                @if ($errors->has('locality'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('locality') }}</strong>
                                                        </span> @endif

                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="county">County</label>
                                                <input id="county" type="text" class="form-control{{ $errors->has('county') ? ' is-invalid' : '' }}" name="county" value="{{ old('county') }}"
                                                    required autofocus> @if ($errors->has('county'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('county') }}</strong>
                                                        </span> @endif

                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="postaladdress">Postal Address</label>
                                                <input id="postaladdress" type="text" class="form-control{{ $errors->has('postaladdress') ? ' is-invalid' : '' }}" name="postaladdress"
                                                    value="{{ old('postaladdress') }}" required autofocus>                                                @if ($errors->has('postaladdress'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('postaladdress') }}</strong>
                                                        </span> @endif

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="postalcode">Postal Code</label>
                                                <input id="postalcode" type="text" class="form-control{{ $errors->has('postalcode') ? ' is-invalid' : '' }}" name="postalcode"
                                                    value="{{ old('postalcode') }}" required autofocus>                                                @if ($errors->has('postalcode'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('postalcode') }}</strong>
                                                        </span> @endif

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="bottom-notice">
                                    Used to easen the matching and task assigments process
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">{{ _('Save And Continue') }}</button>
                            </div>
                            <a href="{{ url('/tasker/'.Auth::user()->name.'/profile/addcategory') }}">Task Category</a>
                        </div>



                    </div>
                </div>


            </div>

        </form>
    </div>
</div>
@endsection
