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

        {{-- --}}


        <div class="col-sm-8">
            <div class="create-profile-container">
                <div class="create-profile-content">

                    <div class="personal_details">

                        <div class="personal_deatails-header">
                            Upload Your Profile Image
                        </div>

                        <div class="identity_body">
                            <div class="row">
                                <div class="col-sm-7 m-auto pt-5 pb-5">
                                    {{-- @if(Session::has(profileuploaderror))
                                    <div class="profile-upload-error">
                                        <div>{{ $profile-upload-error }}</div>
                                    </div>
                                    @endif --}}
                                    <div class="image-preview"></div>
                                    <form action="{{ url('/client/'.Auth::user()->name.'/profile/uploadprofileimage') }}" method="POST" enctype="multipart/form-data">
                                        @csrf @method('put')

                                        <div class="form-group">
                                            <input type="file" name="avatar" id="avatar" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}"
                                                required autofocus> @if ($errors->has('avatar'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('avatar') }}</strong>
                                            </span> @endif
                                        </div>


                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Upload Your Profile Image</button>
                                        </div>
                                    </form>

                                    <div class="bottom-notice">
                                        Please Make sure that this is your real image. It will be used to verify your account during the background check.
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
