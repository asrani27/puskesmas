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
});
