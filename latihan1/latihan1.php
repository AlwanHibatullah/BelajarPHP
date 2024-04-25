<?php

function menghitungHari($jumlahHari) {

    $namaHari = date('l', strtotime(date("Y-m-d")."+".$jumlahHari." days"));

    switch ($namaHari) {
        case 'Monday':
            $translateHari = "Senin";
            break;
        case 'Tuesday':
            $translateHari = "Selasa";
            break;
        case 'Wednesday':
            $translateHari = "Rabu";
            break;
        case 'Thursday':
            $translateHari = "Kamis";
            break;
        case 'Friday':
            $translateHari = "Jum'at";
            break;
        case 'Saturday':
            $translateHari = "Sabtu";
            break;
        case 'Sunday':
            $translateHari = "Minggu";
            break;
        default:
            $translateHari = "Nama hari tidak valid";
            break;
    }

    return $translateHari;
}

$jumlahHari = 120;

echo "$jumlahHari hari setelah hari ini adalah hari ". menghitungHari($jumlahHari);

?>