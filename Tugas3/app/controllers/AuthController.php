<?php
require_once BASE_PATH . '/app/models/User.php';

class AuthController {
    public function index() {
        require BASE_PATH . '/app/views/login.php';
    }

    public function register() {
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $confirm  = trim($_POST['confirm_password']);

            if ($password !== $confirm) {
                $message = 'Password tidak cocok!';
            } else {
                $user = new User();
                if ($user->register($username, $password)) {
                    header('Location: login');
                    exit;
                } else {
                    $message = 'Username sudah digunakan.';
                }
            }
        }
        require BASE_PATH . '/app/views/register.php';
    }

    public function login() {
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $user = new User();
            if ($user->login($username, $password)) {
                header('Location: dashboard');
                exit;
            } else {
                $message = 'Username atau password salah!';
            }
        }
        require BASE_PATH . '/app/views/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: login');
        exit;
    }
}
?>
