<?php

class buah2
{
    public  $nama;
    public  $warna;
    public  $bobot;

    function set_name($n) {
        $this->nama = $n;
    }

    protected function set_color($n) {
        $this->warna = $n;
    }

    private function set_weight($n) {
        $this->bobot = $n;
    }
}

$mango = new buah2();
$mango->set_name('Mango');
$mango->set_color('Yellow');    // ERROR: set_color() bersifat protected
$mango->set_weight('300');      // ERROR: set_weight() bersifat private

/*
 * ANALISIS ERROR:
 *
 * Error 1: $mango->set_color('Yellow');
 *   Penyebab : Method set_color() bersifat PROTECTED.
 *              Protected method hanya bisa dipanggil dari dalam kelas itu
 *              sendiri atau kelas turunannya, bukan dari luar kelas.
 *   Solusi   : Ubah modifier method set_color() menjadi public.
 *
 * Error 2: $mango->set_weight('300');
 *   Penyebab : Method set_weight() bersifat PRIVATE.
 *              Private method hanya bisa dipanggil dari dalam kelas itu sendiri.
 *   Solusi   : Ubah modifier method set_weight() menjadi public.
 *
 * PERBAIKAN:
 */

class buah2Fixed
{
    public $nama;
    public $warna;
    public $bobot;

    public function set_name($n) {
        $this->nama = $n;
    }

    public function set_color($n) {
        $this->warna = $n;
    }

    public function set_weight($n) {
        $this->bobot = $n;
    }
}

$mango = new buah2Fixed();
$mango->set_name('Mango');
$mango->set_color('Yellow');
$mango->set_weight('300');

echo "Nama  : " . $mango->nama . "<br>";
echo "Warna : " . $mango->warna . "<br>";
echo "Bobot : " . $mango->bobot . " gram<br>";