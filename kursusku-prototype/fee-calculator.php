<?php
$courseName = 'Laravel Fundamental';
$fee = 350000;
$participantCount = 2;
$discountPercent = 10;
$adminFee = 25000;
$isActive = true;

$subtotal = $fee * $participantCount;
$discount = intdiv($subtotal * $discountPercent, 100);
$total = $subtotal - $discount + $adminFee;
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kalkulator Biaya - KursusKu</title>
  <style>
    body{font-family:Arial,sans-serif;background:#f5f7f6;margin:0;padding:32px;color:#16332c}
    .card{max-width:720px;margin:auto;background:white;padding:24px;border-radius:16px}
    table{width:100%;border-collapse:collapse}
    th,td{border-bottom:1px solid #ddd;padding:10px;text-align:left}
    .total{background:#eaf7f3;font-weight:bold}
    a{color:#0f766e}
  </style>
</head>
<body>
  <main class="card">
    <h1>Kalkulator Estimasi Biaya</h1>
    <p>Kursus: <strong><?= $courseName ?></strong></p>
    <table>
      <tr><th>Komponen</th><th>Nilai</th></tr>
      <tr><td>Biaya per peserta</td><td>Rp <?= number_format($fee,0,',','.') ?></td></tr>
      <tr><td>Jumlah peserta</td><td><?= $participantCount ?></td></tr>
      <tr><td>Subtotal</td><td>Rp <?= number_format($subtotal,0,',','.') ?></td></tr>
      <tr><td>Diskon (<?= $discountPercent ?>%)</td><td>- Rp <?= number_format($discount,0,',','.') ?></td></tr>
      <tr><td>Biaya admin</td><td>Rp <?= number_format($adminFee,0,',','.') ?></td></tr>
      <tr class="total"><td>Total akhir</td><td>Rp <?= number_format($total,0,',','.') ?></td></tr>
    </table>
    <p><a href="index.php">Kembali ke Beranda KursusKu</a></p>
  </main>
</body>
</html>