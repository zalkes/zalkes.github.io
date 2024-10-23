<?php
    require "koneksi.php";

    $id = $_GET["id"];

    $result = mysqli_query($conn, "DELETE FROM pengguna WHERE id = $id");

    if ($result) {
        echo "
        <script>
        alert('Berhasil Menghapus Data Pengguna!');
        document.location.href = 'data.php';
        </script>
        ";
    }
?>