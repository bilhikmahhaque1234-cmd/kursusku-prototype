# KursusKu Prototype

Project praktikum Mata Kuliah Bahasa Pemrograman III (PHP/MySQL).

## Deskripsi

KursusKu Prototype adalah project website sederhana untuk praktikum PHP dan HTML. Project dikembangkan secara bertahap menggunakan Laragon sebagai web server lokal.

## Teknologi

- PHP
- HTML
- Laragon
- Git & GitHub

## Menjalankan Project

1. Simpan project di folder `D:\laragon\www\kursusku-prototype`
2. Jalankan Laragon.
3. Klik **Start All**.
4. Buka project melalui browser.

## File Project

- `index.php` — halaman utama KursusKu
- `server-time.php` — contoh pemrosesan PHP server-side
- `fee-calculator.php` — kalkulator estimasi biaya
- `helpers.php` — function PHP reusable
- `test-functions.php` — pengujian function
- `assets/` — gambar dan video
- `evidence/` — dokumentasi hasil praktikum

## Week 3 — Kalkulator Estimasi Biaya

Pada Week 3, project KursusKu dikembangkan dengan menambahkan kalkulator estimasi biaya kursus menggunakan PHP. Perhitungan dilakukan berdasarkan biaya per peserta, jumlah peserta, persentase diskon, dan biaya administrasi.

### Rumus Perhitungan

- Subtotal = Biaya per peserta × Jumlah peserta
- Diskon = Subtotal × Persentase diskon / 100
- Total akhir = Subtotal − Diskon + Biaya admin

### Contoh Input

- Nama kursus: Laravel Fundamental
- Biaya per peserta: Rp350.000
- Jumlah peserta: 2
- Diskon: 10%
- Biaya admin: Rp25.000

### Hasil yang Diharapkan

- Subtotal: Rp700.000
- Diskon: Rp70.000
- Biaya admin: Rp25.000
- Total akhir: Rp655.000

### Pengujian

Kalkulator diuji menggunakan 5 test case dengan hasil 5/5 PASS. Pengujian mencakup kondisi normal, pemberian diskon, jumlah peserta lebih dari satu, nilai biaya Rp0, dan nilai biaya yang lebih besar.

Bukti pengujian terdapat pada folder `evidence/week-03/`.

## Week 4 — Katalog Kursus Data-Driven

Pada Week 4, katalog KursusKu dikembangkan dari data statis menjadi katalog berbasis array PHP. Data kursus disimpan dalam array dengan informasi kode, nama, biaya, kuota, jumlah peserta terdaftar, dan tanggal mulai. Data kemudian ditampilkan secara dinamis menggunakan `foreach`.

### Function Reusable

Project menggunakan empat function reusable:

- `rupiah()` — memformat nilai biaya menjadi format Rupiah.
- `statusKursus()` — menentukan status kursus menjadi `Penuh` atau `Tersedia`.
- `sisaKursi()` — menghitung jumlah kursi yang masih tersedia.
- `formatTanggal()` — mengubah format tanggal menjadi `dd-mm-yyyy`.

Nama kursus juga menggunakan `trim()` saat ditampilkan.

### Data Katalog

Katalog memiliki 6 kursus:

- Web Dasar
- PHP Dasar
- PHP Lanjutan
- Laravel Fundamental
- MySQL Dasar
- UI Web Dasar

Katalog menampilkan biaya, tanggal mulai, sisa kursi, dan status kursus secara dinamis.

### Pengujian

Empat function reusable diuji menggunakan 6 test sederhana. Seluruh pengujian menghasilkan **6/6 PASS**.

Bukti hasil praktikum terdapat pada folder `evidence/week-04/`.