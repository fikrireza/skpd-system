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

// Welcome Page & Umum //
Route::get('/', ['as' => 'welcomepage', 'uses' => 'WelcomePageController@index']);

Route::get('semua/{slug}', ['as' => 'perskpd', 'uses' => 'WelcomePageController@semuatopik'])->where('slug', '[A-Za-z0-9-]+');

Route::get('detail/pengduan/{slug}', ['as' => 'detailpengaduan', 'uses' => 'WelcomePageController@detailpengaduan'])->where('slug', '[A-Za-z0-9-]+');
// End Route for Umum & Walcome Page //


// Front Akses Warga ------------------------------------------------------------------------------------------
Route::get('beranda', ['as' => 'beranda', 'uses' => 'WargaController@index']);

Route::get('profil', ['as' => 'profilwarga', 'uses' => 'ProfileWargaController@index']);

Route::post('ubahpassword', ['as' => 'ubahpassword', 'uses' => 'ProfileWargaController@changePassword']);

Route::post('sendpengaduan', ['as'=>'sendpengaduan', 'uses'=>'WargaController@postPengaduan']);

Route::get('pengaduansaya', ['as' => 'pengaduansaya', 'uses' => 'WargaController@pengaduansaya']);

Route::get('pengaduansaya/detail/{slug}', 'WargaController@detailPengaduan')->where('slug', '[A-Za-z0-9-]+');

Route::post('pencarian', 'SearchController@getSearchWarga');

Route::get('semuapengaduan', ['as' => 'semuapengaduan', 'uses' => 'WargaController@semuapengaduan']);

Route::get('semuapengaduan/detail/{slug}', 'WargaController@detailsemuapengaduan')->where('slug', '[A-Za-z0-9-]+');
// End Route For Akses Warga

Route::get('my-profile', ['as'=>'my.profile', 'uses'=>'ProfileController@index']);

Route::get('viewall/topik-aduan', function(){
  return view('front.lihatsemuabytopik');
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
Route::resource('dashboard', 'DashboardController');

Route::get('header', ['as'=>'dashboard', function(){
  return view('includes/header');
}]);
Route::resource('header', 'DashboardController');

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
Route::get('listdataskpdbytopik', 'MasterSKPDController@getDataSKPD');
Route::get('topikbyskpd/{id}', 'MasterSKPDController@detailSKPD');
Route::get('pengaduandetail/bind/{id}', 'MasterSKPDController@bindfordetail');

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
Route::resource('tanggap', 'TanggapAduanController');

// Route::get('detailpengaduan', function(){
//   return view('pages.detailpengaduan');
// });
Route::get('detailpengaduan/show/{id}', 'DetailPengaduanController@show');
Route::get('detailpengaduan/verifikasi/{id}', ['as'=>'detailpengaduan.verifikasi', 'uses'=>'DetailPengaduanController@verifikasi']);
Route::post('detailpengaduan/mutasi', 'DetailPengaduanController@mutasi');
Route::resource('detailpengaduan', 'DetailPengaduanController');

Route::resource('lihatpengaduan', 'LihatPengaduanController');


Route::get('pengaduanbytopik', function(){
  return view('pages.pengaduanbytopik');
});

// Route::get('wargaprofile', function(){
//   return view('pages.wargaprofile');
// });
Route::get('wargaprofile/show/{id}', 'WargaProfileController@show');

Route::get('datawarga', function(){
  return view('pages.datawarga');
});
Route::resource('datawarga', 'DataWargaController');


Route::get('listdatapengaduanbyskpd', function(){
  return view('pages.listdatapengaduanbyskpd');
});



Route::get('admin/historipengaduan', 'HistoriPengaduanController@index');
Route::get('admin/historipengaduan/datatables', ['as'=>'datatables.histori', 'uses'=>'HistoriPengaduanController@getDataForDataTable']);
Route::get('admin/historipengaduan/charts/api', 'HistoriPengaduanController@getApi');
Route::get('admin/slider', 'SliderController@index');
Route::post('admin/slider', 'SliderController@upload');
