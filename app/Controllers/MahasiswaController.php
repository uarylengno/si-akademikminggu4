<?php

namespace App\Controllers;

use App\Repositories\MahasiswaRepository;
use App\Models\Mahasiswa;

class MahasiswaController extends BaseController
{
    private MahasiswaRepository $repo;

    public function __construct(MahasiswaRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index(): void
    {
        $mahasiswa = $this->repo->getAll();
        $this->view('mahasiswa/index', ['mahasiswa' => $mahasiswa]);
    }

    public function detail(): void
    {
        $nim = $_GET['nim'] ?? '';
        $mahasiswa = $this->repo->getByNim($nim);
        $this->view('mahasiswa/detail', ['mahasiswa' => $mahasiswa]);
    }

    public function create(): void
    {
        $dosenList = $this->repo->getAllDosen();
        $this->view('mahasiswa/create', ['dosenList' => $dosenList]);
    }

    public function store(): void
    {
        try {
            $mhs = new Mahasiswa(
                $_POST['nim'] ?? '',
                $_POST['nama'] ?? '',
                $_POST['prodi'] ?? '',
                !empty($_POST['dosen_id']) ? (int) $_POST['dosen_id'] : null
            );
            $this->repo->create($mhs);
            $this->redirect('/si-akademik/public/mahasiswa');
        } catch (\InvalidArgumentException $e) {
            $dosenList = $this->repo->getAllDosen();
            $this->view('mahasiswa/create', [
                'error' => $e->getMessage(),
                'dosenList' => $dosenList,
            ]);
        }
    }

    public function edit($id): void
    {
        $mahasiswa = $this->repo->find((int) $id);
        $dosenList = $this->repo->getAllDosen();
        $this->view('mahasiswa/edit', [
            'mahasiswa' => $mahasiswa,
            'dosenList' => $dosenList,
        ]);
    }

    public function update($id): void
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
            $this->redirect('/si-akademik/public/mahasiswa');
        } catch (\InvalidArgumentException $e) {
            $mahasiswa = $this->repo->find((int) $id);
            $dosenList = $this->repo->getAllDosen();
            $this->view('mahasiswa/edit', [
                'error' => $e->getMessage(),
                'mahasiswa' => $mahasiswa,
                'dosenList' => $dosenList,
            ]);
        }
    }

    public function destroy($id): void
    {
        $this->repo->delete((int) $id);
        $this->redirect('/si-akademik/public/mahasiswa');
    }
}