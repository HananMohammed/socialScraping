@extends('layouts.app')
@section('title', 'Auth Data')
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
        <nav class="black">
            <div class="nav-wrapper">
                <div class="container">
                    <a href="#!" class="brand-logo">YouTube Channel Data</a>
                </div>
            </div>
        </nav>
        <br>
        <section>
            <div class="container">
                <p>Log In With Google</p>
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
    </section>
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
<script>
    // Options
    const CLIENT_ID = '392749820378-6m01bimtevl0jn312kdq44j9jft2jg9i.apps.googleusercontent.com';
    const DISCOVERY_DOCS = [
        'https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest'
    ];
    const SCOPES = 'https://www.googleapis.com/auth/youtube.readonly';
    const authorizeButton = document.getElementById('authorize-button');
    const signoutButton = document.getElementById('signout-button');
    const content = document.getElementById('content');
    const channelForm = document.getElementById('channel-form');
    const channelInput = document.getElementById('channel-input');
    const videoContainer = document.getElementById('video-container');
    const defaultChannel = 'techguyweb';
    // Form submit and change channel
    channelForm.addEventListener('submit', e => {
        e.preventDefault();
        const channel = channelInput.value;
        getChannel(channel);
    });
    // Load auth2 library
    function handleClientLoad() {
        gapi.load('client:auth2', initClient);
    }
    // Init API client library and set up sign in listeners
    function initClient() {
        gapi.client
            .init({
                discoveryDocs: DISCOVERY_DOCS,
                clientId: CLIENT_ID,
                scope: SCOPES
            })
            .then(() => {
                // Listen for sign in state changes
                gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);
                // Handle initial sign in state
                updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
                authorizeButton.onclick = handleAuthClick;
                signoutButton.onclick = handleSignoutClick;
            });
    }

    // Update UI sign in state changes
    function updateSigninStatus(isSignedIn) {
        if (isSignedIn) {
            authorizeButton.style.display = 'none';
            signoutButton.style.display = 'block';
            content.style.display = 'block';
            videoContainer.style.display = 'block';
            getChannel(defaultChannel);
        } else {
            authorizeButton.style.display = 'block';
            signoutButton.style.display = 'none';
            content.style.display = 'none';
            videoContainer.style.display = 'none';
        }
    }

    // Handle login
    function handleAuthClick() {
        gapi.auth2.getAuthInstance().signIn();
    }

    // Handle logout
    function handleSignoutClick() {
        gapi.auth2.getAuthInstance().signOut();
    }

    // Display channel data
    function showChannelData(data) {
        const channelData = document.getElementById('channel-data');
        channelData.innerHTML = data;
    }

    // Get channel from API
    function getChannel(channel) {
        gapi.client.youtube.channels
            .list({
                part: 'snippet,contentDetails,statistics',
                forUsername: channel
            })
            .then(response => {
                console.log(response);
                const channel = response.result.items[0];

                const output = `
        <ul class="collection">
          <li class="collection-item">Title: ${channel.snippet.title}</li>
          <li class="collection-item">ID: ${channel.id}</li>
          <li class="collection-item">Subscribers: ${numberWithCommas(
                    channel.statistics.subscriberCount
                )}</li>
          <li class="collection-item">Views: ${numberWithCommas(
                    channel.statistics.viewCount
                )}</li>
          <li class="collection-item">Videos: ${numberWithCommas(
                    channel.statistics.videoCount
                )}</li>
        </ul>
        <p>${channel.snippet.description}</p>
        <hr>
        <a class="btn grey darken-2" target="_blank" href="https://youtube.com/${
                    channel.snippet.customUrl
                }">Visit Channel</a>
      `;
                showChannelData(output);

                const playlistId = channel.contentDetails.relatedPlaylists.uploads;
                requestVideoPlaylist(playlistId);
            })
            .catch(err => alert('No Channel By That Name'));
    }

    // Add commas to number
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    function requestVideoPlaylist(playlistId) {
        const requestOptions = {
            playlistId: playlistId,
            part: 'snippet',
            maxResults: 10
        };

        const request = gapi.client.youtube.playlistItems.list(requestOptions);

        request.execute(response => {
            console.log(response);
            const playListItems = response.result.items;
            if (playListItems) {
                let output = '<br><h4 class="center-align">Latest Videos</h4>';

                // Loop through videos and append output
                playListItems.forEach(item => {
                    const videoId = item.snippet.resourceId.videoId;

                    output += `
          <div class="col s3">
          <iframe width="100%" height="auto" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          </div>
        `;
                });

                // Output videos
                videoContainer.innerHTML = output;
            } else {
                videoContainer.innerHTML = 'No Uploaded Videos';
            }
        });
    }
</script>
@stop
