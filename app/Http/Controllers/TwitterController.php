<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PiedWeb\FacebookScraper\FacebookScraper;
use TwitterNoAuth\Twitter;

class TwitterController extends Controller
{
    public function test(){
        $data =[];
        $file =  Storage::path('tweet_detail.txt');
        if ($file){
            $json = json_decode(file_get_contents($file));
            $data = $json->data->threaded_conversation_with_injections->instructions[0]->entries;
        }
        return view('twitter.index', compact('data'));
    }

    public function store(Request $request){
        $data = $request->all();
        $tweet_id=$data['tweet'];
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://twitter60.p.rapidapi.com/tweet_detail?tweet_id=".$tweet_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: twitter60.p.rapidapi.com",
                "x-rapidapi-key: c52172871fmsh815c73cfbfcc013p1d8cedjsn1ec65160627e"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
           echo "cURL Error #:" . $err;
        } else {
            Storage::put('tweet_detail.txt', $response);
            $file =  Storage::path('tweet_detail.txt');
            $json = json_decode(file_get_contents($file));
            $data = $json->data->threaded_conversation_with_injections->instructions[0]->entries;
            return view('twitter.index', compact('data'));
        }

    }
    public function userInfoView(){
        $data = [];
        $file =  Storage::path('user_info.txt');
        if ($file){
            $json = json_decode(file_get_contents($file));
            $data = $json->data->user->result->legacy;
        }

        return view('twitter.user_info', compact('data'));
    }
    public function userInfoStore(Request $request){

        $data = $request->all();
        $user_name=$data['user_name'];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://twitter60.p.rapidapi.com/user_info.txt?user_name=".$user_name,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: twitter60.p.rapidapi.com",
                "x-rapidapi-key: c52172871fmsh815c73cfbfcc013p1d8cedjsn1ec65160627e"
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            Storage::put('user_info.txt', $response);

            $file =  Storage::path('user_info.txt');
            $json = json_decode(file_get_contents($file));
            $data = $json->data->user->result->legacy;
            return view('twitter.user_info', compact('data'));
        }

    }
    public function userTweets(){
        $data = [];
        return view('twitter.user_tweets', compact('data'));
    }
    public function userTweetStore(Request $request){

        $data = $request->all();
        $user_id=$data['user_id'];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://twitter60.p.rapidapi.com/user_info.txt?user_id=".$user_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: twitter60.p.rapidapi.com",
                "x-rapidapi-key: c52172871fmsh815c73cfbfcc013p1d8cedjsn1ec65160627e"
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            Storage::put('user_tweets.txt', $response);
            $file =  Storage::path('user_tweets.txt');
            $json = json_decode(file_get_contents($file));
            $data = $json->data->threaded_conversation_with_injections->instructions[0]->entries;
            return view('twitter.user_info', compact('data'));
        }
//
//        $file =  Storage::path('user_info.txt');
//        $json = json_decode(file_get_contents($file));
//        $data = $json->data->user->result->legacy;
//
//        return view('twitter.user_info', compact('data'));
    }
}
