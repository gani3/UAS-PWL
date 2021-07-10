<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\RakBukuController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\LoginController;
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

// frontend controller
Route::get('/',[FrontEndController::class, 'home']);
Route::get('/about',[FrontEndController::class, 'about']);
Route::get('/register',[FrontEndController::class, 'register']);
Route::get('/login',[FrontEndController::class, 'login'])->name('login');
Route::post('/insert',[FrontEndController::class, 'insert']);

// untuk login admin
Route::get('/admin',[LoginController::class, 'index'])->name('admin');
Route::post('/admin/postlogin',[LoginController::class, 'postlogin'])->name('postlogin');

// untuk masuk ke dashboard
// Auth::routes();
Route::get('/dashboard',[DashboardController::class, 'index']);

// routing menu anggota
Route::get('/anggota',[AnggotaController::class,'index'])->name('anggota');
Route::get('/anggota/detail/{id}',[AnggotaController::class,'detail']);
//memasukan data di form tambah ke database
Route::get('/anggota/tambah',[AnggotaController::class,'tambah']);
Route::post('/anggota/insert',[AnggotaController::class,'insert']);
//mengedit data di database
Route::get('/anggota/edit/{id}',[AnggotaController::class,'edit']);
Route::post('/anggota/update/{id}',[AnggotaController::class,'update']);
// menghapus data didabatase
Route::get('/anggota/hapus/{id}',[AnggotaController::class,'hapus']);




// routing menu pegawai
Route::get('/pegawai',[PegawaiController::class,'index'])->name('pegawai');
Route::get('/pegawai/detail/{id}',[PegawaiController::class,'detail']);
//memasukan data di form tambah ke database
Route::get('/pegawai/tambah',[PegawaiController::class,'tambah']);
Route::post('/pegawai/insert',[PegawaiController::class,'insert']);
//mengedit data di database
Route::get('/pegawai/edit/{id}',[PegawaiController::class,'edit']);
Route::post('/pegawai/update/{id}',[PegawaiController::class,'update']);
// menghapus data didabatase
Route::get('/pegawai/hapus/{id}',[PegawaiController::class,'hapus']);





// routing menu peminjaman
Route::get('/peminjaman',[PeminjamanController::class,'index'])->name('peminjaman');
Route::get('/peminjaman/detail/{id}',[PeminjamanController::class,'detail']);
//memasukan data di form tambah ke database
Route::get('/peminjaman/tambah',[PeminjamanController::class,'tambah']);
Route::post('/peminjaman/insert',[PeminjamanController::class,'insert']);
//mengedit data di database
Route::get('/peminjaman/edit/{id}',[PeminjamanController::class,'edit']);
Route::post('/peminjaman/update/{id}',[PeminjamanController::class,'update']);
// menghapus data didabatase
Route::get('/peminjaman/hapus/{id}',[PeminjamanController::class,'hapus']);
// export data didabatase
Route::get('/peminjaman/excel',[PeminjamanController::class,'excel']);
Route::get('/peminjaman/pdf',[PeminjamanController::class,'pdf']);





// routing menu pengembalian
Route::get('/pengembalian',[PengembalianController::class,'index'])->name('pengembalian');
Route::get('/pengembalian/detail/{id}',[PengembalianController::class,'detail']);
//memasukan data di form tambah ke database
Route::get('/pengembalian/tambah',[PengembalianController::class,'tambah']);
Route::post('/pengembalian/insert',[PengembalianController::class,'insert']);
//mengedit data di database
Route::get('/pengembalian/edit/{id}',[PengembalianController::class,'edit']);
Route::post('/pengembalian/update/{id}',[PengembalianController::class,'update']);
// menghapus data didabatase
Route::get('/pengembalian/hapus/{id}',[PengembalianController::class,'hapus']);
// export data didabatase
Route::get('/pengembalian/excel',[PengembalianController::class,'excel']);
Route::get('/pengembalian/pdf',[PengembalianController::class,'pdf']);





// routing menu rakbuku
Route::get('/rakbuku',[RakBukuController::class,'index'])->name('rakbuku');
Route::get('/rakbuku/detail/{id}',[RakBukuController::class,'detail']);
//memasukan data di form tambah ke database
Route::get('/rakbuku/tambah',[RakBukuController::class,'tambah']);
Route::post('/rakbuku/insert',[RakBukuController::class,'insert']);
//mengedit data di database
Route::get('/rakbuku/edit/{id}',[RakBukuController::class,'edit']);
Route::post('/rakbuku/update/{id}',[RakBukuController::class,'update']);
// menghapus data didabatase
Route::get('/rakbuku/hapus/{id}',[RakBukuController::class,'hapus']);




// routing menu buku
Route::get('/buku',[BukuController::class,'index'])->name('buku');
Route::get('/buku/detail/{id}',[BukuController::class,'detail']);
//memasukan data di form tambah ke database
Route::get('/buku/tambah',[BukuController::class,'tambah']);
Route::post('/buku/insert',[BukuController::class,'insert']);
//mengedit data di database
Route::get('/buku/edit/{id}',[BukuController::class,'edit']);
Route::post('/buku/update/{id}',[BukuController::class,'update']);
// menghapus data didabatase
Route::get('/buku/hapus/{id}',[BukuController::class,'hapus']);
