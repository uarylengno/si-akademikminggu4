<?php
namespace App\Controllers;

use App\Models\Mahasiswa;

class MahasiswaController
{
    // Menampilkan daftar seluruh mahasiswa
    public function index()
    {
        global $pdo; 
        $model = new Mahasiswa($pdo); 
        $mahasiswa = $model->getAll();
        require_once __DIR__ . '/../Views/mahasiswa/index.php';
    }

    // [TAMBAHAN BARU] Menampilkan halaman detail mahasiswa berdasarkan NIM
    public function detail()
    {
        global $pdo;
        $model = new Mahasiswa($pdo);
        $nim = $_GET['nim'] ?? '';
        $mahasiswa = $model->getByNim($nim);
        require_once __DIR__ . '/../Views/mahasiswa/detail.php';
    }
}