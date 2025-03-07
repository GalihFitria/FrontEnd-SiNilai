<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel 🔥🔥🔥

Laravel adalah framework PHP berbasis MVC (Model-View-Controller) yang dirancang untuk memudahkan pengembangan aplikasi web dengan sintaks yang elegan dan ekspresif. Laravel menyediakan berbagai fitur seperti routing, middleware, templating engine (Blade), ORM (Eloquent), sistem migrasi database, dan keamanan bawaan yang kuat.


## 📦 Instalasi Laravel dengan Laragon
**1. Pastikan Prasyarat Terpenuhi**
Sebelum menginstal Laravel menggunakan Laragon, pastikan sistem memiliki:
- Laragon (https://laragon.org/download/)
- PHP ≥ 8.0 (termasuk dalam Laragon)
- Composer (termasuk dalam Laragon)
- MySQL (dapat menggunakan database bawaan Laragon)
  
**2. Instal Laravel dengan Laragon**
- Buka Laragon, lalu klik Kanan → Quick App → Laravel
- Atau jalankan perintah di terminal Laragon: `laravel new nama_proyek`
  
**3. Membuat File baru**
- langsung membuat file yang berisikan model,migration,controller dan resource
  `php artisan make:model DataDosen -mcr`
  setelah menjalankan perintah tersebut, Laravel akan menghasilkan:
  1. Model → `app/Models/DataDosen.php`
  2. Migration → `database/migration/xxxx_xx_xx_xxxxxx_create_datadosens_table.php`
  3. Contoller → `app/Http/Controllers/DataDosenController.php'
- Membuat file view

  `php artisan make:view DataDosen`

  akan menghasilkan nama file `DataDosen.blade.php`
  
**4. Menjalankan Server Laravel**
- Masuk ke direktori proyek Laravel dan jalankan diterminal:
  
  `php artisan serve`
  Akses aplikasi melalui browser di `http://127.0.0.1:8000`
  
## 🚀 Struktur Folder Laravel
- `app/` : Berisi kode utama aplikasi
- `routes/` : Berisi file routing (web.php, api.php)
- `database/` : Berisi migrasi, seeder, dan model factory
- `resources/views/` : Berisi file Blade untuk tampilan UI
- `config/` : Berisi file konfigurasi aplikasi
- `.env` : File konfigurasi lingkungan (database, cache, dll.)

# Postman 🌐
Postman adalah alat yang digunakan untuk menguji API dengan mudah, memungkinkan pengembang untuk mengirim permintaan HTTP, melihat respons, dan melakukan debugging.
**Berikut langkah-langkah menggunakan Postman untuk menguji API yang dikirim dari backend (Laravel):**
1. Unduh dan instal (https://www.postman.com/downloads/)
2. Pastikan server Backend dan Frontend berjalan
   
   `php spark serve`

   `php artisan serve`

3. Import File Postman yang telah dikirim dari backend 
4. Uji API di `routes/web.php`

   `Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);`

## Mengirimkan Permintaan GET (Menampilkan Data)
1. Buka Postman
2. Pilih Metode GET
3. Masukkan URL API (jika postman tersebut sudah dari backend maka untuk URL otomatis sudah ada)

   `http://127.0.0.1:8000/api/users`

4. Klik Send
5. Jika berhasil, akan muncul data dari API dalam format JSON
