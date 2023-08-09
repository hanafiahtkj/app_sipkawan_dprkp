<?php

namespace App\Datatables;

use Illuminate\Support\Facades\Auth;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\Kependudukan;

class KependudukanDatatable extends Datatable
{
    public $slug = 'kependudukan';

    public function datasource()
    {
        return Kependudukan::with('kecamatan')->with('kelurahan')->get();
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

            Column::add(__('Jumlah Penduduk'))
                ->data('jumlah_penduduk'),

            Column::add(__('Jumlah KK'))
                ->data('jumlah_kk'),

            Column::add(__('Jumlah RT'))
                ->data('jumlah_rt'),

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
