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

Route::get('/beranda', function () {
  return view('pages/beranda');
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

Route::get('tanggap', function(){
  return view('pages.tanggapipengaduan');
});

Route::get('detailpengaduan', function(){
  return view('pages.detailpengaduan');
});

Route::get('lihatpengaduan', function(){
  return view('pages.lihatpengaduan');
});

Route::get('pengaduanbytopik', function(){
  return view('pages.pengaduanbytopik');
});

Route::get('userprofile', function(){
  return view('pages.userprofile');
});
