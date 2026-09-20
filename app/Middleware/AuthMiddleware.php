<?php
namespace App\Middleware;

class AuthMiddleware
{
    public static function handle()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) && !isset($_SESSION['username'])) {
            header('Location: /si-akademik/public/auth/login');
            exit;
        }
    }
}