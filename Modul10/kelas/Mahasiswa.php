<?php

require_once "Manusia.php";

class mahasiswa extends Manusia
{
    protected $NIM;
    protected $jurusan;
    protected $kelas;

    public function __construct($nama)
    {
        // kita bisa langsung memanfaatkan fungsi dari kelas manusia.php
        $this->setNama($nama);
    }

    // Getter & Setter untuk NIM
    public function getNim()
    {
        return $this->NIM;
    }

    public function setNIM($nim)
    {
        $this->NIM = $nim;
    }

    // Getter & Setter untuk Jurusan
    public function getJurusan()
    {
        return $this->jurusan;
    }

    public function setJurusan($jurusan)
    {
        $this->jurusan = $jurusan;
    }

    // Getter & Setter untuk Kelas
    public function getKelas()
    {
        return $this->kelas;
    }

    public function setKelas($kelas)
    {
        $this->kelas = $kelas;
    }
}