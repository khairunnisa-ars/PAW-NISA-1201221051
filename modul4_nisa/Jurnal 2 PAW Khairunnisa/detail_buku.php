<?php
include("connect.php");

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>
            alert('ID buku tidak ditemukan!');
            window.location.href = 'list_buku.php';
          </script>";
    exit;
}

$id = intval($_GET['id']); 

$query = "SELECT * FROM buku WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    echo "<script>
            alert('Data buku tidak ditemukan!');
            window.location.href = 'list_buku.php';
          </script>";
    exit;
}

$book = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku - <?= htmlspecialchars($book["judul"]) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include("navbar.php"); ?>

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0"><?= htmlspecialchars($book["judul"]) ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 200px;">Judul Buku</th>
                        <!-- isikan <td> dengan value contoh <?= htmlspecialchars($book["judul"]) ?>  -->
                        <!-- <td></td> -->
                         <td><?= htmlspecialchars($book["judul"]) ?></td>
                    </tr>
                    <tr>
                        <th>Penulis</th>
                        <td><?= htmlspecialchars($book["penulis"]) ?></td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td><?= htmlspecialchars($book["penerbit"]) ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Terbit</th>
                        <td><?= htmlspecialchars($book["tahun_terbit"]) ?></td>
                    </tr>
                    <tr>
                        <th>Genre</th>
                        <td><?= htmlspecialchars($book["genre"]) ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah Halaman</th>
                        <td><?= htmlspecialchars($book["jumlah_halaman"]) ?></td>
                    </tr>
                    <tr>
                        <th>Stok Buku</th>
                        <td><?= htmlspecialchars($book["stok"]) ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Input</th>
                        <td><?= htmlspecialchars($book["tanggal_input"]) ?></td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="list_buku.php" class="btn btn-secondary">Kembali</a>
                    <a href="form_update_buku.php?id=<?= $book['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="delete.php?id=<?= $book['id'] ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>