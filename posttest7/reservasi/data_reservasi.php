<?php
    session_start();
    require "../database/koneksi.php";

    if ($_SESSION['username'] == 'admin'){
        $sql = mysqli_query($conn, "SELECT * FROM reservasi");
    }
    else {
        $sql = mysqli_query($conn, "SELECT * FROM reservasi WHERE username = '$_SESSION[username]'");
    }
    $reservasi = [];

    while ($row = mysqli_fetch_assoc($sql)) {
        $reservasi[] = $row;
    }

    if (empty($reservasi)) {
        echo "
        <script>
        alert('Anda belum pernah melakukan reservasi, silahkan lakukan reservasi terlebih dahulu');
        window.location.href = 'reservasi.php';
        </script>
        ";
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
    <h1><?php echo ($_SESSION['username'] == 'admin') ? 'Daftar Reservasi Pengguna' : 'Daftar Reservasi Anda'; ?></h1><br>
    <?php if ($_SESSION['username'] == 'admin') : ?>
        <a href="../login_page/logout.php" id="logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    <?php else : ?>
        <a href="../index.php" id="logout"><i class="fa-solid fa-right-from-bracket"></i> Kembali</a>
    <?php endif; ?>
    <a href="reservasi.php" id="tambah"><i class="fa-solid fa-plus"></i> Reservasi</a>
    <a href="data_reservasi.php" id="refresh"><i class="fa-solid fa-arrows-rotate"></i> Refresh</a>
    <?php if ($_SESSION['username'] == 'admin') : ?>
        <a href="../database/data.php" id="daftar_pengguna"><i class="fa-solid fa-users"></i> Daftar Pengguna</a>
    <?php endif; ?>
    <form action="" method="get" class="search">
        <input type="text" name="search" placeholder="Cari..." id="keyword">
        <button type="submit" id="tombol-cari">Cari</button>
    </form>
    <div id="container">
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
    </div>
</body>
<script src="../searchjs/livesearch.js"></script>
</html>