<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('homepage');

Route::prefix('youtube')->group(function (){
    Route::get('/', 'YoutubeController@index')->name('youtube.index');
    Route::get('/results', 'YoutubeController@results')->name('youtube.results');
    Route::get('/watch/{id}', 'YoutubeController@watch')->name('youtube.watch');
    Route::get('/channel', 'YoutubeController@channel')->name('youtube.channel');
    Route::get('/channel-subscribers', 'YoutubeController@subscribers')->name('youtube.subscribers');
    Route::get('/video-data', 'YoutubeController@videoData')->name('youtube.videoData');
    Route::post('/get-video-data', 'YoutubeController@getYoutubeVideoID')->name('youtube.getYoutubeVideoID');
    Route::get('/get-channel', 'YoutubeController@getChannels')->name('youtube.getChannels');
    Route::get('/get-channel-by-name', 'YoutubeController@getChannelByName');
    Route::get('/getChannelById', 'YoutubeController@alaouy')->name('youtube.package');
    Route::post('/alaouy-package', 'YoutubeController@getChannelById')->name('youtube.alaouySubmit');
});

Route::prefix('tiktok')->group(function (){
    Route::get('/', 'TiktokController@index')->name('tiktok.index');
});

//CRM
Route::get('/crm', 'CrmController@index');
Route::get('/redis', 'RedisController@index');
Route::get('/fb', 'TwitterController@test')->name('fb');
Route::get('/fb/store', 'TwitterController@store')->name('fb.store');
Route::get('/fb/userInfo', 'TwitterController@userInfoView')->name('fb.userInfo');
Route::get('/fb/userInfo/store', 'TwitterController@userInfoStore')->name('fb.userInfo.store');
Route::get('/fb/userTweet', 'TwitterController@userTweets')->name('fb.userTweets');
Route::get('/fb/userTweet/store', 'TwitterController@userTweetStore')->name('fb.userTweets.store');
