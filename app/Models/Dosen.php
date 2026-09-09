<?php
namespace App\Models;

class Dosen {
    public function getAllDosen() {
        return [
            ['nidn' => '001', 'nama' => 'Ahmad', 'prodi' => 'Teknik Informatika'],
            ['nidn' => '002', 'nama' => 'Siti', 'prodi' => 'Sistem Informasi'],
            ['nidn' => '003', 'nama' => 'Budi', 'prodi' => 'Teknik Informatika'],
        ];
    }

    public function getByNidn($nidn) {
        $dosenList = $this->getAllDosen();
        foreach ($dosenList as $d) {
            if ($d['nidn'] === $nidn) {
                return $d;
            }
        }
        return null;
    }
}