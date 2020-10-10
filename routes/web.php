<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// admin == approval
Route::group(['middleware' => 'cekRoleAdmin'], function(){
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/searchPengaduanAdmin', 'AdminController@searchPengaduan')->name('searchPengaduanAdmin');
    Route::get('/admin/create', 'AdminController@create')->name('formDataUser');
    Route::get('/admin/createClient', 'AdminController@createClient')->name('formDataClient');
    Route::get('/admin/createTeknisi', 'AdminController@createTeknisi')->name('formDataTeknisi');
    Route::get('/admin/createType', 'AdminController@createType')->name('formDataType');
    Route::get('/admin/dataClient', 'AdminController@dataClient')->name('dataClient');
    Route::get('/admin/dataTeknisi', 'AdminController@dataTeknisi')->name('dataTeknisi');
    Route::get('/admin/dataLaporan', 'AdminController@dataLaporan')->name('dataLaporan');
    Route::get('/admin/detailPengaduan/{id}', 'AdminController@detailPengaduan')->name('detailPengaduan');
    Route::get('/admin/editClient/{id}', 'AdminController@editClient')->name('editClient');
    Route::get('/admin/editTeknisi/{id}', 'AdminController@editTeknisi')->name('editTeknisi');
    Route::get('/admin/deleteClient/{id}', 'AdminController@deleteClient')->name('deleteClient');
    Route::get('/admin/deleteTeknisi/{id}', 'AdminController@deleteTeknisi')->name('deleteTeknisi');
    Route::get('/admin/reportExcel', 'AdminController@reportExcel')->name('reportExcel');
    Route::post('/admin/updateClient/{id}', 'AdminController@updateClient')->name('updateClient');
    Route::post('/admin/updateTeknisi/{id}', 'AdminController@updateTeknisi')->name('updateTeknisi');
    Route::post('/admin/storeClient', 'AdminController@storeClient')->name('storeClient');
    Route::post('/admin/storeTeknisi', 'AdminController@storeTeknisi')->name('storeTeknisi');
    Route::post('/admin/storeType', 'AdminController@storeType')->name('insertType');
    Route::post('/admin/updatePengaduanAdmin/{id}', 'AdminController@updatePengaduanAdmin')->name('updatePengaduanAdmin');
});

// client
Route::group(['middleware' => 'cekRoleClient'], function(){
    Route::get('/client', 'ClientController@index')->name('client');
    Route::get('/client/searchPengaduanClient', 'ClientController@searchPengaduan')->name('searchPengaduanClient');
    Route::get('/panel/create', 'PanelController@create')->name('formPanel');
    Route::get('/panel/delete/{id}', 'PanelController@delete')->name('deletePanel');
    Route::Post('/panel/store', 'PanelController@store')->name('insertPanel');
});

// Teknisi
Route::group(['middleware' => 'cekRoleTeknisi'], function(){
    Route::get('/teknisi', 'PetugasController@index')->name('teknisi');
    Route::get('/teknisi/showPengaduan/{id}', 'PetugasController@showPengaduan')->name('showPengaduan');
    Route::get('/teknisi/acceptPengaduanTeknisi/{id}', 'PetugasController@acceptPengaduanTeknisi')->name('acceptPengaduanTeknisi');
    Route::post('/teknisi/searchPengaduanTeknisi', 'PetugasController@searchPengaduan')->name('searchPengaduanTeknisi');
    Route::post('/teknisi/updatePengaduanTeknisi/{id}', 'PetugasController@updatePengaduanTeknisi')->name('updatePengaduanTeknisi');
});
