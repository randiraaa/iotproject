<?php
// Include koneksi
include "koneksi.php";

// Menangkap parameter stat yang dikirim dari ajax
$stat = $_GET['stat'];
if ($stat == "ON") {
    // Mengubah field relay menjadi 1
    mysqli_query($konek, "UPDATE tb_control SET relay=1");
    // Memberikan respon
    echo "ON";
} else {
    // Mengubah field relay menjadi 1
    mysqli_query($konek, "UPDATE tb_control SET relay=0");
    // Memberikan respon
    echo "OFF";
}
