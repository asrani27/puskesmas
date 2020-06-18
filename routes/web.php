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

Route::get('/login2', function () {
    return view('login2');
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


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    //----return response json-----
    Route::post('/pendaftaran/pasien/getKelurahan', 'PendaftaranController@selectKelurahan');
    Route::post('/pendaftaran/pasien/getDiagnosa', 'PendaftaranController@selectDiagnosa');

    Route::get('/download_panduan', 'SuperadminController@downloadpanduan');
    Route::post('/tambah_pendaftaran', 'SuperadminController@tambahpendaftaran');
    //----end----------------------
    Route::get('/pengaturan/data_master', 'PengaturanController@dataMaster');

    Route::get('/pengaturan/data_master/poli', 'PengaturanController@poli');
    Route::post('/pengaturan/data_master/poli', 'PengaturanController@storePoli')->name('simpanPoli');
    Route::get('/pengaturan/data_master/poli/add', 'PengaturanController@addPoli');
    Route::get('/pengaturan/poli/edit/{id}', 'PengaturanController@editPoli');
    Route::post('/pengaturan/poli/edit/{id}', 'PengaturanController@updatePoli')->name('editPoli');
    Route::get('/pengaturan/poli/delete/{id}', 'PengaturanController@deletePoli');
    
    Route::get('/pengaturan/data_master/pegawai', 'PengaturanController@pegawai');
    Route::get('/pengaturan/data_master/pegawai/add', 'PengaturanController@addPegawai');
    Route::post('/pengaturan/data_master/pegawai', 'PengaturanController@storePegawai')->name('simpanPegawai');
    Route::get('/pengaturan/pegawai/delete/{id}', 'PengaturanController@deletePegawai');
    Route::get('/pengaturan/pegawai/edit/{id}', 'PengaturanController@editPegawai');
    Route::post('/pengaturan/pegawai/edit/{id}', 'PengaturanController@updatePegawai')->name('editPegawai');

    Route::get('/pengaturan/data_master/jenispegawai', 'PengaturanController@jenispegawai');
    Route::get('/pengaturan/data_master/jenispegawai/add', 'PengaturanController@addJenisPegawai');
    Route::post('/pengaturan/data_master/jenispegawai', 'PengaturanController@storeJenisPegawai')->name('simpanJenisPegawai');
    Route::get('/pengaturan/jenispegawai/delete/{id}', 'PengaturanController@deleteJenisPegawai');
    Route::get('/pengaturan/jenispegawai/edit/{id}', 'PengaturanController@editJenisPegawai');
    Route::post('/pengaturan/jenispegawai/edit/{id}', 'PengaturanController@updateJenisPegawai')->name('editJenisPegawai');

    Route::get('/pengaturan/data_master/user', 'PengaturanController@user');
    Route::get('/pengaturan/data_master/user/add', 'PengaturanController@adduser');
    Route::post('/pengaturan/data_master/user', 'PengaturanController@storeUser')->name('simpanUser');
    Route::get('/pengaturan/user/delete/{id}', 'PengaturanController@deleteUser');
    Route::get('/pengaturan/user/edit/{id}', 'PengaturanController@editUser');
    Route::post('/pengaturan/user/edit/{id}', 'PengaturanController@updateUser')->name('editUser');

    Route::get('/pendaftaran/pasien', 'PendaftaranController@pasien');
    Route::get('/getkelurahan/{id}', 'PendaftaranController@getKelurahan');
    Route::any('/pendaftaran/pasien/search', 'PendaftaranController@search');
    Route::get('/pendaftaran/pasien/truncate', 'PendaftaranController@truncatePasien');
    Route::get('/pendaftaran/pasien/getData', 'PendaftaranController@getDataPasien');
    Route::get('/pendaftaran/pasien/add', 'PendaftaranController@addPasien');
    Route::post('/pendaftaran/pasien/add', 'PendaftaranController@storePasien');
    Route::get('/pendaftaran/pasien/syncrone', 'PendaftaranController@syncrone');
    Route::get('/pendaftaran/pasien/delete/{id}', 'PendaftaranController@delete');
    Route::post('/pendaftaran/pasien/update/{id}', 'PendaftaranController@updatePasien');
    Route::get('/pendaftaran/pasien/edit/{id}', 'PendaftaranController@editPasien');
    Route::get('/pendaftaran/pasien/view/{id}', 'PendaftaranController@viewPasien');
    Route::get('/pendaftaran/pasien/create/{id}', 'PendaftaranController@create');
    Route::post('/pendaftaran/pasien/create/{id}', 'PendaftaranController@daftarPelayanan');

    Route::get('/pendaftaran', 'PendaftaranController@pendaftaran');
    Route::any('/pendaftaran/search', 'PendaftaranController@pendaftaranSearch');
    Route::post('/pendaftaran/pasien/search/tanggal_lahir', 'PendaftaranController@searchTglLahir');
    Route::get('/rekam_medis', 'PendaftaranController@rekamMedis');
    Route::get('/rekammedis/detail/{id}', 'PendaftaranController@detailrekammedis');
    Route::any('/rekam_medis/search', 'PendaftaranController@searchMedis');
    
    Route::get('/sinkrondb', 'TransferController@index');
    Route::get('/sinkrondb/sinkron/{id}', 'TransferController@sinkron');
    Route::get('/sinkrondb/lihat/{id}', 'TransferController@lihat');
    Route::get('/sinkrondb/truncate/{id}', 'TransferController@truncate');

    Route::get('/pelayanan/medis', 'PelayananController@medis');
    Route::post('/pelayanan/medis', 'PelayananController@medisPoli');
    Route::get('/pelayanan/medis/proses/{id}', 'PelayananController@proses');
    Route::get('/pelayanan/medis/proses/{id}/mulai', 'PelayananController@mulaiPeriksa');
    Route::post('/pelayanan/medis/proses/{id}', 'PelayananController@selesaiPeriksa');
    Route::any('/pelayanan/medis/search', 'PelayananController@search');
    Route::any('/pelayanan/medis/tanggal', 'PelayananController@searchTanggal');

    Route::get('/laporankunjunganpasien', 'LaporanController@kunjunganpasien');
    Route::get('/laporankunjunganpasien/export', 'LaporanController@exportkunjunganpasien');
    Route::get('/laporankunjunganpasien/export/today', 'LaporanController@exportkunjunganpasientoday');
    Route::post('/laporankunjunganpasien/search', 'LaporanController@tampilkankunjunganpasien');

    
    Route::get('/laporanpelayananpasien', 'LaporanController@laporanpelayananpasien');
    Route::get('/laporankinerjapuskesmas', 'LaporanController@laporankinerjapuskesmas');

    Route::get('/laporansp3lb1', 'LaporanController@laporansp3lb1');
    Route::post('/laporansp3lb1', 'LaporanController@laporansp3lb1tampilkan');
    Route::get('/laporansp3lb2', 'LaporanController@laporansp3lb2');
    Route::get('/laporansp3lb3', 'LaporanController@laporansp3lb3');
    Route::get('/laporansp3lb4', 'LaporanController@laporansp3lb4');
    Route::get('/test_export', 'LaporanController@test_export');
    
    Route::get('/laporansp3lb1/export', 'LaporanController@laporansp3lb1export');
    

    //DETAIL
    Route::get('/pelayanan/medis/proses/{id}/anamnesa', 'PelayananController@Anamnesa');
    Route::get('/pelayanan/medis/proses/{id}/diagnosa', 'PelayananController@Diagnosa');
    Route::get('/pelayanan/medis/proses/{id}/resep', 'PelayananController@Resep');
    Route::get('/pelayanan/medis/proses/{id}/laboratorium', 'PelayananController@Laboratorium');
    Route::get('/pelayanan/medis/proses/{id}/tindakan', 'PelayananController@Tindakan');
    Route::get('/pelayanan/medis/proses/{id}/mtbs', 'PelayananController@Mtbs'); 
    Route::get('/pelayanan/medis/proses/{id}/imunisasi', 'PelayananController@Imunisasi'); 
    Route::get('/pelayanan/medis/proses/{id}/imunisasi/imun_anak', 'PelayananController@imunisasiAnak'); 
    Route::get('/pelayanan/medis/proses/{id}/imunisasi/imun_dewasa', 'PelayananController@imunisasiDewasa'); 
    Route::get('/pelayanan/medis/proses/{id}/odontogram', 'PelayananController@Odontogram'); 
    Route::get('/pelayanan/medis/proses/{id}/periksagizi', 'PelayananController@Periksagizi'); 
    // Route::get('/pelayanan/medis/proses/{id}/anak/imunisasi', 'PelayananController@anakImunisasi'); 

    // Route Anamnesa
    Route::post('/pelayanan/medis/proses/{id}/anamnesa/{anamnesa_id}', 'AnamnesaController@updateAnamnesa')->name('updateAnamnesa2');
    Route::post('/pelayanan/medis/proses/{id}/anamnesa', 'PelayananController@storeAnamnesa')->name('anamnesa2');

    /// Route Diagnosa 
    Route::post('/pelayanan/medis/proses/{id}/diagnosa', 'DiagnosaController@storeDiagnosa')->name('diagnosa2');
    Route::get('/pelayanan/medis/proses/{id}/diagnosa/delete/{id_diagnosa}', 'DiagnosaController@deleteDiagnosa');

    //Route Resep
    Route::post('/pelayanan/medis/proses/{id}/resep', 'ResepController@storeResep')->name('resep2');
    Route::get('/pelayanan/medis/proses/{id}/resep/delete/{id_resep}', 'ResepController@deleteResep');

    //Route Laboratorium
    Route::post('/pelayanan/medis/proses/{id}/laboratorium', 'LaboratoriumController@storeLab')->name('laboratorium'); 
    Route::get('/pelayanan/medis/proses/lab/delete/{id}', 'LaboratoriumController@deleteLab'); 

    //Route Tindakan
    Route::post('/pelayanan/medis/proses/{id}/tindakan', 'TindakanController@storeTindakan')->name('tindakan2'); 
    Route::get('/pelayanan/medis/proses/{id}/tindakan/delete/{id_tindakan}', 'TindakanController@deleteTindakan');
      
    //Route MTBS
    Route::post('/pelayanan/medis/proses/{id}/mtbs', 'MtbsController@storeMtbs')->name('mtbs'); 
    Route::post('/pelayanan/medis/proses/{id}/mtbs/{mtbs_id}', 'MtbsController@updateMtbs')->name('updateMtbs'); 
    
    //Route Imunisasi
    Route::post('/pelayanan/medis/proses/{id}/imunisasi/kms', 'ImunisasiController@storeKMS')->name('kms'); 
    Route::post('/pelayanan/medis/proses/{id}/imunisasi/kms/update/{kms_id}', 'ImunisasiController@updateKMS')->name('updatekms');
    Route::post('/pelayanan/medis/proses/{id}/imunisasi/anak', 'ImunisasiController@storeImunisasiAnak')->name('imunisasiAnak'); 
    Route::post('/pelayanan/medis/proses/{id}/imunisasi/dewasa', 'ImunisasiController@storeImunisasiDewasa')->name('imunisasiDewasa'); 
    Route::post('/pelayanan/medis/proses/{id}/imunisasi/anak/update/{imunisasi_id}', 'ImunisasiController@UpdateImunisasiAnak')->name('updateImunisasiAnak'); 
    Route::post('/pelayanan/medis/proses/{id}/imunisasi/dewasa/update/{imunisasi_id}', 'ImunisasiController@UpdateImunisasiDewasa')->name('updateImunisasiDewasa');

    //Route Periksa Gizi
    Route::post('/pelayanan/medis/proses/{id}/periksagizi', 'PeriksaGiziController@store')->name('periksagizi');

    //Route Odontogtram
    Route::post('/pelayanan/medis/proses/{id}/odontogram', 'OdontogramController@store')->name('odontogram');
    Route::post('/pelayanan/medis/proses/{id}/odontogram/update', 'OdontogramController@update')->name('updateOdontogram');
    Route::get('/delete/odontogram/{id}', 'OdontogramController@delete');
    Route::get('/odontogram/image/code={code}/tipe={tipe}', 'OdontogramController@image');


    //Route Gambar GIGI
    Route::get('/generatekode', 'OdontogramController@generatekode');
    Route::get('/tarikgambar', 'OdontogramController@tarikgambar');
    // //POLI UMUM
    // Route::get('/pelayanan/medis/proses/{id}/umum/anamnesa', 'PelayananController@umumAnamnesa');
    // Route::post('/pelayanan/medis/proses/{id}/umum/anamnesa', 'PelayananController@storeAnamnesa')->name('anamnesa');
    // Route::post('/pelayanan/medis/proses/{id}/umum/anamnesa/{anamnesa_id}', 'PelayananController@updateAnamnesa')->name('updateAnamnesa');
    // Route::get('/pelayanan/medis/proses/{id}/umum/diagnosa', 'PelayananController@umumDiagnosa');
    // Route::post('/pelayanan/medis/proses/{id}/umum/diagnosa', 'PelayananController@storeDiagnosa')->name('diagnosa');
    // Route::get('/pelayanan/medis/proses/{id}/umum/diagnosa/{id_diagnosa}', 'PelayananController@deleteDiagnosa');
    // Route::post('/pelayanan/medis/proses/{id}/umum/resep', 'PelayananController@storeResep')->name('resep');
    // Route::get('/pelayanan/medis/proses/{id}/umum/resep', 'PelayananController@umumResep');
    // Route::get('/pelayanan/medis/proses/{id}/umum/resep/{id_resep}', 'PelayananController@deleteResep');
    // Route::get('/pelayanan/medis/proses/{id}/umum/laboratorium', 'PelayananController@umumLaboratorium');
    // Route::get('/pelayanan/medis/proses/{id}/umum/tindakan', 'PelayananController@umumTindakan');
    // Route::post('/pelayanan/medis/proses/{id}/umum/tindakan', 'PelayananController@storeTindakan')->name('tindakan'); 
    // Route::post('/pelayanan/medis/proses/{id}/umum/lab', 'PelayananController@storeLab')->name('lab'); 
    // Route::get('/pelayanan/medis/proses/umum/lab/delete/{id}', 'PelayananController@deleteLab'); 
    
    // //POLI ANAK
    // Route::get('/pelayanan/medis/proses/{id}/anak/anamnesa', 'PelayananController@anakAnamnesa');
    // Route::post('/pelayanan/medis/proses/{id}/anak/anamnesa', 'PelayananController@storeAnamnesa')->name('anamnesa');
    // Route::post('/pelayanan/medis/proses/{id}/anak/anamnesa/{anamnesa_id}', 'PelayananController@updateAnamnesa')->name('updateAnamnesa');
    // Route::get('/pelayanan/medis/proses/{id}/anak/diagnosa', 'PelayananController@anakDiagnosa');
    // Route::post('/pelayanan/medis/proses/{id}/anak/diagnosa', 'PelayananController@storeDiagnosa')->name('diagnosa');
    // Route::get('/pelayanan/medis/proses/{id}/anak/diagnosa/{id_diagnosa}', 'PelayananController@deleteDiagnosa');
    // Route::post('/pelayanan/medis/proses/{id}/anak/resep', 'PelayananController@storeResep')->name('resep');
    // Route::get('/pelayanan/medis/proses/{id}/anak/resep', 'PelayananController@anakResep');
    // Route::get('/pelayanan/medis/proses/{id}/anak/resep/{id_resep}', 'PelayananController@deleteResep');
    // Route::get('/pelayanan/medis/proses/{id}/anak/laboratorium', 'PelayananController@umumLaboratorium');
    // Route::get('/pelayanan/medis/proses/{id}/anak/tindakan', 'PelayananController@anakTindakan');
    // Route::get('/pelayanan/medis/proses/{id}/anak/mtbs', 'PelayananController@anakMtbs'); 
    // Route::get('/pelayanan/medis/proses/{id}/anak/periksagizi', 'PelayananController@anakPeriksagizi'); 
    // Route::get('/pelayanan/medis/proses/{id}/anak/imunisasi', 'PelayananController@anakImunisasi'); 
    // Route::get('/pelayanan/medis/proses/{id}/anak/imunisasi/imun_anak', 'PelayananController@imunisasiAnak'); 
    // Route::get('/pelayanan/medis/proses/{id}/anak/imunisasi/imun_dewasa', 'PelayananController@imunisasiDewasa'); 
    
    // // Route::post('/pelayanan/medis/proses/{id}/anak/anamnesa', 'PelayananController@storeAnamnesa')->name('anamnesa');
    // // Route::post('/pelayanan/medis/proses/{id}/anak/anamnesa/{anamnesa_id}', 'PelayananController@updateAnamnesa')->name('updateAnamnesa');
    // // Route::get('/pelayanan/medis/proses/{id}/anak/diagnosa', 'PelayananController@anakDiagnosa');
    // // Route::post('/pelayanan/medis/proses/{id}/anak/diagnosa', 'PelayananController@storeDiagnosa')->name('diagnosa');
    // // Route::get('/pelayanan/medis/proses/{id}/anak/diagnosa/{id_diagnosa}', 'PelayananController@deleteDiagnosa');
    // // Route::post('/pelayanan/medis/proses/{id}/anak/resep', 'PelayananController@storeResep')->name('resep');
    // // Route::get('/pelayanan/medis/proses/{id}/anak/resep', 'PelayananController@anakResep');
    // // Route::get('/pelayanan/medis/proses/{id}/anak/resep/{id_resep}', 'PelayananController@deleteResep');
    // // Route::get('/pelayanan/medis/proses/{id}/anak/laboratorium', 'PelayananController@umumLaboratorium');
    // // Route::get('/pelayanan/medis/proses/{id}/anak/tindakan', 'PelayananController@anakTindakan');
    // // Route::get('/pelayanan/medis/proses/{id}/anak/mtbs', 'PelayananController@anakMtbs'); 
    // // Route::get('/pelayanan/medis/proses/{id}/anak/periksagizi', 'PelayananController@anakPeriksagizi'); 
    // // Route::get('/pelayanan/medis/proses/{id}/anak/imunisasi', 'PelayananController@anakImunisasi'); 
    // // Route::get('/pelayanan/medis/proses/{id}/anak/imunisasi/imun_anak', 'PelayananController@imunisasiAnak'); 
    // // Route::get('/pelayanan/medis/proses/{id}/anak/imunisasi/imun_dewasa', 'PelayananController@imunisasiDewasa'); 

    // //POLI GIGI
    // Route::get('/pelayanan/medis/proses/{id}/gigi/anamnesa', 'PelayananController@gigiAnamnesa');
    // Route::post('/pelayanan/medis/proses/{id}/gigi/anamnesa', 'PelayananController@storeAnamnesa')->name('anamnesa');
    // Route::post('/pelayanan/medis/proses/{id}/gigi/anamnesa/{anamnesa_id}', 'PelayananController@updateAnamnesa')->name('updateAnamnesa');
    // Route::get('/pelayanan/medis/proses/{id}/gigi/diagnosa', 'PelayananController@gigiDiagnosa');
    // Route::post('/pelayanan/medis/proses/{id}/gigi/diagnosa', 'PelayananController@storeDiagnosa')->name('diagnosa');
    // Route::get('/pelayanan/medis/proses/{id}/gigi/diagnosa/{id_diagnosa}', 'PelayananController@deleteDiagnosa');
    // Route::post('/pelayanan/medis/proses/{id}/gigi/resep', 'PelayananController@storeResep')->name('resep');
    // Route::get('/pelayanan/medis/proses/{id}/gigi/resep', 'PelayananController@gigiResep');
    // Route::get('/pelayanan/medis/proses/{id}/gigi/resep/{id_resep}', 'PelayananController@deleteResep');
    // Route::get('/pelayanan/medis/proses/{id}/gigi/laboratorium', 'PelayananController@umumLaboratorium');
    // Route::get('/pelayanan/medis/proses/{id}/gigi/tindakan', 'PelayananController@gigiTindakan');
    
    // //POLI KIA
    // Route::get('/pelayanan/medis/proses/{id}/kia/anamnesa', 'PelayananController@kiaAnamnesa');
    // Route::post('/pelayanan/medis/proses/{id}/kia/anamnesa', 'PelayananController@storeAnamnesa')->name('anamnesa');
    // Route::post('/pelayanan/medis/proses/{id}/kia/anamnesa/{anamnesa_id}', 'PelayananController@updateAnamnesa')->name('updateAnamnesa');
    // Route::get('/pelayanan/medis/proses/{id}/kia/diagnosa', 'PelayananController@kiaDiagnosa');
    // Route::post('/pelayanan/medis/proses/{id}/kia/diagnosa', 'PelayananController@storeDiagnosa')->name('diagnosa');
    // Route::get('/pelayanan/medis/proses/{id}/kia/diagnosa/{id_diagnosa}', 'PelayananController@deleteDiagnosa');
    // Route::post('/pelayanan/medis/proses/{id}/kia/resep', 'PelayananController@storeResep')->name('resep');
    // Route::get('/pelayanan/medis/proses/{id}/kia/resep', 'PelayananController@kiaResep');
    // Route::get('/pelayanan/medis/proses/{id}/kia/resep/{id_resep}', 'PelayananController@deleteResep');
    // Route::get('/pelayanan/medis/proses/{id}/kia/laboratorium', 'PelayananController@umumLaboratorium');
    // Route::get('/pelayanan/medis/proses/{id}/kia/tindakan', 'PelayananController@kiaTindakan');
    
    // //POLI LANSIA
    // Route::get('/pelayanan/medis/proses/{id}/lansia/anamnesa', 'PelayananController@lansiaAnamnesa');
    // Route::post('/pelayanan/medis/proses/{id}/lansia/anamnesa', 'PelayananController@storeAnamnesa')->name('anamnesa');
    // Route::post('/pelayanan/medis/proses/{id}/lansia/anamnesa/{anamnesa_id}', 'PelayananController@updateAnamnesa')->name('updateAnamnesa');
    // Route::get('/pelayanan/medis/proses/{id}/lansia/diagnosa', 'PelayananController@lansiaDiagnosa');
    // Route::post('/pelayanan/medis/proses/{id}/lansia/diagnosa', 'PelayananController@storeDiagnosa')->name('diagnosa');
    // Route::get('/pelayanan/medis/proses/{id}/lansia/diagnosa/{id_diagnosa}', 'PelayananController@deleteDiagnosa');
    // Route::post('/pelayanan/medis/proses/{id}/lansia/resep', 'PelayananController@storeResep')->name('resep');
    // Route::get('/pelayanan/medis/proses/{id}/lansia/resep', 'PelayananController@lansiaResep');
    // Route::get('/pelayanan/medis/proses/{id}/lansia/resep/{id_resep}', 'PelayananController@deleteResep');
    // Route::get('/pelayanan/medis/proses/{id}/lansia/laboratorium', 'PelayananController@umumLaboratorium');
    // Route::get('/pelayanan/medis/proses/{id}/lansia/tindakan', 'PelayananController@lansiaTindakan');
    
    // //POLI PKPPR
    // Route::get('/pelayanan/medis/proses/{id}/pkpr/anamnesa', 'PelayananController@pkprAnamnesa');
    // Route::post('/pelayanan/medis/proses/{id}/pkpr/anamnesa', 'PelayananController@storeAnamnesa')->name('anamnesa');
    // Route::post('/pelayanan/medis/proses/{id}/pkpr/anamnesa/{anamnesa_id}', 'PelayananController@updateAnamnesa')->name('updateAnamnesa');
    // Route::get('/pelayanan/medis/proses/{id}/pkpr/diagnosa', 'PelayananController@pkprDiagnosa');
    // Route::post('/pelayanan/medis/proses/{id}/pkpr/diagnosa', 'PelayananController@storeDiagnosa')->name('diagnosa');
    // Route::get('/pelayanan/medis/proses/{id}/pkpr/diagnosa/{id_diagnosa}', 'PelayananController@deleteDiagnosa');
    // Route::post('/pelayanan/medis/proses/{id}/pkpr/resep', 'PelayananController@storeResep')->name('resep');
    // Route::get('/pelayanan/medis/proses/{id}/pkpr/resep', 'PelayananController@pkprResep');
    // Route::get('/pelayanan/medis/proses/{id}/pkpr/resep/{id_resep}', 'PelayananController@deleteResep');
    // Route::get('/pelayanan/medis/proses/{id}/pkpr/laboratorium', 'PelayananController@umumLaboratorium');
    // Route::get('/pelayanan/medis/proses/{id}/pkpr/tindakan', 'PelayananController@pkprTindakan');
    
});
