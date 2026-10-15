<?php
// logic-test.php
require_once __DIR__ . '/helpers.php';

$quota = 30;
$registered = 18;

$isFull = $registered >= $quota;
$hasSeat = $registered < $quota;

$siteName = 'KursusKu Kubu Pisang City';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Logic Test - <?= e($siteName) ?></title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="container" style="padding: 2rem;">
  <h1>Testing Logika Kuota (Soal 21)</h1>
  <p>Kuota: <?= $quota ?>, Terdaftar: <?= $registered ?></p>
  <p>Hasil <code>var_dump($isFull)</code>:</p>
  <pre><?php var_dump($isFull); ?></pre>
  <p>Hasil <code>var_dump($hasSeat)</code>:</p>
  <pre><?php var_dump($hasSeat); ?></pre>
  <a href="index.php" class="btn-primary">Kembali ke Beranda</a>
</body>
</html>