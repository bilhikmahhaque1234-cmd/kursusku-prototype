<?php
// loop-lab.php
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu Kubu Pisang City';
$year = date('Y');

$forItems = [];
for ($i = 1; $i <= 3; $i++) {
    $forItems[] = "Paket Belajar ke-$i";
}

$whileItems = [];
$j = 1;
while ($j <= 3) {
    $whileItems[] = "Antrean Sesi ke-$j";
    $j++;
}

$doWhileItems = [];
$k = 1;
do {
    $doWhileItems[] = "Percobaan Modul ke-$k";
    $k++;
} while ($k <= 3);
?>
<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Loop Lab - <?= htmlspecialchars($siteName) ?></title>
  
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
      <p class="eyebrow">// MILESTONE 6 - LOOP LAB</p>
      <h1>Laboratorium Perulangan PHP</h1>
      <p>Pengujian struktur perulangan <code>for</code>, <code>while</code>, dan <code>do-while</code> untuk menghasilkan elemen dinamis.</p>
    </section>

    <section class="form-card">
      <div class="katalog-header" style="margin-bottom: 1.5rem;">
        <h2>Hasil Eksekusi Looping</h2>
      </div>

      <table>
        <thead>
          <tr>
            <th>Jenis Loop</th>
            <th>Sintaks Utama</th>
            <th>Hasil Output Data</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>FOR Loop</strong></td>
            <td><code>for ($i = 1; $i <= 3; $i++)</code></td>
            <td>
              <?php foreach ($forItems as $item): ?>
                <span class="badge badge-available" style="display:inline-block; margin: 2px;"><?= e($item) ?></span>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr>
            <td><strong>WHILE Loop</strong></td>
            <td><code>while ($j <= 3) { $j++; }</code></td>
            <td>
              <?php foreach ($whileItems as $item): ?>
                <span class="badge badge-available" style="display:inline-block; margin: 2px;"><?= e($item) ?></span>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr>
            <td><strong>DO-WHILE Loop</strong></td>
            <td><code>do { $k++; } while ($k <= 3);</code></td>
            <td>
              <?php foreach ($doWhileItems as $item): ?>
                <span class="badge badge-available" style="display:inline-block; margin: 2px;"><?= e($item) ?></span>
              <?php endforeach; ?>
            </td>
          </tr>
        </tbody>
      </table>

      <div style="margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap;">
        <a href="registration.php" class="btn-primary">Coba Form Pendaftaran</a>
        <a href="index.php" class="btn-primary" style="background: transparent; border: 1px solid currentColor;">Kembali ke Beranda</a>
      </div>
    </section>
  </main>

  <footer>
    <small>&copy; <?= $year ?> <?= htmlspecialchars($siteName) ?></small>
  </footer>
</body>

</html>