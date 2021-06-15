@extends('layouts.app')
@section('title', 'search')
@section('content')
    <form action="{{ route('youtube.results') }}" method="get" class="mb-5 mt-5">
        <div class="row">
            <div class="col-sm-8 form-group">
                <input type="text" class="form-control" name="search" placeholder="Search .........." >

            </div>
            <div class="col-sm-4">
                <input type="submit" value="Search" class="btn btn-success">
            </div>
        </div>
    </form>

    <div class="row">

        @foreach($videoLists->items as $key => $item)
            <div class="col-4">
                <a href="{{ route('youtube.watch', $item->id->videoId) }}">
                    <div class="card mb-4">
                        <img src="{{ $item->snippet->thumbnails->medium->url }}" class="img-fluid" alt="">
                        <div class="card-body">
                            <h5 class="card-titled">{{ \Illuminate\Support\Str::limit($item->snippet->title, $limit = 50, $end = ' ...') }}</h5>
                        </div>
                        <div class="card-footer text-muted">
                            Published at {{ date('d M Y', strtotime($item->snippet->publishTime)) }}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@stop
