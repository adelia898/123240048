<?php
include 'koneksi.php';

// Pastikan parameter id dikirim lewat URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Sesuaikan variabel koneksi ($conn atau $koneksi)
    $query = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id = '$id'");

    if ($query && mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "Parameter ID tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pendaftar</title>
</head>
<body>
    <h2>Detail Pendaftar</h2>
    <p><b>Nama:</b> <?= htmlspecialchars($data['nama']); ?></p>
    <p><b>Email:</b> <?= htmlspecialchars($data['email']); ?></p>
    <p><b>Paket:</b> <?= htmlspecialchars($data['paket']); ?></p>
    <p><b>Lokasi:</b> <?= htmlspecialchars($data['lokasi']); ?></p>
    <p><b>Metode Pembayaran:</b> <?= htmlspecialchars($data['metode_pembayaran']); ?></p>
    <p><b>Total Biaya:</b> <?= htmlspecialchars($data['total_biaya']); ?></p>
    <p><b>Tanggal Daftar:</b> <?= htmlspecialchars($data['tanggal_daftar']); ?></p>
    <a href="index.php">Kembali</a>
</body>
</html>
