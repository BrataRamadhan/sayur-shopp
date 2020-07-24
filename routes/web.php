<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Auth Routing
Auth::routes();

// Client Routing
Route::get('/', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('profile/', 'HomeController@profile')->name('profile');
Route::get('update-profile/{id}', 'HomeController@update')->name('update-profile');
Route::put('updatedata/{id}', 'HomeController@updateData')->name('updatedata');
//Pesan Barang
Route::get('/pesan/{id}', 'PesanController@order')->name('pesan');
Route::post('/pesan/{id}', 'PesanController@orderitem');
//Check Out Barang
Route::get('check-out', 'PesanController@check_out')->name('checkout');
// Delete Pesanan Barang
Route::delete('check-out/{id}', 'PesanController@deleteitem');
// Konfirmasi barang
Route::get('konfirmasi-barang', 'PesanController@confirm');
// Result Transaksi
Route::get('result/{id}', 'PesanController@result_transaksi')->name('result_transaksi');
// Cari
Route::get('/cari', 'HomeController@cari')->name('cari_barang');
//ongkir
Route::get('ongkir','OngkirController@ongkir');




// Admin Routing
Route::middleware('is_admin')->group(function () {
    Route::get('/admin/dashboard', 'AdminController@index')->name('dashboard');
    Route::get('/admin/data_barang', 'AdminController@dataBarang')->name('data_barang');
    Route::get('/admin/kategori', 'AdminController@dataKategori')->name('data_kategori');
    Route::get('/admin/verifikasi_pembayaran', 'AdminController@verifikasi_pembayaran')->name('verifikasi');
    Route::post('/admin/verifikasi_pembayaran', 'PesanController@verifikasi_pembayaran')->name('verifikasi_post');
    // add barang
    // Route::get('/addBarang', 'AdminController@createBarang')->name('create');
    Route::get('/admin/tambah_barang', 'AdminController@tambah_barang')->name('create');
    Route::post('/admin/tambah_barang', 'BarangController@store')->name('store');
    // edit barang
    Route::get('/admin/edit_barang/{id}', 'AdminController@edit_barang')->name('edit');
    Route::put('/admin/update-data/{id}', 'BarangController@update')->name('update-data');
    // Hapus Barang
    Route::delete('delete/{id}', 'BarangController@delete')->name('delete');
    //tambah kategori
    Route::get('/admin/tambah_kategori', 'KategoriController@create')->name('tambah_kategori');
    Route::post('/admin/tambah_kategori', 'KategoriController@store')->name('store');
});
