<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use App\DataBidangDepot;

class DataBidangDepotImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if ($row['nama_tempat_usaha'] != null) {
                DataBidangDepot::create([
                    'nama_tempat_usaha' => $row['nama_tempat_usaha']  ?? '-',
                    'nama_pemilik' => $row['nama_pemilik']  ?? '-',
                    'alamat_notelp' => $row['alamat_no_telp']  ?? '-',
                    'jumlah_pria' => $row['pria']  ?? '-',
                    'jumlah_wanita' => $row['wnt']  ?? '-',
                    'jumlah_total' => $row['ttl']  ?? '-',
                    'keterangan' => $row['ket'] ?? '-',
                ]);
            }
        }
    }
}
