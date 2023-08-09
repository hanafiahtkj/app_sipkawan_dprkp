<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\ProyekPerumahan;

class ProyekPerumahanDatatable extends Datatable
{
    public $slug = 'ProyekPerumahan';

    public function datasource()
    {
        return ProyekPerumahan::with('kecamatan')->with('kelurahan')->get();
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

            Column::add(__('Kecamatan'))
                ->data('kecamatan.kecamatan'),

            Column::add(__('Kelurahan'))
                ->data('kelurahan.nama_deskel'),

            Column::add(__('Jenis Penanganan'))
                ->data('jenis_penanganan'),

            Column::add(__('Jenis Program'))
                ->data('jenis_program'),

            Column::add(__('Jumlah Rumah'))
                ->data('jumlah_rumah'),

            Column::add(__('Sumber Data'))
                ->data('sumber_data'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.proyek-perumahan.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.proyek-perumahan.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
