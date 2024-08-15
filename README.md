Sistem Pendukung Keputusan dengan metode Weighted Product | Decision Support System with Weighted Product method
---------------------------------------------

<p align="center">
    <img src="https://github.com/MuhammadRizki8/DSS-Qurban/assets/100481579/67cd9202-610c-4ce2-92c0-0c9d82674ade" alt="image1" width="45%"/>
    <img src="https://github.com/MuhammadRizki8/DSS-Qurban/assets/100481579/894f52a1-8da0-453d-b6dc-87a89b63b44e" alt="image2" width="45%"/>
</p>
<p align="center">
    <img src="https://github.com/MuhammadRizki8/DSS-Qurban/assets/100481579/0ca5d3ea-e2e4-40d7-975a-e6bd5d34b62b" alt="image3" width="45%"/>
    <img src="https://github.com/MuhammadRizki8/DSS-Qurban/assets/100481579/3fe24daf-b1dc-4cbf-8dfb-8f80476b4be3" alt="image4" width="45%"/>
</p>
<p align="center">
    <img src="https://github.com/MuhammadRizki8/DSS-Qurban/assets/100481579/8c08302b-6c48-4d7b-8cbb-77b5244125ee" alt="image3" width="45%"/>
    <img src="https://github.com/MuhammadRizki8/DSS-Qurban/assets/100481579/120f3c83-2051-4040-ade5-ee018a832153" alt="image4" width="45%"/>
</p>

## Deskripsi Proyek
Proyek ini bertujuan untuk membuat sebuah aplikasi web yang membantu dalam pengambilan keputusan dengan menggunakan metode Weighted Product. Metode ini digunakan untuk mengevaluasi alternatif berdasarkan beberapa kriteria yang memiliki bobot masing-masing.

## Link Slide & Jurnal
> https://drive.google.com/file/d/1ermjAqdcBycbcCIW21tDnyIO9J11ntkN/view?usp=sharing
> https://drive.google.com/file/d/1EjqrAtHxt_yRqTcSG2OKo6BXWT3J_5V_/view?usp=sharing

## Fitur Utama
1. **Pengelolaan Alternatif**
   - Tambah, edit, dan hapus alternatif.
2. **Pengelolaan Kriteria**
   - Tambah, edit, dan hapus kriteria beserta bobotnya.
3. **Penilaian Alternatif**
   - Form untuk memberikan penilaian setiap alternatif terhadap kriteria.
4. **Hasil Keputusan**
   - Menampilkan hasil keputusan dalam bentuk tabel.

## Instalasi
### Prasyarat
- PHP >= 7.3
- Composer
- MySQL atau SQLite
- Node.js & NPM (untuk frontend)

Set up website
-------------------------------------------
- Clone repo & buka sourcee code
  > git clone https://github.com/MuhammadRizki8/DSS-Qurban.git
  > 
  > cd DSS-Qurban
  > 
  > code .
- Setup .env file
  duplikat .env.example file lalu rename menjadi .env
  jika ingin menggunakan sqlite, ubah kode berikut
  ```
    # DB_CONNECTION=mysql
    # DB_HOST=127.0.0.1
    # DB_PORT=3306
    # DB_DATABASE=dss_qurban
    # DB_USERNAME=root
    # DB_PASSWORD=
    
    DB_CONNECTION=sqlite
    # DB_HOST=localhost
    # DB_PORT=3306
    # DB_DATABASE=dss_qurban
    # DB_USERNAME=root
    # DB_PASSWORD=
  ```
- commands
  ```
  composer install
  php artisan key:generate
  php artisan migrate
  php artisan db:seed
  php artisan serve
  ```
--------------------------------------
Testcase ada di folder testcase 
--------------------------------------

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[WebReinvent](https://webreinvent.com/)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Jump24](https://jump24.co.uk)**
-   **[Redberry](https://redberry.international/laravel/)**
-   **[Active Logic](https://activelogic.com)**
-   **[byte5](https://byte5.de)**
-   **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

# The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


