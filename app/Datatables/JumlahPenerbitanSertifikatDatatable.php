<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\JumlahPenerbitanSertifikat;

class JumlahPenerbitanSertifikatDatatable extends Datatable
{
    public $slug = 'JumlahPenerbitanSertifikat';

    public function datasource()
    {
        return JumlahPenerbitanSertifikat::with('kecamatan')->with('kelurahan')->get();
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

            Column::add(__('SHGB'))
                ->data('shgb'),

            Column::add(__('SHM'))
                ->data('shm'),

            Column::add(__('Sumber Data'))
                ->data('sumber_data'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.jumlah-penerbitan-sertifikat.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.jumlah-penerbitan-sertifikat.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
