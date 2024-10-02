<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>LoginPage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                    <form action="../hasil_input/hasil.php" method="POST" class="login" >
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
                            <input type="submit" value="Login">
                        </div>
                        <div class="signup-link">
                            Belum punya akun? <a href="">Signup</a>
                        </div>
                    </form>
                    <form action="../hasil_input/hasil.php" method="POST" class="signup">
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
                                <input type="submit" value="Signup">
                          </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="login.js"></script>
    </body>
</html>

<?php require 'footer.php'; ?>