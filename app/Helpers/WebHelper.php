<?php

namespace App\Helpers;

use Carbon\Carbon;

class WebHelper
{
    public static function terbilang($number)
    {
        if (substr($number, 0, 1) == '-') {
            $number = substr($number, 1);
        }
        $bilangan = strval($number);
        $angka = array_fill(0, 16, '0');
        $kata = array('', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan');
        $tingkat = array('', 'Ribu', 'Juta', 'Milyar', 'Triliun');

        $panjang_bilangan = strlen($bilangan);
        $kalimat = $subkalimat = $kata1 = $kata2 = $kata3 = "";
        $i = $j = 0;

        /* Pengujian panjang bilangan */
        if ($panjang_bilangan > 15) {
            return "Diluar Batas";
        }

        /* Mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
        for ($i = 1; $i <= $panjang_bilangan; $i++) {
            $angka[$i] = substr($bilangan, -$i, 1);
        }

        $i = 1;
        $j = 0;
        $kalimat = "";

        /* Mulai proses iterasi terhadap array angka */
        while ($i <= $panjang_bilangan) {

            $subkalimat = "";
            $kata1 = "";
            $kata2 = "";
            $kata3 = "";

            /* Untuk Ratusan */
            if ($angka[$i + 2] != "0") {
                if ($angka[$i + 2] == "1") {
                    $kata1 = "Seratus";
                } else {
                    $kata1 = $kata[$angka[$i + 2]] . " Ratus";
                }
            }

            /* Untuk Puluhan atau Belasan */
            if ($angka[$i + 1] != "0") {
                if ($angka[$i + 1] == "1") {
                    if ($angka[$i] == "0") {
                        $kata2 = "Sepuluh";
                    } elseif ($angka[$i] == "1") {
                        $kata2 = "Sebelas";
                    } else {
                        $kata2 = $kata[$angka[$i]] . " Belas";
                    }
                } else {
                    $kata2 = $kata[$angka[$i + 1]] . " Puluh";
                }
            }

            /* Untuk Satuan */
            if ($angka[$i] != "0") {
                if ($angka[$i + 1] != "1") {
                    $kata3 = $kata[$angka[$i]];
                }
            }

            if (($angka[$i] != "0") || ($angka[$i + 1] != "0") || ($angka[$i + 2] != "0")) {
                $subkalimat = $kata1 . " " . $kata2 . " " . $kata3 . " " . $tingkat[$j] . " ";
            }

            /* Gabungkan variabel sub kalimat (untuk satu blok 3 angka) ke variabel kalimat */
            $kalimat = $subkalimat . $kalimat;
            $i += 3;
            $j++;
        }

        /* Mengganti Satu Ribu jadi Seribu jika diperlukan */
        if (($angka[5] == "0") && ($angka[6] == "0")) {
            $kalimat = str_replace("Satu Ribu", "Seribu", $kalimat);
        }

        return trim(preg_replace('/\s{2,}/', ' ', $kalimat)) . " Rupiah";
    }

    public static function calculateAge($birthDate)
    {
        return Carbon::parse($birthDate)->age;
    }

    public static function bulanTahun($month)
    {
        $bulanIndo = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        list($year, $monthNumber) = explode('-', $month);

        if (isset($bulanIndo[$monthNumber])) {
            return $bulanIndo[$monthNumber] . ' ' . $year;
        } else {
            return 'Format bulan tidak valid.';
        }
    }
}
