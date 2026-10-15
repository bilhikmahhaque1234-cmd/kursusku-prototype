<?php
// operator-test.php
require_once __DIR__ . '/helpers.php';

$fee = 350000;
$result = ($fee === 350000);

$siteName = 'KursusKu Kubu Pisang City';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Operator Test - <?= e($siteName) ?></title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="container" style="padding: 2rem;">
  <h1>Testing Strict Equality Operator </h1>
  <p>Hasil dari <code>var_dump($fee === 350000)</code>:</p>
  <pre><?php var_dump($result); ?></pre>
  <a href="index.php" class="btn-primary">Kembali ke Beranda</a>
</body>
</html>