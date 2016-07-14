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

Route::get('skpd/{slug}', ['as' => 'perskpd', 'uses' => 'WelcomePageController@semuatopik'])->where('slug', '[A-Za-z0-9-]+');

Route::get('detail/pengaduan/{slug}', ['as' => 'detailpengaduan', 'uses' => 'WelcomePageController@detailpengaduan'])->where('slug', '[A-Za-z0-9-]+');

Route::get('skpd', 'WelcomePageController@semuaskpd');
// End Route for Umum & Walcome Page //


// Front Akses Warga ------------------------------------------------------------------------------------------
Route::get('beranda', ['as' => 'beranda', 'uses' => 'WargaController@index']);

Route::get('profil', ['as' => 'profilwarga', 'uses' => 'ProfileWargaController@index']);
Route::post('profil', 'ProfileWargaController@store');

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

Route::get('adminpiechart', 'DashboardController@adminpiechart');
Route::get('adminpiechartSKPD', 'DashboardController@adminpiechartSKPD');
Route::get('adminareachart', 'DashboardController@adminareachart');
Route::get('adminareachartSKPD', 'DashboardController@adminareachartSKPD');
Route::get('countpengaduanbyskpd', 'DashboardController@countpengaduanbyskpd');
Route::get('countpengaduanbytopik', 'DashboardController@countpengaduanbytopik');

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

// Password reset link request routes...
Route::get('lupa_password', 'Auth\PasswordController@getEmail');
Route::post('email/reset', ['as' => 'emailreset', 'uses' => 'Auth\PasswordController@postEmail']);

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', ['as' => 'passwordreset', 'uses' => 'Auth\PasswordController@postReset']);


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
Route::get('getdokumenpengaduan/bind/{id}', 'MasterSKPDController@getdokumenpengaduan');

Route::get('topikpengaduan', ['as'=>'topikpengaduan.index', 'uses'=>'TopikAduanController@index']);
Route::post('topikpengaduan', ['as'=>'topikpengaduan.store', 'uses'=>'TopikAduanController@store']);
Route::get('topikpengaduan/delete/{id}', 'TopikAduanController@delete');
Route::get('topikpengaduan/bind/{id}', 'TopikAduanController@bind');
Route::post('topikpengaduan/update', 'TopikAduanController@update');
Route::get('admin/topikpengaduan/{type}', 'TopikAduanController@export');

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


// Route::get('pengaduanbytopik', function(){
//   return view('pages.pengaduanbytopik');
// });

// Route::get('wargaprofile', function(){
//   return view('pages.wargaprofile');
// });
Route::get('pengaduanbytopik/show/{id}', 'PengaduanByTopikController@show');

Route::get('wargaprofile/show/{id}', 'WargaProfileController@show');

Route::get('datawarga', function(){
  return view('pages.datawarga');
});
Route::resource('datawarga', 'DataWargaController');


Route::get('listdatapengaduanbyskpd', function(){
  return view('pages.listdatapengaduanbyskpd');
});


// Histori Pengaduan
Route::get('admin/historipengaduan', 'HistoriPengaduanController@index');
Route::get('admin/historipengaduan/charts/api', 'HistoriPengaduanController@getApi');
Route::get('admin/historipengaduan/{type}', 'HistoriPengaduanController@downloadExcel');

// Menu Slider
Route::get('admin/slider', ['as' => 'slider', 'uses' => 'SlidersController@index']);
Route::post('admin/slider', 'SlidersController@upload');
Route::get('admin/slider/{id}', 'SlidersController@update');
Route::get('admin/deleteslider/{id}', 'SlidersController@hapus');

// Menu Tentang SKPD
Route::get('admin/tentang', ['as' => 'tentang', 'uses' => 'TentangController@index']);
Route::post('admin/tentang', 'TentangController@store');
Route::post('admin/tentang/update', 'TentangController@update');

// Menu Syarat & Ketentuan
Route::get('admin/syaratketentuan', ['as' => 'syaratketentuan', 'uses' => 'SyaratKetentuanController@index']);
Route::post('admin/syaratketentuan', 'SyaratKetentuanController@store');
Route::post('admin/syaratketentuan/update', 'SyaratKetentuanController@update');
