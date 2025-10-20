<?php
$host = "localhost";
$username = "root";
$password = "";

// 1. Perbaikan: Ganti placeholder dengan nama database yang benar
$database = "perpustakaan"; 

$port = 3306; // Variabel ini tidak digunakan, tetapi dibiarkan

// Jalur socket yang berhasil di koneksi sebelumnya
$socket_path = "/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock"; 

// 2. Perbaikan: Menggunakan koneksi 6 parameter dengan jalur socket
// Perhatikan bahwa parameter kelima (port) diisi null, dan parameter keenam adalah socket
$conn = mysqli_connect($host, $username, $password, $database, null, $socket_path);

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>