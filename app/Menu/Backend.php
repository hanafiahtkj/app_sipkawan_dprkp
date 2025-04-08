<?php

namespace App\Menu;

use Sebastienheyd\Boilerplate\Menu\Builder;

class Backend
{
    public function make(Builder $menu)
    {
        $item = $menu->add('WebGIS', [
            'route' => 'boilerplate.gis',
            'icon' => 'globe',
            'order' => 100,
        ])->link->attr('target', '_blank' );

        // $item = $menu->add('E-Profil Kelurahan', [
        //     'icon' => 'square',
        //     'order' => 100,
        // ]);

        // $item->add('Profil Kelurahan', [
        //     'permission' => 'backend_access',
        //     'active' => 'boilerplate.profile-kelurahan.*',
        //     'route' => 'boilerplate.profile-kelurahan.index',
        // ]);

        $item = $menu->add('Aplikasi Lainnya', [
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

        $item = $menu->add('Data Perumahan', [
            'icon' => 'square',
            'order' => 100,
        ]);

        $item->add('Bantuan PSU Perumanan', [
            'active' => 'boilerplate.bantuan-psu.*',
            'route' => 'boilerplate.bantuan-psu.index',
        ]);

        $itemDetail = $item->add('Satu Data Perumahan', [
            'icon' => 'angles-right',
            'order' => 100,
        ]);

        $itemDetail->add('Data Kependudukan', [
            'permission' => 'backend_access',
            'active' => 'boilerplate.kependudukan.*',
            'route' => 'boilerplate.kependudukan.index',
        ]);

        $itemDetail->add('Jumlah Rumah Yang Memiliki Akses Listrik (PLN)', [
            'permission' => 'backend_access',
            'active' => 'boilerplate.akses-listrik-pln.*',
            'route' => 'boilerplate.akses-listrik-pln.index',
        ]);

        $itemDetail->add('Jumlah Rumah Yang Memiliki Akses Air Bersih (PDAM)', [
            'permission' => 'backend_access',
            'active' => 'boilerplate.akses-air-bersih.*',
            'route' => 'boilerplate.akses-air-bersih.index',
        ]);

        $itemDetail->add('Data Jumlah Rumah Yang Dibangun/ Di Berikan Peningkatan Kualitas / Di Renovasi', [
            'permission' => 'backend_access',
            'active' => 'boilerplate.proyek-perumahan.*',
            'route' => 'boilerplate.proyek-perumahan.index',
        ]);

        $itemDetail->add('Jumlah IPAL', [
            'permission' => 'backend_access',
            'active' => 'boilerplate.ipal.*',
            'route' => 'boilerplate.ipal.index',
        ]);

        $itemDetail->add('Data Jumlah Rumah Yang Memiliki Akses Pembuangan Air Limbah', [
            'permission' => 'backend_access',
            'active' => 'boilerplate.akses-pembuangan-air-limbah.*',
            'route' => 'boilerplate.akses-pembuangan-air-limbah.index',
        ]);

        $itemDetail->add('Data Jumlah Rumah Rumah Yang Memiliki IMB/PBG', [
            'permission' => 'backend_access',
            'active' => 'boilerplate.jumlah-rumah-imb.*',
            'route' => 'boilerplate.jumlah-rumah-imb.index',
        ]);

        $itemDetail->add('Data Jumlah Penerbitan Sertifikat', [
            'permission' => 'backend_access',
            'active' => 'boilerplate.jumlah-penerbitan-sertifikat.*',
            'route' => 'boilerplate.jumlah-penerbitan-sertifikat.index',
        ]);

        $itemDetail->add('Data Jumlah Rumah Yang Terfasilitasi PSU Perumahan', [
            'permission' => 'backend_access',
            'active' => 'boilerplate.jumlah-rumah-psu.*',
            'route' => 'boilerplate.jumlah-rumah-psu.index',
        ]);

        $itemDetail->add('Data Jumlah Rumah Di Kota Banjarmasin', [
            'permission' => 'backend_access',
            'active' => 'boilerplate.jumlah-rumah-banjarmasin.*',
            'route' => 'boilerplate.jumlah-rumah-banjarmasin.index',
        ]);

        $itemDetail->add('Data Jumlah Perumahan Di Kota Banjarmasin', [
            'permission' => 'backend_access',
            'active' => 'boilerplate.jumlah-perumahan-banjarmasin.*',
            'route' => 'boilerplate.jumlah-perumahan-banjarmasin.index',
        ]);

        $itemDetail = $item->add('Data SPM', [
            'permission' => 'admin',
            'icon' => 'angles-right',
            'order' => 100,
        ]);

        $itemDetail->add('Korban Bencana Yang Belum Tertangani', [
            'active' => 'boilerplate.korban-bencana.*',
            'route' => 'boilerplate.korban-bencana.index',
        ]);

        $itemDetail->add('Perumahan di Lokasi Rawan Bahaya', [
            'active' => 'boilerplate.rawan-bahaya.*',
            'route' => 'boilerplate.rawan-bahaya.index',
        ]);

        $itemDetail->add('Perumahan di Lahan Bukan Pemukiman', [
            'active' => 'boilerplate.bukan-pemukiman.*',
            'route' => 'boilerplate.bukan-pemukiman.index',
        ]);

        $itemDetail->add('Perumahan di Lokasi Rawan Bencana', [
            'active' => 'boilerplate.rawan-bencana.*',
            'route' => 'boilerplate.rawan-bencana.index',
        ]);

        $itemDetail->add('Rumah yang Terkena Relokasi', [
            'active' => 'boilerplate.terdampak-relokasi.*',
            'route' => 'boilerplate.terdampak-relokasi.index',
        ]);

        $itemDetail->add('Rumah Sewa Milik Masyarakat', [
            'active' => 'boilerplate.rumah-sewa.*',
            'route' => 'boilerplate.rumah-sewa.index',
        ]);

        $itemDetail = $item->add('Data PSU Perumahan', [
            'permission' => 'admin',
            'icon' => 'angles-right',
            'order' => 100,
        ]);

        $itemDetail->add('Status Pengajuan PSU Perumahan', [
            'active' => 'boilerplate.pengajuan-psu.*',
            'route' => 'boilerplate.pengajuan-psu.index',
        ]);

        $itemDetail->add('Status Pengadaan PSU Perumahan', [
            'active' => 'boilerplate.pengadaan-psu.*',
            'route' => 'boilerplate.pengadaan-psu.index',
        ]);

        $itemDetail->add('Sebaran Fasum di Komplek Perumahan', [
            'active' => 'boilerplate.sebaran-fasum.*',
            'route' => 'boilerplate.sebaran-fasum.index',
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
