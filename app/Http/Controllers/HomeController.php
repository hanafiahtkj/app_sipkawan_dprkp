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
        $tahun = $request->tahun ?? '2022';
        $data  = $this->_data($tahun);
        return view('landing-page.index', $data);
    }

    function _data($tahun)
    {
        $dataTable = [
            'tahun'            => $tahun,
            'rumahsewa'        => RumahSewa::where('tahun', $tahun)->get(),
            'rumahsusun'       => RumahSusun::where('tahun', $tahun)->get(),
            'sebarankomplek'   => SebaranKomplek::where('tahun', $tahun)->get(),
        ];

        $jml_rumah = [
            'jml_rmh_umum'     => JumlahRumahBanjarmasin::where('tahun', $tahun)->sum('jumlah_rumah_umum'),
            'jml_rmh_komersil' => JumlahRumahBanjarmasin::where('tahun', $tahun)->sum('jumlah_rumah_komersil'),
            'jml_rmh_swadaya'  => JumlahRumahBanjarmasin::where('tahun', $tahun)->sum('jumlah_rumah_swadaya'),
        ];

        return array_merge(
            $jml_rumah,
            $dataTable
        );
    }


}
