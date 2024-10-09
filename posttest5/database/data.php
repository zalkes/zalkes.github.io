<?php
    require "koneksi.php";
    $sql = mysqli_query($conn, "SELECT * FROM pengguna");

    $pengguna = [];

    while ($row = mysqli_fetch_assoc($sql)) {
        $pengguna[] = $row;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="data.css">
</head>
<body>
    <h1>Data Pengguna</h1><br>
    <a href="../index.html" id="logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    <a href="create.php" id="tambah"><i class="fa-solid fa-plus"></i> Tambah Data</a>
    <a href="data.php" id="refresh"><i class="fa-solid fa-arrows-rotate"></i> Refresh</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Password</th>
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
                <td><?= str_repeat('*', strlen($users["password"])) ?></td>
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
</body>
</html>