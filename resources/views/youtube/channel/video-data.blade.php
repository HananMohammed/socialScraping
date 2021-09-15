@extends('layouts.app')
@section('title', 'Video Data')

@section('content')

    <section>
        <div class="container">
            <p class="mt-5">Get Video Data </p><br>
            <div id="content">
                <div class="row">
                    <div class="col s12">
                        <form id="video-detail-form" method="post" action="{{route('youtube.getYoutubeVideoID')}}">
                            @csrf
                            <div class="input-field col s6">
                                <input type="url" placeholder="Enter Video URL" name="url" id="video-url">
                                <input type="submit" value="Get Video Data" class="btn grey" id="video-url-btn">
                            </div>
                        </form>
                        @if(!empty($data))
                         <table>
                            <tr>
                                <td>
                                    <img src="{{$data->items['0']->snippet->thumbnails->default->url}}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>Title</td>
                                <td><?php echo $data->items['0']->snippet->title;?></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><?php echo $data->items['0']->snippet->description;?></td>
                            </tr>
                            <tr>
                                <td>published Time</td>
                                <td><?php echo $data->items['0']->snippet->publishedAt;?></td>
                            </tr>
                            <tr>
                                <td>Duration</td>
                                <td><?php echo $data->items['0']->contentDetails->duration;?></td>
                            </tr>
                            <tr>
                                <td>View</td>
                                <td><?php echo $data->items['0']->statistics->viewCount;?></td>
                            </tr>
                            <tr>
                                <td>Like</td>
                                <td><?php echo $data->items['0']->statistics->likeCount;?></td>
                            </tr>
                            <tr>
                                <td>Dislike</td>
                                <td><?php echo $data->items['0']->statistics->dislikeCount;?></td>
                            </tr>
                            <tr>
                                <td>Comment</td>
                                <td><?php echo $data->items['0']->statistics->commentCount;?></td>
                            </tr>
                        </table>
                        @endif
                    </div>
                </div>
                <div class="row" id="video-container"></div>
            </div>
        </div>
    </section>
@stop

@section('scripts')
@stop

