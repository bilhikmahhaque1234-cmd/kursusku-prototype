# Evidence Status Pertemuan 7

Bukti source, diagram MVC, preview Blade, README, dan Git sudah disiapkan.

`php artisan route:list` belum dapat dijalankan di build environment karena Composer/vendor tidak tersedia.
Saya tidak menggantinya dengan screenshot runtime palsu. File `05-route-verification.png` berisi
source-level verification yang benar-benar dijalankan.

Setelah membuka project di komputer Anda:
1. `composer install`
2. salin `.env.example` menjadi `.env`
3. `php artisan key:generate`
4. `php artisan serve`
5. `php artisan route:list`
6. ambil screenshot runtime untuk mengganti/menambah evidence route-list.