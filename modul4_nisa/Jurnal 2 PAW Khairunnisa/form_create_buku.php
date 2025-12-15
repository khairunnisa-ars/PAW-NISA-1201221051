<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include("navbar.php") ?>
    <center>
        <div class="container mt-4">
            <h1>Tambah Buku</h1>
            <div class="col-md-4 p-3">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="create.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="xjudul" id="judul" required>
                                <label for="judul">Judul Buku</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="xpenulis" id="penulis" required>
                                <label for="penulis">Penulis</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="xpenerbit" id="penerbit">
                                <label for="penerbit">Penerbit</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="xtahun_terbit" id="tahun_terbit" min="1900" max="2099">
                                <label for="tahun_terbit">Tahun Terbit</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="xgenre" id="genre">
                                <label for="genre">Genre</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="xjumlah_halaman" id="jumlah_halaman">
                                <label for="jumlah_halaman">Jumlah Halaman</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="xstok" id="stok" min="0" value="0">
                                <label for="stok">Stok</label>
                            </div>

                            <button type="submit" name="create" id="create" class="btn btn-primary w-100 mt-3">Tambah Buku</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>
</html>