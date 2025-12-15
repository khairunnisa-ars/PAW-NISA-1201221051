<?php

require_once BASE_PATH . '/app/models/User.php';

class RegisterController {

    public function index() {
        // Menampilkan halaman register
        include BASE_PATH . '/app/views/register.php';
    }

    public function store() {
        include BASE_PATH . '/public/config.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = new User($conn);
            $result = $user->register($_POST['username'], $_POST['email'], $_POST['password']);

            if ($result === true) {
                header("Location: /Tugas3/public/index.php?url=login&success=1");
                exit();
            } else {
                header("Location: /Tugas3/public/index.php?url=register&error=" . urlencode($result));
                exit();
            }
        }
    }
}
