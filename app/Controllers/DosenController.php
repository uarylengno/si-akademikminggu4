<?php
namespace App\Controllers;

use App\Models\Dosen;

class DosenController
{
    public function index()
    {
        global $pdo;
        $model = new Dosen($pdo);
        $dosen = $model->getAll();
        
        require_once __DIR__ . '/../Views/dosen/index.php';
    }

    public function detail()
    {
        global $pdo;
        $nidn = $_GET['nidn'] ?? '';
        
        $model = new Dosen($pdo);
        $dosen = $model->getByNidn($nidn);
        
        require_once __DIR__ . '/../Views/dosen/detail.php';
    }
}