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

Route::get('/', function () {
    if(Auth::check()) {
        return redirect()->route('home');
    } 
    return view('welcome');
});

Route::get('/logout', function() {
    Auth::logout();
    return redirect()->to('/');
});

Auth::routes(['register' => false, 'reset' => false, 'confirm' => false]);
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'role:superadmin|adminpuskes']], function () {
    Route::get('/profile', 'SuperadminController@profile');
    Route::post('/profile/password', 'SuperadminController@gantiPass');
    Route::post('/profile/foto', 'SuperadminController@gantiFoto');
});
Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    //Route Role
    Route::get('/sa/role', 'SuperadminController@role');
    Route::get('/sa/role/add', 'SuperadminController@addRole');
    Route::post('/sa/role/add', 'SuperadminController@simpanRole');
    Route::get('/sa/role/delete/{id}', 'SuperadminController@deleteRole');
    Route::get('/sa/role/edit/{id}', 'SuperadminController@editRole');
    Route::post('/sa/role/update/{id}', 'SuperadminController@updateRole');
    
    //Route User
    Route::get('/sa/user', 'SuperadminController@user');
    Route::get('/sa/user/add', 'SuperadminController@addUser');
    Route::post('/sa/user/add', 'SuperadminController@simpanUser');
    Route::get('/sa/user/delete/{id}', 'SuperadminController@deleteUser');
    Route::get('/sa/user/edit/{id}', 'SuperadminController@editUser');
    Route::post('/sa/user/update/{id}', 'SuperadminController@updateUser');
    
    //Route Puskes
    Route::get('/sa/puskes', 'SuperadminController@puskes');
    Route::get('/sa/puskes/add', 'SuperadminController@addPuskes');
    Route::post('/sa/puskes/add', 'SuperadminController@simpanPuskes');
    Route::get('/sa/puskes/delete/{id}', 'SuperadminController@deletePuskes');
    Route::get('/sa/puskes/edit/{id}', 'SuperadminController@editPuskes');
    Route::post('/sa/puskes/update/{id}', 'SuperadminController@updatePuskes');
    
    //Route Menu
    Route::get('/sa/menu', 'SuperadminController@menu');
    Route::post('/sa/menu/add', 'SuperadminController@simpanMenu');
    Route::post('/sa/submenu/add', 'SuperadminController@simpanSubmenu');
    Route::get('/sa/menu/delete/{id}', 'SuperadminController@deleteMenu');
    
    Route::get('/sa/kecamatan', 'SuperadminController@kecamatan');
    Route::get('/sa/kelurahan', 'SuperadminController@kelurahan');
});


Route::group(['middleware' => ['auth', 'role:adminpuskes']], function () {
    Route::get('/getkelurahan/{id}', 'PendaftaranController@getKelurahan');
    Route::any('/pendaftaran/pasien/search', 'PendaftaranController@search');
    Route::get('/pendaftaran/pasien/truncate', 'PendaftaranController@truncatePasien');
    Route::get('/pendaftaran/pasien', 'PendaftaranController@pasien');
    Route::get('/pendaftaran/pasien/getData', 'PendaftaranController@getDataPasien');
    Route::get('/pendaftaran/pasien/add', 'PendaftaranController@addPasien');
    Route::post('/pendaftaran/pasien/add', 'PendaftaranController@storePasien');
    Route::get('/pendaftaran/pasien/syncrone', 'PendaftaranController@syncrone');
    Route::get('/pendaftaran/pasien/delete/{id}', 'PendaftaranController@delete');
    Route::get('/pendaftaran/pasien/edit/{id}', 'PendaftaranController@editPasien');
    Route::get('/pendaftaran/pasien/view/{id}', 'PendaftaranController@viewPasien');
    Route::get('/pendaftaran/pasien/create/{id}', 'PendaftaranController@create');
    Route::post('/pendaftaran/pasien/create/{id}', 'PendaftaranController@daftarPelayanan');

    Route::get('/pendaftaran', 'PendaftaranController@pendaftaran');
    Route::any('/pendaftaran/search', 'PendaftaranController@pendaftaranSearch');
    Route::post('/pendaftaran/pasien/search/tgl_lahir', 'PendaftaranController@searchTglLahir');
    Route::get('/rekam_medis', 'PendaftaranController@rekamMedis');
    
    Route::get('/sinkrondb', 'TransferController@index');
    Route::get('/sinkrondb/sinkron/{id}', 'TransferController@sinkron');
    Route::get('/sinkrondb/lihat/{id}', 'TransferController@lihat');
    Route::get('/sinkrondb/truncate/{id}', 'TransferController@truncate');

    Route::get('/pelayanan/medis', 'PelayananController@medis');
    Route::post('/pelayanan/medis', 'PelayananController@medisPoli');
    Route::get('/pelayanan/medis/proses/{id}', 'PelayananController@proses');
    Route::any('/pelayanan/medis/search', 'PelayananController@search');
    Route::any('/pelayanan/medis/tanggal', 'PelayananController@searchTanggal');

    //POLI UMUM
    Route::get('/pelayanan/medis/proses/{id}/umum/anamnesa', 'PelayananController@umumAnamnesa');
    Route::post('/pelayanan/medis/proses/{id}/umum/anamnesa', 'PelayananController@storeAnamnesa')->name('anamnesa');
    Route::get('/pelayanan/medis/proses/{id}/umum/diagnosa', 'PelayananController@umumDiagnosa');
    Route::get('/pelayanan/medis/proses/{id}/umum/resep', 'PelayananController@umumResep');
    
    
});
