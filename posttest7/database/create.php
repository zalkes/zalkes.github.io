<?php
require "koneksi.php";

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $no_hp = $_POST["no_hp"];

    $sql = "INSERT INTO pengguna VALUES ('','$username','$password','$email','$no_hp')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "
        <script>
        alert('Berhasil Menambah Data Pengguna!');
        document.location.href = 'data.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Gagal Menambah Data Pengguna!');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Tambah Data</title>
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
                    Tambah Data Pengguna
                </div>
            </div>
            <div class="form-container">
                <div class="form-inner">
                    <form action="" method="POST" class="signup">
                          <div class="field">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" required>
                          </div>
                          <div class="field">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" required>
                          </div>
                          <div class="field">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" required>
                          </div>
                          <div class="field">
                                <label for="phone">No.Hp</label>
                                <input type="tel" name="no_hp" id="no_hp" required>
                          </div>
                          <div class="field btn">
                                <div class="btn-layer"></div>
                                <input type="submit"  name="submit" value="Tambah">
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>