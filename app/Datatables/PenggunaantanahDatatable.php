<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\PenggunaanTanah;

class PenggunaantanahDatatable extends Datatable
{
    public $slug = 'penggunaantanah';

    public function datasource()
    {
        $query = PenggunaanTanah::with('kecamatan')->with('kelurahan');

        if (Auth::user()->hasRole('admin_kelurahan')) {
            $query = $query->where('id_kelurahan', Auth::user()->id_kelurahan);
        }

        return $query->get();
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

            Column::add(__('Penggunaan'))
                ->data('penggunaan'),

            Column::add(__('Sertifikat Hak Milik'))
                ->data('sertifikat_milik'),

            Column::add(__('Penggunaan Tanah'))
                ->data('penggunaan_tanah'),

            Column::add(__('Pemanfaatan Tanah'))
                ->data('pemanfaatan_tanah'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.penggunaan-tanah.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.penggunaan-tanah.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
