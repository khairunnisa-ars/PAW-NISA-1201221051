<?php
require "connect.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

// TODO: Buat query DELETE untuk menghapus data berdasarkan ID
    // Contoh:
    // $query = "DELETE FROM book_list WHERE id = $id";
    // mysqli_query($conn, $query);
    $query = "DELETE FROM buku WHERE id = $id";
    mysqli_query($conn, $query);
    // TODO: Tambahkan redirect ke list_buku.php setelah delete berhasil
    header("Location: list_buku.php");
}

mysqli_close($conn);
?>