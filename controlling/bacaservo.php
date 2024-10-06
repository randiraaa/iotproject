<?php
// Include koneksi
include "koneksi.php";

$sql = mysqli_query($konek, "SELECT * FROM tb_control");
$data = mysqli_fetch_array($sql);
$servo = $data['servo'];
// Respon balik ke NodeMCU
echo $servo; // 1 atau 0
