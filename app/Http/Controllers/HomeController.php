<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RumahSusun;
use App\Models\SebaranKomplek;
use App\Models\BantuanPsu;
use App\Models\RumahSewa;
use App\Models\JumlahRumahBanjarmasin;
use App\Models\Kecamatan;
use App\Models\KelDesa;
use DB;
use DataTables;
use Illuminate\Support\Facades\Http;
use App\Exports\RumahSewaExport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $tahun = $request->tahun ?? date("Y");
        $data  = $this->_data($tahun);
        return view('landing-page.index', $data);
    }

    public function loadPsuDatatables(Request $request)
    {
        $model = BantuanPsu::with(['kecamatan', 'kelurahan']);

        if($request->id_kecamatan) {
            $model = $model->where('id_kecamatan', '=', $request->id_kecamatan);
        }

        if($request->id_kelurahan) {
            $model = $model->where('id_kelurahan', '=', $request->id_kelurahan);
        }

        if($request->nama_perumahan) {
            $model = $model->where('nama_perumahan', '=', $request->nama_perumahan);
        }

        return DataTables::of($model)
            ->addColumn('n_status_aset', function ($row) {
                return BantuanPsu::status_aset($row->status_aset);
            })
            ->addColumn('n_jenis_psu', function ($row) {
                return BantuanPsu::jenis_psu($row->jenis_psu);
            })
            ->addColumn('n_jenis_sarana', function ($row) {
                return BantuanPsu::jenis_sarana($row->jenis_sarana);
            })
            ->toJson();
    }

    public function psu(Request $request)
    {
        $tahun = $request->tahun ?? date("Y");
        $data  = $this->_data($tahun);
        $data['nama_perumahan'] = BantuanPsu::where('nama_perumahan', '!=', '')
        ->groupBy('nama_perumahan')->pluck('nama_perumahan')->toArray();
        $data['kecamatan'] = Kecamatan::get();
        return view('landing-page.psu', $data);
    }

    public function psuDetail($id)
    {
        $data['data'] = BantuanPsu::find($id);
        return view('landing-page.psu-detail', $data);
    }

    public function loadPerumahanDatatables(Request $request)
    {
        $model = SebaranKomplek::with(['kecamatan', 'kelurahan']);

        if($request->id_kecamatan) {
            $model = $model->where('id_kecamatan', '=', $request->id_kecamatan);
        }

        if($request->id_kelurahan) {
            $model = $model->where('id_kelurahan', '=', $request->id_kelurahan);
        }

        if($request->jenis) {
            $model = $model->where('jenis', '=', $request->jenis);
        }

        return DataTables::of($model)
            ->addColumn('jenis', function ($row) {
                return SebaranKomplek::jenis($row->jenis);
            })
            ->toJson();
    }

    public function perumahan(Request $request)
    {
        $tahun = $request->tahun ?? date("Y");
        $data  = $this->_data($tahun);
        $data['kecamatan'] = Kecamatan::get();
        return view('landing-page.perumahan', $data);
    }

    public function perumahanDetail($id)
    {
        $data['data'] = SebaranKomplek::find($id);
        return view('landing-page.perumahan-detail', $data);
    }

    // public function loadRumahSewaDatatables(Request $request)
    // {
    //     $model = RumahSewa::with(['kecamatan', 'kelurahan']);

    //     if($request->id_kecamatan) {
    //         $model = $model->where('id_kecamatan', '=', $request->id_kecamatan);
    //     }

    //     if($request->id_kelurahan) {
    //         $model = $model->where('id_kelurahan', '=', $request->id_kelurahan);
    //     }

    //     if($request->luas_hunian) {
    //         $luasRange = explode('-', $request->luas_hunian);
    //         if(count($luasRange) == 2) {
    //             $model = $model->whereBetween('luas_hunian', [$luasRange[0], $luasRange[1]]);
    //         } elseif($request->luas_hunian === '131+') {
    //             $model = $model->where('luas_hunian', '>', 130);
    //         }
    //     }

    //     if($request->tarif_sewa) {
    //         $tarifRange = explode('-', $request->tarif_sewa);
    //         if(count($tarifRange) == 2) {
    //             $model = $model->whereBetween('tarif_sewa', [$tarifRange[0], $tarifRange[1]]);
    //         } elseif($request->tarif_sewa === '900000+') {
    //             $model = $model->where('tarif_sewa', '>', 900000);
    //         }
    //     }

    //     return DataTables::of($model)
    //         ->toJson();
    // }

    public function loadRumahSewaDatatables(Request $request)
    {
        $model = RumahSewa::with(['kecamatan', 'kelurahan']);

        // Filter berdasarkan kecamatan
        if($request->id_kecamatan) {
            $model = $model->where('id_kecamatan', '=', $request->id_kecamatan);
        }

        // Filter berdasarkan kelurahan
        if($request->id_kelurahan) {
            $model = $model->where('id_kelurahan', '=', $request->id_kelurahan);
        }

        // Filter berdasarkan luas hunian
        if($request->luas_hunian) {
            $luasRange = explode('-', $request->luas_hunian);
            if(count($luasRange) == 2) {
                $model = $model->whereBetween('luas_hunian', [$luasRange[0], $luasRange[1]]);
            } elseif($request->luas_hunian === '131+') {
                $model = $model->where('luas_hunian', '>', 130);
            }
        }

        // Filter berdasarkan tarif sewa
        if($request->tarif_sewa) {
            $tarifRange = explode('-', $request->tarif_sewa);
            if(count($tarifRange) == 2) {
                $model = $model->whereBetween('tarif_sewa', [$tarifRange[0], $tarifRange[1]]);
            } elseif($request->tarif_sewa === '900000+') {
                $model = $model->where('tarif_sewa', '>', 900000);
            }
        }

        // Tentukan jumlah item per halaman (default: 8)
        $perPage = $request->get('perPage', 8);

        // Ambil data dengan pagination
        $data = $model->paginate($perPage)->through(function ($rumahSewa) {
            return [
                'id' => $rumahSewa->id,
                'jenis' => $rumahSewa->jenis,
                'kecamatan' => $rumahSewa->kecamatan,
                'kelurahan' => $rumahSewa->kelurahan,
                'luas_hunian' => $rumahSewa->luas_hunian,
                'jumlah_hunian' => $rumahSewa->jumlah_hunian,
                'tarif_sewa' => $rumahSewa->tarif_sewa,
                'gambar_path' => $rumahSewa->gambar_path ? asset('storage/' . $rumahSewa->gambar_path) : null, // Pastikan gambar disimpan di folder yang sesuai
            ];
        });

        // Kembalikan data dengan pagination (total halaman, halaman saat ini, dll.)
        return response()->json([
            'data' => $data->items(),          // Data item rumah sewa pada halaman saat ini
            'total_pages' => $data->lastPage(), // Total halaman yang tersedia
            'current_page' => $data->currentPage(), // Halaman saat ini
            'per_page' => $data->perPage(),    // Jumlah item per halaman
            'total' => $data->total(),         // Total jumlah data
        ]);
    }

    public function rumahSewa(Request $request)
    {
        $query = RumahSewa::with(['kecamatan', 'kelurahan']);

        // Terapkan Filter Langsung
        if($request->id_kecamatan) $query->where('id_kecamatan', $request->id_kecamatan);
        if($request->id_kelurahan) $query->where('id_kelurahan', $request->id_kelurahan);
        if($request->jenis) $query->where('jenis', $request->jenis);

        if($request->luas_hunian) {
            $range = explode('-', $request->luas_hunian);
            if(count($range) == 2) $query->whereBetween('luas_hunian', [$range[0], $range[1]]);
            elseif($request->luas_hunian === '131+') $query->where('luas_hunian', '>', 130);
        }

        if($request->tarif_sewa) {
            $range = explode('-', $request->tarif_sewa);
            if(count($range) == 2) $query->whereBetween('tarif_sewa', [$range[0], $range[1]]);
            elseif($request->tarif_sewa === '900000+') $query->where('tarif_sewa', '>', 900000);
        }

        // Ambil data dengan pagination (8 item per halaman)
        // appends(request()->all()) penting agar filter tidak hilang saat ganti halaman
        $rumahSewaList = $query->paginate(8)->appends($request->all());

        // Statistik Tetap Sama
        $data['stats'] = [
            'total' => RumahSewa::count(),
            'total_kecamatan' => RumahSewa::distinct('id_kecamatan')->count(),
            'top_jenis' => RumahSewa::select('jenis', \DB::raw('count(*) as total'))
                ->groupBy('jenis')->orderBy('total', 'desc')->first(),
            'tarif_terjangkau' => RumahSewa::where('tarif_sewa', '<=', 500000)->count(),
        ];

        // --- TAMBAHAN BARU: List Detail ---
        $data['stats_jenis'] = RumahSewa::select('jenis', \DB::raw('count(*) as total'))
            ->where('jenis', '!=', '')
            ->groupBy('jenis')
            ->orderBy('total', 'desc')
            ->get();

        $data['stats_tarif'] = [
            'Rp 100k - 300k' => RumahSewa::whereBetween('tarif_sewa', [100000, 300000])->count(),
            'Rp 300k - 500k' => RumahSewa::whereBetween('tarif_sewa', [300001, 500000])->count(),
            'Rp 500k - 700k' => RumahSewa::whereBetween('tarif_sewa', [500001, 700000])->count(),
            'Rp 700k - 900k' => RumahSewa::whereBetween('tarif_sewa', [700001, 900000])->count(),
            'Di atas 900k'   => RumahSewa::where('tarif_sewa', '>', 900000)->count(),
        ];

        $data['kecamatan_stats'] = Kecamatan::withCount('rumahSewa')->has('rumahSewa', '>', 0)->get();

        $data['rumahSewaList'] = $rumahSewaList;
        $data['jenis'] = RumahSewa::where('jenis', '!=', '')->groupBy('jenis')->pluck('jenis')->toArray();
        $data['kecamatan'] = Kecamatan::get();

        $data['timeline'] = [
            ['kegiatan' => 'Perencanaan/Persiapan', 'tgl' => '23 Juni 2025 - 13 Juli 2025'],
            ['kegiatan' => 'Pengumpulan Data', 'tgl' => '01 Agustus 2025 - 11 Agustus 2025'],
            ['kegiatan' => 'Pengolahan Data', 'tgl' => '01 Agustus 2025 - 11 Agustus 2025'],
            ['kegiatan' => 'Analisis', 'tgl' => '11 Agustus 2025 - 11 Agustus 2025'],
            ['kegiatan' => 'Penyajian/Diseminasi', 'tgl' => '11 Agustus 2025 - 21 Agustus 2025'],
        ];

        return view('landing-page.rumah-sewa', $data);
    }

    public function rumahSewaDetail($id)
    {
        $data['data'] = RumahSewa::find($id);
        return view('landing-page.rumah-sewa-detail', $data);
    }

    public function exportRumahSewa(Request $request)
    {
        $query = RumahSewa::with(['kecamatan', 'kelurahan']);

        if($request->id_kecamatan) {
            $query->where('id_kecamatan', $request->id_kecamatan);
        }
        if($request->id_kelurahan) {
            $query->where('id_kelurahan', $request->id_kelurahan);
        }
        if($request->jenis) {
            $query->where('jenis', $request->jenis);
        }
        if($request->luas_hunian) {
            $range = explode('-', $request->luas_hunian);
            if(count($range) == 2) {
                $query->whereBetween('luas_hunian', [$range[0], $range[1]]);
            } elseif($request->luas_hunian === '131+') {
                $query->where('luas_hunian', '>', 130);
            }
        }
        if($request->tarif_sewa) {
            $range = explode('-', $request->tarif_sewa);
            if(count($range) == 2) {
                $query->whereBetween('tarif_sewa', [$range[0], $range[1]]);
            } elseif($request->tarif_sewa === '900000+') {
                $query->where('tarif_sewa', '>', 900000);
            }
        }

        // 2. Ambil hasil filternya
        $filteredData = $query->get();

        // 3. Tentukan nama file dan format
        $filename = 'Data_Rumah_Sewa_' . date('Ymd_His');
        $export = new RumahSewaExport($filteredData);

        if ($request->format === 'csv') {
            return Excel::download($export, $filename . '.csv', \Maatwebsite\Excel\Excel::CSV);
        }

        return Excel::download($export, $filename . '.xlsx');
    }

    public function rumahSusun(Request $request)
    {
        $tahun = $request->tahun ?? date("Y");
        $data  = $this->_data($tahun);
        $data['jenis'] = RumahSewa::where('jenis', '!=', '')
            ->groupBy('jenis')->pluck('jenis')->toArray();
        $data['kecamatan'] = Kecamatan::get();
        return view('landing-page.rumah-susun', $data);
    }

    public function rumahSusunDetail($id)
    {
        $data['id'] = $id;
        return view('landing-page.rumah-susun-detail', $data);
    }

    public function rtlhRealisasi(Request $request)
    {
        $tahun = $request->tahun ?? date("Y");
        $data  = $this->_data($tahun);
        $data['jenis'] = RumahSewa::where('jenis', '!=', '')
            ->groupBy('jenis')->pluck('jenis')->toArray();
        $data['kecamatan'] = Kecamatan::get();

        $response = Http::withToken('AIzaSyCGpcum7xga8slj5q_taQfNVuFn3KbLAV0')
            ->get('https://bakawan.banjarmasinkota.go.id/api/rtlhRealisasi');

        $data['apiResponse'] = $response->json();

        return view('landing-page.rtlh-realisasi', $data);
    }

    public function infografis(Request $request)
    {
        $tahun = $request->tahun ?? date("Y");
        $data  = $this->_data($tahun);
        return view('landing-page.infografis', $data);
    }

    function _data($tahun)
    {
        return array_merge(
            $this->_dataTable($tahun),
            $this->_rumahJumlah($tahun),
            $this->_rumahChart($tahun),
        );
    }

    function _dataTable($tahun)
    {
        return array(
            'tahun'            => $tahun,
            'rumahsewa'        => RumahSewa::where('tahun', $tahun)->get(),
            'rumahsusun'       => RumahSusun::where('tahun', $tahun)->get(),
            'sebarankomplek'   => SebaranKomplek::where('tahun', $tahun)->get(),
        );
    }

    function _rumahJumlah($tahun)
    {
        return array(
            'jml_rmh_umum'     => JumlahRumahBanjarmasin::where('tahun', $tahun)->sum('jumlah_rumah_umum'),
            'jml_rmh_komersil' => JumlahRumahBanjarmasin::where('tahun', $tahun)->sum('jumlah_rumah_komersil'),
            'jml_rmh_swadaya'  => JumlahRumahBanjarmasin::where('tahun', $tahun)->sum('jumlah_rumah_swadaya'),
        );
    }

    function _rumahChart($tahun)
    {
        $label = [
            'Memiliki Akses Listrik (PLN)',
            'Memiliki Akses Air Bersih (PDAM)',
            'Memiliki Akses Pembuangan Air Limbah'
        ];

        $total = [
            \App\Models\AksesListrikPln::where('tahun', $tahun)->sum('jumlah_rumah'),
            \App\Models\AksesAirBersih::where('tahun', $tahun)->sum('jumlah_rumah'),
            \App\Models\AksesPembuanganAirLimbah::where('tahun', $tahun)->sum('jumlah_rumah'),
        ];

        $chart = array(
            'total' => $total,
            'label' => $label,
        );

        return array(
            'rumahChart' => array(
                'total' => $total,
                'label' => $label,
            )
        );
    }

    public function moreInfo(Request $request, $type)
    {
        $tahun = $request->tahun ?? date("Y");
        $data = $this->getDataByType($type, $tahun);
        $view = $this->getViewByType($type);

        return view($view, $data);
    }

    private function getDataByType($type, $tahun)
    {
        switch ($type) {
            case 'komplek-perumahan':
                return [
                    'tables' => SebaranKomplek::where('tahun', $tahun)->get()
                ];
            case 'rumah-sewa':
                return [
                    'tables' => RumahSewa::where('tahun', $tahun)->get()
                ];
            default:
                return [];
        }
    }

    private function getViewByType($type)
    {
        switch ($type) {
            case 'komplek-perumahan':
                return 'landing-page.more-info-komplek-perumahan';
            case 'rumah-sewa':
                return 'landing-page.more-info-rumah-sewa';
            default:
                return 'landing-page.more-info-default';
        }
    }
}
