<?php
require "../database/koneksi.php";
date_default_timezone_set('Asia/Makassar');

$id_reservasi = $_GET["id"];

$result = mysqli_query($conn, "SELECT * FROM reservasi WHERE id_reservasi = $id_reservasi");

while ($row = mysqli_fetch_assoc($result)) {
    $reservasi[] = $row;
}

$reservasi = $reservasi[0];

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $no_telp = $_POST["no_telp"];
    $tgl_checkin = $_POST["checkin"];
    $tgl_checkout = $_POST["checkout"];
    $tipe_kamar = $_POST["room_type"];

    $tmp_name = $_FILES["gambar"]["tmp_name"];
    $file_name = $_FILES["gambar"]["name"];

    if ($file_name) {
        $ekstensiValid = ['.jpg', '.jpeg', '.png'];
        $ekstensi = explode(".", $file_name);
        $ekstensi = strtolower(end($ekstensi));
        $ekstensi = "." . $ekstensi;

        if ($_FILES["gambar"]["size"] > 1 * 1024 * 1024) {
            echo "
            <script>
            alert('Ukuran file terlalu besar, maksimal 1MB');
            document.location.href = 'data_reservasi.php';
            </script>
            ";
            exit;
        }

        if (!in_array($ekstensi, $ekstensiValid)) {
            echo "
            <script>
            alert('File yang diupload bukan gambar');
            document.location.href = 'data_reservasi.php';
            </script>
            ";
            exit;
        } else {
            $newFileName = date('Y-m-d H.i.s') . $ekstensi;
            if (move_uploaded_file($tmp_name, "img/" . $newFileName)) {
                unlink("img/" . $reservasi["foto"]);
            }
            else {
                echo "
                <script>
                alert('File Tidak Valid!');
                </script>
                ";
            }
        }
    } else {
        $newFileName = $reservasi["foto"];
    }

    $sql = "UPDATE reservasi SET nama='$nama',email='$email',no_telp='$no_telp',tgl_checkin='$tgl_checkin',tgl_checkout='$tgl_checkout',tipe_kamar='$tipe_kamar',foto='$newFileName' WHERE id_reservasi = $id_reservasi";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "
        <script>
        alert('Berhasil Mengubah Data Reservasi!');
        document.location.href = 'data_reservasi.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Gagal Mengubah Data Reservasi!');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ubah Reservasi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="reservasi.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="wrapper">
            <div class="kembali">
                <a href="data_reservasi.php" class="fa-solid fa-arrow-left"></a>
            </div>
            <div class="title-text">
                <div class="title signup">
                    Ubah Data Reservasi
                </div>
            </div>
            <div class="form-container">
                <div class="form-inner">
                    <form action="" method="POST" class="signup" enctype="multipart/form-data">
                        <div class="field">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" value="<?= $reservasi["nama"] ?>" required>
                        </div>
                        <div class="field">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="<?= $reservasi["email"] ?>" required>
                        </div>
                        <div class="field">
                            <label for="phone">No Telepon</label>
                            <input type="tel" name="no_telp" id="no_telp" value="<?= $reservasi["no_telp"] ?>"required>
                        </div>
                        <div class="field">
                            <label for="checkin">Tanggal Check-in</label>
                            <input type="date" name="checkin" id="checkin" value="<?= $reservasi["tgl_checkin"] ?>" required>
                        </div>
                        <div class="field">
                            <label for="checkout">Tanggal Check-out</label>
                            <input type="date" name="checkout" id="checkout" value="<?= $reservasi["tgl_checkout"] ?>" required>
                        </div>
                        <div class="field">
                            <label for="room_type">Tipe Kamar</label>
                            <select id="room_type" name="room_type" required>
                                <option value="single" <?php if($reservasi["tipe_kamar"] == "single")  echo "selected"  ?>>Single</option>
                                <option value="double" <?php if($reservasi["tipe_kamar"] == "double")  echo "selected"  ?>>Double</option>
                                <option value="family" <?php if($reservasi["tipe_kamar"] == "family")  echo "selected"  ?>>Family</option>
                                <option value="guest" <?php if($reservasi["tipe_kamar"] == "guest")  echo "selected"  ?>>Guest</option>
                                <option value="luxury" <?php if($reservasi["tipe_kamar"] == "luxury")  echo "selected"  ?>>Luxury</option>
                                <option value="deluxe" <?php if($reservasi["tipe_kamar"] == "deluxe")  echo "selected"  ?>>Deluxe</option>
                            </select>
                        </div>
                        <br>
                        <div class="field-foto">
                            <label for="gambar">Ubah Foto</label> <?php if ($reservasi["foto"] == "") {
                                echo "Foto Tidak Ada";
                            } else {
                                echo $reservasi["foto"];
                            } ?>
                            <input type="file" name="gambar" id="gambar" onchange="displayFileName()">
                            <p id="file-name">Tidak ada file baru yang dipilih</p>
                            <script>
                                function displayFileName() {
                                    var input = document.getElementById('gambar');
                                    var fileName = input.files.length > 0 ? input.files[0].name : "Tidak ada file baru yang dipilih";
                                    document.getElementById('file-name').innerText = "File baru terpiliih: " + fileName;
                                }
                            </script>
                        </div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" name="submit" value="Ubah">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php include "../login_page/footer.php";?>