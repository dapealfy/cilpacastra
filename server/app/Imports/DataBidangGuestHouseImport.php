<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use App\DataBidangGuestHouse;

class DataBidangGuestHouseImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if ($row['1'] != null) {
                DataBidangGuestHouse::create([
                    'nama' => $row['1']  ?? '-',
                    'alamat' => $row['2']  ?? '-',
                    'pemilik' => $row['3']  ?? '-',
                    'keterangan' => $row['4']  ?? '-',
                    'kelurahan' => $row['5']  ?? '-',
                ]);
            }
        }
    }
}
