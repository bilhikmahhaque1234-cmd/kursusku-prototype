<?php
// fee-tests.php
require_once __DIR__ . '/helpers.php';

function calculateFeeTest($fee, $qty, $discountPercent, $adminFee) {
    $subtotal = $fee * $qty;
    $discountAmount = ($subtotal * $discountPercent) / 100;
    return ($subtotal - $discountAmount) + $adminFee;
}

$testCases = [
    1 => ['fee' => 200000, 'qty' => 1, 'discount' => 0, 'admin' => 10000, 'expected' => 210000],
    2 => ['fee' => 250000, 'qty' => 2, 'discount' => 10, 'admin' => 15000, 'expected' => 465000],
    3 => ['fee' => 300000, 'qty' => 1, 'discount' => 15, 'admin' => 20000, 'expected' => 275000],
    4 => ['fee' => 350000, 'qty' => 2, 'discount' => 10, 'admin' => 25000, 'expected' => 655000],
    5 => ['fee' => 2500000, 'qty' => 3, 'discount' => 10, 'admin' => 50000, 'expected' => 6800000],
];

$siteName = 'KursusKu Kubu Pisang City';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fee Calculator Unit Test - <?= htmlspecialchars($siteName) ?></title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header>
    <nav aria-label="Navigasi utama">
      <a href="index.php"><strong><?= htmlspecialchars($siteName) ?></strong></a> 
      <a href="index.php#katalog">Katalog</a> 
      <a href="registration.php">Daftar Kursus</a> 
      <a href="history.php">History</a> 
      <a href="fee-calculator.php">Estimasi Biaya</a>
      <a href="fee-tests.php">Fee Tests</a>
    </nav>
  </header>

  <main class="container">
    <section class="page-intro">
      <p class="eyebrow">// UNIT TESTING - PERHITUNGAN BIAYA</p>
      <h1>Fee Calculator Tests</h1>
      <p>Pengujian otomatis untuk logika perhitungan biaya kursus.</p>
    </section>

    <section class="form-card">
      <table>
        <thead>
          <tr>
            <th>Test Case</th>
            <th>Input (Fee, Qty, Diskon, Admin)</th>
            <th>Expected Total</th>
            <th>Actual Total</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($testCases as $no => $test): ?>
            <?php 
              $actual = calculateFeeTest($test['fee'], $test['qty'], $test['discount'], $test['admin']);
              $passed = $actual === $test['expected'];
            ?>
            <tr <?= $no === 5 ? 'style="background: rgba(243, 156, 18, 0.15);"' : '' ?>>
              <td><strong>Test Case #<?= $no ?></strong></td>
              <td>
                Fee: <?= rupiah($test['fee']) ?>, 
                Qty: <?= $test['qty'] ?>, 
                Diskon: <?= $test['discount'] ?>%, 
                Admin: <?= rupiah($test['admin']) ?>
              </td>
              <td><?= rupiah($test['expected']) ?></td>
              <td><?= rupiah($actual) ?></td>
              <td>
                <strong style="color: <?= $passed ? '#2ecc71' : '#e74c3c' ?>;">
                  <?= $passed ? 'PASS' : 'FAIL' ?>
                </strong>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>

  <footer>
    <small>&copy; <?= date('Y') ?> <?= htmlspecialchars($siteName) ?></small>
  </footer>
</body>
</html>