<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\JumlahRumahImb;

class JumlahRumahImbDatatable extends Datatable
{
    public $slug = 'JumlahRumahImb';

    public function datasource()
    {
        return JumlahRumahImb::with('kecamatan')->with('kelurahan')->get();
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

            Column::add(__('Perorangan (Unit)'))
                ->data('perorangan'),

            Column::add(__('Pengembang Perumahan (Unit)'))
                ->data('pengembang'),

            Column::add(__('Sumber Data'))
                ->data('sumber_data'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.jumlah-rumah-imb.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.jumlah-rumah-imb.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
