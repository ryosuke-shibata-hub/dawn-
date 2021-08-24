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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

// top_page->http://homestead.dawn/login
// mailAddress->users.tables
// pass->123456789 or 1234567890

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');


Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');





Route::get('/added', 'Auth\RegisterController@added');





//ログイン中のページ

Route::group(['middleware' =>['auth']], function(){

Route::get('/top','PostsController@index');
Route::post('/top','PostsController@create');
Route::get('/{id}/delete', 'PostsController@delete');
Route::get('/{id}/update', 'PostsController@updateUp');

Route::get('/profile','UsersController@profile');
Route::post('/profile','UsersController@profileUpdate');
// Route::post('/user_profile/{id}','UsersController@profileUpdate');

Route::get('profile/{id}','FollowsController@profile_list');
// Route::get('profile/{id}','FollowsController@profile_list2');

Route::get('/search','UsersController@searchUsers');
Route::get('/searchTweet','UsersController@searchTweet');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

Route::get('/logout', 'Auth\LoginController@logout');

// Route::post('/search/{user}','UsersController@follow');
// Route::post('/search/{user}','UsersController@unfollow');
// Route::group(['prefix' => 'users/{id}'], function () {
// Route::post('follow', 'FollowsController@store')->name('follow');
// Route::delete('unfollow', 'FollowsController@destroy')->name('unfollow');
// });

Route::post('/search/{id}','UsersController@follow')->name('follow');
Route::delete('/search/{id}','UsersController@unfollow')->name('unfollow');
});
