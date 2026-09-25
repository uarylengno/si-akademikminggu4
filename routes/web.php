<?php
use App\Config\Database;
use App\Repositories\MahasiswaRepository;
use App\Middleware\AuthMiddleware;
use App\Controllers\DosenController;
use App\Controllers\AuthController;
use App\Controllers\MahasiswaController;

$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');

$database = Database::getInstance();
$mahasiswaRepo = new MahasiswaRepository($database);

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
    $controller = new MahasiswaController($mahasiswaRepo);
    $controller->index();
    exit;
}

if ($url === 'mahasiswa/create') {
    AuthMiddleware::handle();
    $controller = new MahasiswaController($mahasiswaRepo);
    $controller->create();
    exit;
}

if ($url === 'mahasiswa/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    AuthMiddleware::handle();
    $controller = new MahasiswaController($mahasiswaRepo);
    $controller->store();
    exit;
}

if ($url === 'mahasiswa/edit' && isset($_GET['id'])) {
    AuthMiddleware::handle();
    $controller = new MahasiswaController($mahasiswaRepo);
    $controller->edit($_GET['id']);
    exit;
}

if ($url === 'mahasiswa/update' && isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    AuthMiddleware::handle();
    $controller = new MahasiswaController($mahasiswaRepo);
    $controller->update($_GET['id']);
    exit;
}

if ($url === 'mahasiswa/delete' && isset($_GET['id'])) {
    AuthMiddleware::handle();
    $controller = new MahasiswaController($mahasiswaRepo);
    $controller->destroy($_GET['id']);
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
    $controller = new MahasiswaController($mahasiswaRepo);
    $controller->detail();
    exit;
}

echo "<h1>Error 404 - Halaman Tidak Ditemukan</h1>";
echo "<p>URL yang kamu minta: <strong>" . htmlspecialchars($url) . "</strong> belum terdaftar di routes/web.php</p>";
exit;