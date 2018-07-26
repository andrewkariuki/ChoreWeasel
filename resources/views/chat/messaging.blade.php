@extends('layouts.usermaster')
@section('styles')
@stop
@section('content')
<div class="cw-container">
    <div id="app">
        <h3>Messaging</h3>
        <chat-log :messages="messages"></chat-log>
        <chat-composer v-on:messagesent="addMessage"></chat-composer>

    </div>
</div>
@endsection
