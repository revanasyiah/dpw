<?php

class akunBank
{
    protected $accountNumber;
    protected $jmlUang;
    protected $nama;

    public function __construct($nomorAkun, $nominal)
    {
        $this->accountNumber = $nomorAkun;
        $this->jmlUang       = $nominal;
    }

    // Getter & Setter untuk $nama
    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    // Getter & Setter untuk $accountNumber
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    public function setAccountNumber($nomorAkun)
    {
        $this->accountNumber = $nomorAkun;
    }

    // Getter untuk $jmlUang
    public function getJmlUang()
    {
        return $this->jmlUang;
    }

    // Menambahkan jumlah uang
    public function tambahUang($jumlah)
    {
        if ($jumlah > 0) {
            $this->jmlUang += $jumlah;
            return "Berhasil menambahkan Rp " . number_format($jumlah, 0, ',', '.') .
                   ". Saldo sekarang: Rp " . number_format($this->jmlUang, 0, ',', '.');
        }
        return "Jumlah tidak valid.";
    }

    // Mengurangi jumlah uang
    public function kurangiUang($jumlah)
    {
        if ($jumlah > 0 && $jumlah <= $this->jmlUang) {
            $this->jmlUang -= $jumlah;
            return "Berhasil mengurangi Rp " . number_format($jumlah, 0, ',', '.') .
                   ". Saldo sekarang: Rp " . number_format($this->jmlUang, 0, ',', '.');
        }
        return "Jumlah tidak valid atau saldo tidak mencukupi.";
    }

    // Menampilkan jumlah uang
    public function tampilkanUang()
    {
        return "Saldo akun [" . $this->accountNumber . "] atas nama " .
               ($this->nama ?? '-') . ": Rp " . number_format($this->jmlUang, 0, ',', '.');
    }

    // Menghitung pajak 11%
    public function hitungPajak()
    {
        $pajak = $this->jmlUang * 0.11;
        return "Pajak (11%) untuk akun [" . $this->accountNumber . "]: Rp " .
               number_format($pajak, 0, ',', '.');
    }
}