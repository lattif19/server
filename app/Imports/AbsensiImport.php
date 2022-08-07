<?php

namespace App\Imports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\ToModel;

class AbsensiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Absensi([
            'absen_id' => $row[0],
            'tanggal' => $row[1],
            'jam_masuk' => $row[2],
            'jam_keluar' => $row[3],
        ]);
    }
}
