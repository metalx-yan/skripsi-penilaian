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


Auth::routes();

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'role:user']], function() {

    Route::get('/', 'PenilaianController@home')->name('homes');
    // Route::get('/tambahuser', 'PenilaianController@tambahuser')->name('tambahuser');
    Route::get('/history', 'PenilaianController@history')->name('history');
    // Route::post('/tambahuser', 'PenilaianController@tambahuserpost')->name('tambahuserpost');
    
});

Route::group(['prefix' => 'administrator', 'middleware' => ['auth', 'role:administrator']], function() {

    Route::get('/', 'PenilaianController@home')->name('homes');
    Route::get('/tambahuser', 'PenilaianController@tambahuser')->name('tambahuser');
    Route::get('/history', 'PenilaianController@history')->name('history');
    Route::delete('/history/{id}', 'PenilaianController@deletehistory')->name('delete-history');
    Route::post('/tambahuser', 'PenilaianController@tambahuserpost')->name('tambahuserpost');
    
});

Route::get('/', 'PenilaianController@create1')->name('create1');
Route::get('/tentang', 'PenilaianController@tentang')->name('tentang');
Route::get('/pertanyaan', 'PenilaianController@createStep2')->name('create2');
Route::get('/pertanyaan3', 'PenilaianController@createStep3')->name('create3');
Route::post('/', 'PenilaianController@storeCreate1')->name('storeCreate1');
Route::post('/pertanyaan', 'PenilaianController@storeCreate2')->name('storeCreate2');

// Route::resource('penilaian', 'PenilaianController');

Route::get('/home', 'HomeController@index')->name('home');
