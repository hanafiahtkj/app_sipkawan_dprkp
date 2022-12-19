<?php

namespace App\Datatables;

use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\KelDesa;

class KeldesaDatatable extends Datatable
{
    public $slug = 'keldesa';

    public function datasource()
    {
        return KelDesa::with('kecamatan')->get();
    }

    public function setUp()
    {
        $this->buttons([])
            ->order('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::add(__('Nama Kecamatan '))
                ->data('kecamatan.kecamatan'),

            Column::add(__('Kode Kelurahan'))
                ->data('kode_deskel'),

            Column::add(__('Nama Kelurahan'))
                ->data('nama_deskel'),

            Column::add(__('Latitude'))
                ->data('latitude'),

            Column::add(__('Longitude'))
                ->data('longitude'),
        ];
    }
}
