<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
  return view('index');
});

Route::get('/login', function () {
  return view('pages/login');
});

Route::get('dashboard', function(){
  return view('pages/dashboard');
})->middleware('IsAdmin');

Route::get('register', function(){
  return view('pages/register');
});

Route::post('login', 'CustomAuthController@loginprocess');
Route::get('logout', 'CustomAuthController@logoutprocess');

Route::post('register', 'RegisterController@registerprocess');
