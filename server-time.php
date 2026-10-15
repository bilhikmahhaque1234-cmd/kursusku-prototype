<?php
declare(strict_types=1);

require_once __DIR__ . '/helpers.php';

// Set timezone ke WIB
date_default_timezone_set('Asia/Jakarta');

$siteName = 'KursusKu Kubu Pisang City';
$year = date('Y');
$serverTime = date('Y-m-d H:i:s') . ' WIB';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Waktu Server - <?= htmlspecialchars($siteName) ?></title>

  <!-- Font Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

  <!-- File CSS Utama -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header>
    <nav aria-label="Navigasi utama">
      <a href="index.php"><strong><?= htmlspecialchars($siteName) ?></strong></a> 
      <a href="index.php#keunggulan">Keunggulan</a> 
      <a href="index.php#katalog">Katalog</a> 
      <a href="registration.php">Daftar Kursus</a> 
      <a href="history.php">History</a> 
      <a href="loop-lab.php">Loop Lab</a> 
      <a href="test-matrix.php">Test Matrix</a>
      <a href="fee-calculator.php">Estimasi Biaya</a> 
      <a href="index.php#kontak">Kontak</a>
    </nav>
  </header>

  <main class="container">
    <section class="page-intro">
      <p class="eyebrow">// PERTEMUAN 2 - WAKTU SERVER</p>
      <h1>PHP Diproses oleh Server</h1>
      <p>Demonstrasi eksekusi skrip dinamis di sisi server.</p>
    </section>

    <section class="form-card" style="max-width: 600px; margin: 0 auto; text-align: center;">
      <p class="server-time" style="font-size: 1.25rem; margin-bottom: 1rem;">
        Waktu server: <strong style="color: var(--accent-orange, #f39c12);"><?= htmlspecialchars($serverTime) ?></strong>
      </p>

      <p style="margin-bottom: 1.5rem; opacity: 0.9;">
        Refresh halaman beberapa detik kemudian. Nilai berubah karena fungsi <code>date()</code> dijalankan ulang oleh PHP pada setiap request.
      </p>

      <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
        <a class="btn-primary" href="server-time.php">Refresh Halaman</a>
        <a class="btn-primary" href="index.php" style="background: transparent; border: 1px solid currentColor;">Kembali ke Beranda</a>
      </div>
    </section>
  </main>

  <footer>
    <small>&copy; <?= $year ?> <?= htmlspecialchars($siteName) ?></small>
  </footer>
</body>
</html>