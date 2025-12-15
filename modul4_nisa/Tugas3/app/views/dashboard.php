<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Momo Store - Dashboard Utama</title>
    <style>
        /* Variabel Warna (Konsisten dengan halaman Login & Register) */
        :root {
            --pink-soft: #FFB6C1; /* Pink Muda / Light Pink */
            --yellow-soft: #FFFACD; /* Kuning Muda / Lemon Chiffon */
            --text-color: #333;
            --dark-pink: #FF69B4; /* Hot Pink untuk kontras */
            --button-hover: #FFA07A; /* Coral Muda untuk hover */
        }

        /* Styling Body Keseluruhan */
        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--yellow-soft); /* Background Kuning Soft */
            color: var(--text-color);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Styling Header (Banner Pink) */
        .header {
            background-color: var(--pink-soft);
            color: white;
            padding: 20px 50px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 30px;
            letter-spacing: 2px;
            font-weight: bold;
        }
        
        /* Styling Main Content */
        .dashboard-content {
            flex-grow: 1;
            padding: 40px 50px;
            text-align: center;
        }

        .welcome-box {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            max-width: 600px;
            margin: 30px auto;
            border: 2px dashed var(--dark-pink); /* Aksen lucu */
        }

        .welcome-box h2 {
            color: var(--dark-pink); /* Kontras lebih gelap untuk sapaan */
            margin-top: 0;
            font-size: 26px;
        }
        
        .welcome-box p {
            font-size: 16px;
            line-height: 1.6;
        }

        /* Styling Tombol Logout */
        .logout-button {
            background-color: var(--dark-pink);
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 20px; /* Bentuk pil agar lebih lucu */
            font-weight: bold;
            transition: background-color 0.3s;
            margin-left: 20px;
        }

        .logout-button:hover {
            background-color: var(--button-hover);
        }

        /* Styling Footer */
        .footer {
            background-color: var(--pink-soft);
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            margin-top: auto;
        }

        /* Styling Menu Navigasi (Contoh) */
        .nav-link {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-weight: bold;
            transition: opacity 0.3s;
        }

        .nav-link:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎀 Momo Store</h1>
        <div>
            <a href="#" class="nav-link">Produk</a>
            <a href="#" class="nav-link">Keranjang</a>
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
    </div>

    <div class="dashboard-content">
        <div class="welcome-box">
            <h2>Halo, <?php echo htmlspecialchars($username); ?>!</h2>
            <p>Selamat datang di Dashboard Utama Momo Store. Kami harap Anda menemukan barang-barang lucu yang Anda cari!</p>
            <p style="margin-top: 25px; font-style: italic; color: var(--pink-soft);">"Temukan kebahagiaan dalam setiap warna!"</p>
        </div>
        
        <div style="margin-top: 50px;">
            <h3>🌸 Produk Pilihan Kami 🌸</h3>
            <p>Tampilkan item-item terbaru atau promosi di sini.</p>
        </div>
    </div>

    <div class="footer">
        &copy; 2025 Momo Store. Semua Hak Dilindungi.
    </div>
</body>
</html>