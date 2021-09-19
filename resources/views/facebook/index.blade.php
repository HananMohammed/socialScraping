@extends('layouts.app')
@section('title', 'search')
@section('content')
    <form action="{{ route('fb.store') }}" method="get" class="mb-5 mt-5">
        <div class="row">
            <div class="col-sm-8 form-group">
                <input type="text" class="form-control" name="tweet" placeholder="tweet detail........" >
            </div>
            <div class="col-sm-4">
                <input type="submit" value="Search" class="btn btn-success">
            </div>
        </div>
    </form>

    <div class="row">
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

{{--        @foreach($videoLists->items as $key => $item)--}}
{{--            <div class="col-4">--}}
{{--                <a href="{{ route('youtube.watch', $item->id->videoId) }}">--}}
{{--                    <div class="card mb-4">--}}
{{--                        <img src="{{ $item->snippet->thumbnails->medium->url }}" class="img-fluid" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-titled">{{ \Illuminate\Support\Str::limit($item->snippet->title, $limit = 50, $end = ' ...') }}</h5>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer text-muted">--}}
{{--                            Published at {{ date('d M Y', strtotime($item->snippet->publishTime)) }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        @endforeach--}}
    </div>
@stop
