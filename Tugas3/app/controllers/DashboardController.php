<?php
class DashboardController {
    public function index() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: login');
            exit;
        }
        $username = $_SESSION['user'];
        require BASE_PATH . '/app/views/dashboard.php';
    }
}
?>
