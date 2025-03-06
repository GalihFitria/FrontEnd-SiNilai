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
Route::get('/penilaian', [PenilaianController::class, 'index']);
Route::get('/tambahdata', function () {
    return view('tambahdata');
});
Route::get('/edit', function () {
    return view('edit');
});

//Route Data Dosen
// Route::get('/datadosen', function () {
//     return view('datadosen');
// });
Route::get('/datadosen', [DatadosenController::class, 'index']);

Route::get('/editdosen', function () {
    return view('editdosen');
});
Route::get('/tambahdosen', function () {
    return view('tambahdosen');
});
//  Route::get('/tambahdosen', [TambahdosenController::class, 'index']);

use App\Http\Controllers\TambahdosenController;

// Route Data Dosen
// Route::get('/datadosen', [TambahdosenController::class, 'show'])->name('datadosen');
// Route::get('/tambahdosen', [TambahdosenController::class, 'index'])->name('tambahdosen');
// Route::post('/tambahdosen', [TambahdosenController::class, 'store'])->name('tambahdosen.store');
// Route::delete('/datadosen/{id}', [TambahdosenController::class, 'destroy'])->name('datadosen.destroy');


//return Data mahasiswa
Route::get('/datamahasiswa', [DatamahasiswaController::class, 'index']);
// Route::get('/datamahasiswa', function () {
//     return view('datamahasiswa');
// });
Route::get('/editmahasiswa', function () {
    return view('editmahasiswa');
});
Route::get('/tambahmahasiswa', function () {
    return view('tambahmahasiswa');
});


//route matkul
Route::get('/matakuliah', [MatakuliahController::class, 'index']);

Route::get('/editmatkul', function () {
    return view('editmatkul');
});
Route::get('/tambahmatkul', function () {
    return view('tambahmatkul');
});

//Route Prodi
Route::get('/dataprodi', [DataprodiController::class, 'index']);

Route::get('/editprodi', function () {
    return view('editprodi');
});
Route::get('/tambahprodi', function () {
    return view('tambahprodi');
});


//Route datakelas
Route::get('/datakelas', [DatakelasController::class, 'index']);

Route::get('/editkelas', function () {
    return view('editkelas');
});
Route::get('/tambahkelas', function () {
    return view('tambahkelas');
});


Route::resource('login', LoginController::class);

Route::resource('login_dosen', LoginDosenController::class);
Route::resource('login_mahasiswa', LoginMahasiswaController::class);
// Router::resource('penilaian', PenilaianController::class);

// Route::resource('dashboard_dosen',DashboardDosenController::class);
// Route::get('/dashboar_dosen', [DashboardDosenController::class, 'index']);
// Route::get('/indra',[IndraController::class,'index']);