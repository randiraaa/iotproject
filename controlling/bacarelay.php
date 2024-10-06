<?php
// Include koneksi
include "koneksi.php";

$sql = mysqli_query($konek, "SELECT * FROM tb_control");
$data = mysqli_fetch_array($sql);
$relay = $data['relay'];
// Respon balik ke NodeMCU
echo $relay; // 1 atau 0
