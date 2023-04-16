Aplikasi Lelang-online berbasis web Laravel

Role:
1. Admin
2. Petugas
3. Masyarakat

Fitur:
=== GLOBAL ===
1. Authentikasi
2. Edit Profile

=== ADMIN ===
1. CRUD data barang
2. CRUD petugas
3. Read data masyarakat
4. Cetak Laporan Penghasilan

=== PETUGAS ===
1. CRUD data barang
2. Membuat data lelang
3. Memantau lelang berlangsung
4. Buka & Tutup Lelang Manual
5. Mengirim Email ke pemenang
6. Cetak Laporan

=== Masyarakat ===
1. Melihat data lelang
2. Melakukan CRUD penawaran
3. Melihat data riwayat lelang yang di lakukan

!! NOTE !!
untuk buka tutup lelang bisa otomatis, dan jika tidak berjalan, pengguna bisa memanggil command "php artisan lelang:exdate".
untuk awal pengguna harus menjalankan "php artisan migrate" & "php artisan seed" agar database dan data user terbuat.
untuk bagian send EMAIL , pengguna bisa mengganti nya di bagian ".env", lalu sesuaikan dengan email masing masing.



TERIMA KASIH
