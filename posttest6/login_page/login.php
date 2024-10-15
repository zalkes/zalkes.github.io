<?php 
    include "navbar.php";
    require "../database/koneksi.php";
    $sql = mysqli_query($conn, "SELECT * FROM pengguna");

    $pengguna = [];

    while ($row = mysqli_fetch_assoc($sql)) {
        $pengguna[] = $row;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            
            $query = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
            $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result) == 1) {
                session_start();
                $_SESSION['username'] = $username;
                if ($username == 'admin' && $password == 'admin') {
                    echo "<script>
                        alert('Login berhasil sebagai admin');
                        window.location.href = '../database/data.php';
                    </script>";
                } else {
                    echo "<script>
                        alert('Login berhasil');
                        window.location.href = '../index.html';
                    </script>";
                }
                
            } else {
                echo "<script>alert('Username atau password salah');</script>";
            }
        } elseif (isset($_POST['username_up']) && isset($_POST['email_up']) && isset($_POST['password_up']) && isset($_POST['phone_up'])) {
            $username_up = mysqli_real_escape_string($conn, $_POST['username_up']);
            $email_up = mysqli_real_escape_string($conn, $_POST['email_up']);
            $password_up = mysqli_real_escape_string($conn, $_POST['password_up']);
            $phone_up = mysqli_real_escape_string($conn, $_POST['phone_up']);
            
            $query = "INSERT INTO pengguna (username, email, password, no_hp) VALUES ('$username_up', '$email_up', '$password_up', '$phone_up')";
            
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Signup berhasil, silakan login');</script>";
            } else {
                echo "<script>alert('Signup gagal, coba lagi');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>LoginPage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="wrapper">
            <div class="title-text">
                <div class="title login">
                    Login
                </div>
                <div class="title signup">
                    Signup
                </div>
            </div>
            <div class="form-container">
                <div class="slide-controls">
                    <input type="radio" name="slide" id="login" checked>
                    <input type="radio" name="slide" id="signup">
                    <label for="login" class="slide login">Login</label>
                    <label for="signup" class="slide signup">Signup</label>
                    <div class="slider-tab"></div>
                </div>
                <div class="form-inner">
                    <form action="" method="POST" class="login" >
                        <div class="field">
                            <input type="text" id="username" name="username" placeholder="Username" required>
                        </div>
                        <div class="field">
                            <input type="password" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="pass-link">
                            <a href="#">Lupa Password?</a>
                        </div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" name="login" value="Login">
                        </div>
                        <div class="signup-link">
                            Belum punya akun? <a href="">Signup</a>
                        </div>
                    </form>
                    <form action="" method="POST" class="signup">
                          <div class="field">
                                <input type="text" name="username_up" id="username_up" placeholder="Username" required>
                          </div>
                          <div class="field">
                                <input type="email" name="email_up" id="email_up" placeholder="Email Address" required>
                          </div>
                          <div class="field">
                                <input type="password" name="password_up" id="password_up" placeholder="Password" required>
                          </div>
                          <div class="field">
                                <input type="tel" name="phone_up" id="phone_up" placeholder="Nomor Hp" required>
                          </div>
                          <div class="field btn">
                                <div class="btn-layer"></div>
                                <input type="submit" name="login" value="Signup">
                          </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="login.js"></script>
    </body>
</html>

<?php require 'footer.php'; ?>