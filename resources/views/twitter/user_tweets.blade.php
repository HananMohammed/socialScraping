@extends('layouts.app')
@section('title', 'search')
@section('content')
    <form action="{{ route('fb.userTweets.store') }}" method="get" class="mb-5 mt-5">
        <div class="row">
            <h3>
                Also Available USer Tweets and user media but by using user_id in this package (https://rapidapi.com/yuananf/api/twitter60/)
                getting user_id Available in this package (https://rapidapi.com/socialminer/api/twitter32/)
            </h3>
            <div class="col-sm-8 form-group">
                <input type="text" class="form-control" name="user_id" placeholder="user_id........" >
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
                    <img src="{{$data->profile_image_url_https}}" alt="">
                </td>
            </tr>
            <tr>
                <td>UserName</td>
                <td>{{$data->screen_name}}</td>
            </tr>
            <tr>
                <td>Created_at</td>
                <td>{{$data->created_at}}</td>
            </tr>
            <tr>
                <td>description</td>
                <td>{{$data->description}}</td>
            </tr>
            <tr>
                <td>favourites_count</td>
                <td>{{$data->favourites_count}}</td>
            </tr>
            <tr>
                <td>friends_count</td>
                <td> {{ $data->friends_count }}</td>
            </tr>
            <tr>
                <td>statuses_count</td>
                <td>{{ $data->statuses_count }} </td>
            </tr>
        </table>
        @endif
    </div>
@stop
