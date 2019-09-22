<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/permohonan/data', 'permohonanControl@index');
Route::get('/permohonan/peropd', 'permohonanControl@peropd');
Route::get('/permohonan/page', 'permohonanControl@page');
Route::get('/permohonan/formulir', 'permohonanControl@formulir');
    Route::get('/permohonan/InsertForm', 'permohonanControl@Insert');
    Route::get('/permohonan/detail', 'permohonanControl@detail');

Route::get('/izin/list', 'izinControl@list');
Route::get('/perusahaan/list', 'perusahaanControl@list');
Route::get('/perusahaan/pengurus', 'perusahaanControl@pengurus');
Route::get('/perusahaan/UpdateData', 'perusahaanControl@update');

Route::get('/persyaratan/listpersyaratan', 'izinControl@DFRIzin');




