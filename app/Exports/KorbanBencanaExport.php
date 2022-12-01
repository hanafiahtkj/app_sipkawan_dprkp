<?php

namespace App\Exports;

use App\Models\KorbanBencana;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KorbanBencanaExport implements FromView
{
    public function view(): View
    {
        return view('korban-bencana.excel', [
            'data' => KorbanBencana::all()
        ]);
    }
}
