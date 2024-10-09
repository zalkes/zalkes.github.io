<?php 
    include "../login_page/navbar.php";
    require "../database/koneksi.php";
    
    if (isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $no_telp = $_POST["no_telp"];
        $tgl_checkin = $_POST["checkin"];
        $tgl_checkout = $_POST["checkout"];
        $tipe_kamar = $_POST["room_type"];
    
        $sql = "INSERT INTO reservasi VALUES ('','$nama','$email','$no_telp','$tgl_checkin','$tgl_checkout','$tipe_kamar')";
    
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            echo "
            <script>
            alert('Berhasil Melakukan Reservasi!');
            document.location.href = 'data_reservasi.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Gagal Melakukan Reservasi!');
            </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Reservasi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="reservasi.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="wrapper">
            <div class="masuk">
                <a href="data_reservasi.php"><i class="fa-solid fa-arrow-right"></i> Data Reservasi</a>
            </div>
            <br>
            <div class="title-text">
                <div class="title signup">
                    Reservasi Kamar
                </div>
            </div>
            <div class="form-container">
                <div class="form-inner">
                    <form action="" method="POST" class="signup">
                        <div class="field">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" required>
                        </div>
                        <div class="field">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="field">
                            <label for="phone">No Telepon</label>
                            <input type="tel" name="no_telp" id="no_telp" required>
                        </div>
                        <div class="field">
                            <label for="checkin">Tanggal Check-in</label>
                            <input type="date" name="checkin" id="checkin" required>
                        </div>
                        <div class="field">
                            <label for="checkout">Tanggal Check-out</label>
                            <input type="date" name="checkout" id="checkout" required>
                        </div>
                        <div class="field">
                            <label for="room_type">Tipe Kamar</label>
                            <select id="room_type" name="room_type" required>
                                <option value="single">Single</option>
                                <option value="double">Double</option>
                                <option value="family">Family</option>
                                <option value="guest">Guest</option>
                                <option value="luxury">Luxury</option>
                                <option value="deluxe">Deluxe</option>
                            </select>
                        </div>
                        <br>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" name="submit" value="Reservasi Sekarang">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php include "../login_page/footer.php";?>