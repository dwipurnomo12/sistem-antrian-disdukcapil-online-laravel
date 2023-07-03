<?php

use App\Models\Layanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\DaftarAntrianController;
use App\Http\Controllers\Dashboard\DashboardAntrianController;
use App\Http\Controllers\Dashboard\DashboardAntrianMasukController;
use App\Http\Controllers\Dashboard\DashboardLayananController;
use App\Http\Controllers\DisplayPanggilanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route Halaman Utama/Home Depan
Route::get('/', function () {
    return view('index');
});

// Route Halaman /home akan otomatis redirect ke view index
Route::get('/home', function () {
    return view('index');
});

// Route Halaman view contact
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/display-panggilan/get-nomor-antrian', [DisplayPanggilanController::class, 'getNomorAntrianDipanggil']);
Route::resource('/display-panggilan', DisplayPanggilanController::class);

// Route halaman antrian untuk masyarakat/pengambil antrian
Route::get('/daftar-antrian', [DaftarAntrianController::class, 'index']);
Route::get('/daftar-antrian/{antrian:slug}', [DaftarAntrianController::class, 'show']);
Route::get('/antrian', [AntrianController::class, 'index']);  

Auth::routes();

// Route untuk admin, hanya Admin yang bisa mengakses halaman-halaman ini
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/antrian/checkSlug', [DashboardAntrianController::class, 'checkSlug']);
    Route::get('/api/dashboard/antrian', [DashboardAntrianController::class, 'getAutoCompleteData']);
    Route::resource('/dashboard/antrian', DashboardAntrianController::class);
    Route::resource('/dashboard/layanan', DashboardLayananController::class);
    Route::get('/dashboard/antrian-masuk/{antrian:slug}', [DashboardAntrianMasukController::class, 'index']);
    Route::DELETE('/dashboard/antrian-masuk/{antrian:id}', [DashboardAntrianMasukController::class, 'destroy'])->name('antrian.destroy');
    Route::PUT('/dashboard/antrian-masuk/{antrian:id}/skip', [DashboardAntrianMasukController::class, 'skip'])->name('antrian.skip');
    Route::DELETE('/dashboard/antrian-masuk/{slug}/reset', [DashboardAntrianMasukController::class, 'reset']);
});

// Route untuk user, hanya User/Pengambil Antrian yang bisa mengakses halaman-halaman ini
Route::middleware(['auth', 'role:masyarakat'])->group(function () {
    Route::get('/antrian/create/{id}', [AntrianController::class, 'create']);  
    Route::POST('/antrian', [AntrianController::class, 'store'])->name('store.antrian');  
    Route::get('/antrian/detail', [AntrianController::class, 'detail']);
    Route::DELETE('/antrian/detail/{id}', [AntrianController::class, 'destroy']);
    Route::get('/antrian/kode-antrian/{id}', [AntrianController::class, 'cetakKodeAntrian']);
});