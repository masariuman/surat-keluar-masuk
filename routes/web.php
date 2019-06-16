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
    return redirect('/dashboard');
});

Route::group(['middleware'=> 'auth'], function () {
    Route::get('/dashboard','DashboardController@index');


    Route::get('/surat-masuk','MasukController@index');
    Route::get('/surat-masuk/new','MasukController@create');
    Route::post('/surat-masuk', 'MasukController@store');
    Route::get('/surat-masuk/{kategori}/edit', 'MasukController@edit');
    Route::patch('/surat-masuk/{kategori}', 'MasukController@update');
    Route::post('/surat-masuk/delete/{id}', 'MasukController@destroy');



    Route::get('/surat-keluar','KeluarController@index');
    Route::get('/surat-keluar/new','KeluarController@create');
    Route::post('/surat-keluar', 'KeluarController@store');
    Route::get('/surat-keluar/{kategori}/edit', 'KeluarController@edit');
    Route::patch('/surat-keluar/{kategori}', 'KeluarController@update');
    Route::post('/surat-keluar/delete/{id}', 'KeluarController@destroy');
});





// Auth::routes();
// $this->get('login', 'Auth\AuthController@showLoginForm');
// $this->post('login', 'Auth\AuthController@login');
// $this->get('logout', 'Auth\AuthController@logout');
Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
