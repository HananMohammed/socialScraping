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
{{--           @foreach($data as $twit)--}}
              <?php $legacy = $data[0]->content->itemContent->tweet_results->result->legacy ; ?>
                <table>
{{--                    <tr>--}}
{{--                        <td>--}}
{{--                            <img src="{{$data['snippet']->thumbnails->default->url}}" alt="">--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    <tr>
                        <td>Created_at</td>
                        <td>{{$legacy->created_at}}</td>
                    </tr>

                    <tr>
                        <td>favorite_count</td>
                        <td>{{$legacy->favorite_count}}</td>
                    </tr>
                    <tr>
                        <td>tweet text</td>
                        <td>{{$legacy->full_text}}</td>
                    </tr>
                    <tr>
                        <td>mentions</td>
                        <td> {{ $legacy->entities->user_mentions[0]->name }}</td>
                    </tr>
                    <tr>
                        <td>reply_count</td>
                        <td>{{ $legacy->reply_count }} </td>
                    </tr>
                    <tr>
                        <td>retweet_count</td>
                        <td>{{ $legacy->retweet_count }}</td>
                    </tr>
                    <tr>
                        <td>URL Attached</td>
                        <td>{{$data[0]->content->itemContent->tweet_results->result->card->rest_id}}</td>
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
{{--           @endforeach--}}
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
