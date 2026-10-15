<?php
// bitwise-test.php
require_once __DIR__ . '/helpers.php';

$READ   = 1;
$WRITE  = 2;
$DELETE = 4;

$permission = $READ | $WRITE;
$canDelete = ($permission & $DELETE) === $DELETE;

$siteName = 'KursusKu Kubu Pisang City';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Bitwise Test - <?= e($siteName) ?></title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="container" style="padding: 2rem;">
  <h1>Testing Bitwise Operator (Soal 11)</h1>
  <p>Nilai permission: <code><?= $permission ?></code></p>
  <p>Hasil pengecekan <code>$canDelete</code>:</p>
  <pre><?php var_dump($canDelete); ?></pre>
  <a href="index.php" class="btn-primary">Kembali ke Beranda</a>
</body>
</html>