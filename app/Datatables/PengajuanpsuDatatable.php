<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\PengajuanPsu;

class PengajuanpsuDatatable extends Datatable
{
    public $slug = 'pengajuanpsu';

    public function datasource()
    {
        return PengajuanPsu::get();
    }

    public function setUp()
    {
    }

    public function columns(): array
    {
        return [
            Column::add(__('Nama Perumahan'))
                ->data('nama_perumahan'),

            Column::add(__('Jenis PSU'))
                ->data('jenis'),

            Column::add(__('Luas'))
                ->data('luas'),

            Column::add(__('Tanggal Pengajuan'))
                ->data('tanggal'),

            Column::add(__('Status'))
                ->data('status'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.pengajuan-psu.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.pengajuan-psu.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
