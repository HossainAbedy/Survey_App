<?php

use Illuminate\Http\Request;
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
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');
// Route::get('{path}', 'HomeController@index')->where( 'path' , '([A-z\d\-\/_.]+)?' );
Route::get('import-export', 'ImportExportController@importExport');
Route::post('import', 'ImportExportController@import');
Route::get('export', 'ImportExportController@export');
