<?php
// type-data-test.php
require_once __DIR__ . '/helpers.php';

$isActive = true;
$siteName = 'KursusKu Kubu Pisang City';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Type Data Test - <?= e($siteName) ?></title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="container" style="padding: 2rem;">
  <h1>Testing Tipe Data Boolean (Soal 5)</h1>
  <p>Hasil <code>var_dump($isActive)</code> untuk variabel <code>$isActive = true</code>:</p>
  <pre><?php var_dump($isActive); ?></pre>
  <a href="index.php" class="btn-primary">Kembali ke Beranda</a>
</body>
</html>