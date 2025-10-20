<?php
// host
// Menggunakan IP address (127.0.0.1) atau 'localhost'
$host = "127.0.0.1";

// username
$username = "root";

// password
$pass = "";

// database name
$db = "db_modul2";

// socket path
// JALUR SOCKET DEFAULT XAMPP DI MACOS
$socket_path = "/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock"; 

// connect to db
// FUNGSI INI HANYA MEMILIKI 4 PARAMETER: host, user, pass, db
// KARENA PARAMETER KE-5 (PORT) DIGANTIKAN OLEH PARAMETER KE-6 (SOCKET)
$conn = mysqli_connect($host, $username, $pass, $db, null, $socket_path);

// if cant connect
if ($conn->connect_error) {
  die("Koneksi Gagal: " . $conn->connect_error);
}
?>