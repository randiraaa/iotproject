<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MSensor;
use Illuminate\Support\Facades\DB;

class SensorLaravel extends Controller
{
    public function bacasuhu()
    {
        // Membaca nilai / isi tb_sensor dan mengambil nilai suhu
        $sensor = MSensor::select('*')->get();
        // Mengirim ke tampilan baca suhu (buar view bacasuhu)
        return view('bacasuhu', ['nilaisensor' => $sensor]);
    }

    public function bacakelembaban()
    {
        // Membaca nilai / isi tb_sensor dan mengambil nilai suhu
        $sensor = MSensor::select('*')->get();
        // Mengirim ke tampilan baca suhu (buar view bacasuhu)
        return view('bacakelembaban', ['nilaisensor' => $sensor]);
    }

    public function simpansensor()
    {
        MSensor::where('id', '1')->update(['suhu' => request()->nilaisuhu, 'kelembaban' => request()->nilaikelembaban]);
    }
}
