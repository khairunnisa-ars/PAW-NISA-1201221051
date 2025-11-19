<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Momo Store - Dashboard</title>
    <style>
        /* Palet Warna Momo: Pink (#FF69B4) dan Kuning (#FFD700) */
        :root {
            --color-pink: #FF69B4;
            --color-yellow: #FFD700;
            --color-pink-dark: #FF1493;
            --color-shadow-light: rgba(255, 105, 180, 0.3);
            --color-bg-gradient: linear-gradient(135deg, #FFF0F5 0%, #FFEBCD 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--color-bg-gradient);
            min-height: 100vh;
            padding: 30px 20px;
        }

        /* --- HEADER CONTAINER --- */
        .header-container {
            max-width: 1000px;
            margin: 0 auto 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
            border-top: 5px solid var(--color-pink);
        }
        .header-title h1 {
            color: var(--color-pink-dark);
            font-size: 30px;
            margin-bottom: 5px;
        }
        .header-title p {
            color: #888;
            font-size: 14px;
        }
        .logout-btn {
            padding: 10px 20px;
            background: linear-gradient(45deg, var(--color-yellow) 0%, var(--color-pink) 100%);
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 10px var(--color-shadow-light);
            text-transform: uppercase;
        }
        .logout-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px var(--color-shadow-light);
        }

        /* --- MAIN CONTENT LAYOUT (Grid Ditingkatkan) --- */
        .main-dashboard {
            max-width: 1000px;
            margin: 0 auto;
            grid-template-columns: 2fr 1fr; 
            gap: 30px;
        }

        /* --- Card Styles --- */
        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            margin-bottom: 20px; 
            transition: transform 0.3s;
        }
        .card:hover {
             transform: translateY(-3px);
        }

        .card h3 {
            color: var(--color-pink);
            font-size: 22px;
            margin-bottom: 20px;
            border-bottom: 2px dashed #ffe6f0;
            padding-bottom: 10px;
        }

        /* Welcome Card (Menjangkau kedua kolom) */
        .welcome-card {
            grid-column: 1 / 3; 
            background: var(--color-pink);
            color: white;
            text-align: center;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(255, 105, 180, 0.4);
            margin-bottom: 0; 
        }
        .welcome-card h2 {
            font-size: 36px;
            margin-bottom: 10px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }
        .welcome-card p {
            font-size: 18px;
            opacity: 0.9;
        }
        
        /* Account Info Card (Kolom Kanan) */
        .account-info-card {
            grid-column: 2 / 3; 
            grid-row: 2 / 4; 
            background: #fffafa;
            border: 1px solid #ffccdd;
            margin-bottom: 0;
        }
        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px dashed #f0f0f0;
            font-size: 15px;
        }
        .info-item:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: var(--color-pink-dark);
            width: 140px;
        }
        .info-value {
            color: #333;
            text-align: right;
        }

        /* Kolom Kiri (Berisi 2 Card: Koleksi & Update) */
        .left-column-cards {
            grid-column: 1 / 2; 
            display: flex;
            flex-direction: column; 
            gap: 20px; 
        }
        .collection-card, .update-card {
            margin-bottom: 0; 
        }

        .collection-card p, .update-card p {
            margin-bottom: 15px;
            color: #666;
            line-height: 1.6;
        }
        .feature-list {
            padding-left: 0;
            list-style: none;
        }
        .feature-list li {
            font-size: 15px;
            margin-bottom: 10px;
            color: #555;
            display: flex;
            align-items: center;
        }
        .feature-list li::before {
            content: '💖';
            margin-right: 10px;
        }
        /* New Card Style */
        .update-card {
            border-left: 5px solid var(--color-yellow);
        }
        .update-item {
            background: #fffafa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            border: 1px solid #fce4ec;
        }
        .update-item h4 {
            color: var(--color-pink-dark);
            font-size: 16px;
            margin-bottom: 5px;
        }
        .update-item p {
            font-size: 13px;
            color: #999;
            margin: 0;
        }


        /* Responsive Layout */
        @media (max-width: 850px) {
            .main-dashboard {
                grid-template-columns: 1fr; 
                gap: 20px;
            }
            .welcome-card, .account-info-card, .left-column-cards {
                grid-column: 1 / 2;
                grid-row: auto; 
            }
            .header-container {
                flex-direction: column;
                gap: 15px;
            }
            .header-title h1 {
                font-size: 26px;
            }
        }
    </style>
</head>
<body>
    <div class="header-container">
        <div class="header-title">
            <h1>🛍️ Momo Store Dashboard</h1>
            <p>Hallo, <span style="font-weight: 700; color: var(--color-pink-dark);"><?php echo htmlspecialchars($_SESSION['username']); ?></span>! Selamat Berbelanja.</p>
        </div>
        <a href="index.php?action=logout" class="logout-btn">LOGOUT</a>
    </div>

    <div class="main-dashboard">
        <div class="welcome-card card">
            <h2>Selamat Datang Kembali!</h2>
            <p>Sistem ini telah mencatat akun Anda dengan ID unik: <?php echo htmlspecialchars($_SESSION['user_id']); ?></p>
        </div>
        
        <div class="account-info-card card">
            <h3>🔑 Detail Akun</h3>
            <div class="info-item">
                <div class="info-label">Username:</div>
                <div class="info-value"><?php echo htmlspecialchars($_SESSION['username']); ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Email:</div>
                <div class="info-value"><?php echo htmlspecialchars($_SESSION['email']); ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">ID Pengguna:</div>
                <div class="info-value"><?php echo htmlspecialchars($_SESSION['user_id']); ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Status:</div>
                <div class="info-value" style="color: var(--color-pink-dark); font-weight: 700;">Aktif (Member)</div>
            </div>
        </div>

        <div class="left-column-cards">
            <div class="collection-card card">
                <h3>💖 Koleksi Unggulan Momo Store</h3>
                <p>Selamat datang di Momo Store, pusat belanja serba *cute* dan feminin! Kami menyediakan berbagai kebutuhan wanita yang menggemaskan dan paling populer, mulai dari aksesoris unik hingga produk gaya hidup yang lucu dan estetik.</p>
                <ul class="feature-list">
                    <li>Aksesori lucu dan unik (jepit rambut, *scrunchie*, bando)</li>
                    <li>Alat tulis estetik (pulpen karakter, *sticky notes* warna-warni)</li>
                    <li>Dekorasi kamar yang *girly* dan nyaman</li>
                    <li>Tas dan dompet minimalis dengan sentuhan kawaii</li>
                </ul>
            </div>
            
            <div class="update-card card">
                <h3>📢 Pembaruan Terbaru</h3>
                <p style="margin-bottom: 15px;">Lihat apa yang baru dan *trending* di toko kami!</p>
                
                <div class="update-item">
                    <h4>Promo Spesial: Diskon 20%</h4>
                    <p>Semua produk kategori 'Aksesori Rambut' sedang diskon besar hingga akhir bulan!</p>
                </div>
                 <div class="update-item">
                    <h4>Item Baru: Gantungan Kunci 'Fluffy Cat'</h4>
                    <p>Stok terbatas! Dapatkan koleksi gantungan kunci kucing gemas sekarang.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>