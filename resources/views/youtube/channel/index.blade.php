@extends('layouts.app')
@section('title', 'Channel Data')
@section('style')

    <style>
        #content,
        #authorize-button,
        #signout-button {
            display: none
        }
    </style>
@endsection
@section('content')
    <section>
        <div class="container">
            <p class="mt-5">Log In With Google</p><br>
            hint :
            <ul class="mt-5 text-danger">
            <li>to access Channel Detail user need to login first to be authenticated for API  </li>
            <li> then can access channel data by typing channel username  </li>
            <li> OR channel id from Viewsource search for externalId  </li>
            </ul>
            <button class="btn red" id="authorize-button">Log In</button>
            <button class="btn red" id="signout-button">Log Out</button>
            <br>
            <div id="content">
                <div class="row">
                    <div class="col s6">
                        <form id="channel-form">
                            <div class="input-field col s6">
                                <input type="text" placeholder="Enter Channel Name" id="channel-input">
                                <input type="submit" value="Get Channel Data" class="btn grey">
                            </div>
                        </form>
                    </div>
                    <div id="channel-data" class="col s6"></div>
                </div>
                <div class="row" id="video-container"></div>
            </div>
        </div>
    </section>
@stop

@section('scripts')
    <script src="{{asset('assets/main.js')}}"></script>

    <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
@stop
