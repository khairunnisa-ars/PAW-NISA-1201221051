<?php
// Inisialisasi variabel
$name = $email = $nim = $jurusan = $fakultas = "";
$error = "";
$success = "";
$data = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $nim = trim($_POST["nim"]);
    $jurusan = trim($_POST["jurusan"]);
    $fakultas = trim($_POST["fakultas"]);

    // Validasi kosong
    if (empty($name) || empty($email) || empty($nim) || empty($jurusan) || empty($fakultas)) {
        $error = "⚠️ Semua kolom wajib diisi!";
    } 
    // Validasi format
    elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $error = "❌ Nama hanya boleh berisi huruf dan spasi!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "❌ Format email tidak valid!";
    } elseif (!is_numeric($nim)) {
        $error = "❌ NIM harus berupa angka!";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $jurusan)) {
        $error = "❌ Jurusan hanya boleh berisi huruf!";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $fakultas)) {
        $error = "❌ Fakultas hanya boleh berisi huruf!";
    } 
    else {
        $success = "✅ Pendaftaran berhasil diterima!";
        $data = [
            "Nama" => $name,
            "Email" => $email,
            "NIM" => $nim,
            "Jurusan" => $jurusan,
            "Fakultas" => $fakultas
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Mahasiswa Baru</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Formulir Pendaftaran Mahasiswa Baru</h2>

        <?php if ($error): ?>
            <div class="alert error"><?php echo $error; ?></div>
        <?php elseif ($success): ?>
            <div class="alert success"><?php echo $success; ?></div>
        <?php endif; ?>

        <?php if (empty($success)): ?>
        <form method="POST" action="">
            <label>Nama:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($name) ?>" placeholder="Masukkan nama lengkap">

            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" placeholder="Masukkan email aktif">

            <label>NIM:</label>
            <input type="text" name="nim" value="<?= htmlspecialchars($nim) ?>" placeholder="Masukkan NIM">

            <label>Jurusan:</label>
            <input type="text" name="jurusan" value="<?= htmlspecialchars($jurusan) ?>" placeholder="Masukkan jurusan">

            <label>Fakultas:</label>
            <input type="text" name="fakultas" value="<?= htmlspecialchars($fakultas) ?>" placeholder="Masukkan fakultas">

            <button type="submit">Daftar</button>
        </form>
        <?php endif; ?>

        <?php if (!empty($data)): ?>
            <h3>Data Pendaftar</h3>
            <div class="table-container">
                <table>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th>Fakultas</th>
                    </tr>
                    <tr>
                        <td><?= $data["Nama"] ?></td>
                        <td><?= $data["Email"] ?></td>
                        <td><?= $data["NIM"] ?></td>
                        <td><?= $data["Jurusan"] ?></td>
                        <td><?= $data["Fakultas"] ?></td>
                    </tr>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
