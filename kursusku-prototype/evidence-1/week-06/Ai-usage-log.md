======================================================================================================================
                                     MATRIKS PENGUJIAN SISTEM (TEST MATRIX)
                                     SISTEM KURSUSKU KUBU PISANG CITY
======================================================================================================================

NO  | SKENARIO PENGUJIAN                   | INPUT PARAMETER                         | EXPECTED OUTPUT          | ACTUAL OUTPUT            | STATUS
----+--------------------------------------+-----------------------------------------+--------------------------+--------------------------+--------
1   | Pendaftaran Mahasiswa (Web Dasar)    | Type: Mahasiswa (20%), Kursus: WEB-01   | Rp 160.000               | Rp 160.000               | PASS
    | 1 Paket Pembelajaran                 | Package: 1                              |                          |                          |
----+--------------------------------------+-----------------------------------------+--------------------------+--------------------------+--------
2   | Pendaftaran Guru (PHP Dasar)         | Type: Guru (15%), Kursus: PHP-01        | Rp 212.500               | Rp 212.500               | PASS
    | 1 Paket Pembelajaran                 | Package: 1                              |                          |                          |
----+--------------------------------------+-----------------------------------------+--------------------------+--------------------------+--------
3   | Pendaftaran Umum (Laravel Fund.)     | Type: Umum (0%), Kursus: LAR-01         | Rp 350.000               | Rp 350.000               | PASS
    | 1 Paket Pembelajaran                 | Package: 1                              |                          |                          |
----+--------------------------------------+-----------------------------------------+--------------------------+--------------------------+--------
4   | Pendaftaran Mahasiswa Multiple Paket | Type: Mahasiswa (20%), Kursus: WEB-01   | Rp 320.000               | Rp 320.000               | PASS
    | 2 Paket Pembelajaran                 | Package: 2                              |                          |                          |
----+--------------------------------------+-----------------------------------------+--------------------------+--------------------------+--------
5   | Pengisian Form Minat Belajar Kosong  | Interests: []                           | Belum ada minat          | Belum ada minat          | PASS
    |                                      |                                         | tambahan.                | tambahan.                |
======================================================================================================================
KETERANGAN: Semua skenario pengujian kalkulasi biaya, diskon, dan penanganan input kosong bernilai VALID (PASS).
======================================================================================================================