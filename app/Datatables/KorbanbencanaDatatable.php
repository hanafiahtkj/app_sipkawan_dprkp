<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\KorbanBencana;

class KorbanbencanaDatatable extends Datatable
{
    public $slug = 'korbanbencana';

    public function datasource()
    {
        return KorbanBencana::with('kecamatan')->with('kelurahan')->get();
    }

    public function setUp()
    {
        $this->buttons([])
            ->order('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::add(__('Jenis Bencana'))
                ->data('jenis'),

            Column::add(__('Tahun'))
                ->data('tahun'),

            Column::add(__('Kecamatan'))
                ->data('kecamatan.kecamatan'),

            Column::add(__('Kelurahan'))
                ->data('kelurahan.nama_deskel'),

            Column::add(__('Rt'))
                ->data('rt'),

            Column::add(__('Rw'))
                ->data('rw'),

            Column::add(__('Kepala Keluarga'))
                ->data('nama_kk'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.korban-bencana.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.korban-bencana.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
