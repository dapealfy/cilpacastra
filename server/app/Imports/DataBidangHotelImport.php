<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use App\DataBidangHotel;

class DataBidangHotelImport implements ToCollection, WithHeadingRow
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
            if($row['1'] != null && $row['2'] != null && $row['3'] != null)
            {
                DataBidangHotel::create([
                    'nama_usaha' => $row['1']  ?? '-',
                    'pemilik' => $row['2']  ?? '-',
                    'klasifikasi' => $row['3']  ?? '-', 
                    'alamat_notelp' => $row['4']  ?? '-', 
                    'jumlah_kamar' => $row['5']  ?? '-',
                    'jumlah_tempat_tidur' => $row['6']  ?? '-',
                    'jumlah_pekerja_laki' => $row['7']  ?? '-',
                    'jumlah_pekerja_perempuan' => $row['8']  ?? '-',
                    'jumlah_pekerja' => $row['9']  ?? '-',
                    'fasilitas' => $row['10'] ?? '-',
                ]);
            }
        }
    }
}
