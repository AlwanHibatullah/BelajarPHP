<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <form method="post">
        <table>
            <tr>
                <td>
                    <label for="nama">Nama: </label>
                </td>
                <td>
                    <input type="text" id="nama" name="nama">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email: </label>
                </td>
                <td>
                    <input type="email" id="email" name="email">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nohp">Nomor HP: </label>
                </td>
                <td>
                    <input type="text" id="nohp" name="nohp">
                </td>
            </tr>
        </table>
        <button type="submit" name="submit">Simpan</button>
    </form>

    <?php 
    
    // cek apakah tombol submit sudah di klik
    if (isset($_POST["submit"])) {
        // buka file json
        $getFileJSON = file_get_contents("kontak.json");

        // decode file json
        $dataKontak = json_decode($getFileJSON);

        // membuat array assoc untuk menampung data dari form
        $kontak = [
            "nama" => $_POST["nama"],
            "email" => $_POST["email"],
            "nohp" => $_POST["nohp"]
        ];

        // tambahkan $kontak ke dalam array $dataKontak
        $dataKontak[] = $kontak;

        // kembalikan ke bentuk json
        $data = json_encode($dataKontak, JSON_PRETTY_PRINT);
        file_put_contents("kontak.json", $data);

        // arahkan kembali ke index.php
        header("Location: index.php");
    }
    
    ?>
</body>
</html>