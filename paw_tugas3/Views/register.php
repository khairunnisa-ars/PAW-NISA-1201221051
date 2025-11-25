<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Momo Store - Register</title>
    <style>
        /* Palet Warna Momo: Pink (#FF69B4) dan Kuning (#FFD700) */
        :root {
            --color-pink: #FF69B4;
            --color-yellow: #FFD700;
            --color-pink-dark: #FF1493;
            --color-shadow: rgba(255, 105, 180, 0.4);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* Background gradien pink ke ungu muda */
            background: linear-gradient(135deg, var(--color-pink) 0%, #F08080 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 15px; /* Lebih bulat */
            box-shadow: 0 10px 30px var(--color-shadow); /* Shadow pink lembut */
            width: 100%;
            max-width: 400px;
            border: 2px solid var(--color-yellow); /* Border kuning ceria */
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 32px;
            color: var(--color-pink-dark);
            margin-bottom: 5px;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
        }
        .header h2 {
            font-size: 20px;
            color: #555;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 600;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: var(--color-pink);
            box-shadow: 0 0 5px var(--color-shadow);
        }
        button {
            width: 100%;
            padding: 12px;
            /* Gradien tombol kuning ke pink */
            background: linear-gradient(90deg, var(--color-yellow) 0%, var(--color-pink) 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.3s;
            box-shadow: 0 4px 10px var(--color-shadow);
            text-transform: uppercase;
        }
        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px var(--color-shadow);
        }
        .alert {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
        }
        .alert-error {
            background-color: #ffe8e8; /* Pink sangat muda */
            color: var(--color-pink-dark);
            border: 1px solid var(--color-pink);
        }
        .login-link {
            text-align: center;
            margin-top: 25px;
            color: #666;
            font-size: 14px;
        }
        .login-link a {
            color: var(--color-pink);
            text-decoration: none;
            font-weight: 700;
            transition: color 0.2s;
        }
        .login-link a:hover {
            color: var(--color-pink-dark);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🌸 Momo Store 🌸</h1>
            <h2>Register Akun Baru</h2>
        </div>
        
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <form action="index.php?action=register" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Konfirmasi Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">DAFTAR SEKARANG</button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="index.php?action=login">Login di sini</a>
        </div>
    </div>
</body>
</html>