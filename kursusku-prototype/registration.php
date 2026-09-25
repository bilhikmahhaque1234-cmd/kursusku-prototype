<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Kursus - KursusKu</title>
    
    <!-- Font Space Grotesk untuk Tema Mecha -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- File CSS Utama -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav aria-label="Navigasi utama">
            <a href="index.php"><strong>KURSUSKU // SYSTEM</strong></a>
            <a href="index.php">Beranda</a>
            <a href="index.php#katalog">Katalog</a>
            <a href="registration.php">Daftar Kursus</a>
        </nav>
    </header>

    <main class="container">
        <section class="page-intro">
            <p class="eyebrow">// FORM PENDAFTARAN</p>
            <h1>Mulai Belajar Bersama KursusKu</h1>
            <p>Gunakan data latihan. Field bertanda wajib harus diisi.</p>
        </section>

        <section class="form-card">
            <form action="process-registration.php" method="POST" class="registration-form">
                <!-- Hidden Field -->
                <input type="hidden" name="source" value="week-05">

                <div class="form-grid">
                    <!-- Text Field: Nama -->
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input id="name" name="name" type="text" minlength="3" maxlength="100" autocomplete="name" placeholder="Masukkan nama..." required>
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" maxlength="120" autocomplete="email" placeholder="contoh@domain.com" required>
                    </div>

                    <!-- Tel Field: Nomor HP -->
                    <div class="form-group">
                        <label for="phone">Nomor HP</label>
                        <input id="phone" name="phone" type="tel" maxlength="15" autocomplete="tel" placeholder="081234567890" required>
                    </div>

                    <!-- Text Field: Program Studi -->
                    <div class="form-group">
                        <label for="study_program">Program Studi</label>
                        <input id="study_program" name="study_program" type="text" maxlength="100" placeholder="Program studi..." required>
                    </div>
                </div>

                <!-- Select Option: Kursus -->
                <div class="form-group">
                    <label for="course">Kursus yang Dipilih</label>
                    <select id="course" name="course" required>
                        <option value="">-- Pilih Kursus --</option>
                        <option value="web-dasar">Web Dasar</option>
                        <option value="php-dasar">PHP Dasar</option>
                        <option value="laravel-fundamental">Laravel Fundamental</option>
                    </select>
                </div>

                <!-- Radio Button: Jenis Peserta -->
                <fieldset class="form-group" style="border: none; padding: 0;">
                    <legend>Jenis Peserta</legend>
                    <label class="choice">
                        <input type="radio" name="participant_type" value="mahasiswa" required> Mahasiswa
                    </label>
                    <label class="choice">
                        <input type="radio" name="participant_type" value="umum"> Umum
                    </label>
                </fieldset>

                <!-- Checkbox Array: Minat Tambahan -->
                <fieldset class="form-group" style="border: none; padding: 0;">
                    <legend>Minat Tambahan</legend>
                    <label class="choice"><input type="checkbox" name="interests[]" value="ui-ux"> UI/UX</label>
                    <label class="choice"><input type="checkbox" name="interests[]" value="database"> Database</label>
                    <label class="choice"><input type="checkbox" name="interests[]" value="backend"> Backend</label>
                </fieldset>

                <!-- Textarea: Catatan -->
                <div class="form-group">
                    <label for="note">Catatan</label>
                    <textarea id="note" name="note" rows="5" maxlength="300" placeholder="Tuliskan kebutuhan belajar Anda (opsional)"></textarea>
                    <small class="help">Maksimal 300 karakter.</small>
                </div>

                <!-- Button Submit -->
                <button class="btn-primary" type="submit">Kirim Pendaftaran</button>
            </form>
        </section>
    </main>

    <footer>
        <small>KursusKu Prototype. All rights reserved.</small>
    </footer>
</body>
</html>