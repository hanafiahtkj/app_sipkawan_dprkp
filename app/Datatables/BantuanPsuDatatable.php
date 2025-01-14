<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\BantuanPsu;

class SebarankomplekDatatable extends Datatable
{
    public $slug = 'bantuanPsu';

    public function datasource()
    {
        return BantuanPsu::with('kecamatan')->with('kelurahan')->get();
    }

    public function setUp()
    {
        $this->buttons([])
            ->order('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::add(__('Status Aset'))
                ->data('status_aset', function ($data) {
                    return BantuanPsu::status_aset($data->status_aset);
                }),

            Column::add(__('Nama Perumahan'))
                ->data('nama_perumahan'),

            Column::add(__('Kecamatan'))
                ->data('kecamatan.kecamatan'),

            Column::add(__('Kelurahan'))
                ->data('kelurahan.nama_deskel'),

            Column::add(__('Jumlah Sertifikat'))
                ->data('jumlah_sertifikat'),

            Column::add(__('Jenis PSU'))
                ->data('jenis_psu', function ($data) {
                    return BantuanPsu::jenis_psu($data->jenis_psu);
                }),

            Column::add(__('Panjang Jalan'))
                ->data('panjang'),

            Column::add(__('Lebar Jalan'))
                ->data('lebar'),

            Column::add(__('Jenis Sarana'))
                ->data('jenis_sarana', function ($data) {
                    return BantuanPsu::jenis_sarana($data->jenis_sarana);
                }),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.bantuan-psu.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.bantuan-psu.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
