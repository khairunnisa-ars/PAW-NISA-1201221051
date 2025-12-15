<?php
include("navbar.php");
include("connect.php");

// Check if id parameter exists
if (!isset($_GET['id'])) {
    die("Error: ID buku tidak ditemukan. Silakan akses halaman ini melalui daftar buku.");
}

$id = $_GET['id'];

// TODO: Ambil data buku berdasarkan ID seperti di form_detail_buku.php
// Gunakan query SELECT untuk mengambil 1 data berdasarkan ID dari tabel book_list
// Contoh:
// $query = "SELECT * FROM book_list WHERE id = $id";
// $result = mysqli_query($conn, $query);
// $buku = [];
// while ($row = mysqli_fetch_assoc($result)) {
//     $buku[] = $row;
// }
$query = "SELECT * FROM buku WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$buku = [];
while ($row = mysqli_fetch_assoc($result)) {
    $buku[] = $row;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbarui Detail Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <center><h1>Perbarui Detail Buku</h1></center>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="update.php" method="POST">
                            <!-- Input tersembunyi untuk mengirim ID ke update.php -->
                            <input type="hidden" name="id" value="<?= $buku[0]['id'] ?>">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="judul" id="judul" 
                                       value="<?= $buku[0]['judul'] ?>" required>
                                <label for="judul">Judul Buku</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="penulis" id="penulis" 
                                       value="<?= $buku[0]['penulis'] ?>" required>
                                <label for="penulis">Penulis</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="penerbit" id="penerbit" 
                                       value="<?= $buku[0]['penerbit'] ?>">
                                <label for="penerbit">Penerbit</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="tahun_terbit" id="tahun_terbit" 
                                       value="<?= $buku[0]['tahun_terbit'] ?>">
                                <label for="tahun_terbit">Tahun Terbit</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="genre" id="genre" 
                                       value="<?= $buku[0]['genre'] ?>">
                                <label for="genre">Genre</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="jumlah_halaman" id="jumlah_halaman" 
                                       value="<?= $buku[0]['jumlah_halaman'] ?>">
                                <label for="jumlah_halaman">Jumlah Halaman</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="stok" id="stok" 
                                       value="<?= $buku[0]['stok'] ?>" required>
                                <label for="stok">Stok Buku</label>
                            </div>

                            <button type="submit" name="update" class="btn btn-primary w-100 mt-3">
                                Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>