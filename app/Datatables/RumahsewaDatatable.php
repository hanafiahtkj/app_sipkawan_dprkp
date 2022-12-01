<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\RumahSewa;

class RumahsewaDatatable extends Datatable
{
    public $slug = 'rumahsewa';

    public function datasource()
    {
        return RumahSewa::with('kecamatan')->with('kelurahan')->get();
    }

    public function setUp()
    {
    }

    public function columns(): array
    {
        return [
            Column::add(__('Jenis Sarana'))
                ->data('jenis'),

            Column::add(__('Kecamatan'))
                ->data('kecamatan.kecamatan'),

            Column::add(__('Kelurahan'))
                ->data('kelurahan.nama_deskel'),

            Column::add(__('Tipe/Luas Hunian'))
                ->data('luas_hunian'),

            Column::add(__('Jumlah Hunian'))
                ->data('jumlah_hunian'),

            Column::add(__('Tarif Sewa'))
                ->data('tarif_sewa'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.rumah-sewa.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.rumah-sewa.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
