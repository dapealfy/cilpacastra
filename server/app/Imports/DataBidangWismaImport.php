<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use App\DataBidangWisma;

class DataBidangWismaImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // dd($row);
            if ($row['nama'] != null) {
                DataBidangWisma::create([
                    'nama' => $row['nama']  ?? '-',
                    'alamat' => $row['alamat']  ?? '-',
                    'pemilik' => $row['pemilik']  ?? '-',
                    'keterangan' => $row['ket']  ?? '-',
                    'kelurahan' => $row['kelurahan']  ?? '-',
                ]);
            }
        }
    }
}