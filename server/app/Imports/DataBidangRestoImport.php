<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use App\DataBidangResto;

class DataBidangRestoImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if ($row['1'] != null && $row['2'] != null && $row['3'] != null) {
                DataBidangResto::create([
                    'nama_usaha' => $row['1']  ?? '-',
                    'pemilik' => $row['2']  ?? '-',
                    'alamat_notelp' => $row['3']  ?? '-',
                    'jumlah_pekerja_laki' => $row['4']  ?? '-',
                    'jumlah_pekerja_perempuan' => $row['5']  ?? '-',
                    'jumlah_total' => $row['6']  ?? '-',
                    'keterangan' => $row['7'] ?? '-',
                ]);
            }
        }
    }
}
