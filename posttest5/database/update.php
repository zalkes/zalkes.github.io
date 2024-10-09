<?php
require "koneksi.php";

$id = $_GET["id"];

$result = mysqli_query($conn, "SELECT * FROM pengguna WHERE id = $id");

while ($row = mysqli_fetch_assoc($result)) {
    $pengguna[] = $row;
}

$pengguna = $pengguna[0];

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $no_hp = $_POST["no_hp"];

    $sql = "UPDATE pengguna SET username='$username',password='$password',email='$email',no_hp='$no_hp' WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "
        <script>
        alert('Berhasil Mengubah Data Pengguna!');
        document.location.href = 'data.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Gagal Mengubah Data Pengguna!');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ubah Data</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="crud.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="wrapper">
            <div class="kembali">
                <a href="data.php" class="fa-solid fa-arrow-left"></a>
            </div>
            <div class="title-text">
                <div class="title signup">
                    Ubah Data Pengguna
                </div>
            </div>
            <div class="form-container">
                <div class="form-inner">
                    <form action="" method="POST" class="signup">
                          <div class="field">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" value="<?= $pengguna["username"] ?>" required>
                          </div>
                          <div class="field">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" value="<?= $pengguna["email"] ?>" required>
                          </div>
                          <div class="field">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" value="<?= $pengguna["password"] ?>" required>
                          </div>
                          <div class="field">
                                <label for="phone">No.Hp</label>
                                <input type="tel" name="no_hp" id="no_hp" value="<?= $pengguna["no_hp"] ?>" required>
                          </div>
                          <div class="field btn">
                                <div class="btn-layer"></div>
                                <input type="submit"  name="submit" value="Ubah">
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>