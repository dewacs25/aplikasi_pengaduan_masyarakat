<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthMasyarakatController;
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
Route::get('/admin/registrasi', function () {
    return view('admin.registrasi');
})->middleware(['auth.petugas','auth.admin']);
Route::post('/admin/login',[PetugasAuthController::class,'login'])->name('login.petugas');
Route::get('/admin/logout',[PetugasAuthController::class,'logout'])->name('logout.admin');


Route::get('/admin/login', function () {
    return view('admin.auth.login');
});
