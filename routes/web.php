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
if ($url === 'dosen/create') {
    AuthMiddleware::handle();
    $controller = new DosenController();
    $controller->create();
    exit;
}

if ($url === 'dosen/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    AuthMiddleware::handle();
    $controller = new DosenController();
    $controller->store();
    exit;
}

if ($url === 'dosen/edit' && isset($_GET['id'])) {
    AuthMiddleware::handle();
    $controller = new DosenController();
    $controller->edit($_GET['id']);
    exit;
}

if ($url === 'dosen/update' && isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    AuthMiddleware::handle();
    $controller = new DosenController();
    $controller->update($_GET['id']);
    exit;
}

if ($url === 'dosen/delete' && isset($_GET['id'])) {
    AuthMiddleware::handle();
    $controller = new DosenController();
    $controller->delete($_GET['id']);
    exit;
}
if ($url === 'mahasiswa/detail' && isset($_GET['nim'])) {
    AuthMiddleware::handle();
    $controller = new MahasiswaController();
    $controller->detail();
    exit;
}

echo "<h1>Error 404 - Halaman Tidak Ditemukan</h1>";
echo "<p>URL yang kamu minta: <strong>" . htmlspecialchars($url) . "</strong> belum terdaftar di routes/web.php</p>";
exit;