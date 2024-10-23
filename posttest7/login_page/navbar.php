<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sedar Hotel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../styles.css">
    <script src="../script.js" defer></script>
</head>
<body>
<header>
    <nav class="container navbar">
      <div class="hamburger">
        <i class="fa-solid fa-bars" data-visible="true"></i>
        <i class="fa-solid fa-close" data-visible="false"></i>
      </div>
      <div class="logo">
        <a href="#">
          <h1>Sedar <span>Hotel</span></h1>
        </a>
      </div>
    
      </div>

      </div>
    
      <div>
        <ul class="nav-links" data-visible="false">
          <li><a href="../index.php#">Home</a></li>
          <li><a href="../index.php#Rooms">Rooms</a></li>
          <li><a href="../reservasi/reservasi.php">Reservation</a></li>
          <li><a href="../index.php#About">About Me</a></li>
          <?php if (isset($_SESSION["login"])): ?>
                <li><a href="../login_page/logout.php" class="login">Logout</a></li>
          <?php else: ?>
                <li><a href="../login_page/login.php" class="login">Login</a></li>
          <?php endif; ?>
          <li class="btn"><input type="checkbox" id="dark-mode-button"></li>
        </ul>
      </div>
    </nav>
</header>
</body>
</html>