<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\AdmindashboardController;
use App\Http\Controller\AdminbankdashboardController;
use App\Http\Controller\AdmindeveloperdashboardController;
use App\Http\Controller\AdminfasilitasdashboardController;
use App\Http\Controller\AdminkonsumendashboardController;
use App\Http\Controller\AdminpemesanandashboardController;
use App\Http\Controller\AdminpropertydashboardController;
use App\Http\Controller\AdmintransaksidashboardController;
use App\Http\Controller\LoginController;


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
use App\Http\Controllers\homeController;
Route::get('/', [homeController::class, 'index'])->name('home');
Route::get('/hubungi_kami', [homeController::class, 'hubungi_kami'])->name('hubungi_kami');
Route::get('/login', [homeController::class, 'login'])->name('login');
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

/*admin
use App\Http\Controllers\admindashboardcontroller;
Route::get('/admin', [admindashboardcontroller::class, 'index'])->name('admin');

use App\Http\Controllers\DevelopController;
Route::get('/developer', [DevelopController::class, 'index'])->name('develop');
*/

use App\Http\Controllers\DaftarController;
Route::resource('daftar',DaftarController::class);



Route::post('/kirimdata',[LoginController::class,'masuk'])->name('login');
Route::get('/keluar',[LoginController::class,'keluar']);

Route::get('login', function () {
    return view('user.login');
})->middleware('guest');




