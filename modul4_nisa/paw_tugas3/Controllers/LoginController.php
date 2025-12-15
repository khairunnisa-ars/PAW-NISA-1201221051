<?php
require_once __DIR__ . '/../Models/User.php';

class LoginController {
    private $db;
    private $user;

    public function __construct() {
        session_start();
        $host = "localhost";
        $port = "3306";
        $db_name = "paw_tugas3";
        $username = "root";
        $password = "";
        
        try {
            $this->db = new PDO("mysql:host=" . $host . ";port=" . $port . ";dbname=" . $db_name, $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->exec("set names utf8");
        } catch(PDOException $exception) {
            die("Connection error: " . $exception->getMessage());
        }
        
        $this->user = new User($this->db);
    }

    public function showLogin() {
        if(isset($_SESSION['user_id'])) {
            header("Location: index.php?action=dashboard");
            exit();
        }
        require_once __DIR__ . '/../Views/login.php';
    }

    public function showRegister() {
        if(isset($_SESSION['user_id'])) {
            header("Location: index.php?action=dashboard");
            exit();
        }
        require_once __DIR__ . '/../Views/register.php';
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->user->email = $_POST['email'];
            $this->user->password = $_POST['password'];

            if($this->user->login()) {
                $_SESSION['user_id'] = $this->user->id;
                $_SESSION['username'] = $this->user->username;
                $_SESSION['email'] = $this->user->email;
                header("Location: index.php?action=dashboard");
                exit();
            } else {
                $_SESSION['error'] = "Email atau password salah!";
                header("Location: index.php?action=login");
                exit();
            }
        }
    }

    public function register() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->user->username = $_POST['username'];
            $this->user->email = $_POST['email'];
            $this->user->password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if(empty($this->user->username) || empty($this->user->email) || empty($this->user->password)) {
                $_SESSION['error'] = "Semua field harus diisi!";
                header("Location: index.php?action=register");
                exit();
            }

            if($this->user->password !== $confirm_password) {
                $_SESSION['error'] = "Password tidak cocok!";
                header("Location: index.php?action=register");
                exit();
            }

            if($this->user->emailExists()) {
                $_SESSION['error'] = "Email sudah terdaftar!";
                header("Location: index.php?action=register");
                exit();
            }

            if($this->user->register()) {
                $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
                header("Location: index.php?action=login");
                exit();
            } else {
                $_SESSION['error'] = "Registrasi gagal!";
                header("Location: index.php?action=register");
                exit();
            }
        }
    }

    public function dashboard() {
        if(!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit();
        }
        require_once __DIR__ . '/../Views/dashboard.php';
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
        exit();
    }
}