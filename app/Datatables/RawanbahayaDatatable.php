<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\RawanBahaya;

class RawanbahayaDatatable extends Datatable
{
    public $slug = 'rawanbahaya';

    public function datasource()
    {
        return RawanBahaya::with('kecamatan')->with('kelurahan')->get();
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

            Column::add(__('Jenis Lokasi'))
                ->data('jenis'),

            Column::add(__('Kecamatan'))
                ->data('kecamatan.kecamatan'),

            Column::add(__('Kelurahan'))
                ->data('kelurahan.nama_deskel'),

            Column::add(__('Luas Perumahan'))
                ->data('luas'),

            Column::add(__('Jumlah Rumah'))
                ->data('jumlah_rumah'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.rawan-bahaya.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.rawan-bahaya.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
