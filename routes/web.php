<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdminArtikelController;
use App\Http\Controllers\AdminGuruController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminKefoController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminSiswaController;
use App\Http\Controllers\AdminSlideController;
use App\Http\Controllers\AdminStaffController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KefoController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

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

Route::get('/', [HomeController::class, 'home']);
Route::get('/profil/about', [HomeController::class, 'about']);
Route::get('/profil/sejarah', [HomeController::class, 'sejarah']);
Route::get('/profil/visi-misi', [HomeController::class, 'visiMisi']);
Route::get('/profil/guru', [HomeController::class, 'guru']);
Route::get('/profil/staff', [HomeController::class, 'staff']);
Route::get('/profil/struktur-organisasi', [HomeController::class, 'struktur']);
Route::get('/kontak', [HomeController::class, 'kontak']);

Route::get('/sitemap', function() {
    SitemapGenerator::create('http://127.0.0.1:8000/')->writeToFile('public/sitemap.xml');
    return "Success";
});


Route::get('/linagar', [ArtikelController::class, 'index']);
Route::get('/linagar/{artikel:slug}', [ArtikelController::class, 'show']);

Route::get('/kefo', [KefoController::class, 'index']);
Route::get('/kefo/{kefo:slug}', [KefoController::class, 'show']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index']);

    Route::get('linagar/publish', [AdminArtikelController::class, 'publish']);
    Route::get('/linagar/checkSlug', [AdminArtikelController::class, 'checkSlug']);
    Route::resource('/linagar', AdminArtikelController::class)->name('index', 'artikel.index');

    Route::get('/kategori/slugKategori', [AdminKategoriController::class, 'slugKategori']);
    Route::get('/list-kategori', [AdminKategoriController::class, 'list']);
    Route::resource('/kategori', AdminKategoriController::class)->except('show');

    Route::resource('/slide', AdminSlideController::class)->except('show');

    Route::get('/user/change-password-admin/{user:username}', [AdminUserController::class, 'adminPassword']);
    Route::post('/user/change-password-admin/{user:username}', [AdminUserController::class, 'adminPasswordUpdate']);
    Route::resource('/user', AdminUserController::class)->except('show');

    Route::get('/kefo/publish', [AdminKefoController::class, 'publish']);
    Route::resource('/kefo', AdminKefoController::class);
    Route::resource('/siswa', AdminSiswaController::class)->except(['create', 'show', 'store', 'destroy']);
    Route::resource('/guru', AdminGuruController::class);
    Route::resource('/staff', AdminStaffController::class);

    Route::get('/ubah-password', [AdminProfileController::class, 'index']);
    Route::post('ubah-password', [AdminProfileController::class, 'rubahPassword']);
});
