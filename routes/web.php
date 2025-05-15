<?php


use App\Http\Controllers\IndraController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginDosenController;
use App\Http\Controllers\LoginMahasiswaController;
use App\Http\Controllers\OrangController;
use App\Http\Controllers\DashboardDosenController;
use App\Http\Controllers\DatadosenController;
use App\Http\Controllers\DatakelasController;
use App\Http\Controllers\DatamahasiswaController;
use App\Http\Controllers\DataprodiController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\TambahdosenController;
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
    return view('login');
});

//Router Dashboard
Route::get('/dashboard_dosen', function () {
    return view('dashboard_dosen');
});
Route::get('/dashboard_mahasiswa', function () {
    return view('dashboard_mahasiswa');
});

Route::get('/cetakKHS', function () {
    return view('cetakKHS');
});


//Route Penilaian
Route::resource('nilai', PenilaianController::class);


Route::resource('dosen', DatadosenController::class);
//  Route::post('/dosen', [DatadosenController::class, 'store'])->name('dosen.tambahdosen.store');




Route::resource('mahasiswa', DatamahasiswaController::class);



//route matkul
Route::resource('matakuliah', MatakuliahController::class);

//Route Prodi
Route::resource('prodi', DataprodiController::class);


Route::resource('kelas', DatakelasController::class);



Route::resource('login', LoginController::class);

Route::resource('login_dosen', LoginDosenController::class);
Route::resource('login_mahasiswa', LoginMahasiswaController::class);
// Router::resource('penilaian', PenilaianController::class);

// Route::resource('dashboard_dosen',DashboardDosenController::class);
// Route::get('/dashboar_dosen', [DashboardDosenController::class, 'index']);
// Route::get('/indra',[IndraController::class,'index']);