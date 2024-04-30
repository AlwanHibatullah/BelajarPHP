<?php 

// tangkap data dari index.php
$index = $_GET["index"];

// buka file json
$getFileJSON = file_get_contents("kontak.json");

// ubah file json ke dalam array
$dataKontak = json_decode($getFileJSON);

// hapus data dari array
unset($dataKontak[$index]);

// kembalikan lagi ke file json
$data = json_encode(array_values($dataKontak), JSON_PRETTY_PRINT);
file_put_contents("kontak.json", $data);

// balikin ke index.php
header("Location: index.php");

?>