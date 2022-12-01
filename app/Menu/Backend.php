<?php

namespace App\Menu;

use Sebastienheyd\Boilerplate\Menu\Builder;

class Backend
{
    public function make(Builder $menu)
    {
        $item = $menu->add('Data SPM', [
            'permission' => 'admin',
            'icon' => 'square',
            'order' => 100,
        ]);

        $item->add('Korban Bencana Yang Belum Tertangani', [
            'active' => 'boilerplate.korban-bencana.*',
            'route' => 'boilerplate.korban-bencana.index',
        ]);

        $item->add('Perumahan di Lokasi Rawan Bahaya', [
            'active' => 'boilerplate.rawan-bahaya.*',
            'route' => 'boilerplate.rawan-bahaya.index',
        ]);

        $item->add('Perumahan di Lahan Bukan Pemukiman', [
            'active' => 'boilerplate.bukan-pemukiman.*',
            'route' => 'boilerplate.bukan-pemukiman.index',
        ]);

        $item->add('Perumahan di Lokasi Rawan Bencana', [
            'active' => 'boilerplate.rawan-bencana.*',
            'route' => 'boilerplate.rawan-bencana.index',
        ]);

        $item->add('Rumah yang Terkena Relokasi', [
            'active' => 'boilerplate.terdampak-relokasi.*',
            'route' => 'boilerplate.terdampak-relokasi.index',
        ]);

        $item->add('Rumah Sewa Milik Masyarakat', [
            'active' => 'boilerplate.rumah-sewa.*',
            'route' => 'boilerplate.rumah-sewa.index',
        ]);

        $item->add('Sebaran Fasum di Komplek Perumahan', [
            'active' => 'boilerplate.sebaran-fasum.*',
            'route' => 'boilerplate.sebaran-fasum.index',
        ]);

        $item = $menu->add('Data PSU', [
            'permission' => 'admin',
            'icon' => 'square',
            'order' => 100,
        ]);

        $item->add('Status Pengajuan PSU Perumahan', [
            'active' => 'boilerplate.pengajuan-psu.*',
            'route' => 'boilerplate.pengajuan-psu.index',
        ]);

        $item->add('Status Pengadaan PSU Perumahan', [
            'active' => 'boilerplate.pengadaan-psu.*',
            'route' => 'boilerplate.pengadaan-psu.index',
        ]);

        $item = $menu->add('E-Profil Kelurahan', [
            'icon' => 'square',
            'order' => 100,
        ]);

        $item->add('Profil Kelurahan', [
            'permission' => 'backend_access',
            'active' => 'boilerplate.profile-kelurahan.*',
            'route' => 'boilerplate.profile-kelurahan.index',
        ]);

        $item = $menu->add('Data Lainnya', [
            'permission' => 'admin',
            'icon' => 'square',
            'order' => 100,
        ]);

        $item->add('Sebaran Komplek Perumanan', [
            'active' => 'boilerplate.sebaran-komplek.*',
            'route' => 'boilerplate.sebaran-komplek.index',
        ]);

        $item->add('Sebaran Rumah Susun Kota Banjarmasin', [
            'active' => 'boilerplate.rumah-susun.*',
            'route' => 'boilerplate.rumah-susun.index',
        ]);

        $item = $menu->add('Data Permukiman', [
            'permission' => 'admin',
            'icon' => 'square',
            'order' => 100,
        ]);

        $item->add('RTLH yang sudah tertangani', [
            'active' => 'boilerplate.rtlh.*',
            'route' => 'boilerplate.rtlh.index',
        ]);

        $item->add('Jumlah Rumah di Kawasan Kumuh', [
            'active' => 'boilerplate.kawasan-kumuh.*',
            'route' => 'boilerplate.kawasan-kumuh.index',
        ]);

        $item->add('Penanganan di Kawasan Kumuh', [
            'active' => 'boilerplate.bantaran-sungai.*',
            'route' => 'boilerplate.bantaran-sungai.index',
        ]);

        $item = $menu->add('Data Pertanahan', [
            'icon' => 'square',
            'order' => 100,
        ]);

        $item->add('Kepemilikan Penggunaan Tanah', [
            'permission' => 'backend_access',
            'active' => 'boilerplate.penggunaan-tanah.*',
            'route' => 'boilerplate.penggunaan-tanah.index',
        ]);

        $item = $menu->add('Master Data', [
            'permission' => 'admin',
            'icon' => 'square',
            'order' => 100,
        ]);

        $item->add('Kecamatan', [
            'active' => 'boilerplate.kecamatan.*',
            'route' => 'boilerplate.kecamatan.index',
        ]);

        $item->add('Kelurahan', [
            'active' => 'boilerplate.kel-desa.*',
            'route' => 'boilerplate.kel-desa.index',
        ]);
    }
}
