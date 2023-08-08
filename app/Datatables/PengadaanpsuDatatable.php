<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\PengadaanPsu;

class PengadaanpsuDatatable extends Datatable
{
    public $slug = 'pengadaanpsu';

    public function datasource()
    {
        return PengadaanPsu::get();
    }

    public function setUp()
    {
        $this->buttons([])
            ->order('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::add(__('Tahun'))
                ->data('tahun'),

            Column::add(__('Nama Perumahan'))
                ->data('nama_perumahan'),

            Column::add(__('Jenis PSU'))
                ->data('jenis'),

            Column::add(__('Luas'))
                ->data('luas'),

            Column::add(__('Status'))
                ->data('status'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.pengadaan-psu.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.pengadaan-psu.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
