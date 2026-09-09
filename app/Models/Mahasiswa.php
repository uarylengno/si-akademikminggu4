<?php
namespace App\Models;

class Mahasiswa
{
    public function getAll()
    {
        return [
            [
                'nim' => '23001',
                'nama' => 'Andi',
                'prodi' => 'Teknik Informatika'
            ],
            [
                'nim' => '23002',
                'nama' => 'Budi',
                'prodi' => 'Teknik Informatika'
            ],
            [
                'nim' => '23003',
                'nama' => 'Citra',
                'prodi' => 'Teknik Informatika'
            ],
            [
                'nim' => '23004',
                'nama' => 'Rozi',
                'prodi' => 'Teknik Informatika'
            ],
            [
                'nim' => '23005',
                'nama' => 'Alex',
                'prodi' => 'Teknik Informatika'
            ],
            [
                'nim' => '23006',
                'nama' => 'Ello',
                'prodi' => 'Teknik Informatika'
            ]
        ];
    }

    public function getByNim($nim)
    {
        $mahasiswa = $this->getAll();

        foreach ($mahasiswa as $mhs) {
            if ($mhs['nim'] === $nim) {
                return $mhs;
            }
        }
        return null;
    }
}