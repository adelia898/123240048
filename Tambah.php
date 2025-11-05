<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $paket_bimbel = $_POST['paket_bimbel'];
    $total_biaya = $_POST['total_biaya'];


    // Query insert sesuai dengan kolom tabel
    $query = "INSERT INTO pendaftar (nama, paket_bimbel, total_biaya)
              VALUES ('$nama', '$paket_bimbel', '$total_biaya')";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
        exit;
    } else {
        echo " Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Pendaftar</title>
</head>
<body>
    <h2>Tambah Data Pendaftar</h2>
    <form method="POST">
        Nama: <input type="text" name="nama" required><br><br>
        paket: <input type="text" name="paket_bimbel" required><br><br>
        Total Biaya: <input type="number" name="total_biaya" required><br><br>
        <button type="submit" name="simpan">Simpan</button>
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>
