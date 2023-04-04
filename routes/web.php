<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthMasyarakatController;
use App\Http\Controllers\DetailLaporanController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PetugasAuthController;

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
    return view('masyarakat.home');
})->middleware('auth.masyarakat');
Route::get('/petugas', function () {
    return view('masyarakat.petugas');
})->middleware('auth.masyarakat');

Route::get('/pengaturan', function () {
    return view('masyarakat.pengaturan');
})->middleware('auth.masyarakat');

Route::get('/login', function () {
    return view('masyarakat.auth.login');
});
Route::get('/register', function () {
    return view('masyarakat.auth.register');
});

Route::post('/register',[AuthMasyarakatController::class,'register'])->name('register.masyarakat');
Route::post('/login',[AuthMasyarakatController::class,'login'])->name('login');
Route::get('/logout',[AuthMasyarakatController::class,'logout'])->name('logout');




Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth.petugas');
Route::get('/admin/laporan', function () {
    return view('admin.laporan');
})->middleware('auth.petugas');

Route::get('/admin/pdf/{id}',[PDFController::class,'buatPdf']);


// Route::get('/admin/laporan/{id}',[DetailLaporanController::class,'index'])->middleware('auth.petugas');
// Route::post('/admin/laporan/unverified/{id}',[DetailLaporanController::class,'Unverified'])->middleware('auth.petugas')->name('unverified');
// Route::post('/admin/laporan/verified/{id}',[DetailLaporanController::class,'Verified'])->middleware('auth.petugas')->name('verified');
// Route::post('/admin/laporan/tanggapan/{id}',[DetailLaporanController::class,'Tanggapan'])->middleware('auth.petugas')->name('tanggapan');
// Route::delete('/admin/laporan/hapus/{id}',[DetailLaporanController::class,'Delete'])->middleware('auth.petugas')->name('delete');

Route::get('/admin/registrasi', function () {
    return view('admin.registrasi');
})->middleware(['auth.petugas','auth.admin']);
Route::get('/admin/petugas', function () {
    return view('admin.petugas');
})->middleware(['auth.petugas','auth.admin']);

Route::post('/admin/login',[PetugasAuthController::class,'login'])->name('login.petugas');
Route::get('/admin/logout',[PetugasAuthController::class,'logout'])->name('logout.admin');

Route::get('/admin/login', function () {
    return view('admin.auth.login');
});
