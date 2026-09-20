<?php
/**
 * fee-calculator.php - Kalkulator Estimasi Biaya KursusKu (Milestone 3)
 * Pemrograman Web III - Sub-CPMK2: variabel, tipe data, operator, aritmatika
 *
 * Catatan penting:
 * - Semua nilai uang disimpan sebagai INTEGER rupiah (350000, bukan "Rp 350.000").
 * - Format rupiah HANYA dilakukan saat output, bukan saat perhitungan.
 * - Nilai masih hard-code. Form input akan ditambahkan pada pertemuan berikutnya.
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
 *    subtotal = fee x participantCount
 *    discount = subtotal x discountPercent / 100
 *    total    = subtotal - discount + adminFee
 * ------------------------------------------------------------------ */
$subtotal = $fee * $participantCount;
$discount = intdiv($subtotal * $discountPercent, 100);
$total    = $subtotal - $discount + $adminFee;

/* ------------------------------------------------------------------
 * 3. DATA TEST CASE (untuk tabel pengujian di bawah halaman)
 *    Nilai expected dihitung manual, bukan diambil dari program.
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
  <style>
    :root {
      --primary: #2563eb;
      --dark: #111827;
      --muted: #6b7280;
      --bg: #f9fafb;
      --border: #e5e7eb;
      --pass: #16a34a;
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      padding: 32px 16px;
      background: var(--bg);
      color: var(--dark);
      font-family: -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
      line-height: 1.6;
    }
    .card {
      max-width: 760px;
      margin: 0 auto 24px;
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 28px;
    }
    h1 { font-size: 1.6rem; margin: 0 0 4px; }
    h2 { font-size: 1.15rem; margin: 0 0 16px; }
    .subtitle { color: var(--muted); margin: 0 0 24px; }
    table { width: 100%; border-collapse: collapse; font-size: 0.95rem; }
    th, td { border-bottom: 1px solid var(--border); padding: 10px 8px; text-align: left; }
    thead th { background: var(--bg); font-size: 0.85rem; text-transform: uppercase; letter-spacing: .03em; color: var(--muted); }
    td.num, th.num { text-align: right; }
    tr.total td { background: #eff6ff; font-weight: 700; border-bottom: none; }
    .badge {
      display: inline-block;
      background: #dcfce7;
      color: var(--pass);
      font-weight: 600;
      font-size: 0.8rem;
      padding: 2px 10px;
      border-radius: 999px;
    }
    .formula {
      background: var(--bg);
      border-left: 3px solid var(--primary);
      padding: 12px 16px;
      font-family: ui-monospace, Consolas, monospace;
      font-size: 0.88rem;
      margin: 0 0 20px;
      overflow-x: auto;
    }
    .back { display: inline-block; margin-top: 20px; color: var(--primary); text-decoration: none; font-weight: 600; }
    .note { color: var(--muted); font-size: 0.88rem; }
  </style>
</head>
<body>

<main class="card">
  <h1>Kalkulator Estimasi Biaya KursusKu</h1>
  <p class="subtitle">
    Kursus: <strong><?= htmlspecialchars($courseName) ?></strong>
    &mdash; status: <?= $isActive ? 'Aktif' : 'Nonaktif' ?>
  </p>

  <p class="formula">
    subtotal = fee &times; participantCount<br>
    discount = subtotal &times; discountPercent / 100<br>
    total&nbsp;&nbsp;&nbsp; = subtotal &minus; discount + adminFee
  </p>

  <table>
    <thead>
      <tr><th>Komponen</th><th class="num">Nilai</th></tr>
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
        <td class="num">&minus; Rp <?= number_format($discount, 0, ',', '.') ?></td>
      </tr>
      <tr>
        <td>Biaya admin</td>
        <td class="num">+ Rp <?= number_format($adminFee, 0, ',', '.') ?></td>
      </tr>
      <tr class="total">
        <td>Total akhir</td>
        <td class="num">Rp <?= number_format($total, 0, ',', '.') ?></td>
      </tr>
    </tbody>
  </table>

  <a class="back" href="index.php">&larr; Kembali ke Beranda KursusKu</a>
</main>

<section class="card">
  <h2>Pengujian: Lima Test Case</h2>
  <p class="note">
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
          // Hitung ulang dengan rumus yang sama persis seperti di atas
          $caseSubtotal = $case['fee'] * $case['peserta'];
          $caseDiscount = intdiv($caseSubtotal * $case['diskon'], 100);
          $caseActual   = $caseSubtotal - $caseDiscount + $case['admin'];
          $caseStatus   = ($caseActual === $case['expected']) ? 'PASS' : 'FAIL';
        ?>
        <tr>
          <td><?= $case['no'] ?></td>
          <td class="num"><?= number_format($case['fee'], 0, ',', '.') ?></td>
          <td class="num"><?= $case['peserta'] ?></td>
          <td class="num"><?= $case['diskon'] ?>%</td>
          <td class="num"><?= number_format($case['admin'], 0, ',', '.') ?></td>
          <td class="num"><?= number_format($case['expected'], 0, ',', '.') ?></td>
          <td class="num"><?= number_format($caseActual, 0, ',', '.') ?></td>
          <td><span class="badge"><?= $caseStatus ?></span></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>

</body>
</html>