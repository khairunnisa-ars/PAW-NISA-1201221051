<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Momo Store - Masuk</title>
    <style>
        /* Variabel Warna */
        :root {
            --pink-soft: #FFB6C1; /* Pink Muda / Light Pink */
            --yellow-soft: #FFFACD; /* Kuning Muda / Lemon Chiffon */
            --text-color: #333;
            --button-hover: #FFA07A; /* Coral Muda untuk hover */
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
        .login-container {
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
        }

        button[type="submit"]:hover {
            background-color: var(--button-hover);
        }

        /* Styling Pesan Error */
        .error-message {
            color: red;
            margin-bottom: 15px;
            font-weight: bold;
        }

        /* Styling Link Daftar */
        .register-link {
            margin-top: 20px;
            font-size: 14px;
        }

        .register-link a {
            color: var(--pink-soft);
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Momo Store Login</h2>
        <?php if (!empty($message)) echo "<p class='error-message'>$message</p>"; ?>

        <form method="POST" action="login">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Masuk</button>
        </form>
        <p class="register-link">Belum punya akun? <a href="register">Daftar disini</a></p>
    </div>
</body>
</html>