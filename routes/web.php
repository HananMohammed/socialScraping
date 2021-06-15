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
});

