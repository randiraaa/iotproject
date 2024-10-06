<?php

use App\Http\Controllers\SensorLaravel;
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
    return view('monitoring');
});

// Route untuk membaca suhu
Route::get('/bacasuhu', [SensorLaravel::class, 'bacasuhu']);

// Route untuk membaca kelembaban
Route::get('/bacakelembaban', [SensorLaravel::class, 'bacakelembaban']);

// Route untuk menyimpan nilai sensor ke tb_sensor
Route::get('/simpan/{nilaisuhu}/{nilaikelembaban}', [SensorLaravel::class, 'simpansensor']);
