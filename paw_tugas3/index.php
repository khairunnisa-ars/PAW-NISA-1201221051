<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_GET['action'])) {
    require_once __DIR__ . '/Controllers/LoginController.php';
    
    $controller = new LoginController();
    $action = $_GET['action'];
    
    switch($action) {
        case 'login':
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $controller->login();
            } else {
                $controller->showLogin();
            }
            break;
        
        case 'register':
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $controller->register();
            } else {
                $controller->showRegister();
            }
            break;
        
        case 'dashboard':
            $controller->dashboard();
            break;
        
        case 'logout':
            $controller->logout();
            break;
        
        default:
            $controller->showLogin();
            break;
    }
    exit();
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Momo Store - Pusat Barang Lucu & Estetik</title>
    <style>
        /* Palet Warna Momo: Pink (#FF69B4) dan Kuning (#FFD700) */
        :root {
            --color-pink: #FF69B4;
            --color-yellow: #FFD700;
            --color-pink-dark: #FF1493;
            --color-shadow: rgba(255, 105, 180, 0.6);
            --color-bg-gradient: linear-gradient(135deg, #FFC0CB 0%, #FFB6C1 100%); 
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif; 
            background: var(--color-bg-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        
        /* Efek Latar Belakang Ceria */
        body::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: var(--color-yellow);
            border-radius: 50%;
            top: -50px;
            right: -50px;
            filter: blur(100px);
            opacity: 0.5;
        }

        .landing-container {
            text-align: center;
            max-width: 600px;
            color: #333;
            background: white;
            padding: 50px 40px;
            border-radius: 25px; 
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
            z-index: 10;
        }
        .logo {
            font-size: 80px;
            margin-bottom: 10px;
            color: var(--color-pink);
            animation: pulse 1.5s infinite alternate;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }

        h1 {
            font-size: 48px;
            margin-bottom: 5px;
            color: var(--color-pink-dark);
        }
        .subtitle {
            font-size: 18px;
            margin-bottom: 40px;
            color: #666;
            font-weight: 300;
        }
        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 0; 
        }
        .btn {
            padding: 15px 35px;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            border-radius: 30px;
            transition: all 0.3s;
            display: inline-block;
            text-transform: uppercase;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        /* Tombol Utama (Login) */
        .btn-primary {
            background: var(--color-pink);
            color: white;
            border: 2px solid var(--color-pink);
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            background: var(--color-pink-dark);
            border-color: var(--color-pink-dark);
            box-shadow: 0 6px 15px var(--color-shadow);
        }
        /* Tombol Kedua (Daftar) */
        .btn-secondary {
            background: var(--color-yellow);
            color: var(--color-pink-dark);
            border: 2px solid var(--color-yellow);
        }
        .btn-secondary:hover {
            transform: translateY(-3px);
            background: white;
            border-color: var(--color-pink);
        }

        /* Menghilangkan Tech Stack */
        .tech-stack {
            display: none;
        }
        
        @media (max-width: 768px) {
            h1 { font-size: 40px; }
            .subtitle { font-size: 16px; }
            .landing-container { padding: 40px 20px; }
        }
    </style>
</head>
<body>
    <div class="landing-container">
        <div class="logo">💖</div>
        <h1>Momo Store</h1>
        <div class="subtitle">Pusat belanja *online* aneka barang lucu, estetik, dan *girly* yang siap mempercantik harimu!</div>

        <div class="cta-buttons">
            <a href="index.php?action=login" class="btn btn-primary">MASUK KE TOKO</a>
            <a href="index.php?action=register" class="btn btn-secondary">BUKA AKUN</a>
        </div>
    </div>
</body>
</html>