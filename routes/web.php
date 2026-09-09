<?php
use App\Controllers\AuthController;
use App\Controllers\MahasiswaController;
use App\Controllers\DosenController;
use App\Middleware\AuthMiddleware;

$url = $_GET['url'] ?? '';

$authController = new AuthController();
$mhsController = new MahasiswaController();
$dosenController = new DosenController();
$authMiddleware = new AuthMiddleware();

if ($url === 'login') {
    $authController->login();
} elseif ($url === 'login/process') {
    $authController->processLogin();
} elseif ($url === 'logout') {
    $authController->logout();
} elseif ($url === 'dashboard') {
    $authMiddleware->handle();
    require_once __DIR__ . '/../app/Views/dashboard/index.php';
} elseif ($url === 'mahasiswa') {
    $authMiddleware->handle();
    $mhsController->index();
} elseif ($url === 'mahasiswa/detail') {
    $authMiddleware->handle();
    $mhsController->detail();
} elseif ($url === 'dosen') {
    $authMiddleware->handle();
    $dosenController->index();
} elseif ($url === 'dosen/detail') { 
    $authMiddleware->handle();
    $dosenController->detail();
} else {
    http_response_code(404);
    echo "404 Not Found";
}