<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GisController;

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

Route::get('/',HomeController::class)->name('index');

Route::get('/loadPsuDatatables', [HomeController::class, 'loadPsuDatatables'])->name('loadPsuDatatables');
Route::get('/psu', [HomeController::class, 'psu'])->name('psu');
Route::get('/psu/{id}', [HomeController::class, 'psuDetail'])->name('psu.show');

Route::get('/loadPerumahanDatatables', [HomeController::class, 'loadPerumahanDatatables'])->name('loadPerumahanDatatables');
Route::get('/perumahan', [HomeController::class, 'perumahan'])->name('perumahan');
Route::get('/perumahan/{id}', [HomeController::class, 'perumahanDetail'])->name('perumahan.show');

Route::get('/loadRumahSewaDatatables', [HomeController::class, 'loadRumahSewaDatatables'])->name('loadRumahSewaDatatables');
Route::get('/rumah-sewa', [HomeController::class, 'rumahSewa'])->name('rumah-sewa');
Route::get('/rumah-sewa/{id}', [HomeController::class, 'rumahSewaDetail'])->name('rumah-sewa.show');

Route::get('/rumah-susun', [HomeController::class, 'rumahSusun'])->name('rumah-susun');
Route::get('/rumah-susun/{id}', [HomeController::class, 'rumahSusunDetail'])->name('rumah-susun.show');

Route::get('/rtlh-realisasi', [HomeController::class, 'rtlhRealisasi'])->name('rtlh-realisasi');

Route::get('/infografis', [HomeController::class, 'infografis'])->name('infografis');

Route::get('/webgis', GisController::class)->name('webgis');

Route::get('/more-info/{type}', [HomeController::class, 'moreInfo'])->name('more.info');
