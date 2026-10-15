<?php
// string-test.php
require_once __DIR__ . '/helpers.php';

$rawText = "  Laravel Fundamental  ";
$cleanText = trim($rawText);
$siteName = 'KursusKu Kubu Pisang City';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>String Test - <?= e($siteName) ?></title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="container" style="padding: 2rem;">
  <h1>Testing Fungsi Trim String </h1>
  <p>Teks Asli: <code>"<?= $rawText ?>"</code></p>
  <p>Hasil <code>trim()</code>: <code>"<?= $cleanText ?>"</code></p>
  <a href="index.php" class="btn-primary">Kembali ke Beranda</a>
</body>
</html>