<?php

use App\Http\Controllers\FrontendHomeController;
use App\Http\Controllers\FrontendBeritaController;
use App\Http\Controllers\FrontendKategoriController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Models\Berita;
use App\Models\Kategori;
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

### FRONTEND
Route::get('/', [FrontendHomeController::class, 'index'])->name('frontend.home');
Route::get('/indeks', [FrontendHomeController::class, 'indeks_berita'])->name('frontend.indeks');
Route::get('/kategori/{kategori:slug}', [FrontendKategoriController::class, 'index'])->name('frontend.kategori');
Route::get('/berita/{berita:slug}', [FrontendBeritaController::class, 'index'])->name('frontend.berita');
Route::get('/register', [RegisterController::class,'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class,'logout'])->name('logout');

### ADMIN
Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('berita', AdminBeritaController::class)->name('*','berita');

    Route::get('/berita/edit/{id_berita}', [AdminBeritaController::class,'edit'])->name('berita.edit');
    Route::post('/berita/update', [AdminBeritaController::class, 'update'])->name('berita.update');
    Route::get('/berita/headline/set/{id_berita}', [AdminBeritaController::class, 'set_headline'])->name('berita.set-headline');
    Route::get('/berita/headline/unset/{id_berita}', [AdminBeritaController::class, 'unset_headline'])->name('berita.unset-headline');
    Route::get('/berita/berita-pilihan/set/{id_berita}', [AdminBeritaController::class, 'set_berita_pilihan'])->name('berita.set-berita-pilihan');
    Route::get('/berita/berita-pilihan/unset/{id_berita}', [AdminBeritaController::class, 'unset_berita_pilihan'])->name('berita.unset-berita-pilihan');
    Route::get('/berita/hapus/{id_berita}', [AdminBeritaController::class,'destroy'])->name('berita.destroy');

    Route::resource('kategori', AdminKategoriController::class)->name('*','kategori');
    Route::get('/kategori/edit/{id_kategori}', [AdminKategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategori/update', [AdminKategoriController::class, 'update'])->name('kategori.update');
});