<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\JumlahPerumahanBanjarmasin;

class JumlahPerumahanBanjarmasinDatatable extends Datatable
{
    public $slug = 'JumlahPerumahanBanjarmasin';

    public function datasource()
    {
        return JumlahPerumahanBanjarmasin::with('kecamatan')->with('kelurahan')->get();
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

            Column::add(__('Jumlah Rumah Umum'))
                ->data('jumlah_rumah_umum'),

            Column::add(__('Jumlah Rumah Komersil'))
                ->data('jumlah_rumah_komersil'),

            Column::add(__('Jumlah Rumah Swadaya'))
                ->data('jumlah_rumah_swadaya'),

            Column::add(__('Sumber Data'))
                ->data('sumber_data'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.jumlah-perumahan-banjarmasin.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.jumlah-perumahan-banjarmasin.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
