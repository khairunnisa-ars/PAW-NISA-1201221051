<?php
session_start();
require_once '../../public/config.php';
require_once '../models/User.php';

$user = new User($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user->login($username, $password)) {
        $_SESSION['username'] = $username;  // simpan ke session
        header("Location: ../../public/dashboard.php");
        exit;
    } else {
        header("Location: ../../public/login.php?error=Username atau password salah");
        exit;
    }
}
?>
