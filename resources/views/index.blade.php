@extends('layouts.app')
@section('title', 'HomePage')
@section('style')
    <style>
        .text{
            text-transform: uppercase;
            background: linear-gradient(to right, #30CFD0 0%, #330867 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 60px;
            font-weight: 800;
            font-family: sans-serif;
        }
    </style>
    @stop
@section('content')
    <h3 class="text mt-5">Social Media Scraping </h3>
@stop

