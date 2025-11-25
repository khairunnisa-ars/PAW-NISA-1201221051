<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PerpustakaanKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
          crossorigin="anonymous">
</head>
<body>
    <?php include("navbar.php") ?>

    <div class="row">
        <center>
            <div class="col-md-6 p-3">
                <div class="row">
                    <h1>Selamat Datang di PerpustakaanKu!</h1>
                </div>
                <div class="row">
                    <div class="col-md-12 p-3">
                        <img width="75%" src="LOGO.png" alt="Logo Perpustakaan">
                    </div>
                    <div class="col-md-6 p-3">
                        <a class="btn btn-outline-primary" href="form_create_buku.php">Tambah Buku</a>
                    </div>
                    <div class="col-md-6 p-3">
                        <a class="btn btn-outline-secondary" href="list_buku.php">Lihat Buku</a>
                    </div>
                </div>
            </div>
        </center>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
            crossorigin="anonymous"></script>
</body>
</html>