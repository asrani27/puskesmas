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

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('/sa/role', 'SuperadminController@role');
    Route::get('/sa/role/add', 'SuperadminController@addRole');
    Route::post('/sa/role/add', 'SuperadminController@simpanRole');
    Route::get('/sa/role/delete/{id}', 'SuperadminController@deleteRole');
    Route::get('/sa/role/edit/{id}', 'SuperadminController@editRole');
    Route::post('/sa/role/update/{id}', 'SuperadminController@updateRole');
});
