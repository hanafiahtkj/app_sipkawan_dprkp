<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RumahSusun;
use App\Models\SebaranKomplek;
use App\Models\RumahSewa;
use DB;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('landing-page.index', [
            'rumahsewa' => RumahSewa::get(),
            'rumahsusun' => RumahSusun::get(),
            'sebarankomplek' => SebaranKomplek::get(),
        ]);
    }
}
