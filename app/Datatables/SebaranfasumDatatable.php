<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\SebaranFasum;

class SebaranfasumDatatable extends Datatable
{
    public $slug = 'sebaranfasum';

    public function datasource()
    {
        return SebaranFasum::with('kecamatan')->with('kelurahan')->get();
    }

    public function setUp()
    {
    }

    public function columns(): array
    {
        return [
            Column::add(__('Penggunaan'))
                ->data('penggunaan'),

            Column::add(__('Keterangan'))
                ->data('keterangan'),

            Column::add(__('Kecamatan'))
                ->data('kecamatan.kecamatan'),

            Column::add(__('Kelurahan'))
                ->data('kelurahan.nama_deskel'),

            Column::add(__('Luas'))
                ->data('luas'),

            Column::add(__('Nama Perumahan'))
                ->data('nama_perumahan'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.sebaran-fasum.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.sebaran-fasum.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
