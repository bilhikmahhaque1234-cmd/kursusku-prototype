# KursusKu

Project praktikum Pemrograman Web III (Pertemuan 7): memindahkan prototype KursusKu dari PHP biasa ke Laravel dengan alur Route -> Controller -> Blade View.

## Requirement

- PHP 8.3 atau lebih baru
- Composer
- Laravel
- Laragon / web server lokal
- Git

## Cara Menjalankan

1. Buka terminal pada folder project.
2. Jalankan: `composer install`
3. Salin `.env.example` menjadi `.env` jika diperlukan.
4. Jalankan: `php artisan key:generate`
5. Jalankan: `php artisan serve`
6. Buka alamat yang ditampilkan terminal (umumnya http://127.0.0.1:8000).

## Fitur Milestone 7

- Named route `home`
- `HomeController@index`
- Blade landing page (`resources/views/home.blade.php`)
- Data kursus dikirim dari controller
- Asset CSS dan gambar di folder `public`

## Alur Request

Browser (GET /) -> `routes/web.php` (route `home`) -> `HomeController@index` -> `home.blade.php` -> HTML response ke browser.

## Struktur File Utama

| File | Fungsi |
|---|---|
| `routes/web.php` | Mendefinisikan route `home` |
| `app/Http/Controllers/HomeController.php` | Menyiapkan data kursus dan memanggil view |
| `resources/views/home.blade.php` | Menampilkan landing page |
| `public/css/style.css` | Gaya tampilan |
| `public/images/hero-kursus.jpg` | Gambar hero |

## Belum Dikerjakan

- Database
- CRUD
- Authentication
- Relasi data

## Evidence

Bukti praktikum tersimpan di `evidence/week-07/`.