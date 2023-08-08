<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\RumahSusun;

class RumahsusunDatatable extends Datatable
{
    public $slug = 'rumahsusun';

    public function datasource()
    {
        return RumahSusun::with('kecamatan')->with('kelurahan')->get();
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

            Column::add(__('Nama Rumah Susun'))
                ->data('nama_rumah_susun'),

            Column::add(__('Kecamatan'))
                ->data('kecamatan.kecamatan'),

            Column::add(__('Kelurahan'))
                ->data('kelurahan.nama_deskel'),

            Column::add(__('Alamat'))
                ->data('alamat'),

            Column::add(__('Luas Unit'))
                ->data('luas'),

            Column::add(__('Jumlah Unit'))
                ->data('jumlah'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.rumah-susun.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.rumah-susun.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
