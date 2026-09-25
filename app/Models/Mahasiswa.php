<?php

namespace App\Models;

class Mahasiswa
{
    private ?int $id;
    private string $nim;
    private string $nama;
    private string $prodi;
    private ?int $dosenId;

    private ?string $namaDosen;
    private ?string $nidnDosen;
    private ?string $bidangKeahlian;

    public function __construct(
        string $nim,
        string $nama,
        string $prodi = '',
        ?int $dosenId = null,
        ?int $id = null,
        ?string $namaDosen = null,
        ?string $nidnDosen = null,
        ?string $bidangKeahlian = null
    ) {
        $this->id = $id;
        $this->setNim($nim);
        $this->setNama($nama);
        $this->prodi = $prodi;
        $this->dosenId = $dosenId;
        $this->namaDosen = $namaDosen;
        $this->nidnDosen = $nidnDosen;
        $this->bidangKeahlian = $bidangKeahlian;
    }

    public function getId(): ?int { return $this->id; }
    public function getNim(): string { return $this->nim; }
    public function getNama(): string { return $this->nama; }
    public function getProdi(): string { return $this->prodi; }
    public function getDosenId(): ?int { return $this->dosenId; }
    public function getNamaDosen(): ?string { return $this->namaDosen; }
    public function getNidnDosen(): ?string { return $this->nidnDosen; }
    public function getBidangKeahlian(): ?string { return $this->bidangKeahlian; }

    public function setNim(string $nim): void
    {
        if (!ctype_digit($nim)) {
            throw new \InvalidArgumentException("NIM harus berupa angka.");
        }
        $this->nim = $nim;
    }

    public function setNama(string $nama): void
    {
        if (trim($nama) === '') {
            throw new \InvalidArgumentException("Nama mahasiswa tidak boleh kosong.");
        }
        $this->nama = $nama;
    }

    public function setProdi(string $prodi): void
    {
        $this->prodi = $prodi;
    }

    public function setDosenId(?int $dosenId): void
    {
        $this->dosenId = $dosenId;
    }
}