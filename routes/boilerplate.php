<?php

use App\Http\Controllers\Boilerplate\Auth\ForgotPasswordController;
use App\Http\Controllers\Boilerplate\Auth\LoginController;
use App\Http\Controllers\Boilerplate\Auth\RegisterController;
use App\Http\Controllers\Boilerplate\Auth\ResetPasswordController;
use App\Http\Controllers\Boilerplate\DatatablesController;
use App\Http\Controllers\Boilerplate\ImpersonateController;
use App\Http\Controllers\Boilerplate\LanguageController;
use App\Http\Controllers\Boilerplate\Logs\LogViewerController;
use App\Http\Controllers\Boilerplate\Select2Controller;
use App\Http\Controllers\Boilerplate\Users\RolesController;
use App\Http\Controllers\Boilerplate\Users\UsersController;
use App\Http\Controllers\KorbanBencanaController;
use App\Http\Controllers\RawanBahayaController;
use App\Http\Controllers\BukanPemukimanController;
use App\Http\Controllers\RawanBencanaController;
use App\Http\Controllers\TerdampakRelokasiController;
use App\Http\Controllers\RumahSewaController;
use App\Http\Controllers\SebaranFasumController;
use App\Http\Controllers\PengajuanPsuController;
use App\Http\Controllers\PengadaanPsuController;
use App\Http\Controllers\SebaranKomplekController;
use App\Http\Controllers\RumahSusunController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelDesaController;
use App\Http\Controllers\ProfileKelurahanController;
use App\Http\Controllers\KawasanKumuhController;
use App\Http\Controllers\BantaranSungaiController;
use App\Http\Controllers\PenggunaanTanahController;
use App\Http\Controllers\RtlhController;

