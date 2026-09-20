<?php
use App\Middleware\AuthMiddleware;
use App\Controllers\DosenController;
use App\Controllers\AuthController;
use App\Controllers\MahasiswaController;

$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');

if ($url === 'auth/login' || $url === 'login' || $url === '') {
    $controller = new AuthController();
    $controller->login();
    exit;
}

if ($url === 'login/process') {
    $controller = new AuthController();
    $controller->processLogin();
    exit;
}

if ($url === 'logout') {
    $controller = new AuthController();
    $controller->logout();
    exit;
}

if ($url === 'dashboard') {
    AuthMiddleware::handle();
    require_once __DIR__ . '/../app/Views/dashboard/index.php';
    exit;
}

if ($url === 'dosen/detail') {
    AuthMiddleware::handle();
    $controller = new DosenController();
    $controller->detail();
    exit;
}

if ($url === 'dosen') {
    AuthMiddleware::handle();
    $controller = new DosenController();
    $controller->index();
    exit;
}

if ($url === 'mahasiswa') {
    AuthMiddleware::handle();
    $controller = new MahasiswaController();
    $controller->index();
    exit;
}

echo "<h1>Error 404 - Halaman Tidak Ditemukan</h1>";
echo "<p>URL yang kamu minta: <strong>" . htmlspecialchars($url) . "</strong> belum terdaftar di routes/web.php</p>";
exit;