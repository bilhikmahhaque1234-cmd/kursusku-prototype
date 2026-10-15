<?php
// process.php
require_once __DIR__ . '/helpers.php';

// Menetapkan status HTTP 422 untuk pengujian validasi
http_response_code(422);

$siteName = 'KursusKu Kubu Pisang City';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Process Validation - <?= e($siteName) ?></title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="container" style="padding: 2rem;">
  <h1>Simulasi Validasi Error HTTP 422 (Soal 28)</h1>
  <p>Halaman ini menetapkan status HTTP <strong>422 (Unprocessable Entity)</strong>.</p>
  <p>Buka <strong>DevTools (F12) &rarr; Tab Network</strong> di browser saat membuka halaman ini untuk mengambil <em>screenshot</em> bukti status code 422.</p>
  <a href="index.php" class="btn-primary">Kembali ke Beranda</a>
</body>
</html>