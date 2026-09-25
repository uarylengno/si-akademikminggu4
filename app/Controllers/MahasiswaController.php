<?php

namespace App\Controllers;

use App\Repositories\MahasiswaRepository;
use App\Models\Mahasiswa;

class MahasiswaController
{
    private MahasiswaRepository $repo;

    public function __construct(MahasiswaRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $mahasiswa = $this->repo->getAll();
        require_once __DIR__ . '/../Views/mahasiswa/index.php';
    }

    public function detail()
    {
        $nim = $_GET['nim'] ?? '';
        $mahasiswa = $this->repo->getByNim($nim);
        require_once __DIR__ . '/../Views/mahasiswa/detail.php';
    }

    public function create()
    {
        $dosenList = $this->repo->getAllDosen();
        require_once __DIR__ . '/../Views/mahasiswa/create.php';
    }

    public function store()
    {
        try {
            $mhs = new Mahasiswa(
                $_POST['nim'] ?? '',
                $_POST['nama'] ?? '',
                $_POST['prodi'] ?? '',
                !empty($_POST['dosen_id']) ? (int) $_POST['dosen_id'] : null
            );
            $this->repo->create($mhs);
            header('Location: /si-akademik/public/mahasiswa');
            exit;
        } catch (\InvalidArgumentException $e) {
            $error = $e->getMessage();
            $dosenList = $this->repo->getAllDosen();
            require_once __DIR__ . '/../Views/mahasiswa/create.php';
        }
    }

    public function edit($id)
    {
        $mahasiswa = $this->repo->find((int) $id);
        $dosenList = $this->repo->getAllDosen();
        require_once __DIR__ . '/../Views/mahasiswa/edit.php';
    }

    public function update($id)
    {
        try {
            $mhs = new Mahasiswa(
                $_POST['nim'] ?? '',
                $_POST['nama'] ?? '',
                $_POST['prodi'] ?? '',
                !empty($_POST['dosen_id']) ? (int) $_POST['dosen_id'] : null,
                (int) $id
            );
            $this->repo->update($mhs);
            header('Location: /si-akademik/public/mahasiswa');
            exit;
        } catch (\InvalidArgumentException $e) {
            $error = $e->getMessage();
            $mahasiswa = $this->repo->find((int) $id);
            $dosenList = $this->repo->getAllDosen();
            require_once __DIR__ . '/../Views/mahasiswa/edit.php';
        }
    }

    public function destroy($id)
    {
        $this->repo->delete((int) $id);
        header('Location: /si-akademik/public/mahasiswa');
        exit;
    }
}