<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use App\SertifikasiProfesi;

class SertifikasiProfesiImport implements ToCollection, WithHeadingRow
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
            SertifikasiProfesi::create([
                'tanggal' => $row['1']  ?? '-',
                'tuk' => $row['2']  ?? '-',
                'provinsi' => $row['3']  ?? '-', 
                'pendidikan' => $row['4']  ?? '-', 
                'industri' => $row['5']  ?? '-',
                'grand_total' => $row['6']  ?? '-',
            ]);
        }
    }
}
