<?php
    require "../database/koneksi.php";
    $sql = mysqli_query($conn, "SELECT * FROM reservasi WHERE username = '$_SESSION[username]'");
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