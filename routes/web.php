<?php


use App\Http\Controllers\IndraController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginDosenController;
use App\Http\Controllers\LoginMahasiswaController;
use App\Http\Controllers\OrangController;
use App\Http\Controllers\DashboardDosenController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\TambahdataController;
use App\Models\penilaian;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard_dosen', function () {
    return view('dashboard_dosen');
});

Route::get('/penilaian', function () {
    return view('penilaian');
});

Route::get('/tambahdata', function () {
    return view('tambahdata');
});

Route::get('/edit', function () {
    return view('edit');
});


Route::resource('orang', OrangController::class);

Route::resource('login', LoginController::class);

Route::resource('login_dosen', LoginDosenController::class);
Route::resource('login_mahasiswa', LoginMahasiswaController::class);
// Router::resource('penilaian', PenilaianController::class);

// Route::resource('dashboard_dosen',DashboardDosenController::class);
// Route::get('/dashboar_dosen', [DashboardDosenController::class, 'index']);
// Route::get('/indra',[IndraController::class,'index']);