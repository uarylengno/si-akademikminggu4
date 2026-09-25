<?php

namespace App\Repositories;

use App\Config\Database;
use App\Models\Mahasiswa;
use PDO;

class MahasiswaRepository
{
    private PDO $pdo;

    public function __construct(Database $database)
    {
        $this->pdo = $database->getConnection();
    }

    public function getAll(): array
    {
        $sql = "SELECT mahasiswa.*, dosen.nama AS nama_dosen 
                FROM mahasiswa 
                LEFT JOIN dosen ON mahasiswa.dosen_id = dosen.id 
                ORDER BY mahasiswa.nama ASC";
        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(fn($row) => $this->mapToEntity($row), $rows);
    }

    public function getByNim(string $nim): ?Mahasiswa
    {
        $sql = "SELECT mahasiswa.*, dosen.nama AS nama_dosen, dosen.nidn, dosen.bidang_keahlian 
                FROM mahasiswa 
                LEFT JOIN dosen ON mahasiswa.dosen_id = dosen.id 
                WHERE mahasiswa.nim = :nim";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['nim' => $nim]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? $this->mapToEntity($row) : null;
    }

    // Dipakai untuk form Edit (cari berdasarkan id, bukan nim)
    public function find(int $id): ?Mahasiswa
    {
        $sql = "SELECT mahasiswa.*, dosen.nama AS nama_dosen 
                FROM mahasiswa 
                LEFT JOIN dosen ON mahasiswa.dosen_id = dosen.id 
                WHERE mahasiswa.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? $this->mapToEntity($row) : null;
    }

    public function create(Mahasiswa $mhs): bool
    {
        $sql = "INSERT INTO mahasiswa (nim, nama, prodi, dosen_id) 
                VALUES (:nim, :nama, :prodi, :dosen_id)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nim' => $mhs->getNim(),
            'nama' => $mhs->getNama(),
            'prodi' => $mhs->getProdi(),
            'dosen_id' => $mhs->getDosenId(),
        ]);
    }

    public function update(Mahasiswa $mhs): bool
    {
        $sql = "UPDATE mahasiswa 
                SET nim = :nim, nama = :nama, prodi = :prodi, dosen_id = :dosen_id 
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nim' => $mhs->getNim(),
            'nama' => $mhs->getNama(),
            'prodi' => $mhs->getProdi(),
            'dosen_id' => $mhs->getDosenId(),
            'id' => $mhs->getId(),
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM mahasiswa WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    // Untuk dropdown pilihan dosen pembimbing di form create/edit
    public function getAllDosen(): array
    {
        $stmt = $this->pdo->query("SELECT id, nama FROM dosen ORDER BY nama ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function mapToEntity(array $row): Mahasiswa
    {
        return new Mahasiswa(
            $row['nim'],
            $row['nama'],
            $row['prodi'] ?? '',
            $row['dosen_id'] ?? null,
            $row['id'] ?? null,
            $row['nama_dosen'] ?? null,
            $row['nidn'] ?? null,
            $row['bidang_keahlian'] ?? null
        );
    }
}