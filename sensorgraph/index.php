<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensor Graph</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Custom Styles -->
    <style>
        .graph-container {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
        }

        .custom-heading {
            padding-top: 20px;
        }
    </style>

    <script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>

    <!-- Memanggil Data Grafik -->
    <script type="text/javascript">
        var refreshid = setInterval(function() {
            $('#responsecontainer').load('data.php');
        }, 1000);
    </script>
</head>

<body>
    <!-- Navigation or header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://localhost/sensorlaravel/sensorgraph/">
            <img src="img/AyamBroiler.png" alt="Your Logo" height="30">
        </a>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="http://localhost/sensorlaravel/sensorgraph/">Graphic</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000">Monitoring</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/sensorlaravel/controlling/">Controlling</a>
            </li>
        </ul>

    </nav>

    <!-- Tempat Untuk Tampilan Grafik -->
    <div class="container text-center">
        <h3 class="custom-heading">Grafik Sensor Real-Time</h3>
        <p>(Data yang ditampilkan adalah 5 data terakhir)</p>
    </div>

    <!-- Div Untuk Grafik -->
    <div class="container">
        <div class="container graph-container" id="responsecontainer" style="width: 80%; text-align: center;"></div>
    </div>
    <!-- Button -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="detail.php" class="btn btn-lg active" role="button" aria-pressed="true" style="background: linear-gradient(to right, blue, red); color: white; padding: 10px 20px; border: none; text-decoration: none;">Detail Data</a>
    </div>
    <!-- Button -->
</body>

</html>