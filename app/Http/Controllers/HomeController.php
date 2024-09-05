<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RumahSusun;
use App\Models\SebaranKomplek;
use App\Models\RumahSewa;
use App\Models\JumlahRumahBanjarmasin;
use DB;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $tahun = $request->tahun ?? date("Y");
        $data  = $this->_data($tahun);
        return view('landing-page.index', $data);
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
