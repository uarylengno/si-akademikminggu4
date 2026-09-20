<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autoloader untuk mendeteksi class berdasarkan Namespace App\...
spl_autoload_register(function ($class) {
    // Ubah App\Controllers\DosenController menjadi Controllers/DosenController
    $class = str_replace('App\\', '', $class);
    $file = __DIR__ . '/../app/' . str_replace('\\', '/', $class) . '.php';
    
    if (file_exists($file)) {
        require_once $file;
    }
});

// Panggil file konfigurasi database agar variabel $pdo bisa diakses global
require_once __DIR__ . '/../config/config.php';

// Tangkap URL
$url = $_GET['url'] ?? '';

// Panggil file routing
require_once __DIR__ . '/../routes/web.php';