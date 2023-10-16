<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Kecamatan;
use App\Models\KelDesa;
use App\Models\SebaranKomplek;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;

class SebaranKomplekImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        // echo json_encode($rows); die;

        // $temp = [];
        foreach ($rows as $key => $row) {
            $data = array();
            $data = [
                'tahun'           => $row['tahun'],
                'nama_perumahan'  => $row['nama_perumahan'],
                'nama_pengembang' => trim($row['nama_pengembang'] ?? '') ?: '-',
                'luas'            => str_replace(',', '.', $row['luas']),
                'jumlah_rumah'    => str_replace(',', '.', trim($row['jmlh_rmh'] ?? 0)) ?: 0,
            ];

            $kecamatan = Kecamatan::whereRaw('UPPER(kecamatan) = ?', [strtoupper($row['kecamatan'])])->first();
            $kelurahan = KelDesa::whereRaw('UPPER(nama_deskel) = ?', [strtoupper($row['desa'])])->first();

            $data['id_kecamatan'] = $kecamatan ? $kecamatan->id : null;
            $data['id_kelurahan'] = $kelurahan ? $kelurahan->id : null;

            $jenis = [
                1 => 'Umum',
                2 => 'Komersil',
                3 => 'Berimbang',
                4 => 'Khusus',
                5 => 'Umum dan Komersil',
            ];

            $lowercaseJenis = array_map('strtolower', $jenis);
            $jenis_id = array_search(strtolower($row['jenis']), $lowercaseJenis);

            $data['jenis'] = $jenis_id ?? null;

            // echo var_dump($data).'<br/>';

            if (count($data) === count(array_filter($data, function($value) { return $value !== null && $value !== ''; }))) {
                SebaranKomplek::create($data);
            }
            else {
                dd($data);
            }
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
