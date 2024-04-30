<?php

// tangkap data dari index.php
$index = $_GET["index"];

// buka file json
$getFileJSON = file_get_contents("kontak.json");

// ubah file json ke dalam array
$dataKontak = json_decode($getFileJSON);

// ambil satu data dari array
$baris = $dataKontak[$index];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>

<body>
    <form method="post">
        <table>
            <tr>
                <td>
                    <label for="nama">Nama: </label>
                </td>
                <td>
                    <input type="text" id="nama" name="nama" value="<?php echo $baris->nama ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email: </label>
                </td>
                <td>
                    <input type="email" id="email" name="email" value="<?php echo $baris->email ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nohp">Nomor HP: </label>
                </td>
                <td>
                    <input type="text" id="nohp" name="nohp" value="<?php echo $baris->nohp ?>">
                </td>
            </tr>
        </table>

        <button type="submit" name="submit">Simpan</button>
    </form>


    <?php

    // cek apakah tombol simpan sudah di klik
    if (isset($_POST["submit"])) {
        // tampung data dari form ke dalam array assoc.
        $kontak = [
            "nama" => $_POST["nama"],
            "email" => $_POST["email"],
            "nohp" => $_POST["nohp"]
        ];

        // simpan $kontak ke array $dataKontak
        $dataKontak[$index] = $kontak;

        // kembalikan lagi ke file json
        $data = json_encode($dataKontak, JSON_PRETTY_PRINT);
        file_put_contents("kontak.json", $data);

        // balikin ke index.php
        header("Location: index.php");
    }

    ?>
</body>

</html>