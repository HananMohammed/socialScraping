@extends('layouts.app')
@section('title', 'search')
@section('content')
    <form action="{{ route('fb.userInfo.store') }}" method="get" class="mb-5 mt-5">
        <div class="row">
            <div class="col-sm-8 form-group">
                <input type="text" class="form-control" name="user_name" placeholder="UserName........" >
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
                <td>Following</td>
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
