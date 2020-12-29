<?php

use App\Mail\NewUserWelcomMail;

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

Auth::routes();


Route::get('/mail', function(){
    return new NewUserWelcomMail();
});


//follow
Route::post('/follow/{user}', 'FollowsController@store');

// 整併 login 的 進入的部分
Route::get('/', 'PostsController@index');
// Add new post page
Route::get('/p/create', 'PostsController@create');
// add new post method
Route::post('/p', 'PostsController@store');
// open one post
Route::get('/p/{post}', 'PostsController@show');


// profile
// HomeController @ 裡面方法
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
//// show edit profile
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
//// process edit profile
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');






