<?php
include 'koneksi.php';

// --- Pastikan ada ID di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data berdasarkan ID
    $result = mysqli_query($conn, "SELECT * FROM pendaftar WHERE id=$id");
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        die("Data dengan ID $id tidak ditemukan.");
    }
} else {
    die("Parameter ID tidak ditemukan di URL.");
}

// --- Jika tombol update ditekan
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $paket = $_POST['paket_bimbingan'];
    $Total_Biaya = $_POST['Total_Biaya'];
    $aksi = $_POST['aksi'];

    $query = "UPDATE pendaftar SET 
                nama='$nama',
                paket_bimbingan='$paket',
                Total_Biaya='$Total_Biaya',
                aksi='$aksi'
              WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Update Data Pendaftar</title>
</head>
<body>
    <h2>Update Data Pendaftar</h2>
    <form method="POST">
        Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br><br>
        Paket Bimbingan: <input type="text" name="paket_bimbingan" value="<?= $data['paket_bimbingan'] ?>"><br><br>
        Total Biaya: <input type="number" name="Total_Biaya" value="<?= $data['Total_Biaya'] ?>"><br><br>
        Aksi: <input type="text" name="aksi" value="<?= $data['aksi'] ?>"><br><br>
        <button type="submit" name="update">Update</button>
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>
