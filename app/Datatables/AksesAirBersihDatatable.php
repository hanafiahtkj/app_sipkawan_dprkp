<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\AksesAirBersih;

class AksesAirBersihDatatable extends Datatable
{
    public $slug = 'AksesAirBersih';

    public function datasource()
    {
        return AksesAirBersih::with('kecamatan')->with('kelurahan')->get();
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

            Column::add(__('Jenis Klasifikasi Pelanggan'))
                ->data('jenis_klasifikasi'),

            Column::add(__('Kecamatan'))
                ->data('kecamatan.kecamatan'),

            Column::add(__('Jumlah Rumah'))
                ->data('jumlah_rumah'),

            Column::add(__('Sumber Data'))
                ->data('sumber_data'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.akses-air-bersih.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.akses-air-bersih.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
