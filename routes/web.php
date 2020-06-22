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

Route::get('/', function(){
    return view('welcome');
});

Route::get('admin', 'PagesController@admin')->middleware(['role', 'auth'])->name('admin.index');

//Keuangan
Route::resource('admin/keuangan/kategori', 'Keuangan\KategoriKeuanganController')->middleware(['role', 'auth']);
Route::resource('admin/keuangan/biaya', 'Keuangan\BiayaController')->middleware(['role', 'auth']);
//END Keuangan

//Administrasi
Route::resource('admin/administrasi/jenisdokumen', 'Administrasi\JenisDokumenController')->middleware(['role', 'auth']);
Route::resource('admin/administrasi/dokumen/kegiatan', 'Administrasi\DokumentasiKegiatanController')->middleware(['role', 'auth']);
//END Administrasi

//Inventaris
Route::resource('admin/inventaris/jenisbarang', 'Inventaris\JenisBarangController')->middleware(['role', 'auth']);
Route::resource('admin/inventaris/lokasi', 'Inventaris\LokasiController')->middleware(['role', 'auth']);
Route::resource('admin/inventaris/sumberbarang', 'Inventaris\SumberBarangController')->middleware(['role', 'auth']);
// Route::get('/santri', 'PagesController@santri');
// Auth::routes();

Route::get('profil/index', function(){
    return view('profil/profil');
})->middleware(['auth'])->name('profil/index');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
