<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Kecamatan;
use App\Models\KelDesa;
use App\Models\RawanBencana;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;

class RawanBencanaImport implements ToCollection, WithHeadingRow
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
                'tahun'             => $row['tahun'],
                'jenis'             => $row['jenis_bencana'],
                'rw'                => trim($row['required'] ?? '') ?: '-',
                'rt'                => trim($row['required'] ?? '') ?: '-',
                'luas'              => str_replace(',', '.', trim($row['luas_perumahan_ha'] ?? 0)) ?: 0,
                'jumlah_rumah'      => str_replace(',', '.', trim($row['jumlah_rumah'] ?? 0)) ?: 0,
                'jumlah_kk'         => str_replace(',', '.', trim($row['jumlah_kk'] ?? 0)) ?: 0,
                'jumlah_jiwa'       => str_replace(',', '.', trim($row['jumlah_jiwa'] ?? 0)) ?: 0,
            ];

            $tingkat_kerawanan = [
                1 => 'Rendah',
                2 => 'Sedang',
                3 => 'Tinggi'
            ];

            $lowercase = array_map('strtolower', $tingkat_kerawanan);
            $tingkat_kerawanan_id = array_search(strtolower($row['tingkat_kerawanan_bencana']), $lowercase);

            $data['tingkat_kerawanan'] = $tingkat_kerawanan_id ?? null;

            $kecamatan = Kecamatan::whereRaw('UPPER(kecamatan) = ?', [strtoupper($row['kecamatan'])])->first();
            $kelurahan = KelDesa::whereRaw('UPPER(nama_deskel) = ?', [strtoupper($row['kelurahandesa'])])->first();

            $data['id_kecamatan'] = $kecamatan ? $kecamatan->id : null;
            $data['id_kelurahan'] = $kelurahan ? $kelurahan->id : null;

            $kondisi_fisik = [
                1 => 'RLH',
                2 => 'RTLH',
            ];

            $lowercase = array_map('strtolower', $kondisi_fisik);
            $kondisi_fisik_id = array_search(strtolower($row['kondisi_rumah']), $lowercase);

            $data['kondisi_fisik'] = $kondisi_fisik_id ?? null;

            $status_kepemilikan = [
                1 => 'Hak Milik',
                2 => 'Sewa',
            ];

            $lowercase = array_map('strtolower', $status_kepemilikan);
            $status_kepemilikan_id = array_search(strtolower($row['status_kepemilikan_rumah']), $lowercase);

            $data['status_kepemilikan'] = $status_kepemilikan_id ?? null;

            if (count($data) === count(array_filter($data, function($value) { return $value !== null && $value !== ''; }))) {
                RawanBencana::create($data);
            }
            else {
                // dd($data);
            }
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
