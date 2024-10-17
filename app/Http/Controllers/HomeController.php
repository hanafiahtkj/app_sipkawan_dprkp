<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RumahSusun;
use App\Models\SebaranKomplek;
use App\Models\RumahSewa;
use App\Models\JumlahRumahBanjarmasin;
use App\Models\Kecamatan;
use App\Models\KelDesa;
use DB;
use DataTables;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $tahun = $request->tahun ?? date("Y");
        $data  = $this->_data($tahun);
        return view('landing-page.index', $data);
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

    public function loadRumahSewaDatatables(Request $request)
    {
        $model = RumahSewa::with(['kecamatan', 'kelurahan']);

        if($request->id_kecamatan) {
            $model = $model->where('id_kecamatan', '=', $request->id_kecamatan);
        }

        if($request->id_kelurahan) {
            $model = $model->where('id_kelurahan', '=', $request->id_kelurahan);
        }

        if($request->luas_hunian) {
            $luasRange = explode('-', $request->luas_hunian);
            if(count($luasRange) == 2) {
                $model = $model->whereBetween('luas_hunian', [$luasRange[0], $luasRange[1]]);
            } elseif($request->luas_hunian === '131+') {
                $model = $model->where('luas_hunian', '>', 130);
            }
        }

        if($request->tarif_sewa) {
            $tarifRange = explode('-', $request->tarif_sewa);
            if(count($tarifRange) == 2) {
                $model = $model->whereBetween('tarif_sewa', [$tarifRange[0], $tarifRange[1]]);
            } elseif($request->tarif_sewa === '900000+') {
                $model = $model->where('tarif_sewa', '>', 900000);
            }
        }

        return DataTables::of($model)
            ->toJson();
    }

    public function rumahSewa(Request $request)
    {
        $tahun = $request->tahun ?? date("Y");
        $data  = $this->_data($tahun);
        $data['jenis'] = RumahSewa::where('jenis', '!=', '')
            ->groupBy('jenis')->pluck('jenis')->toArray();
        $data['kecamatan'] = Kecamatan::get();
        return view('landing-page.rumah-sewa', $data);
    }

    public function rumahSewaDetail($id)
    {
        $data['data'] = RumahSewa::find($id);
        return view('landing-page.rumah-sewa-detail', $data);
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
