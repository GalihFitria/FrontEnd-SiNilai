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
-- app/ : Berisi kode utama aplikasi

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
