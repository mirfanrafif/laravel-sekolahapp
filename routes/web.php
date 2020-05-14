<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::resource('/admin/kelas', 'KelasController')->middleware('auth');
Route::resource('/admin/siswa', 'SiswaController')->middleware('auth');
Route::resource('/admin/nilai', 'NilaiController')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');
