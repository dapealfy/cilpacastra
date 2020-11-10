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
                    'nama_usaha' => $row['nama_tempat_usaha']  ?? '-',
                    'pemilik' => $row['nama_pemilik']  ?? '-',
                    'alamat_notelp' => $row['alamat_no_telp']  ?? '-',
                    'jumlah_pekerja_laki' => $row['pria']  ?? '-',
                    'jumlah_pekerja_perempuan' => $row['wnt']  ?? '-',
                    'jumlah_total' => $row['ttl']  ?? '-',
                    'keterangan' => $row['ket'] ?? '-',
                ]);
            }
        }
    }
}
