<?php
// process-registration.php
session_start();

require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu Kubu Pisang City';
$year = date('Y');

// Ambil data POST dari form
$name            = trim($_POST['name'] ?? '');
$email           = trim($_POST['email'] ?? '');
$phone           = trim($_POST['phone'] ?? '-');
$studyProgram    = trim($_POST['study_program'] ?? '-');
$courseCode      = trim($_POST['course'] ?? $_POST['course_code'] ?? '');
$participantType = trim($_POST['participant_type'] ?? 'umum');
$learningMode    = trim($_POST['learning_mode'] ?? 'offline');
$packageCount    = max(1, (int)($_POST['package_count'] ?? 1));
$interests       = $_POST['interests'] ?? [];
$note            = trim($_POST['note'] ?? $_POST['notes'] ?? '-');

// Cari data kursus berdasarkan kode
$selectedCourse = findCourse($courses, $courseCode);

// Hitung Biaya
$feePerPackage   = $selectedCourse ? $selectedCourse['fee'] : 0;
$subtotal        = $feePerPackage * $packageCount;
$discountPercent = getDiscountPercent($participantType);
$discountAmount  = ($subtotal * $discountPercent) / 100;
$totalFee        = $subtotal - $discountAmount;

// Simpan data pendaftaran baru ke dalam Session History
$courseName = $selectedCourse ? $selectedCourse['name'] : $courseCode;

if (!isset($_SESSION['history_data'])) {
    $_SESSION['history_data'] = [];
}

array_unshift($_SESSION['history_data'], [
    'name'     => $name,
    'email'    => $email,
    'course'   => $courseName,
    'type'     => ucfirst($participantType),
    'packages' => $packageCount,
    'total'    => $totalFee,
    'date'     => date('d-m-Y H:i')
]);
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hasil Pendaftaran - <?= htmlspecialchars($siteName) ?></title>
  
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
      <p class="eyebrow">// HASIL PENDAFTARAN</p>
      <h1>Ringkasan Pendaftaran Kursus</h1>
      <p>Data pendaftaran telah berhasil diproses dan disimpan ke History.</p>
    </section>

    <section class="form-card">
      <div style="margin-bottom: 2rem;">
        <table>
          <thead>
            <tr>
              <th colspan="2">Informasi Pendaftar & Program</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width: 35%;"><strong>Nama Lengkap</strong></td>
              <td><?= e($name) ?></td>
            </tr>
            <tr>
              <td><strong>Email</strong></td>
              <td><?= e($email) ?></td>
            </tr>
            <tr>
              <td><strong>Nomor HP</strong></td>
              <td><?= e($phone) ?></td>
            </tr>
            <tr>
              <td><strong>Program Studi</strong></td>
              <td><?= e($studyProgram) ?></td>
            </tr>
            <tr>
              <td><strong>Kursus Dipilih</strong></td>
              <td><?= $selectedCourse ? e($selectedCourse['name']) . ' (' . e($selectedCourse['code']) . ')' : e($courseCode) ?></td>
            </tr>
            <tr>
              <td><strong>Tipe Peserta</strong></td>
              <td><?= ucfirst(e($participantType)) ?> (Diskon <?= $discountPercent ?>%)</td>
            </tr>
            <tr>
              <td><strong>Metode Belajar</strong></td>
              <td><?= e(getLearningModeLabel($learningMode)) ?></td>
            </tr>
            <tr>
              <td><strong>Jumlah Paket</strong></td>
              <td><?= $packageCount ?> Paket</td>
            </tr>

            <!-- BARIS MINAT BELAJAR (Tetap Muncul Meski Kosong) -->
            <tr>
              <td><strong>Minat Belajar</strong></td>
              <td>
                <?= !empty($interests) 
                    ? e(implode(', ', array_map(fn($i) => $interestOptions[$i] ?? $i, $interests))) 
                    : 'Belum ada minat tambahan.' ?>
              </td>
            </tr>

            <?php if ($note !== '' && $note !== '-'): ?>
            <tr>
              <td><strong>Catatan</strong></td>
              <td><?= e($note) ?></td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <div>
        <table>
          <thead>
            <tr>
              <th>Komponen Biaya</th>
              <th>Perhitungan</th>
              <th>Nominal</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Biaya Kursus Satuan</td>
              <td>1 Paket</td>
              <td><?= rupiah($feePerPackage) ?></td>
            </tr>
            <tr>
              <td>Subtotal</td>
              <td><?= $packageCount ?> Paket</td>
              <td><?= rupiah($subtotal) ?></td>
            </tr>
            <tr>
              <td>Diskon (<?= e($participantType) ?>)</td>
              <td><?= $discountPercent ?>%</td>
              <td>-<?= rupiah((int)$discountAmount) ?></td>
            </tr>
            <tr style="font-weight: bold;">
              <td colspan="2"><strong>TOTAL AKHIR</strong></td>
              <td><strong style="color: var(--accent-orange, #f39c12); font-size: 1.2rem;"><?= rupiah((int)$totalFee) ?></strong></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div style="margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap;">
        <a href="history.php" class="btn-primary">Lihat History Pendaftaran</a>
        <a href="registration.php" class="btn-primary" style="background: transparent; border: 1px solid currentColor;">Daftar Lagi</a>
      </div>
    </section>
  </main>

  <footer>
    <small>&copy; <?= $year ?> <?= htmlspecialchars($siteName) ?></small>
  </footer>
</body>
</html>