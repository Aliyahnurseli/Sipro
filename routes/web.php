<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/loginkonsumen', [homeController::class, 'loginkonsumen'])->name('loginkonsumen');
Route::get('/syaratdanketentuan', [homeController::class, 'syaratdanketentuan'])->name('syaratdanketentuan');
Route::get('/profil', [homeController::class, 'profil'])->name('profil');
Route::get('/maintenance', [homeController::class, 'maintenance'])->name('maintenance');


//admin
use App\Http\Controllers\admindashboardcontroller;
Route::get('/admin', [admindashboardcontroller::class, 'index'])->name('admin');

use App\Http\Controllers\DevelopController;
Route::get('/developer', [DevelopController::class, 'index'])->name('develop');

use App\Http\Controllers\DaftarController;
Route::resource('daftar',DaftarController::class);




