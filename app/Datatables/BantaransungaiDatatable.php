<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\BantaranSungai;

class BantaransungaiDatatable extends Datatable
{
    public $slug = 'bantaransungai';

    public function datasource()
    {
        return BantaranSungai::with('kecamatan')->with('kelurahan')->get();
    }

    public function setUp()
    {
        $this->buttons([])
            ->order('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::add(__('Kecamatan'))
                ->data('kecamatan.kecamatan'),

            Column::add(__('Kelurahan'))
                ->data('kelurahan.nama_deskel'),

            Column::add(__('Jenis Penanganan'))
                ->data('jenis_penanganan'),

            Column::add(__('Luas/Panjang'))
                ->data('jenis'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.bantaran-sungai.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.bantaran-sungai.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
