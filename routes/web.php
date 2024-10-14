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

Route::get('/loadPerumahanDatatables', [HomeController::class, 'loadPerumahanDatatables'])->name('loadPerumahanDatatables');
Route::get('/perumahan', [HomeController::class, 'perumahan'])->name('perumahan');

Route::get('/infografis', [HomeController::class, 'infografis'])->name('infografis');

Route::get('/webgis', GisController::class)->name('webgis');

Route::get('/more-info/{type}', [HomeController::class, 'moreInfo'])->name('more.info');
