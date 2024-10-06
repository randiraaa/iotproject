<!-- Membaca status terakhir relay dan servo -->
<?php
// Include koneksi
include "koneksi.php";

$sql = mysqli_query($konek, "SELECT * FROM tb_control");
$data = mysqli_fetch_array($sql);
// Mengambil status relay
$relay = $data['relay'];
// Mengambil posisi servo
$servo = $data['servo'];
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Controlling</title>

    <script type="text/javascript">
        function ubahstatus(value) {
            if (value == true) value = "ON";
            else value = "OFF"
            document.getElementById('status').innerHTML = value;

            // Ajax merubah nilai status ON/OFF
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    // Mengambil respon dari web setelah berhasil merubah nilai
                    document.getElementById('status').innerHTML = xmlhttp.responseText;
                }
            }
            // Execute file PHP untuk merubah nilai di database
            xmlhttp.open("GET", "relay.php?stat=" + value, true);
            // Kirim data
            xmlhttp.send();
        }

        function ubahposisi(value) {
            document.getElementById('posisi').innerHTML = value;

            // Ajax merubah posisi servo
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    // Mengambil respon dari web setelah berhasil merubah nilai
                    document.getElementById('posisi').innerHTML = xmlhttp.responseText;
                }
            }
            // Execute file PHP untuk merubah nilai di database
            xmlhttp.open("GET", "servo.php?pos=" + value, true);
            // Kirim data
            xmlhttp.send();
        }
    </script>
</head>

<body>

    <!-- Navigation or header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://localhost/sensorlaravel/controlling/">
            <img src="img/AyamBroiler.png" alt="Your Logo" height="30">
        </a>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/sensorlaravel/sensorgraph/">Graphic</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000">Monitoring</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="http://localhost/sensorlaravel/controlling/">Controlling</a>
            </li>
        </ul>

    </nav>

    <!-- Tampilan Website Header -->
    <div class="container" style="text-align: center; margin-top: 60px;">
        <img src="img/AyamBroiler.png" style="width: 300px">
        <h2 style="margin-top: 20px; margin-bottom: 20px;">Hidupkan/Matikan Kipas & Mengatur Suhu Udara <br> Kandang Ayam Broiler</h2>
        <hr style="height: 2px; background: linear-gradient(to right, blue, red); border: none;">
    </div>

    <!-- Tampilan Kartu -->
    <div class="container" style="display: flex; justify-content: center; padding-top:4px;">

        <!-- Kartu Relay -->
        <div class="card text-black mb-3" style="width: 20rem; margin-right: 30px;">
            <div class="card-header" style="font-size: 30px; text-align:center; background-color:red; color: white">Kipas</div>
            <div class="card-body">
                <!-- Switch -->
                <div class="custom-control custom-switch" style="text-align: center; font-size: 30px;">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1" onchange="ubahstatus(this.checked)" <?php if ($relay == 1) echo "checked"; ?>>
                    <label class="custom-control-label" for="customSwitch1"><span id="status"><?php if ($relay == 1) echo "ON";
                                                                                                else echo "OFF" ?></span></label>
                </div>
                <!-- End Switch -->
            </div>
        </div>
        <!-- End Kartu Relay -->

        <!-- Kartu Servo -->
        <div class="card text-black mb-3" style="width: 20rem;">
            <div class="card-header" style="font-size: 30px; text-align:center; background-color:blue; color: white">Jendela</div>
            <div class="card-body">

                <!-- Range / Slider -->
                <div style="text-align: center; font-size: 18px">
                    <label for="customRange1">Posisi Servo <span id="posisi"><?php echo $servo; ?></span>°</label>
                    <input type="range" class="custom-range" id="customRange1" min="0" max="180" step="1" value="<?php echo $servo; ?>" onchange="ubahposisi(this.value)">
                </div>
                <!-- End Range / Slider -->
            </div>
        </div>
        <!-- End Kartu Servo -->
    </div>
    <!-- End Tampilan Kartu -->

    <!-- Back -->
    <h5 style="text-align: center; color: black; padding-top: 34px;">⇇</h5>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="http://127.0.0.1:8000" class="btn btn-lg active" role="button" aria-pressed="true" style="background: linear-gradient(to right, blue, red); color: white; padding: 10px 20px; border: none; text-decoration: none;">Monitoring</a>
    </div>
    <!-- End Back -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>