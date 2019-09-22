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


Route::GET('login', 'appControl@login');
Route::POST('loginSubmit', 'appControl@submit')->name('login.submit');

Route::group(['middleware' => ['cekstatus']], function () {
    
    Route::GET('form/{permohonan}/{path}', 'appControl@masterLimitles');
    Route::GET('persyaratan/pdf/izin', 'izinControl@pdfIzin');
    Route::GET('permohonan/{permohonan}/{path}', 'appControl@masterLimitles')->name("prs.permohonan");
    Route::GET('{path}', 'appControl@masterLimitles')->where( 'path', '.*' );
});