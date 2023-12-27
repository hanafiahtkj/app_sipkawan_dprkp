<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Kecamatan;
use App\Models\KelDesa;
use App\Models\RumahSewa;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;

class RumahSewaImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        // echo json_encode($rows); die;

        // $temp = [];
        $dataGagal = [];
        foreach ($rows as $key => $row) {
            $data = array();
            $data = [
                'tahun'             => $row['tahun'],
                'jenis'             => $row['jenis_sarana'],
                'alamat'            => trim($row['alamat_lengkap'] ?? '') ?: '-',
                'luas_hunian'       => str_replace(',', '.', trim($row['luas_hunian'] ?? 0)) ?: 0,
                'jumlah_hunian'     => str_replace(',', '.', trim($row['jumlah_hunian'] ?? 0)) ?: 0,
                'tarif_sewa'        => str_replace(',', '.', trim($row['tarif_sewa'] ?? 0)) ?: 0,
                'keterangan'        => trim($row['keterangan'] ?? '') ?: '-',
            ];

            $kecamatan = Kecamatan::whereRaw('UPPER(kecamatan) = ?', [strtoupper($row['kecamatan'])])->first();
            $kelurahan = KelDesa::whereRaw('UPPER(nama_deskel) = ?', [strtoupper($row['kelurahandesa'])])->first();

            $data['id_kecamatan'] = $kecamatan ? $kecamatan->id : null;
            $data['id_kelurahan'] = $kelurahan ? $kelurahan->id : null;

            $kondisi_hunian = [
                1 => 'Layak',
                2 => 'Kurang Layak',
                3 => 'Tidak Layak'
            ];

            $lowercase = array_map('strtolower', $kondisi_hunian);
            $kondisi_hunian_id = array_search(strtolower($row['kondisi_hunian']), $lowercase);

            $data['kondisi_hunian'] = $kondisi_hunian_id ?? null;

            if (count($data) === count(array_filter($data, function($value) { return $value !== null && $value !== ''; }))) {
                RumahSewa::create($data);
            }
            else {
                // $dataGagal[] = $data;
            }
        }

        // dd($dataGagal);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
