<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\AsramaController;
use App\Http\Controllers\PondokController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\UstadzController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenugasanController;
use App\Http\Controllers\PerangkatController;
use App\Http\Controllers\SuratizinController;
use App\Http\Controllers\KelassantriController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\AsramasantriController;
use App\Http\Controllers\HistoripelanggaranController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard',[ DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('histori/{santri}', [SantriController::class, 'tampilkan'])->name('histori.tampilkan');
    Route::post('histori/{santri}', [SantriController::class, 'buatstore'])->name('histori.buatstore');
    
    Route::get('historipelanggaran/{santri}', [SantriController::class, 'tampilkanpelanggaran'])->name('historipelanggaran.tampilkanpelanggaran');
    Route::post('historipelanggaran/{santri}', [SantriController::class, 'pelanggarantstore'])->name('historipelanggaran.pelanggarantstore');
    Route::get('suratizin/{santri}', [SantriController::class, 'surat'])->name('suratizin.surat');

    Route::post('kelas/{kelas}', [KelasController::class, 'kelasstore'])->name('kelas.kelasstore');
    
    
    // pondok
    Route::resource('pondok', PondokController::class)->only([
    'index', 'edit','update','show','destroy','create','store'
    ]);
    // Asrama santri
    Route::resource('asramasantri', AsramasantriController::class)->only([
    'index', 'edit','update','show','destroy','create','store'
    ]);

    // Asrama
    Route::resource('asrama', AsramaController::class)->only([
    'index', 'edit','update','show','destroy','create','store'
    ]);
    // Surat Izin
    Route::resource('suratizin', SuratizinController::class)->only([
    'index', 'edit','update','show','destroy','create','store'
    ]);

    // Pelanggaran
    Route::resource('pelanggaran',PelanggaranController::class)->only([
    'index', 'edit','update','show','destroy','create','store'
    ]);

    // santri
    Route::resource('santri',SantriController::class)->only([
    'index', 'edit','update','show','destroy','create','store'
    ]);

    // histori
    Route::resource('histori',HistoriController::class)->only([
    'store','destroy'
    ]);
    // histori Pelanggaran
    Route::resource('historipelanggaran',HistoripelanggaranController::class)->only([
    'index', 'edit','update','show','destroy','create','store'
    ]);
    // Pengurus
    Route::resource('penugasan', PenugasanController::class)->only([
    'index', 'edit','update','show','destroy','create','store'
    ]);
    
    //Ustadz
    Route::resource('ustadz',UstadzController::class)->only([
    'index', 'edit','update','show','destroy','create','store'
    ]);
    Route::resource('kelas', KelasController::class)->only([
    'index', 'edit','update','show','destroy','create','store'
    ])->parameters(['kelas' => 'kelas']);
    Route::resource('kelassantri', KelassantriController::class)->only([
    'index', 'edit','update','show','destroy','create','store'
    ]);
    Route::resource('mapel', MapelController::class)->only([
    'index', 'edit','update','show','destroy','create','store'
    ]);
    Route::resource('perangkat', PerangkatController::class)->only([
    'index', 'edit','update','show','destroy','create','store'
    ]);
    Route::resource('listsantri', KelassantriController::class)->only([
    'index', 'edit','update','show','destroy','create','store'
    ]);
});