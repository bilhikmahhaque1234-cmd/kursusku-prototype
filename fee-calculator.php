<?php
/**
 * fee-calculator.php - Kalkulator Estimasi Biaya KursusKu (Milestone 3)
 * Pemrograman Web III - Sub-CPMK2: variabel, tipe data, operator, aritmatika
 */

/* ------------------------------------------------------------------
 * 1. VARIABEL INPUT DASAR
 * ------------------------------------------------------------------ */
$courseName       = 'Laravel Fundamental';  // string  - nama kursus
$fee              = 350000;                 // int     - biaya per peserta (rupiah)
$participantCount = 2;                      // int     - jumlah peserta
$discountPercent  = 10;                     // int     - persentase diskon
$adminFee         = 25000;                  // int     - biaya administrasi (rupiah)
$isActive         = true;                   // bool    - status kursus aktif

/* ------------------------------------------------------------------
 * 2. VARIABEL HASIL PROSES (rumus bisnis)
 * ------------------------------------------------------------------ */
$subtotal = $fee * $participantCount;
$discount = intdiv($subtotal * $discountPercent, 100);
$total    = $subtotal - $discount + $adminFee;

/* ------------------------------------------------------------------
 * 3. DATA TEST CASE (untuk tabel pengujian di bawah halaman)
 * ------------------------------------------------------------------ */
$testCases = [
    ['no' => 1, 'fee' => 350000,  'peserta' => 1, 'diskon' => 0,  'admin' => 25000, 'expected' => 375000],
    ['no' => 2, 'fee' => 350000,  'peserta' => 1, 'diskon' => 10, 'admin' => 25000, 'expected' => 340000],
    ['no' => 3, 'fee' => 350000,  'peserta' => 2, 'diskon' => 25, 'admin' => 25000, 'expected' => 550000],
    ['no' => 4, 'fee' => 0,       'peserta' => 1, 'diskon' => 10, 'admin' => 0,     'expected' => 0],
    ['no' => 5, 'fee' => 2500000, 'peserta' => 3, 'diskon' => 10, 'admin' => 50000, 'expected' => 6800000],
];
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kalkulator Estimasi Biaya - <?= htmlspecialchars($courseName) ?></title>

  <!-- Font Space Grotesk untuk Tema Mecha -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

  <!-- File CSS Utama Mecha -->
  <link rel="stylesheet" href="assets/css/style.css">

  <style>
    /* Styling khusus penyesuaian Mecha pada kalkulator */
    .formula-box {
      background: var(--bg-card);
      border-left: 4px solid var(--accent-neon);
      border-top: var(--border-tech);
      border-right: var(--border-tech);
      border-bottom: var(--border-tech);
      padding: 1rem 1.2rem;
      font-family: var(--font-mono);
      font-size: 0.88rem;
      color: var(--accent-neon);
      margin-bottom: 1.5rem;
    }
    .badge-pass {
      display: inline-block;
      background: rgba(0, 255, 136, 0.15);
      color: var(--accent-green);
      border: 1px solid var(--accent-green);
      font-size: 0.75rem;
      font-weight: 700;
      padding: 0.25rem 0.65rem;
      clip-path: var(--clip-btn);
    }
    .badge-fail {
      display: inline-block;
      background: rgba(255, 42, 95, 0.15);
      color: var(--accent-red);
      border: 1px solid var(--accent-red);
      font-size: 0.75rem;
      font-weight: 700;
      padding: 0.25rem 0.65rem;
      clip-path: var(--clip-btn);
    }
    td.num, th.num { text-align: right; }
  </style>
