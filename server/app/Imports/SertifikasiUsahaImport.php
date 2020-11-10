<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use App\SertifikasiUsaha;

class SertifikasiUsahaImport implements ToCollection, WithHeadingRow
{
     /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            if($row['1'] != 'Nama Klien')
            {
                SertifikasiUsaha::create([
                    'nama_klien' => $row['1']  ?? '-',
                    'permohonan' => $row['2']  ?? '-',
                    'kajian' => $row['3']  ?? '-', 
                    'perjanjian' => $row['4']  ?? '-', 
                    'lap_audit_s2' => $row['5']  ?? '-',
                    'sertifikat' => $row['6']  ?? '-',
                    'lap_audit_sury' => $row['7']  ?? '-',
                    'klasifikasi_bintang' => $row['8']  ?? '-',
                    'lsu_auditor' => $row['9']  ?? '-',
                ]);
            }
        }
    }
}
