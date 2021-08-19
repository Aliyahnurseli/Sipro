<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdmindashboardController;
use App\Http\Controllers\AdminbankController;
use App\Http\Controllers\AdmindeveloperController;
use App\Http\Controllers\AdminfasilitasController;
use App\Http\Controllers\AdminkonsumenController;
use App\Http\Controllers\AdminpemesananController;
use App\Http\Controllers\AdminpropertyController;
use App\Http\Controllers\AdmintransaksiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\KonsumenController;


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

// home sipro 

Route::resource('/',homeController::class);
//Route::get('/', [homeController::class, 'index'])->name('home');
Route::get('/hubungi_kami', [homeController::class, 'hubungi_kami'])->name('hubungi_kami');

Route::get('/daftar', [homeController::class, 'daftar'])->name('daftar');
Route::get('/syaratdanketentuan', [homeController::class, 'syaratdanketentuan'])->name('syaratdanketentuan');
Route::get('/profil', [homeController::class, 'profil'])->name('profil');
Route::get('/maintenance', [homeController::class, 'maintenance'])->name('maintenance');

Route::group(['prefix'=> 'admin',  'middleware'=> 'auth:admin'], function()
{
    Route::resource('dashboard',AdmindashboardController::class);
    Route::resource('developer',AdmindeveloperController::class);
    Route::resource('konsumen',AdminkonsumenController::class);
    Route::resource('pemesanan',AdminpemesananController::class);
    Route::resource('property',AdminpropertyController::class);
    Route::resource('fasilitas',AdminfasilitasController::class);
    Route::resource('transaksi',AdmintransaksiController::class);
    Route::resource('bank',bankController::class);
});



//admin
//use App\Http\Controllers\admindashboardcontroller;
Route::get('/admin', [admindashboardcontroller::class, 'index'])->name('admin');

use App\Http\Controllers\DevelopController;
Route::get('/developer', [DevelopController::class, 'index'])->name('develop');




Route::resource('daftar',DaftarController::class);

// Route::get('/login', function () {
//     return view('login');
// })->middleware('guest');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/masuk',[LoginController::class,'masuk']);
Route::get('/keluar',[LoginController::class,'keluar']);







