<?php
    session_start();
    require '../database/koneksi.php';
    $keyword = $_GET['keyword'];
    $sql = mysqli_query($conn, "SELECT * FROM pengguna WHERE username != 'admin' AND (username LIKE '%$keyword%' OR email LIKE '%$keyword%' OR no_hp LIKE '%$keyword%')");

    $pengguna = [];

    while ($row = mysqli_fetch_assoc($sql)) {
        $pengguna[] = $row;
    }
?>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>No.Hp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach($pengguna as $users) : ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $users["username"] ?></td>
            <td><?= $users["email"] ?></td>
            <td><?= $users["no_hp"] ?></td>
            <td>
                <a href="update.php?id=<?= $users['id'] ?>" id="ubah"><i class="fa-solid fa-pen-to-square"></i> Ubah</a> 
                <a href="delete.php?id=<?= $users['id'] ?>" id="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fa-solid fa-trash"></i> Hapus</a>
            </td>
        </tr>
        <?php $i++; endforeach; ?>
    </tbody>
</table>