Route::group([
    'prefix'     => config('boilerplate.app.prefix', ''),
    'domain'     => config('boilerplate.app.domain', ''),
    'middleware' => ['web', 'boilerplate.locale'],
    'as'         => 'boilerplate.',
], function () {
    // Logout
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Language switch
    if (config('boilerplate.locale.switch', false)) {
        Route::post('language', [LanguageController::class, 'switch'])->name('lang.switch');
    }

    // Frontend
    Route::group(['middleware' => ['boilerplate.guest']], function () {
        // Login
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login'])->name('login.post');

        // Registration
        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('register', [RegisterController::class, 'register'])->name('register.post');

        // Password reset
        Route::prefix('password')->as('password.')->group(function () {
            Route::get('request', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('request');
            Route::post('email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('email');
            Route::get('reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset');
            Route::post('reset', [ResetPasswordController::class, 'reset'])->name('reset.post');
        });

        // First login
        Route::get('connect/{token?}', [UsersController::class, 'firstLogin'])->name('users.firstlogin');
        Route::post('connect/{token?}', [UsersController::class, 'firstLoginPost'])->name('users.firstlogin.post');
    });

    // Email verification
    Route::controller(RegisterController::class)->prefix('email')->middleware('boilerplate.auth')->as('verification.')->group(function () {
        Route::get('verify', 'emailVerify')->name('notice');
        Route::get('verify/{id}/{hash}', 'emailVerifyRequest')->name('verify');
        Route::post('verification-notification', 'emailSendVerification')->name('send');
    });

    // Backend
    Route::group(['middleware' => ['boilerplate.auth', 'ability:admin,backend_access', 'boilerplate.emailverified']], function () {
        // Impersonate another user
        if (config('boilerplate.app.allowImpersonate', false)) {
            Route::controller(ImpersonateController::class)->prefix('impersonate')->as('impersonate.')->group(function () {
                Route::post('/', 'impersonate')->name('user');
                Route::get('stop', 'stopImpersonate')->name('stop');
                Route::post('select', 'selectImpersonate')->name('select');
            });
        }

        // Dashboard
        Route::get('/', [config('boilerplate.menu.dashboard'), 'index'])->name('dashboard');

        // Session keep-alive
        Route::post('keep-alive', [UsersController::class, 'keepAlive'])->name('keepalive');

        // Datatables
        Route::post('datatables/{slug}', [DatatablesController::class, 'make'])->name('datatables');
        Broadcast::channel('dt.{name}.{signature}', function ($user, $name, $signature) {
            return channel_hash_equals($signature, 'dt', $name);
        });

        // Select2
        Route::post('select2', [Select2Controller::class, 'make'])->name('select2');

        // Roles and users
        Route::resource('roles', RolesController::class)->except('show')->middleware(['ability:admin,roles_crud']);
        Route::resource('users', UsersController::class)->middleware('ability:admin,users_crud')->except('show');

        // Profile
        Route::controller(UsersController::class)->prefix('userprofile')->as('user.')->group(function () {
            Route::get('/', 'profile')->name('profile');
            Route::post('/', 'profilePost')->name('profile.post');
            Route::post('settings', 'storeSetting')->name('settings');
            Route::get('avatar/url', 'getAvatarUrl')->name('avatar.url');
            Route::post('avatar/upload', 'avatarUpload')->name('avatar.upload');
            Route::post('avatar/gravatar', 'getAvatarFromGravatar')->name('avatar.gravatar');
            Route::post('avatar/delete', 'avatarDelete')->name('avatar.delete');
        });

        // Logs
        if (config('boilerplate.app.logs', false)) {
            Route::controller(LogViewerController::class)->prefix('logs')->as('logs.')->middleware('ability:admin,logs')->group(function () {
                Route::get('/', 'index')->name('dashboard');
                Route::prefix('list')->group(function () {
                    Route::get('/', 'listLogs')->name('list');
                    Route::delete('delete', 'delete')->name('delete');
                    Route::prefix('{date}')->group(function () {
                        Route::get('/', 'show')->name('show');
                        Route::get('download', 'download')->name('download');
                        Route::get('{level}', 'showByLevel')->name('filter');
                    });
                });
            });
        }

        Route::get('korban-bencana/export/',
            [KorbanBencanaController::class, 'export'])->name('korban-bencana.export');
        Route::resource('korban-bencana', KorbanBencanaController::class);
        Route::get('rawan-bahaya/export/',
            [RawanBahayaController::class, 'export'])->name('rawan-bahaya.export');
        Route::resource('rawan-bahaya', RawanBahayaController::class);
        Route::get('bukan-pemukiman/export/',
            [BukanPemukimanController::class, 'export'])->name('bukan-pemukiman.export');
        Route::resource('bukan-pemukiman', BukanPemukimanController::class);
        Route::get('rawan-bencana/export/',
            [RawanBencanaController::class, 'export'])->name('rawan-bencana.export');
        Route::resource('rawan-bencana', RawanBencanaController::class);
        Route::get('terdampak-relokasi/export/',
            [TerdampakRelokasiController::class, 'export'])->name('terdampak-relokasi.export');
        Route::resource('terdampak-relokasi', TerdampakRelokasiController::class);
        Route::get('rumah-sewa/export/',
            [RumahSewaController::class, 'export'])->name('rumah-sewa.export');
        Route::resource('rumah-sewa', RumahSewaController::class);
        Route::get('sebaran-fasum/export/',
            [SebaranFasumController::class, 'export'])->name('sebaran-fasum.export');
        Route::resource('sebaran-fasum', SebaranFasumController::class);
        Route::get('pengajuan-psu/export/',
            [PengajuanPsuController::class, 'export'])->name('pengajuan-psu.export');
        Route::resource('pengajuan-psu', PengajuanPsuController::class);
        Route::get('pengadaan-psu/export/',
            [PengadaanPsuController::class, 'export'])->name('pengadaan-psu.export');
        Route::resource('pengadaan-psu', PengadaanPsuController::class);
        Route::get('sebaran-komplek/export/',
            [SebaranKomplekController::class, 'export'])->name('sebaran-komplek.export');
        Route::resource('sebaran-komplek', SebaranKomplekController::class);
        Route::get('rumah-susun/export/',
            [RumahSusunController::class, 'export'])->name('rumah-susun.export');
        Route::resource('rumah-susun', RumahSusunController::class);
        Route::post('kecamatan/refresh', [
            KecamatanController::class, 'refresh'])->name('kecamatan.refresh');
        Route::resource('kecamatan', KecamatanController::class);
        Route::post('kel-desa/refresh',
            [KelDesaController::class, 'refresh'])->name('kel-desa.refresh');
        Route::post('kel-desa/get-byidkec',
            [KelDesaController::class, 'getByidKec'])->name('kel-desa.get-byidkec');
        Route::resource('kel-desa', KelDesaController::class);
        Route::resource('profile-kelurahan', ProfileKelurahanController::class);
        Route::get('rtlh/export/',
            [RtlhController::class, 'export'])->name('rtlh.export');
        Route::resource('rtlh', RtlhController::class);
        Route::get('kawasan-kumuh/export/',
            [KawasanKumuhController::class, 'export'])->name('kawasan-kumuh.export');
        Route::resource('kawasan-kumuh', KawasanKumuhController::class);
        Route::get('bantaran-sungai/export/',
            [BantaranSungaiController::class, 'export'])->name('bantaran-sungai.export');
        Route::resource('bantaran-sungai', BantaranSungaiController::class);
        Route::get('penggunaan-tanah/export/',
            [PenggunaanTanahController::class, 'export'])->name('penggunaan-tanah.export');
        Route::resource('penggunaan-tanah', PenggunaanTanahController::class);
    });
});
