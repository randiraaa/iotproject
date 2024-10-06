<?php
// Koneksi Database
$konek = mysqli_connect("localhost", "root", "", "dbsensorlaravel");

// Set jumlah data per halaman
$limit = 10;

// Ambil halaman saat ini dari parameter GET, default ke 1 jika tidak ada
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page > 1) ? ($page * $limit) - $limit : 0;

// Ambil total data dari tabel
$total_result = mysqli_query($konek, "SELECT COUNT(ID) AS total FROM tb_sensorgraph");
$total_row = mysqli_fetch_assoc($total_result);
$total = $total_row['total'];

// Ambil data dengan limit dan offset
$result = mysqli_query($konek, "SELECT * FROM tb_sensorgraph ORDER BY ID DESC LIMIT $start, $limit");

// Menghitung rata-rata per jam untuk 24 jam terakhir
$avg_result = mysqli_query($konek, "
    SELECT 
        DATE_FORMAT(tanggal, '%Y-%m-%d %H:00:00') as hour, 
        AVG(suhu) as avg_suhu, 
        AVG(kelembaban) as avg_kelembaban 
    FROM tb_sensorgraph 
    WHERE tanggal >= NOW() - INTERVAL 1 DAY
    GROUP BY hour 
    ORDER BY hour DESC
");

// Hitung total halaman
$total_pages = ceil($total / $limit);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Sensor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="width: 50%;">
        <h3 class="mt-4">Detail Data Sensor</h3>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Suhu</th>
                    <th>Kelembaban</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['suhu'] ?></td>
                        <td><?= $row['kelembaban'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <!-- Link ke halaman pertama -->
                <?php if ($page > 1) : ?>
                    <li class="page-item"><a class="page-link" href="detail.php?page=1">First</a></li>
                    <li class="page-item"><a class="page-link" href="detail.php?page=<?= $page - 1 ?>">Previous</a></li>
                <?php endif; ?>

                <!-- Link halaman sebelumnya dengan ellipsis jika diperlukan -->
                <?php if ($page > 3) : ?>
                    <li class="page-item"><span class="page-link">...</span></li>
                <?php endif; ?>

                <!-- Link halaman sebelum halaman saat ini -->
                <?php for ($i = $page - 2; $i < $page; $i++) : ?>
                    <?php if ($i > 0) : ?>
                        <li class="page-item"><a class="page-link" href="detail.php?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endif; ?>
                <?php endfor; ?>

                <!-- Link halaman saat ini -->
                <li class="page-item active"><span class="page-link"><?= $page ?></span></li>

                <!-- Link halaman setelah halaman saat ini -->
                <?php for ($i = $page + 1; $i <= $page + 2 && $i <= $total_pages; $i++) : ?>
                    <li class="page-item"><a class="page-link" href="detail.php?page=<?= $i ?>"><?= $i ?></a></li>
                <?php endfor; ?>

                <!-- Link halaman berikutnya dengan ellipsis jika diperlukan -->
                <?php if ($page < $total_pages - 2) : ?>
                    <li class="page-item"><span class="page-link">...</span></li>
                <?php endif; ?>

                <!-- Link ke halaman terakhir -->
                <?php if ($page < $total_pages) : ?>
                    <li class="page-item"><a class="page-link" href="detail.php?page=<?= $page + 1 ?>">Next</a></li>
                    <li class="page-item"><a class="page-link" href="detail.php?page=<?= $total_pages ?>">Last</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <h3 class="mt-4">Rata-rata Per Jam (Dalam 24 Jam Terakhir)</h3>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Jam</th>
                    <th>Rata-rata Suhu</th>
                    <th>Rata-rata Kelembaban</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($avg_result)) : ?>
                    <tr>
                        <td><?= $row['hour'] ?></td>
                        <td><?= number_format($row['avg_suhu'], 2) ?></td>
                        <td><?= number_format($row['avg_kelembaban'], 2) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Button -->
        <div style="text-align: center; margin: 20px;">
            <a href="http://localhost/sensorlaravel/sensorgraph/" class="btn btn-lg active" role="button" aria-pressed="true" style="background: linear-gradient(to right, blue, red); color: white; padding: 10px 20px; border: none; text-decoration: none;">Kembali</a>
        </div>
        <!-- Button -->
    </div>
</body>

</html>