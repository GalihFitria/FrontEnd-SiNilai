<?php

//import semua controller
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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CetakKHSController;
use Illuminate\Support\Facades\Session;
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

// Halaman login umum
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');

// Halaman login umum
Route::get('/', function () {
    return view('login');
})->name('login.dashboard');

// Halaman login dosen
Route::get('/login/dosen', [AuthController::class, 'showDosenLoginForm'])->name('login.dosen.form');

// Halaman login mahasiswa
Route::get('/login/mahasiswa', [AuthController::class, 'showMahasiswaLoginForm'])->name('login.mahasiswa.form');

// Proses login (form post dari login dosen/mahasiswa)
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard untuk dosen
Route::get('/dashboard/dosen', function () {
    if (Session::get('role') !== 'dosen') {
        return redirect()->route('login.form')->with('error', 'Akses ditolak.');
    }
    return view('dashboard_dosen');
})->name('dashboard.dosen');

// Dashboard untuk mahasiswa
Route::get('/dashboard/mahasiswa', function () {
    if (Session::get('role') !== 'mahasiswa') {
        return redirect()->route('login.form')->with('error', 'Akses ditolak.');
    }
    return view('dashboard_mahasiswa');
})->name('dashboard.mahasiswa');


//untuk membuat rute tunggal yang merespons permintaan GET
Route::get('/export-pdf', [CetakKHSController::class, 'exportPdf'])->name('export.pdf');



Route::resource('nilai', PenilaianController::class);

Route::resource('cetakKHS', CetakKHSController::class);

//membuat banyak route sekaligus
//resource mendefinisikan semua rute yg diperlukan untuk operasi CRUD 
Route::resource('dosen', DatadosenController::class);

Route::resource('mahasiswa', DatamahasiswaController::class);
Route::resource('matakuliah', MatakuliahController::class);
Route::resource('prodi', DataprodiController::class);
Route::resource('kelas', DatakelasController::class);
