<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\SebaranKomplek;

class SebarankomplekDatatable extends Datatable
{
    public $slug = 'sebarankomplek';

    public function datasource()
    {
        return SebaranKomplek::with('kecamatan')->with('kelurahan')->get();
    }

    public function setUp()
    {
    }

    public function columns(): array
    {
        return [
            Column::add(__('Nama Perumahan'))
                ->data('nama_perumahan'),

            Column::add(__('Nama Pengembang'))
                ->data('nama_pengembang'),

            Column::add(__('Kecamatan'))
                ->data('kecamatan.kecamatan'),

            Column::add(__('Kelurahan'))
                ->data('kelurahan.nama_deskel'),

            Column::add(__('Luas'))
                ->data('luas'),

            Column::add(__('Jenis'))
                ->data('jenis'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.sebaran-komplek.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.sebaran-komplek.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
