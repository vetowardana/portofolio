<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontController@index')->name('/');
Route::resource('front', 'FrontController');

// Login
Route::get('login', 'LoginController@index')->name('login');
Route::post('postlogin', 'LoginController@postLogin')->name('postlogin');
Route::get('logout', 'LoginController@logout')->name('logout');

// Auth
Route::group(['middleware' => 'auth'], function() {
	// Dashboard
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');
	// Pengaturan Akun
	Route::get('pengaturan', 'PengaturanController@index')->name('pengaturan');
	Route::post('ubahnama', 'PengaturanController@ubahNama')->name('ubahnama');
	Route::post('ubahpassword', 'PengaturanController@ubahPassword')->name('ubahpassword');
	Route::post('ubahgambar', 'PengaturanController@ubahGambar')->name('ubahgambar');
	// Manajemen akun
	Route::resource('manajemenakun', 'ManajemenakunController');
	// Manajemen Artikel
	Route::resource('artikel', 'ArtikelController');
});

