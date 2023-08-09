<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\JumlahRumahPsu;

class JumlahRumahPsuDatatable extends Datatable
{
    public $slug = 'JumlahRumahPsu';

    public function datasource()
    {
        return JumlahRumahPsu::with('kecamatan')->with('kelurahan')->get();
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

            Column::add(__('Jumlah Rumah Yang Terfasilitasi PSU'))
                ->data('jumlah_rumah_psu'),

            Column::add(__('Jumlah Perumahan Yang Terfasilitasi PSU'))
                ->data('jumlah_perumahan_psu'),

            Column::add(__('Sumber Data'))
                ->data('sumber_data'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.kependudukan.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.kependudukan.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
