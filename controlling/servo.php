<?php
// Include koneksi
include "koneksi.php";

// Menangkap variable pos yang dikirim dari ajax
$pos = $_GET['pos'];
// Update nilai di field servo yang ada di database
mysqli_query($konek, "UPDATE tb_control SET servo='$pos'");
// Memberikan respon
echo $pos;
