<?php
require "./connect.php";

if (isset($_POST["update"])) {
    $id = $_POST["id"];

    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $penerbit = $_POST["penerbit"];
    $tahun_terbit = $_POST["tahun_terbit"];
    $genre = $_POST["genre"];
    $jumlah_halaman = $_POST["jumlah_halaman"];
    $stok = $_POST["stok"];

    // TODO: Buat query UPDATE untuk memperbarui data buku berdasarkan ID
    // Contoh:
    // $query = "UPDATE book_list SET judul_buku='$judul', ... WHERE id=$id";
    // mysqli_query($conn, $query);
    $query = "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit=$tahun_terbit, genre='$genre', jumlah_halaman=$jumlah_halaman, stok=$stok WHERE id='$id'";
    mysqli_query($conn, $query);

    // TODO: Cek keberhasilan update dengan mysqli_affected_rows($conn)
    if (mysqli_affected_rows($conn) > 0) {
        echo "Data berhasil diupdate";
        header("Location: list_buku.php");
    } else {
        echo "Data gagal diupdate";
        echo "<br>";
        echo mysqli_error($conn);
    }
}
?>