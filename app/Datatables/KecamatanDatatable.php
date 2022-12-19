<?php

namespace App\Datatables;

use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;
use App\Models\Kecamatan;

class KecamatanDatatable extends Datatable
{
    public $slug = 'kecamatan';

    public function datasource()
    {
        return Kecamatan::get();
    }

    public function setUp()
    {
        $this->buttons([])
            ->order('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::add(__('Kode Kecamatan'))
                ->data('kode_kec'),

            Column::add(__('Nama Kecamatan'))
                ->data('kecamatan'),

            Column::add(__('Latitude'))
                ->data('latitude'),

            Column::add(__('Longitude'))
                ->data('longitude'),
        ];
    }
}
