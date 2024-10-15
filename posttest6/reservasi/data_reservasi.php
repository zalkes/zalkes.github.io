<?php
    require "../database/koneksi.php";
    $sql = mysqli_query($conn, "SELECT * FROM reservasi");

    $reservasi = [];

    while ($row = mysqli_fetch_assoc($sql)) {
        $reservasi[] = $row;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Reservasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../database/data.css">
</head>
<body>
    <h1>Data Reservasi</h1><br>
    <a href="../index.html" id="logout"><i class="fa-solid fa-right-from-bracket"></i> Kembali</a>
    <a href="reservasi.php" id="tambah"><i class="fa-solid fa-plus"></i> Reservasi</a>
    <a href="data_reservasi.php" id="refresh"><i class="fa-solid fa-arrows-rotate"></i> Refresh</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No.Telp</th>
                <th>Tanggal Check-in</th>
                <th>Tanggal Check-out</th>
                <th>Jenis Kamar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($reservasi as $res) : ?>
            <tr>
                <td><?= $i ?></td>
                <?php $direktori = "img/" . $res["foto"]; ?>
                <td><?php if ($res["foto"] == "") {
                        echo "Foto Tidak Ada";
                    } else {
                        echo "<img src='$direktori' alt='foto' width='100px' height='100px' style='display: block; margin: 0 auto;'>";
                        echo "<small>" . $res["foto"] . "</small>";
                    } ?></td>
                <td><?= $res["nama"] ?></td>
                <td><?= $res["email"] ?></td>
                <td><?= $res["no_telp"] ?></td>
                <td><?= $res["tgl_checkin"] ?></td>
                <td><?= $res["tgl_checkout"] ?></td>
                <td><?= $res["tipe_kamar"] ?></td>
                <td>
                    <a href="update_res.php?id=<?= $res['id_reservasi'] ?>" id="ubah"><i class="fa-solid fa-pen-to-square"></i> Ubah</a> 
                    <a href="delete_res.php?id=<?= $res['id_reservasi'] ?>" id="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fa-solid fa-trash"></i> Hapus</a>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</body>
</html>