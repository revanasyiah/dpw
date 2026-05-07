<?php

class Manusia
{
    // Deklarasi Variabel
    protected $name;
    protected $nik = "123212131243243";
    protected $umur;

    public function getNama()
    {
        return $this->name;
    }

    public function setNama($name)
    {
        $this->name = $name;
    }

    public function getUmur()
    {
        return $this->umur;
    }

    public function setUmur($umur)
    {
        $this->umur = $umur;
    }

    // NIK bersifat private — hanya bisa diakses dari dalam kelas
    private function getNIK()
    {
        return " nik {$this->nik} ";
    }

    // Method publik untuk menampilkan NIK (wrapper agar bisa diakses dari luar)
    public function tampilkanNIK()
    {
        return $this->getNIK();
    }
}