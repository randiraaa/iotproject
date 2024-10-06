<?php
// Koneksi Database
$konek = mysqli_connect("localhost", "root", "", "dbsensorlaravel");

// Membaca Data Dari Tabel tb_sensorgraph

// Baca ID Tertinggi
$sql_ID = mysqli_query($konek, "SELECT MAX(ID) FROM tb_sensorgraph");
// Menangkap Data
$data_ID = mysqli_fetch_array($sql_ID);
// Mengambil ID Terakhir/Terbesar
$ID_akhir = $data_ID['MAX(ID)'];
$ID_awal = $ID_akhir - 4;

// Membaca Informasi Tanggal Untuk 5 Data Terakhir - Sumbu X di Grafik
$tanggal = mysqli_query($konek, "SELECT tanggal FROM tb_sensorgraph WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC");

// Membaca Informasi Suhu Untuk 5 Data Terakhir - Sumbu Y di Grafik
$suhu = mysqli_query($konek, "SELECT suhu FROM tb_sensorgraph WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC");
// Membaca Informasi Kelembaban Untuk 5 Data Terakhir - Sumbu Y di Grafik
$kelembaban = mysqli_query($konek, "SELECT kelembaban FROM tb_sensorgraph WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC");
?>

<!-- Tampilan Grafik -->
<div class="panel panel-primary">

    <div class="panel-body">
        <!-- Canvas Untuk Grafik -->
        <canvas id="myChart"></canvas>

        <!-- Gambar Grafik -->
        <script type="text/javascript">
            // Membaca ID Canvas Grafik
            var canvas = document.getElementById('myChart');
            // Meletakkan Data Tanggal dan Suhu Untuk Grafik
            var data = {
                labels: [
                    <?php
                    while ($data_tanggal = mysqli_fetch_array($tanggal)) {
                        echo '"' . $data_tanggal['tanggal'] . '",';
                    }
                    ?>
                ],
                datasets: [{
                        label: "Suhu",
                        fill: true,
                        borderColor: "rgba(52, 231, 43, 1)",
                        backgroundColor: "rgba(52, 231, 43, 0.2)",
                        lineTension: 0.5,
                        pointRadius: 5,
                        data: [
                            <?php
                            while ($data_suhu = mysqli_fetch_array($suhu)) {
                                echo $data_suhu['suhu'] . ',';
                            }
                            ?>
                        ]
                    },
                    {
                        label: "Kelembaban",
                        fill: true,
                        borderColor: "rgba(239, 82, 93, 1)",
                        backgroundColor: "rgba(239, 82, 93, 0.2)",
                        lineTension: 0.5,
                        pointRadius: 5,
                        data: [
                            <?php
                            while ($data_kelembaban = mysqli_fetch_array($kelembaban)) {
                                echo $data_kelembaban['kelembaban'] . ',';
                            }
                            ?>
                        ]
                    }
                ]
            };

            // Option Grafik
            var option = {
                showLines: true,
                animation: {
                    duration: 0
                }
            };

            // Cetak Ke Dalam Cavas
            var myLineChart = Chart.Line(canvas, {
                data: data,
                options: option
            });
        </script>
    </div>
</div>