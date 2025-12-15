<?php
// Jika ada pesan sukses atau error dari redirect controller
$message = '';
if (isset($_GET['error'])) {
    $message = urldecode($_GET['error']);
} elseif (isset($_GET['success'])) {
    $message = "Registrasi berhasil! Silakan login.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Momo Store - Daftar Akun</title>
    <style>
        /* Variabel Warna */
        :root {
            --pink-soft: #FFB6C1; /* Pink Muda / Light Pink */
            --yellow-soft: #FFFACD; /* Kuning Muda / Lemon Chiffon */
            --text-color: #333;
            --button-hover: #FFA07A; /* Coral Muda untuk hover */
            --success-color: #4CAF50; /* Hijau untuk pesan sukses */
            --error-color: #F44336; /* Merah untuk pesan error */
        }

        /* Styling Body Keseluruhan */
        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--yellow-soft); /* Background Kuning Soft */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: var(--text-color);
        }

        /* Styling Kontainer Form */
        .register-container {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            border: 3px solid var(--pink-soft); /* Border Pink Soft */
        }

        /* Styling Judul */
        h2 {
            color: var(--pink-soft);
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: bold;
        }

        /* Styling Input */
        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: var(--pink-soft);
            outline: none;
        }

        /* Styling Tombol */
        button[type="submit"] {
            background-color: var(--pink-soft);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-top: 5px;
        }

        button[type="submit"]:hover {
            background-color: var(--button-hover);
        }

        /* Styling Pesan Status (Error/Success) */
        .status-message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }

        /* Styling spesifik untuk pesan Error */
        .status-message.error {
            color: var(--error-color);
            background-color: #FFEBEE; /* Light Red Background */
            border: 1px solid var(--error-color);
        }

        /* Styling spesifik untuk pesan Success */
        .status-message.success {
            color: var(--success-color);
            background-color: #E8F5E9; /* Light Green Background */
            border: 1px solid var(--success-color);
        }

        /* Styling Link Login */
        .login-link {
            margin-top: 20px;
            font-size: 14px;
        }

        .login-link a {
            color: var(--pink-soft);
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
    
    <?php
    // Tentukan class CSS untuk pesan (error atau success)
    $message_class = '';
    if (isset($_GET['error'])) {
        $message_class = 'error';
    } elseif (isset($_GET['success'])) {
        $message_class = 'success';
    }
    ?>

</head>
<body>
    <div class="register-container">
        <h2>Momo Store Daftar</h2>

        <?php if (!empty($message)) : ?>
            <p class="status-message <?= $message_class ?>">
                <?= htmlspecialchars($message) ?>
            </p>
        <?php endif; ?>

        <form method="POST" action="../app/controllers/registerController.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
            <button type="submit">Daftar Akun</button>
        </form>

        <p class="login-link">Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</body>
</html>