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

Route::get('/', ['as' => 'main', 'uses' => 'MainController@redirect']);
Route::get('login', ['as' => 'login', 'uses' => 'login@showLoginForm']);
Route::post('login_post', ['as' => 'post_login', 'uses' => 'login@login']);
Route::get('/logout','login@logout');


//Beranda
Route::group(['prefix' => 'beranda'], function(){
    Route::get('/','BerandaController@index');
    Route::get('data', 'BerandaController@ajaxTable');
    Route::get('data1', 'InformasiController@ajaxTable');
});
//Profil
Route::group(['prefix' => 'profil'], function(){
    Route::get('/','ProfilController@index');
});

Route::group(array('middleware'=>array('auth')), function(){
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'InformasiController@index']);

    Route::group(['prefix' => 'informasi'], function(){
        Route::get('/','InformasiController@index');
        Route::get('data', 'InformasiController@ajaxTable');
        Route::post('input', 'InformasiController@input');
        Route::post('edit/{id}', 'InformasiController@edit');
        Route::post('change/{id}', 'InformasiController@changeStatus');
        Route::post('delete/{id}', 'InformasiController@delete');
    });
//Kategori
    Route::group(['prefix' => 'kategori'], function(){
        Route::get('list','KategoriController@listKategori');
        Route::get('/','KategoriController@index');
        Route::get('data', 'KategoriController@ajaxTable');
        Route::post('input', 'KategoriController@input');
        Route::post('edit/{id}', 'KategoriController@edit');
        Route::post('change/{id}', 'KategoriController@changeStatus');
        Route::post('delete/{id}', 'KategoriController@delete');
    });

//Instansi
    Route::group(['prefix' => 'instansi'], function(){
        Route::get('/', 'InstansiController@index');
        Route::get('data', 'InstansiController@ajaxTable');
        Route::post('input', 'InstansiController@input');
        Route::post('edit/{id}', 'InstansiController@edit');
        Route::post('delete/{id}', 'InstansiController@delete');
        Route::get('list', 'InstansiController@listInstansi');
    });

//Pengelola
    Route::group(['prefix' => 'pengelola'], function(){
        Route::get('/', 'PengelolaController@index');
        Route::get('data', 'PengelolaController@ajaxTable');
        Route::post('input', 'PengelolaController@input');
        Route::post('edit/{id}', 'PengelolaController@edit');
        Route::post('change/{id}', 'PengelolaController@changeStatus');
        Route::post('delete/{id}', 'PengelolaController@delete');
    });

//Pengguna
    Route::group(['prefix' => 'pengguna'], function(){
        Route::get('/', 'PenggunaController@index');
        Route::get('data', 'PenggunaController@ajaxTable');
        Route::post('edit/{id}', 'PenggunaController@edit');
        Route::post('delete/{id}', 'PenggunaController@delete');
    });

//Permintaan
    Route::group(['prefix' => 'permintaan'], function(){
        Route::get('/', 'PermintaanController@index');
        Route::get('data-belum', 'PermintaanController@ajaxTablebelum');
        Route::get('data-selesai', 'PermintaanController@ajaxTableselesai');
        Route::get('data-semua', 'PermintaanController@ajaxTablesemua');
        Route::post('input', 'PermintaanController@input');
        Route::get('print/{id}', 'PermintaanController@print');
    });

    Route::group(['prefix' => 'log'], function(){
        Route::get('/', 'LogController@index');
        Route::get('data', 'LogController@ajaxTable');
    });

});

//Rekap
Route::group(['prefix' => 'rekap'], function(){
    Route::get('belum/{id}', 'RekapController@belum');
    Route::get('selesai/{id}', 'RekapController@belum');
    Route::post('laporan', 'RekapController@semua');
});


Route::post('/pengguna/input', ['as' => '/pengguna/input', 'uses' => 'PenggunaController@input']);

Route::group(array('middleware'=>array('auth:pengguna')), function(){
    Route::get('profil', ['as' => 'profil', 'uses' => 'PenggunaController@profilpengguna']);

    Route::group(['prefix' => 'permohonan'], function(){
        Route::get('/', 'PermohonanController@index');
        Route::get('data', 'PermohonanController@ajaxTable');
        Route::get('input', 'PermohonanController@input');
    });

    Route::group(['prefix' => 'balasan'], function(){
        Route::get('/', 'BalasanController@index');
        Route::get('data', 'BalasanController@ajaxTable');
    });


    Route::group(['prefix' => 'instansi'], function(){
        Route::get('list', 'InstansiController@listInstansi');
    });

});

