<?php
require "connect.php";

if (isset($_POST["create"])) {
    $judul          = $_POST["xjudul"];
    $penulis        = $_POST["xpenulis"];
    $penerbit       = $_POST["xpenerbit"];
    $tahun_terbit   = $_POST["xtahun_terbit"];
    $genre          = $_POST["xgenre"];
    $jumlah_halaman = $_POST["xjumlah_halaman"];
    $stok           = $_POST["xstok"];

    // TODO: Buat query INSERT ke tabel book_list menggunakan data dari form di atas.
    // Contoh:
    // $query = "INSERT INTO book_list (...) VALUES (...)";
    // mysqli_query($conn, $query);
    $query = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, genre, jumlah_halaman, stok) VALUES ('$judul', '$penulis', '$penerbit', $tahun_terbit, '$genre', $jumlah_halaman, $stok)";
    mysqli_query($conn, $query);

    // TODO: Tambahkan pengecekan apakah data berhasil ditambahkan
    // Gunakan mysqli_affected_rows($conn) > 0 untuk menentukan keberhasilan
    if (mysqli_affected_rows($conn) > 0) {
        echo "Data berhasil ditambahkan";
        header ("Location: list_buku.php");
    } else {
        echo "Data gagal ditambahkan";
        echo "<br>";
        echo mysqli_error($conn);
    }
}
?>