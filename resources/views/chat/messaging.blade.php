@extends('layouts.usermaster')
@section('styles')
@stop
@section('content')
<div class="cw-container">
    <div id="app">

        <div class="row">
            <div class="col-sm-10 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div id="chat-box" style="height: 500px">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="chat-users_container">
                                        <chat-users></chat-users>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="chat-container">
                                        <chat-log :messages="messages"></chat-log>
                                        <chat-composer v-on:messagesent="addMessage"></chat-composer>
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
