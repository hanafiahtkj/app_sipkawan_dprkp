<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\RawanBencana;

class RawanbencanaDatatable extends Datatable
{
    public $slug = 'rawanbencana';

    public function datasource()
    {
        return RawanBencana::with('kecamatan')->with('kelurahan')->get();
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

            Column::add(__('Jenis Bencana'))
                ->data('jenis'),

            Column::add(__('Tingkat Kerawanan'))
                ->data('tingkat_kerawanan', function ($data) {
                    return RawanBencana::tingkat_kerawanan($data->tingkat_kerawanan);
                }),

            Column::add(__('Kecamatan'))
                ->data('kecamatan.kecamatan'),

            Column::add(__('Kelurahan'))
                ->data('kelurahan.nama_deskel'),

            Column::add(__('Rt'))
                ->data('rt'),

            Column::add(__('Rw'))
                ->data('rw'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.rawan-bencana.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.rawan-bencana.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
