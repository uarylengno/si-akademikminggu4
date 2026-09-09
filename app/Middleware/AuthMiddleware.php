<?php
namespace App\Middleware;

class AuthMiddleware {
    public function handle() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
            header('Location: /si-akademik/public/login');
            exit;
        }
    }
}