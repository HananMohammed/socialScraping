<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Facades\Youtube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use  alchemyguy\YoutubeLaravelApi\AuthenticateService;

class YoutubeController extends Controller
{
    const API_KEY = 'AIzaSyDaOgFPQmo6b8LaUxeDBX4dO5UJHcZXMn0';

    public function index()
    {

        if (session('search')) {
            $videoLists = $this->_videoLists(session('search'));
        } else {
            $videoLists = $this->_videoLists('grand community');
        }

         return view('youtube.index', compact('videoLists'));
    }

    public function results(){
        session([
            'search' => request()->get("search")
        ]);
        $search = request()->get("search");
        $videoLists = $this->_videoLists($search);

        return view('youtube.results', compact('videoLists'));
    }

    public function watch($id){
        $singleVideo = $this->_singleVideo($id);
        if (session('search')) {
            $videoLists = $this->_videoLists(session('search'));
        } else {
            $videoLists = $this->_videoLists('grand community');
        }
         return view('youtube.watch',  compact('singleVideo', 'videoLists'));
    }

    // We will get search result here
    protected function _videoLists($keywords)
    {
        $part = 'snippet';
        $country = 'BD';
        $apiKey = config('services.youtube.api_key');
        $maxResults = 12;
        $youTubeEndPoint = config('services.youtube.search_endpoint');
        $type = 'video'; // You can select any one or all, we are getting only videos

        $url = "$youTubeEndPoint?part=$part&maxResults=$maxResults&regionCode=$country&type=$type&key=$apiKey&q=$keywords";
        $response = Http::get($url);
        $results = json_decode($response);

        // We will create a json file to see our response
        File::put(storage_path() . '/app/public/results.json', $response->body());
        return $results;
    }

    protected function _singleVideo($id)
    {
        $apiKey = config('services.youtube.api_key');
        $part = 'snippet';
        $url = "https://www.googleapis.com/youtube/v3/videos?part=$part&id=$id&key=$apiKey";
        $response = Http::get($url);
        $results = json_decode($response);

        // Will create a json file to see our single video details
        File::put(storage_path() . '/app/public/single.json', $response->body());
        return $results;
    }

    public function channel(){

        return view('youtube.channel.index');
    }
    public function subscribers(){

        return view('youtube.channel.subscribers');
    }
    public function videoData(){
        $data=[];
        return view('youtube.channel.video-data', compact('data'));
    }


    public function getYoutubeVideoID(Request $request){
        $part = 'snippet';
        $url = $request->url;
        $queryString = parse_url($url,PHP_URL_QUERY);
        parse_str($queryString,$params);
        if(isset($params['v']) && strlen($params['v'])>0){
            $video_id = $params['v'];
            $apiKey = config('services.youtube.api_key');
            $videos_endpoint =  "https://www.googleapis.com/youtube/v3/videos?part=$part%2CcontentDetails%2Cstatistics&id=$video_id&key=$apiKey";
            $data = json_decode(file_get_contents($videos_endpoint));
            return view('youtube.channel.video-data', compact('data'));

        }else{
            return "Wrong youtube video url";
        }
    }

    function getChannels(){
        return view('youtube.channel.auth-data');

    }
    public function alaouy(){
        $data=[];
        return view('youtube.channel.alaouy-package', compact('data'));
    }
    public function getChannelById(Request $request){

        $data =(array) Youtube::getChannelById($request->channel_id);

        return view('youtube.channel.alaouy-package', compact('data'));
    }
}
