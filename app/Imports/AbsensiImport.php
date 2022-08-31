<?php

namespace App\Imports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsensiImport implements ToModel, WithHeadingRow
{
    
    public function model(array $row)
    {
        return new Absensi([
            'absen_id' => $row['person_id'],
            'nama' => $row["name"],
            'tanggal' => date("Y-m-d", (($row["date"]-25569)*86400)),
            'jam_masuk' => date("H:i:s", (($row["check_in"]-25569)*86400)),
            'jam_pulang' => date("H:i:s", (($row["check_out"]-25569)*86400)),
        ]);
    }
}
