@extends('layouts.usermaster')
@section('content')
<div class="cw-container">
    <form action="{{ url('/tasker/upload') }}" method="post">
        @csrf @method('put')
        <input class="form-control" type="file" name="file" id="file">

        <button class="btn btn-primary">SAVE AVATAR</button>
    </form>
</div>
@endsection