</head>
<body>

  <header>
    <nav aria-label="Navigasi utama">
      <a href="index.php"><strong>KURSUSKU // SYSTEM</strong></a>
      <a href="index.php">Beranda</a>
      <a href="index.php#katalog">Katalog</a>
      <a href="registration.php">Daftar Kursus</a>
      <a href="fee-calculator.php">Estimasi Biaya</a>
    </nav>
  </header>

  <main class="container">
    <section class="form-card">
      <p class="eyebrow">// ESTIMASI BIAYA</p>
      <h1>Kalkulator Estimasi Biaya KursusKu</h1>
      <p style="margin-bottom: 1.5rem; color: var(--text-main);">
        Kursus: <strong style="color: var(--accent-neon);"><?= htmlspecialchars($courseName) ?></strong>
        &mdash; Status: <span style="color: <?= $isActive ? 'var(--accent-green)' : 'var(--accent-red)' ?>; font-weight: bold;"><?= $isActive ? 'Aktif' : 'Nonaktif' ?></span>
      </p>

      <div class="formula-box">
        subtotal = fee &times; participantCount<br>
        discount = subtotal &times; discountPercent / 100<br>
        total&nbsp;&nbsp;&nbsp; = subtotal &minus; discount + adminFee
      </div>

      <table>
        <thead>
          <tr>
            <th>Komponen</th>
            <th class="num">Nilai</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Biaya per peserta</td>
            <td class="num">Rp <?= number_format($fee, 0, ',', '.') ?></td>
          </tr>
          <tr>
            <td>Jumlah peserta</td>
            <td class="num"><?= $participantCount ?> orang</td>
          </tr>
          <tr>
            <td>Subtotal</td>
            <td class="num">Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
          </tr>
          <tr>
            <td>Diskon (<?= $discountPercent ?>%)</td>
            <td class="num" style="color: var(--accent-green);">&minus; Rp <?= number_format($discount, 0, ',', '.') ?></td>
          </tr>
          <tr>
            <td>Biaya admin</td>
            <td class="num">+ Rp <?= number_format($adminFee, 0, ',', '.') ?></td>
          </tr>
          <tr style="background: var(--bg-hover); font-weight: bold; color: var(--accent-neon);">
            <td>Total Akhir</td>
            <td class="num">Rp <?= number_format($total, 0, ',', '.') ?></td>
          </tr>
        </tbody>
      </table>

      <div style="margin-top: 1.5rem;">
        <a class="btn-primary" href="index.php">&larr; Kembali ke Beranda KursusKu</a>
      </div>
    </section>

    <section class="form-card">
      <h2>Pengujian: Lima Test Case</h2>
      <p style="color: var(--text-muted); font-size: 0.88rem; margin-bottom: 1.5rem;">
        Kolom <em>Expected</em> dihitung manual di kertas. Kolom <em>Actual</em> dihitung ulang
        oleh PHP dengan rumus yang sama, lalu dibandingkan untuk menentukan status PASS/FAIL.
      </p>

      <table>
        <thead>
          <tr>
            <th>No</th>
            <th class="num">Fee</th>
            <th class="num">Peserta</th>
            <th class="num">Diskon</th>
            <th class="num">Admin</th>
            <th class="num">Expected</th>
            <th class="num">Actual</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($testCases as $case): ?>
            <?php
              $caseSubtotal = $case['fee'] * $case['peserta'];
              $caseDiscount = intdiv($caseSubtotal * $case['diskon'], 100);
              $caseActual   = $caseSubtotal - $caseDiscount + $case['admin'];
              $caseStatus   = ($caseActual === $case['expected']) ? 'PASS' : 'FAIL';
              $badgeClass   = ($caseStatus === 'PASS') ? 'badge-pass' : 'badge-fail';
            ?>
            <tr>
              <td><?= $case['no'] ?></td>
              <td class="num"><?= number_format($case['fee'], 0, ',', '.') ?></td>
              <td class="num"><?= $case['peserta'] ?></td>
              <td class="num"><?= $case['diskon'] ?>%</td>
              <td class="num"><?= number_format($case['admin'], 0, ',', '.') ?></td>
              <td class="num"><?= number_format($case['expected'], 0, ',', '.') ?></td>
              <td class="num"><?= number_format($caseActual, 0, ',', '.') ?></td>
              <td><span class="<?= $badgeClass ?>"><?= $caseStatus ?></span></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>

  <footer>
    <small>KursusKu Prototype. All rights reserved.</small>
  </footer>

</body>
</html>