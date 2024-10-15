<?php
    require "../database/koneksi.php";

    $id_reservasi = $_GET["id"];

    $result = mysqli_query($conn, "DELETE FROM reservasi WHERE id_reservasi = $id_reservasi");

    if ($result) {
        echo "
        <script>
        alert('Berhasil Menghapus Data Reservasi!');
        document.location.href = 'data_reservasi.php';
        </script>
        ";
    }
?>