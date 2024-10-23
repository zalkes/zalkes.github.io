<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: ../login_page/login.php");
        exit;
    }
    include "../login_page/navbar.php";
    require "../database/koneksi.php";
    date_default_timezone_set('Asia/Makassar');
    
    if (isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $no_telp = $_POST["no_telp"];
        $tgl_checkin = $_POST["checkin"];
        $tgl_checkout = $_POST["checkout"];
        $tipe_kamar = $_POST["room_type"];
        $username = $_SESSION["username"];

        $tmp_name = $_FILES["gambar"]["tmp_name"];
        $file_name = $_FILES["gambar"]["name"];

        $ekstensiValid = ['.jpg', '.jpeg', '.png'];
        $ekstensi = explode(".", $file_name);
        $ekstensi = strtolower(end($ekstensi));
        $ekstensi = "." . $ekstensi;

        if ($_FILES["gambar"]["size"] > 1 * 1024 * 1024) {
            echo "
            <script>
            alert('Ukuran file terlalu besar, maksimal 1MB');
            document.location.href = 'reservasi.php';
            </script>
            ";
            exit;
        }

        if (!in_array($ekstensi, $ekstensiValid)) {
            echo "
            <script>
            alert('File yang diupload bukan gambar');
            document.location.href = 'reservasi.php';
            </script>
            ";
            exit;
        } 
        else {
            $newFileName = date('Y-m-d H.i.s') . $ekstensi;
            if (move_uploaded_file($tmp_name, "img/" . $newFileName)) {
                $sql = "INSERT INTO reservasi VALUES ('','$nama','$email','$no_telp','$tgl_checkin','$tgl_checkout','$tipe_kamar','$newFileName', '$username')";
            
                $result = mysqli_query($conn, $sql);
            
                if ($result) {
                    echo "
                    <script>
                    alert('Berhasil Melakukan Reservasi!');
                    document.location.href = 'reservasi.php';
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
            else {
                echo "
                <script>
                alert('File Tidak Valid!');
                </script>
                ";
            }
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
                    <form action="" method="POST" class="signup" enctype="multipart/form-data">
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
                        <div class="field-foto">
                            <label for="gambar">Upload Foto Anda</label>
                            <input type="file" name="gambar" id="gambar" required onchange="displayFileName()">
                            <p id="file-name">Tidak ada file yang dipilih</p>
                            <script>
                                function displayFileName() {
                                    var input = document.getElementById('gambar');
                                    var fileName = input.files.length > 0 ? input.files[0].name : "Tidak ada file yang dipilih";
                                    document.getElementById('file-name').innerText = "File terpilih: " + fileName;
                                }
                            </script>
                        </div>
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