@extends('layouts.app')
@section('title', 'Channel Data')

@section('content')
    <section>
        <div class="container">
            <p class="mt-5">Subscripers</p><br>
            hint :
            <ul class="mt-5 text-danger">
                 <li>  channel username  OR ID from view port needed Needed </li>
            </ul>
            <div id="content">
                <div class="row">
                    <div class="col s6">
                        <form id="channel-form">
                            <div class="input-field col s6">
                                <input type="text" placeholder="Enter Channel Name  " id="channel-input">
                                <input type="submit" value="Get Channel Data" class="btn grey" id="channel-input-btn">
                            </div>
                        </form>
                    </div>
                    <div class="col s6">
                        <form id="channel-form">
                            <div class="input-field col s6">
                                <input type="text" placeholder="Enter Channel ID " id="channel-input2">
                                <input type="submit" value="Get Channel subscribers count " class="btn grey" id="channel-input-btn2">
                            </div>
                        </form>
                    </div>
                    <div class="col s6">
                        <form id="channel-form">
                            <div class="input-field col s6">
                                <input type="text" placeholder="Enter Channel ID " id="channel-input3">
                                <input type="submit" value="Get Channel Playlists" class="btn grey" id="channel-input-btn3">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        // let forUsername=GoogleDevelopers
        $("#channel-input-btn").on('click', function (e) {
            e.preventDefault()
            let forUsername=''
            forUsername = $("#channel-input").val()
            if (forUsername !== ''){
                let url = 'https://youtube.googleapis.com/youtube/v3/channels?part=statistics&'+'forUsername='+`${forUsername}`+'&key=AIzaSyDIcHu3dw8JyF2tAv68h_rGyMdcEk5FOGU'
                $.getJSON(url)
                    .done(function(data){
                        alert(data.items[0].statistics.subscriberCount);
                    })
            }


        })
   $("#channel-input-btn2").on('click', function (e) {
            e.preventDefault()
            let id=''
            id = $("#channel-input2").val()
            if (id !== ''){
                let url = 'https://youtube.googleapis.com/youtube/v3/channels?part=statistics&'+'id='+`${id}`+'&key=AIzaSyDIcHu3dw8JyF2tAv68h_rGyMdcEk5FOGU'
                $.getJSON(url)
                    .done(function(data){
                        alert("Subscribers" + data.items[0].statistics.subscriberCount);
                    })
            }


        })

        $("#channel-input-btn3").on('click', function (e) {

            e.preventDefault()
            let id=''
            id = $("#channel-input3").val()
            if (id !== ''){
                let url = 'https://youtube.googleapis.com/youtube/v3/playlists?part=snippet%2CcontentDetails&'+'channelId='+`${id}`+'&maxResults=25&key=AIzaSyDIcHu3dw8JyF2tAv68h_rGyMdcEk5FOGU'
                $.getJSON(url)
                    .done(function(response){
                        console.log( response.items )
                        const playListItems = response.items;
                        if (playListItems) {
                            let output = '<br><h4 class="center-align">Latest Playlists </h4><br>';

                            // Loop through videos and append output
                            playListItems.forEach(item => {
                                // const playListsId = item.snippet.resourceId.videoId;

                                output += `
                                          <div class="col s3">
                                            <h6></h6>
                                            <p>item count : ${item.contentDetails.itemCount}</p>
                                            <img src="${item.snippet.thumbnails.default.url}" width="${item.snippet.thumbnails.default.width}  height="${item.snippet.thumbnails.default.height}">
                                           </div>
                                        `;
                            });

                            // Output videos
                            $('#video-container').html(output);
                        } else {
                            videoContainer.innerHTML = 'No Uploaded Videos';
                        }
                    })
            }
        })


    </script>
@stop

