<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Result</title>
    <link rel="stylesheet" href="hasil.css">
</head>
<body>
    <div class="container">
        <div class="result-container">
            <?php
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                echo "<h2>Anda Berhasil Login!</h2>";
                echo "<h3>Selamat Datang, <span>$username<span> !</h3>";
            } elseif (isset($_POST['username_up']) && isset($_POST['email_up']) && isset($_POST['phone_up'])) {
                $username = htmlspecialchars($_POST['username_up']);
                $email = htmlspecialchars($_POST['email_up']);
                $password = htmlspecialchars($_POST['password_up']);
                $phone = htmlspecialchars($_POST['phone_up']);
                echo "<h2>Akun Anda Berhasil Terdaftar!</h2>";
                echo "<table>";
                echo "<hr>";
                echo "<tr><td><strong>Username<td>:</td></strong></td><td>$username</td></tr>";
                echo "<tr><td><strong>Email<td>:</td></strong></td><td>$email</td></tr>";
                echo "<tr><td><strong>Nomor Hp<td>:</td></strong></td><td>$phone</td></tr>";
                echo "</table>";
            }
            ?>
            <a href="../index.html" class="back-button">Kembali</a>
        </div>
    </div>
</body>
</html>