<?php

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

//Route::get('/', 'PagesController@getHome');
Route::get('/',function()
{
	App::setlocale('lv');
	return view('/index');
});

Route::get('/videos', 'PagesController@getVideos');
Route::get('/contact', 'PagesController@getContact');

Route::get('/messages', 'MessagesController@getMessages');

Route::post('/contact/submit', 'MessagesController@submit');

Route::resource('/videos', 'PostsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('lang/{locale}','LanguageController');

Route::get('twitterUserTimeLine', 'TwitterController@twitterUserTimeLine');
Route::post('tweet', ['as'=>'post.tweet','uses'=>'TwitterController@tweet']);
