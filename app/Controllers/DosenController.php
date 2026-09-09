<?php
namespace App\Controllers;
use App\Models\Dosen;

class DosenController {
    public function index() {
        $dosenModel = new Dosen();
        $dosen = $dosenModel->getAllDosen();
        require_once __DIR__ . '/../Views/dosen/index.php';
    }

    public function detail() {
        $dosenModel = new Dosen();
        $nidn = $_GET['nidn'] ?? null;
        $dosen = $dosenModel->getByNidn($nidn);
        require_once __DIR__ . '/../Views/dosen/detail.php';
    }
}