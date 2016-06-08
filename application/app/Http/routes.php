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

// Front
Route::get('/', function() {
  return view('index');
});

Route::get('beranda', ['as' => 'beranda', 'uses' => 'WargaController@index']);
Route::get('my-profile', ['as'=>'my.profile', 'uses'=>'ProfileController@index']);

Route::resource('profil', 'ProfileWargaController');

Route::get('laporan', function(){
  return view('front.laporan');
});

Route::get('detail/laporan/pengaduan-pemadaman-listrik', function(){
  return view('front.detaillaporan');
});

Route::get('detail/pengaduan-warga', function(){
  return view('front.detailpengaduan');
});

Route::get('viewall/topik-aduan', function(){
  return view('front.lihatsemuabytopik');
});

Route::get('semualaporan', function(){
  return view('front.semualaporan');
});

Route::get('detail/semua-pengaduan-lainnya', function(){
  return view('front.detailpengaduanlainnya');
});

Route::get('/loginskpd', function () {
  return view('pages/loginskpd');
});




Route::get('dashboard', ['as'=>'dashboard', function(){
  return view('pages/dashboard');
}]);

Route::get('homepages', ['as' => 'homepages', function(){
  return view('index');
}]);


//authentication
Route::post('login', 'CustomAuthController@loginprocess');
Route::get('logout', 'CustomAuthController@getlogout');

Route::get('register', function(){
  return view('pages/register');
});
Route::post('register', 'RegisterController@wargaregisterprocess');

Route::get('/register/verify/{code}', 'RegisterController@verify');


// administrator akses
Route::resource('dataskpd', 'MasterSKPDController');
Route::get('dataskpd/nonaktif/{id}', 'MasterSKPDController@nonaktif');
Route::get('dataskpd/aktif/{id}', 'MasterSKPDController@aktif');
Route::get('dataskpd/delete/{id}', 'MasterSKPDController@destroy');
Route::post('dataskpd/update', 'MasterSKPDController@update');
Route::get('dataskpd/bind/{id}', 'MasterSKPDController@bind');

Route::get('topikpengaduan', ['as'=>'topikpengaduan.index', 'uses'=>'TopikAduanController@index']);
Route::post('topikpengaduan', ['as'=>'topikpengaduan.store', 'uses'=>'TopikAduanController@store']);
Route::get('topikpengaduan/delete/{id}', 'TopikAduanController@delete');
Route::get('topikpengaduan/bind/{id}', 'TopikAduanController@bind');
Route::post('topikpengaduan/update', 'TopikAduanController@update');

Route::get('managementakun', ['as'=>'managementakun.index', 'uses'=>'ManagementAkunController@index']);
Route::post('managementakun/create', 'ManagementAkunController@create');
Route::get('managementakun/nonaktif/{id}', 'ManagementAkunController@nonaktif');
Route::get('managementakun/aktif/{id}', 'ManagementAkunController@aktif');
Route::get('managementakun/delete/{id}', 'ManagementAkunController@delete');
Route::get('managementakun/bind/{id}', 'ManagementAkunController@bind');
Route::post('managementakun/update', 'ManagementAkunController@update');
Route::post('managementakun/setpassword', ['as'=>'setpassword', 'uses'=>'RegisterController@setpassword']);

Route::get('my-profile', ['as'=>'my.profile', 'uses'=>'ProfileController@index']);
Route::post('my-profile', ['as'=>'profile.store', 'uses'=>'ProfileController@store']);
Route::post('change-password', ['as'=>'ganti.password', 'uses'=>'ProfileController@changePassword']);

Route::get('tanggap', function(){
  return view('pages.tanggapipengaduan');
});

Route::get('detailpengaduan', function(){
  return view('pages.detailpengaduan');
});

Route::get('lihatpengaduan', function(){
  return view('pages.lihatpengaduan');
});
Route::resource('lihatpengaduan', 'LihatPengaduanController');

Route::get('pengaduanbytopik', function(){
  return view('pages.pengaduanbytopik');
});

Route::get('wargaprofile', function(){
  return view('pages.wargaprofile');
});


Route::get('datawarga', function(){
  return view('pages.datawarga');
});
Route::resource('datawarga', 'DataWargaController');


Route::get('listdataskpdbytopik', function(){
  return view('pages.listdataskpdbytopik');
});

Route::get('listdatapengaduanbyskpd', function(){
  return view('pages.listdatapengaduanbyskpd');
});

Route::get('topikbyskpd', function(){
  return view('pages.topikbyskpd');
});

Route::get('historipengaduan', function(){
  return view('pages.historipengaduan');
});

Route::get('listhistoripengaduanall', function(){
  return view('pages.listhistoripengaduanall');
});
