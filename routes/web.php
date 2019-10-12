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


use App\Mail\NewUserWelcomeMail;

Auth::routes();

route::post('follow/{user}','FollowsController@store');

route::get('/email', function (){
    return new NewUserWelcomeMail();
});

Route::get('/','PostController@index');
route::get('/p/create','PostController@create');
route::post('/p','PostController@store');
route::get('/p/{post}','PostController@show');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::put('/profile/{user}', 'ProfilesController@update')->name('profile.update');
