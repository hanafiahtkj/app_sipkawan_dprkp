<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\TerdampakRelokasi;

class TerdampakrelokasiDatatable extends Datatable
{
    public $slug = 'terdampakrelokasi';

    public function datasource()
    {
        return TerdampakRelokasi::with('kecamatan')->with('kelurahan')->get();
    }

    public function setUp()
    {
        $this->buttons([])
            ->order('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::add(__('Jenis Program'))
                ->data('jenis'),

            Column::add(__('Kecamatan'))
                ->data('kecamatan.kecamatan'),

            Column::add(__('Kelurahan'))
                ->data('kelurahan.nama_deskel'),

            Column::add(__('Jumlah Rumah'))
                ->data('jumlah_rumah'),

            Column::add(__('Jumlah KK'))
                ->data('jumlah_kk'),

            Column::add(__('Jumlah Jiwa'))
                ->data('jumlah_jiwa'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.terdampak-relokasi.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.terdampak-relokasi.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
