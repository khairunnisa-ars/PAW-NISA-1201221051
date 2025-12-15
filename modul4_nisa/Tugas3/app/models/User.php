<?php
class User {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function register($username, $password) {
        $check = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $check->execute([$username]);
        if ($check->rowCount() > 0) return false;

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        return $stmt->execute([$username, $hash]);
    }

    public function login($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $username;
            return true;
        }
        return false;
    }
}
?>
