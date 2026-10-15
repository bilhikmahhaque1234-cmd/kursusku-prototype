<?php
// history.php
session_start();

require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu Kubu Pisang City';
$year = date('Y');

$defaultHistory = [
    [
        'name'     => 'Alya',
        'email'    => 'alya@gmail.com',
        'course'   => 'Web Dasar',
        'type'     => 'Mahasiswa',
        'packages' => 1,
        'total'    => 160000,
        'date'     => '01-10-2026 09:00'
    ],
    [
        'name'     => 'Bima',
        'email'    => 'bima@gmail.com',
        'course'   => 'PHP Dasar',
        'type'     => 'Guru',
        'packages' => 1,
        'total'    => 212500,
        'date'     => '02-10-2026 14:20'
    ],
    [
        'name'     => 'Citra',
        'email'    => 'citra@gmail.com',
        'course'   => 'Laravel Fundamental',
        'type'     => 'Umum',
        'packages' => 1,
        'total'    => 350000,
        'date'     => '03-10-2026 11:15'
    ]
];

$sessionHistory = $_SESSION['history_data'] ?? [];
$allHistory = array_merge($sessionHistory, $defaultHistory);
?>
<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>History - <?= htmlspecialchars($siteName) ?></title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  
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
      <p class="eyebrow">// RIWAYAT PENDAFTARAN</p>
      <h1>History Pendaftaran Kursus</h1>
      <p>Menampilkan riwayat data pendaftaran peserta dari formulir dan data sistem.</p>
    </section>

    <section class="form-card">
      <div class="katalog-header" style="margin-bottom: 1.5rem;">
        <h2>Daftar Peserta Terdaftar (<?= count($allHistory) ?> Data)</h2>
        <a href="registration.php" class="btn-primary" style="font-size: 0.9rem;">+ Tambah Pendaftaran</a>
      </div>

      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Waktu</th>
            <th>Nama Pendaftar</th>
            <th>Kursus</th>
            <th>Tipe</th>
            <th>Jumlah</th>
            <th>Total Biaya</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($allHistory as $index => $item): ?>
            <tr>
              <td><?= $index + 1 ?></td>
              <td><small style="opacity: 0.8;"><?= htmlspecialchars($item['date']) ?></small></td>
              <td><strong><?= htmlspecialchars($item['name']) ?></strong><br><small style="opacity:0.7;"><?= htmlspecialchars($item['email']) ?></small></td>
              <td><?= htmlspecialchars($item['course']) ?></td>
              <td><span class="badge badge-available"><?= htmlspecialchars($item['type']) ?></span></td>
              <td><?= $item['packages'] ?> Paket</td>
              <td><strong><?= rupiah($item['total']) ?></strong></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div style="margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap;">
        <a href="registration.php" class="btn-primary">Ke Form Pendaftaran</a>
        <a href="index.php" class="btn-primary" style="background: transparent; border: 1px solid currentColor;">Kembali ke Beranda</a>
      </div>
    </section>
  </main>

  <footer>
    <small>&copy; <?= $year ?> <?= htmlspecialchars($siteName) ?></small>
  </footer>
</body>

</html>