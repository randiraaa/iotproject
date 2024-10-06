<?php
// Koneksi Database
$konek = mysqli_connect("localhost", "root", "", "dbsensorlaravel");

// Tangkap Parameter Yang Dikirim NodeMCU
$suhu = $_GET['suhu'];
$kelembaban = $_GET['kelembaban'];

// Menyimpan ke tabel tb_sensorgraph
mysqli_query($konek, "INSERT INTO tb_sensorgraph (suhu, kelembaban) VALUES ('$suhu', '$kelembaban')");
