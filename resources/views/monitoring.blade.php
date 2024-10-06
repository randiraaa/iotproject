<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Monitoring Suhu & Kelembaban Udara</title>

    <!-- Memanggil file JQuery/ Proses Realtime -->
    <script type="text/javascript" src="{{ ('jquery/jquery.min.js') }}"></script>

    <!-- Ajax untuk realtime -->
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#suhu").load("{{ url('bacasuhu') }}");
                $("#kelembaban").load("{{ url('bacakelembaban') }}");
            }, 1000);
        });
    </script>
</head>

<body>

    <!-- Navigation or header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/AyamBroiler.png') }}" alt="Your Logo" height="30">
        </a>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/sensorlaravel/sensorgraph/">Graphic</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/') }}">Monitoring</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/sensorlaravel/controlling/">Controlling</a>
            </li>
        </ul>

    </nav>

    <!-- Tampilan Website Header -->
    <div class="container" style="text-align: center; margin-top: 60px;">
        <img src="{{ ('images/AyamBroiler.png') }}" style="width: 300px">
        <h2 style="margin-top: 20px; margin-bottom: 20px;">Monitoring Suhu & Kelembaban Udara <br> Kandang Ayam Broiler</h2>
        <hr style="height: 2px; margin-bottom: 20px; background: linear-gradient(to right, blue, red); border: none;">
    </div>

    <!-- Tampilan Nilai Sensor -->
    <div class="container">
        <div class="row" style="text-align: center;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background-color: red; color: white;">
                        <h4>SUHU</h4>
                    </div>
                    <div class="card-body">
                        <div style="font-size: 70px; font-weight: bold;">
                            <span id="suhu">0</span> <span style="font-size: 24px; vertical-align: top;">°C</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background-color: blue; color: white;">
                        <h4>KELEMBABAN</h4>
                    </div>
                    <div class="card-body">
                        <div style="font-size: 70px; font-weight: bold;">
                            <span id="kelembaban">0</span> <span style="font-size: 24px; vertical-align: top;">%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="text-align: center; padding-top: 50px; margin-bottom: 20px;">
        <a href="http://localhost/sensorlaravel/controlling/" class="btn btn-lg active" role="button" aria-pressed="true" style="background: linear-gradient(to right, blue, red); color: white; padding: 10px 20px; border: none; text-decoration: none;">Controlling</a>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>