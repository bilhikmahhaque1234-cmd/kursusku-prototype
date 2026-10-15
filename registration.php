<?php
// registration.php
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu Kubu Pisang City';
$year = date('Y');
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Kursus - <?= htmlspecialchars($siteName) ?></title>
  
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
      <p class="eyebrow">// FORM PENDAFTARAN</p>
      <h1>Mulai Belajar Bersama <?= htmlspecialchars($siteName) ?></h1>
      <p>Gunakan data latihan. Field bertanda wajib harus diisi.</p>
    </section>

    <section class="form-card">
      <form action="process-registration.php" method="POST" class="registration-form">
        <input type="hidden" name="source" value="week-06">

        <div class="form-grid">
          <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input id="name" name="name" type="text" minlength="3" maxlength="100" autocomplete="name" placeholder="Masukkan nama..." required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" maxlength="120" autocomplete="email" placeholder="contoh@domain.com" required>
          </div>

          <div class="form-group">
            <label for="phone">Nomor HP</label>
            <input id="phone" name="phone" type="tel" maxlength="15" autocomplete="tel" placeholder="081234567890" required>
          </div>

          <div class="form-group">
            <label for="study_program">Program Studi</label>
            <input id="study_program" name="study_program" type="text" maxlength="100" placeholder="Program studi..." required>
          </div>
        </div>

        <div class="form-group">
          <label for="course">Kursus yang Dipilih</label>
          <select id="course" name="course" required>
            <option value="">-- Pilih Kursus --</option>
            <?php foreach ($courses as $c): ?>
              <?php $isFull = $c['registered'] >= $c['quota']; ?>
              <option value="<?= e($c['code']) ?>" <?= $isFull ? 'disabled' : '' ?>>
                <?= e($c['name']) ?> - <?= rupiah($c['fee']) ?> <?= $isFull ? '(Penuh)' : '' ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <fieldset class="form-group">
          <legend>Jenis Peserta</legend>
          <label class="choice">
            <input type="radio" name="participant_type" value="mahasiswa" required> Mahasiswa (Diskon 20%)
          </label>
          <label class="choice">
            <input type="radio" name="participant_type" value="guru"> Guru (Diskon 15%)
          </label>
          <label class="choice">
            <input type="radio" name="participant_type" value="umum"> Umum (Diskon 0%)
          </label>
        </fieldset>

        <fieldset class="form-group">
          <legend>Minat Belajar</legend>
          <?php foreach ($interestOptions as $value => $label): ?>
            <label class="choice">
              <input type="checkbox" name="interests[]" value="<?= e($value) ?>"> <?= e($label) ?>
            </label>
          <?php endforeach; ?>
        </fieldset>

        <div class="form-grid">
          <div class="form-group">
            <label for="learning_mode">Metode Belajar</label>
            <select id="learning_mode" name="learning_mode" required>
              <option value="">-- Pilih Metode --</option>
              <option value="offline">Tatap Muka</option>
              <option value="online">Online</option>
              <option value="hybrid">Hybrid</option>
            </select>
          </div>

          <div class="form-group">
            <label for="package_count">Jumlah Paket</label>
            <select id="package_count" name="package_count" required>
              <?php for ($i = 1; $i <= 3; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?> Paket</option>
              <?php endfor; ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="note">Catatan</label>
          <textarea id="note" name="note" rows="4" maxlength="300" placeholder="Tuliskan kebutuhan belajar Anda (opsional)"></textarea>
          <small class="help">Maksimal 300 karakter.</small>
        </div>

        <button class="btn-primary" type="submit">Kirim Pendaftaran</button>
      </form>
    </section>
  </main>

  <footer>
    <small>&copy; <?= $year ?> <?= htmlspecialchars($siteName) ?></small>
  </footer>
</body>
</html>