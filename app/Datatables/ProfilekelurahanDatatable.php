<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\ProfileKelurahan;

class ProfilekelurahanDatatable extends Datatable
{
    public $slug = 'profilekelurahan';

    public function datasource()
    {
        $query = ProfileKelurahan::with('kecamatan')->with('kelurahan');

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
            Column::add(__('Kecamatan'))
                ->data('kecamatan.kecamatan'),

            Column::add(__('Kelurahan'))
                ->data('kelurahan.nama_deskel'),

            Column::add(__('Luas Wilayah'))
                ->data('luas_wilayah'),

            Column::add(__('Jumlah Rumah'))
                ->data('jumlah_rumah'),

            Column::add(__('Jumlah KK'))
                ->data('jumlah_kk'),

            Column::add()
                ->width('70px')
                ->actions(function ($data) {
                    $currentUser = Auth::user();

                    $buttons = Button::edit('boilerplate.profile-kelurahan.edit', $data->id);

                    if ($currentUser->hasRole('admin')) {
                        $buttons .= Button::delete('boilerplate.profile-kelurahan.destroy', $data->id);
                    }

                    return $buttons;
                }),
        ];
    }
}
