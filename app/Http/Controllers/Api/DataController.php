<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\RumahSewa;

class DataController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */
    public function rumahSewa()
    {
        $data = RumahSewa::with(['kecamatan', 'kelurahan'])->get();

        return response()->json([
            'data' => $data,
        ]);
    }
}
