<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Kecamatan;
use App\Models\KelDesa;
use App\Models\RawanBahaya;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;

class RawanBahayaImport implements ToCollection, WithHeadingRow
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
                'jenis'             => $row['jenis_lokasi'],
                'luas'              => str_replace(',', '.', trim($row['luas_perumahan_ha'] ?? 0)) ?: 0,
                'jumlah_rumah'      => str_replace(',', '.', trim($row['jumlah_rumah'] ?? 0)) ?: 0,
                'jumlah_kk'         => str_replace(',', '.', trim($row['jumlah_kk'] ?? 0)) ?: 0,
            ];

            $kecamatan = Kecamatan::whereRaw('UPPER(kecamatan) = ?', [strtoupper($row['kecamatan'])])->first();
            $kelurahan = KelDesa::whereRaw('UPPER(nama_deskel) = ?', [strtoupper($row['kelurahandesa'])])->first();

            $data['id_kecamatan'] = $kecamatan ? $kecamatan->id : null;
            $data['id_kelurahan'] = $kelurahan ? $kelurahan->id : null;

            $kondisi_ekonomi = [
                1 => 'MBR',
                2 => 'Non MBR',
            ];

            $lowercase = array_map('strtolower', $kondisi_ekonomi);
            $kondisi_ekonomi_id = array_search(strtolower($row['kondisi_ekonomi']), $lowercase);

            $data['kondisi_ekonomi'] = $kondisi_ekonomi_id ?? null;

            $status_kepemilikan = [
                1 => 'Legal',
                2 => 'Ilegal',
            ];

            $lowercase = array_map('strtolower', $status_kepemilikan);
            $status_kepemilikan_id = array_search(strtolower($row['status_kepemilikan_tanah']), $lowercase);

            $data['status_kepemilikan'] = $status_kepemilikan_id ?? null;

            if (count($data) === count(array_filter($data, function($value) { return $value !== null && $value !== ''; }))) {
                RawanBahaya::create($data);
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
