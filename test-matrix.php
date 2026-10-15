<?php
// test-matrix.php
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu Kubu Pisang City';
$year = date('Y');

$testCases = [
    [
        'no' => 1,
        'skenario' => 'Mahasiswa, Web Dasar, 1 paket',
        'type' => 'mahasiswa',
        'code' => 'WEB-01',
        'packages' => 1,
        'expected' => 160000
    ],
    [
        'no' => 2,
        'skenario' => 'Guru, PHP Dasar, 1 paket',
        'type' => 'guru',
        'code' => 'PHP-01',
        'packages' => 1,
        'expected' => 212500
    ],
    [
        'no' => 3,
        'skenario' => 'Umum, Laravel Fundamental, 1 paket',
        'type' => 'umum',
        'code' => 'LAR-01',
        'packages' => 1,
        'expected' => 350000
    ],
    [
        'no' => 4,
        'skenario' => 'Mahasiswa, Web Dasar, 2 paket',
        'type' => 'mahasiswa',
        'code' => 'WEB-01',
        'packages' => 2,
        'expected' => 320000
    ],
    [
        'no' => 5,
        'skenario' => 'Guru, PHP Lanjutan, 3 paket',
        'type' => 'guru',
        'code' => 'PHP-02',
        'packages' => 3,
        'expected' => 765000
    ],
];
?>
<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Test Matrix - <?= htmlspecialchars($siteName) ?></title>
  
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
      <p class="eyebrow">// TEST MATRIX - MILESTONE 6</p>
      <h1>Matriks Pengujian Sistem</h1>
      <p>Pengujian otomatis fungsi perhitungan biaya dan diskon pada <?= htmlspecialchars($siteName) ?>.</p>
    </section>

    <section class="form-card">
      <table>
        <thead>
          <tr>
            <th>NO</th>
            <th>SKENARIO</th>
            <th>ACTUAL</th>
            <th>EXPECTED</th>
            <th>STATUS</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($testCases as $test): ?>
            <?php
              $course = findCourse($courses, $test['code']);
              $fee = $course ? $course['fee'] : 0;
              $subtotal = $fee * $test['packages'];
              $discountPercent = getDiscountPercent($test['type']);
              $discountAmount = ($subtotal * $discountPercent) / 100;
              $actualTotal = $subtotal - $discountAmount;

              $isPassed = ($actualTotal == $test['expected']);
            ?>
            <tr>
              <td><?= $test['no'] ?></td>
              <td><?= htmlspecialchars($test['skenario']) ?></td>
              <td><?= rupiah($actualTotal) ?></td>
              <td><?= rupiah($test['expected']) ?></td>
              <td>
                <span class="<?= $isPassed ? 'badge-available' : 'badge-full' ?>">
                  <?= $isPassed ? 'PASS' : 'FAIL' ?>
                </span>
              </td>
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