<!--
Penjelasan
Function dasar dalam konteks web atau aplikasi merujuk pada fitur dan kemampuan yang harus dimiliki untuk memenuhi kebutuhan pengguna. Ini mencakup segala hal dari antarmuka pengguna hingga logika di balik layar yang menjalankan aplikasi.

Istilah
1. User Interface (UI): Antarmuka yang dilihat dan digunakan oleh pengguna.
2. User Experience (UX): Pengalaman keseluruhan yang dialami pengguna saat berinteraksi dengan aplikasi atau situs.
3. Backend: Bagian yang tidak terlihat oleh pengguna, termasuk server, database, dan logika aplikasi.
4. Frontend: Bagian yang berinteraksi langsung dengan pengguna.

Secara Singkat
Function dasar aplikasi/web mencakup fitur seperti registrasi pengguna, login, penyimpanan data, dan interaksi dasar. Ini adalah komponen yang menjamin aplikasi berfungsi dengan baik dan memenuhi kebutuhan pengguna.

Manfaat
- Mempermudah Penggunaan: Menyediakan antarmuka yang intuitif dan mudah digunakan.
- Efisiensi: Meningkatkan efisiensi dalam mengakses informasi atau melakukan tugas.
- Interaksi: Memfasilitasi komunikasi antara pengguna dan aplikasi.
- Keamanan: Melindungi data dan privasi pengguna.

Kategori
1. Fungsi Utama: Fitur yang paling penting, seperti pendaftaran dan login.
2. Fungsi Pendukung: Fitur tambahan yang meningkatkan pengalaman pengguna, seperti pencarian dan notifikasi.
3. Fungsi Laporan: Fitur yang memungkinkan pengguna mendapatkan data analitik atau laporan.

Jenis
1. Stateless Function: Fungsi yang tidak menyimpan status pengguna antara permintaan.
2. Stateful Function: Fungsi yang menyimpan status pengguna, misalnya session di aplikasi web.
3. Event-Driven Function: Fungsi yang berjalan berdasarkan pemicu tertentu, seperti klik tombol.
-->

<?php 

//Build on function
//function date
//D singkatan hari atau DAY
echo "<h3>Function Data</h3>";
echo date ('l') . "<br>";
echo date ('D') . "<br>";
echo date ('l, d F Y') . "<br>";
echo date ('l, d M Y') . "<br>";

echo "<hr>";


echo "<h3>Function Time</h3>";
echo time() . "<br>";



// dua hari lagi
 echo date('l', time() + 172800) . "<br>";

// 120 hari, 1000 hari
echo date('l, d F Y', time() + 60 * 60 * 24 * 120) . "<br>";
echo date('l, d F Y', time() + 60 * 60 * 24 * 1000) . "<br>";

// Mencari 100 hari ke belakang
echo date('l, d F Y', time() - 60 * 60 * 24 * 100) . "<br>";

echo "<hr>";

//Function Mktime(),

echo "<h3>Function Time</h3>";

echo mktime(0,0,0,7,20,2007) . "<br>"; 
//urutannya jam, menit, detik, bulan, hari tahun
echo date('l, d F Y', mktime(0,0,0,7,20,2007)) . "<br>";

echo "<hr>";

echo "<h3>Strto Time</h3>";

// Fungsi Dari StrtoTime yaitu untuk membedakan detik dari 20 juli 2007, yang dapat digunakan sebagai day finder
echo strtotime ('20 July 2007') . "<br>";
echo date('l', strtotime('20 July 2007')) . "<br>";




?>