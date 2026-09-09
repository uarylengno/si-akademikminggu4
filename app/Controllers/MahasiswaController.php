<?php
namespace App\Controllers;

use App\Models\Mahasiswa;

class MahasiswaController
{
    public function index()
    {
        $Model = new Mahasiswa();
        $mahasiswa = $Model->getAll();
        require_once __DIR__ . '/../Views/mahasiswa/index.php';
    }

    public function detail()
    {
        $model = new Mahasiswa();
        $nim = $_GET['nim'] ?? null;
        $mahasiswa = $model->getByNim($nim);
        require_once __DIR__ . '/../Views/mahasiswa/detail.php';
    }
}