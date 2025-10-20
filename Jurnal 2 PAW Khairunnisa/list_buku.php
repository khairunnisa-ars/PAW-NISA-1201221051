<?php
include("connect.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';

$query = "SELECT * FROM buku WHERE judul LIKE '%$search%' OR penulis LIKE '%$search%' ORDER BY tanggal_input DESC";

$data = mysqli_query($conn, $query);

// TODO: Buat array untuk menyimpan hasil query, kemudian tampilkan menggunakan loop.
// Contoh:
// while ($book = mysqli_fetch_assoc($data)) {
//     // tampilkan baris tabel untuk setiap buku

$books = [];
while ($book = mysqli_fetch_assoc($data)) {
    $books[] = $book;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include("navbar.php") ?>

    <div class="container mt-5">
        <center>
            <h1>Daftar Buku Perpustakaan</h1>

            <form action="list_buku.php" method="GET" class="form-inline mb-3" style="display: flex; align-items: center; width: 60%;">
                <input class="form-control me-2" type="search" name="search" placeholder="Cari judul atau penulis..." aria-label="Search" value="<?= htmlspecialchars($search) ?>">
                <button class="btn btn-outline-success" type="submit">Cari</button>
            </form>
        </center>

        <table class="table align-middle table-striped table-bordered mt-4">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Jumlah Halaman</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($books) == 0) : ?>
                    <tr>
                        <td colspan="9" class="text-center text-danger">TIDAK ADA DATA</td>
                    </tr>
                <?php endif; ?>

                <?php 
                $no = 1;
                foreach ($books as $book) : 
                ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= htmlspecialchars($book["judul"]) ?></td>
                        <td><?= htmlspecialchars($book["penulis"]) ?></td>
                        <td><?= htmlspecialchars($book["penerbit"]) ?></td>
                        <td class="text-center"><?= htmlspecialchars($book["tahun_terbit"]) ?></td>
                        <td><?= htmlspecialchars($book["genre"]) ?></td>
                        <td class="text-center"><?= htmlspecialchars($book["jumlah_halaman"]) ?></td>
                        <td class="text-center"><?= htmlspecialchars($book["stok"]) ?></td>
                        <td class="text-center">
                            <a href="detail_buku.php?id=<?= $book["id"] ?>" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>