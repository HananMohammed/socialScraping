@extends('layouts.app')
@section('title', 'Video Data')

@section('content')

    <section>
        <div class="container">
            <p class="mt-5">Get Channel Data using alaouy Package </p><br>
            <div id="content">
                <div class="row">
                    <div class="col s12">
                        <form id="video-detail-form" method="post" action="{{route('youtube.alaouySubmit')}}">
                            @csrf
                            <div class="input-field col s6">
                                <input type="text" placeholder="Enter Channel Id" name="channel_id" id="video-url">
                                <input type="submit" value="Get Video Data" class="btn grey" id="video-url-btn">
                            </div>
                        </form>
                        @if(!empty($data))

                          <table>
                            <tr>
                                <td>
                                    <img src="{{$data['snippet']->thumbnails->default->url}}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>Title</td>
                                <td>{{$data['snippet']->title}}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{{$data['snippet']->description}}</td>
                            </tr>
                            <tr>
                                <td>published Time</td>
                                <td>{{$data['snippet']->publishedAt}}</td>
                            </tr>
                            <tr>
                                <td>viewCount</td>
                                <td> {{(isset($data['statistics']->viewCount)) ? $data['statistics']->viewCount : ''}}</td>
                            </tr>
                            <tr>
                                <td>subscriberCount</td>
                                <td>{{(isset($data['statistics']->subscriberCount)) ? $data['statistics']->subscriberCount : ''}} </td>
                            </tr>
                            <tr>
                                <td>videoCount</td>
                                <td>{{(isset($data['statistics']->videoCount) )?$data['statistics']->videoCount : ''}}</td>
                            </tr>
{{--                            <tr>--}}
{{--                                <td>Dislike</td>--}}
{{--                                <td><?php echo $data->items['0']->statistics->dislikeCount;?></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Comment</td>--}}
{{--                                <td><?php echo $data->items['0']->statistics->commentCount;?></td>--}}
{{--                            </tr>--}}
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

