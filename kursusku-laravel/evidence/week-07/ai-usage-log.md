# AI Usage Log - Praktikum Pertemuan 7 (KursusKu Laravel)

AI dipakai sebagai tutor dan partner debugging, bukan untuk membuat seluruh aplikasi. Setiap saran dijalankan sendiri, diuji di komputer, lalu dijelaskan kembali.

> Catatan: waktu di bawah adalah perkiraan. Sesuaikan dengan kondisi sebenarnya sebelum dikumpulkan.

| Waktu | Masalah/tujuan | Prompt singkat | Apa yang diterima/ditolak |
|---|---|---|---|
| 10:30 | Folder `kursusku-laravel` tidak terbaca / kosong di VS Code | "kursusku-laravel tidak terbaca di visual studio atau isi file kosong" | **Diterima:** pakai VS Code (bukan Visual Studio), cek isi folder dengan `dir`, buka folder yang berisi `artisan`. |
| 10:46 | Tampilan folder `evidence\week-07` tergabung di VS Code | "buatkan agar tampilan week-07 seperti di gambar" | **Diterima:** matikan setting `Explorer: Compact Folders`. Hanya mengubah tampilan, bukan struktur folder. |
| 11:00 | `kursusku-laravel.test` tidak bisa dibuka (`DNS_PROBE_FINISHED_NXDOMAIN`) | "tampilannya" (kirim screenshot error) | **Diterima:** pakai `php artisan serve`. **Tidak dipakai:** pengaturan virtual host Laragon, karena `serve` sudah cukup. |
| 11:07 | Browser menampilkan teks kode `public function index() {...}`, bukan landing page | "??" / "belum ada perubahan" | **Ditolak:** dugaan awal bahwa `HomeController` atau `home.blade.php` yang salah. Setelah dicek dengan `type`, kedua file sudah benar. **Diterima:** pemeriksaan `route:list`, `type routes\web.php`, dan `dir public`. |
| 11:12 | `ERR_CONNECTION_REFUSED` di port 8001 | "begini jadinya" | **Diterima:** server harus tetap berjalan, jangan tekan `Ctrl + C`. **Diabaikan:** `netstat` dan `taskkill`, karena tidak ada server lama di port 8000. |
| 11:17 | Penyebab sebenarnya teks kode di browser | kirim hasil `dir public` | **Diterima:** `public/index.php` tertimpa kode method `index()`. Perbaikan dengan `git checkout -- public/index.php`, lalu `php artisan optimize:clear`. |
| 11:21 | Tampilan polos dan gambar hero rusak | "code mana yang diubah" | **Diterima:** isi `style.css`, ubah judul section, dan ganti badge kode kursus. Gambar hero diperiksa lewat `dir public\images`. |
| 11:25 | Gambar hero masih foto basket, bukan papan tulis | "gambar 1 harus sama persis dengan gambar 2" | **Diterima:** timpa `public/images/hero-kursus.jpg` dengan gambar asli dari prototype. |
| 11:40 | Tema warna CSS yang berbeda | "buatkan css seperti ini dengan tema warna yang berbeda" | **Diterima:** tema Samudra (biru laut dan oranye) lewat variabel di `:root`. Warna diatur ulang sendiri sesuai selera. |
| 12:00 | Dokumen evidence: README, git log, diagram lifecycle | "buatkan readme.git.png", "07-mvc-flow" | **Diterima:** README, halaman preview, dan diagram. **Tidak dibuat AI:** hasil `git log --oneline -5`, karena harus dari terminal sendiri. |

## Yang saya pelajari

- Semua request Laravel masuk lewat `public/index.php`. Jika file ini rusak, perubahan di route, controller, dan Blade tidak berefek.
- Memeriksa file dengan `type` dan `route:list` lebih andal daripada menebak dari tampilan browser.
- `php artisan serve` hanya hidup selama terminalnya terbuka.
- `asset()` membaca file dari folder `public`, jadi CSS dan gambar harus ada di sana.