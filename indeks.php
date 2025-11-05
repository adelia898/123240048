<?php
include 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM pendaftar");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pendaftar Bimbel</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid #aaa; padding: 8px; text-align: center; }
        th { background: #e0e0e0; }
        a { text-decoration: none; color: blue; }
        .btn { margin: 10px; display: inline-block; padding: 6px 12px; background: #28a745; color: white; border-radius: 4px; }
    </style>
</head>
<body>
    <h2 align="center">Data Pendaftar Bimbel</h2>
    <div align="center"><a href="tambah.php" class="btn">+ Tambah Data</a></div>

    <table>
        <tr>
            <th>ID</th><th>Nama</th><th>Paket</th><th>Total Biaya</th><th>Aksi</th>
        </tr>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['paket_bimbingan'] ?></td>
                <td><?= $row['Total_Biaya'] ?></td>
                <td>
                    <a href="Detail.php?id=<?= $row['id'] ?>" class="btn btn-blue" title="Detail">👁️</a>
                    <a href="Update.php?id=<?= $row['id'] ?>" class="btn btn-yellow" title="Edit">✏️</a> 
                    <a href="Selete.php?id=<?= $row['id'] ?>" class="btn btn-red" title="Delete" onclick="return confirm('Yakin hapus data ini?')">🗑️</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6">Tidak ada data.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
